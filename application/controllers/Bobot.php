<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bobot extends CI_Controller
{
    protected $for_role = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penyakit_model');
        $this->load->model('Rules_model');
    }

    public function index()
    {
        $data['title'] = 'Bobot Nilai CF';
        $data['gangguan'] = $this->Penyakit_model->get_all();
        $data['cf_pakar'] = $this->Rules_model->get_cf_pakar();
        $data['cf_user'] = $this->Rules_model->get_cf_user();

        $data['contents'] = $this->load->view('bobot_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
