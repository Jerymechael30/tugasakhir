<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    protected $for_role = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model');
        $this->load->model('Penyakit_model');

        check_role($this->for_role);
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';

        $data['total_pasien']       = $this->Users_model->count_all(['role' => 'user']);
        $data['total_admin']        = $this->Users_model->count_all(['role' => 'admin']);
        $data['total_rules']        = $this->Rules_model->count_all();
        $data['total_gejala']       = $this->Gejala_model->count_all();
        $data['total_diagnosa']     = $this->Diagnosa_model->count_all();
        $data['total_gangguan']     = $this->Penyakit_model->count_all();

        $data['contents'] = $this->load->view('dashboard_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
