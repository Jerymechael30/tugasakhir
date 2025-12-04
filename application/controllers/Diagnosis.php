<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends CI_Controller
{
    protected $for_role = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model');
        $this->load->model('Gejala_model');
        $this->load->model('Diagnosa_model');

        check_role($this->for_role);
    }

    public function index()
    {
        $data['title']      = 'Hasil Diagnosa';
        $data['gejala']     = $this->Gejala_model->get_all();
        $data['jawaban']    = $this->Diagnosa_model->get_cf_user();

        $data['contents'] = $this->load->view('diagnosis_view', $data, true);
        $this->load->view('templates/user_templates', $data);
    }

    public function hasil()
    {
        $riwayat_id = $this->input->get('id');
        // for ($i = 1; $i <= 30; $i++) {
        //     $this->perhitungan($i);
        // }
        $this->perhitungan($riwayat_id);

        $data['title']      = 'Hasil Diagnosa';
        $data['hasil']      = $this->Diagnosa_model->get_by_id($riwayat_id);

        $data['contents'] = $this->load->view('diagnosis_hasil_view', $data, true);
        $this->load->view('templates/user_templates', $data);
    }

    public function submit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('umur', 'Umur', 'required|trim|numeric');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['gejala'] = $this->Gejala_model->get_all();
            $data['user']   = (object)[
                'nama'          => set_value('nama'),
                'umur'          => set_value('umur'),
                'jenis_kelamin' => set_value('jenis_kelamin'),
                'alamat'        => set_value('alamat')
            ];
            $data['alert_danger'] = validation_errors();

            $data['contents'] = $this->load->view('diagnosis_view', $data, true);
            $this->load->view('templates/user_templates', $data);
        } else {

            $result = $this->Diagnosa_model->store([
                'user_id'       => $this->session->userdata('user_id'),
                'nama'          => $this->input->post('nama', true),
                'umur'          => $this->input->post('umur', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat'        => $this->input->post('alamat', true) ?? null,
                'gejala'        => $this->input->post('gejala') ?? []
            ]);

            $this->session->set_flashdata('alert_success', 'Data berhasil disimpan.');
            redirect('diagnosis/hasil?id=' . $result);
        }
    }

    public function perhitungan($id = 1)
    {
        $data = $this->hitung($id);

        $penyakit_tertinggi = null;
        $nilai_tertinggi = -1;

        foreach ($data['penyakit'] as $p) {
            $cf = floatval($p['cf_combine']);
            if ($cf > $nilai_tertinggi) {
                $nilai_tertinggi = $cf;
                $penyakit_tertinggi = $p;
            }
        }

        $combine = floatval($penyakit_tertinggi['cf_combine']);
        $combine_percent = round($combine * 100, 2);

        $result = [
            'gangguan_id'           => $penyakit_tertinggi['gangguan_id'],
            'penyakit_tertinggi'    => $penyakit_tertinggi,
            'nilai_tertinggi'       => $nilai_tertinggi,
            'combine_percent'       => $combine_percent
        ];

        // update ke database
        if (!empty($penyakit_tertinggi) && isset($id)) {
            $update_data = [
                'gangguan_id' => $penyakit_tertinggi['gangguan_id'],
                'cf_hasil'    => floatval($penyakit_tertinggi['cf_combine']),
            ];

            $this->Diagnosa_model->update($update_data, $id);
        }
    }

    public function hitung($riwayat_id)
    {
        $data_riwayat = $this->Diagnosa_model->get_detail_by_id($riwayat_id);

        // Siapkan array baru untuk hasil perhitungan per penyakit
        foreach ($data_riwayat['penyakit'] as &$penyakit) {
            $gejala = $penyakit['gejala'];
            $cf_perhitungan = [];
            $cf_combine = 0;

            // Hitung hanya jika jumlah gejala minimal 2
            if (count($gejala) >= 2) {
                $cf1 = (float) $gejala[0]['cfhe'];
                $cf2 = (float) $gejala[1]['cfhe'];

                $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                $cf_perhitungan[] = [
                    'cf_1'        => number_format($cf1, 4, '.', ''),
                    'cf_2'        => number_format($cf2, 4, '.', ''),
                    'rumus'       => "$cf1 + $cf2 * (1 - $cf1)",
                    'cf_combine'  => number_format($cf_combine, 4, '.', '')
                ];

                for ($i = 2; $i < count($gejala); $i++) {
                    $cf1 = $cf_combine;
                    $cf2 = (float) $gejala[$i]['cfhe'];

                    $cf_combine = $cf1 + ($cf2 * (1 - $cf1));
                    $cf_perhitungan[] = [
                        'cf_1'        => number_format($cf1, 4, '.', ''),
                        'cf_2'        => number_format($cf2, 4, '.', ''),
                        'rumus'       => "$cf1 + $cf2 * (1 - $cf1)",
                        'cf_combine'  => number_format($cf_combine, 4, '.', '')
                    ];
                }
            } elseif (count($gejala) === 1) {
                // Jika hanya 1 gejala, langsung ambil cfhe-nya
                $cf_combine = (float) $gejala[0]['cfhe'];
                $cf_perhitungan[] = [
                    'cf_1'        => number_format($cf_combine, 4, '.', ''),
                    'cf_2'        => null,
                    'rumus'       => 'Hanya satu gejala',
                    'cf_combine'  => number_format($cf_combine, 4, '.', '')
                ];
            }

            // Simpan hasil per penyakit
            $penyakit['cf_combine'] = number_format($cf_combine, 4, '.', '');
            $penyakit['cf_perhitungan'] = $cf_perhitungan;
        }

        // return json_encode($data_riwayat);
        return $data_riwayat;
    }
}
