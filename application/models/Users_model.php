<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    protected $table_users = 'admin_user';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Diagnosa_model');
        $this->load->model('Rules_model');
        $this->load->model('Gejala_model');
        $this->load->model('Users_model');
    }

    public function store($data)
    {
        $this->db->insert($this->table_users, $data);
        return $this->db->affected_rows() > 0;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table_users, $data);
        return $this->db->affected_rows() > 0;
    }

    // Cek apakah email sudah ada di database
    public function check_email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->table_users);

        return $query->num_rows() > 0;
    }

    public function get_by_email($email)
    {
        return $this->db->get_where($this->table_users, ['email' => $email])->row();
    }

    public function count_all($where = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        return $this->db->count_all_results($this->table_users);
    }

    public function get_all()
    {
        $this->db->where('role =', 'admin');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table_users)->result_array();
    }

    public function get_user_all()
    {
        $this->db->where('role =', 'user');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table_users)->result_array();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_users);
        return $this->db->affected_rows() > 0;
    }
}
