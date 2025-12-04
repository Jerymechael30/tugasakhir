<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Option extends CI_Controller
{
    protected $table_def_gejala     = 'gejala';
    protected $table_def_penyakit   = 'gangguan';
    protected $table_def_pakar      = 'cf_pakar';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Option_model');
    }

    public function get_gejala()
    {
        $data = $this->Option_model->get_all($this->table_def_gejala, ['id', 'kode']);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function get_penyakit()
    {
        $data = $this->Option_model->get_all($this->table_def_penyakit, ['id', 'kode']);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function get_pakar()
    {
        $data = $this->Option_model->get_all($this->table_def_pakar, ['id', 'label']);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
