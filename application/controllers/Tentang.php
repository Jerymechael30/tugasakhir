<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    protected $for_role = 'admin_user';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Hasil Diagnosa';
        $data['contents'] = $this->load->view('tentang_view', $data, true);
        $this->load->view('templates/user_templates', $data);
    }
}
