<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen extends CI_Controller
{
    protected $for_role = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model');
    }

    public function index()
    {
        $data['title']      = 'Data Admin';
        $data['pengguna']   = $this->Users_model->get_all();

        $data['contents'] = $this->load->view('manajemen_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function store()
    {
        $mode = $this->input->post('mode', TRUE);
        $id = $this->input->post('id', TRUE);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');

        if ($mode == 'tambah') {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('manajemen');
        }

        $data = [
            'nama'      => $this->input->post('name', TRUE),
            'email'      => $this->input->post('email', TRUE),
            'role'       => $this->input->post('role', TRUE),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($mode === 'tambah') {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data['created_at'] = date('Y-m-d H:i:s');

            $this->Users_model->store($data);
            $this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan.');
        } else {
            if (!$id) {
                $this->session->set_flashdata('error', 'ID pengguna tidak ditemukan.');
                redirect('manajemen');
            }

            $this->Users_model->update($id, $data);
            $this->session->set_flashdata('success', 'Gejala berhasil diperbarui.');
        }

        redirect('manajemen');
    }

    public function delete($id)
    {
        $this->Users_model->delete($id);
        $this->session->set_flashdata('success', 'Pengguna berhasil dihapus.');
        redirect('manajemen');
    }
}
