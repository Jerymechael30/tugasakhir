<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rules extends CI_Controller
{
    protected $for_role = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Rules_model');
    }

    public function index()
    {
        $data['title'] = 'Data Rules';
        $data['rules'] = $this->Rules_model->get_all();

        $data['contents'] = $this->load->view('rules_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function store()
    {
        $mode = $this->input->post('mode', TRUE);
        $id = $this->input->post('id', TRUE);

        $this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'required');
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('nilai_cf', 'Nilai CF', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('rules');
        }

        $data = [
            'gangguan_id' => $this->input->post('nama_penyakit'),
            'gejala_id' => $this->input->post('nama_gejala'),
            'cf_pakar_id' => $this->input->post('nilai_cf'),
        ];

        if ($mode === 'tambah') {
            $this->Rules_model->insert($data);
            $this->session->set_flashdata('success', 'Pengetahuan berhasil ditambahkan.');
        } else {
            if (!$id) {
                $this->session->set_flashdata('error', 'ID Pengetahuan tidak ditemukan.');
                redirect('rules');
            }
            $this->Rules_model->update($id, $data);
            $this->session->set_flashdata('success', 'Pengetahuan berhasil diperbarui.');
        }

        redirect('rules');
    }

    public function delete($id)
    {
        $this->Rules_model->delete($id);
        $this->session->set_flashdata('success', 'Pengetahuan berhasil dihapus.');
        redirect('rules');
    }
    
}
