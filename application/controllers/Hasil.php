<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    protected $for_role = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model');
        $this->load->model('Diagnosa_model');

        check_role($this->for_role);
    }

    public function index()
    {
        $data['title'] = 'Rekam Psikologis';
        $data['hasil'] = $this->Diagnosa_model->get_all();

        $data['contents'] = $this->load->view('hasil_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Hasil Diagnosa';
        $data['hasil'] = $this->Diagnosa_model->get_detail_by_id($id);

        if (empty($data['hasil'])) {
            show_404();
        }

        $data['hasil'] = $this->hitung($id);

        // echo json_encode($data['hasil']); die;

        $data['contents'] = $this->load->view('hasil_detail_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function perhitungan()
    {
        $id = 1;
        echo $this->hitung($id);
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

    public function delete($id)
    {
        $this->Diagnosa_model->delete($id);
        $this->session->set_flashdata('message', 'Hasil diagnosa berhasil dihapus.');
        redirect('hasil');
    }
}