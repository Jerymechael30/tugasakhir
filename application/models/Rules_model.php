<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rules_model extends CI_Model
{
    protected $table_def            = 'basis_pengetahuan';
    protected $table_def_penyakit   = 'gangguan';
    protected $table_def_gejala     = 'gejala';
    protected $table_def_pakar      = 'cf_pakar';
    protected $table_def_cf_user    = 'cf_user';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert($this->table_def, $data);
        return $this->db->affected_rows() > 0;
    }

    public function get_all()
    {
        $this->db->select('a.*, b.nama as nama_gejala, c.nama as nama_gangguan, d.nilai as nilai_cf');
        $this->db->from($this->table_def . ' a');

        $this->db->join($this->table_def_gejala . ' b', 'a.gejala_id = b.id', 'left');
        $this->db->join($this->table_def_penyakit . ' c', 'a.gangguan_id = c.id', 'left');
        $this->db->join($this->table_def_pakar . ' d', 'a.cf_pakar_id = d.id', 'left');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table_def, $data);
        return $this->db->affected_rows() > 0;
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table_def);
    }

    public function get_cf_pakar()
    {
        $this->db->select('id, nilai, label');
        $this->db->from($this->table_def_pakar);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_cf_user()
    {
        $this->db->select('id, nilai, label');
        $this->db->from($this->table_def_cf_user);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_cf_pakar_id($penyakit_id, $gejala_id)
    {
        $this->db->select('id, nilai, label');
        $this->db->from($this->table_def_pakar);
        $this->db->where('gangguan_id', $penyakit_id);
        $this->db->where('gejala_id', $gejala_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function count_all()
    {
        return $this->db->count_all($this->table_def);
    }
}
