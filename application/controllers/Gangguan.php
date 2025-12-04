<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gangguan extends CI_Controller
{
    protected $for_role = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penyakit_model');
    }

    public function index()
    {
        $data['title'] = 'Hasil Diagnosa';
        $data['gangguan'] = $this->Penyakit_model->get_all();

        $data['contents'] = $this->load->view('jenis_gangguan_view', $data, true);
        $this->load->view('templates/user_templates', $data);
    }
}
