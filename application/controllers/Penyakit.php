<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    protected $for_role = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Penyakit_model');
    }

    public function index()
    {
        $data['title'] = 'Data Gangguan';
        $data['penyakit'] = $this->Penyakit_model->get_all();
        $data['contents'] = $this->load->view('penyakit_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function store()
    {
        $mode = $this->input->post('mode', TRUE);
        $id = $this->input->post('id', TRUE);

        if ($mode === 'tambah') {
            $this->db->select('kode');
            $this->db->like('kode', 'P');
            $this->db->order_by('kode', 'DESC');
            $this->db->limit(1);
            $last = $this->db->get('gangguan')->row();

            if ($last) {
                // Hilangkan huruf 'P-' dari awal
                $num = (int) str_replace('P-', '', $last->kode);

                // Format ulang dengan 'P-' + padding
                $kode = 'P-' . $num + 1;
            } else {
                $kode = 'P-1';
            }

            $_POST['kode'] = $kode;
        }

        $this->form_validation->set_rules('nama', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('penyakit');
        }

        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        if ($mode === 'tambah') {
            $this->Penyakit_model->insert($data);
            $this->session->set_flashdata('success', 'penyakit berhasil ditambahkan.');
        } else {
            if (!$id) {
                $this->session->set_flashdata('error', 'ID penyakit tidak ditemukan.');
                redirect('penyakit');
            }
            $this->Penyakit_model->update($id, $data);
            $this->session->set_flashdata('success', 'penyakit berhasil diperbarui.');
        }

        redirect('penyakit');
    }

    public function delete($id)
    {
        $this->Penyakit_model->delete($id);
        $this->session->set_flashdata('success', 'penyakit berhasil dihapus.');
        redirect('penyakit');
    }
}
