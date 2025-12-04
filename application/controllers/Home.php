<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
        $data['title'] = 'Hasil Diagnosa';
        $data['contents'] = $this->load->view('home_view', $data, true);
        $this->load->view('templates/user_templates', $data);
    }
}
