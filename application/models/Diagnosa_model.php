<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa_model extends CI_Model
{
    protected $table_riwayat          = 'konsultasi_diagnosis';
    protected $table_riwayat_detail   = 'konsultasi_diagnosis_hasil';
    protected $table_gejala           = 'gejala';
    protected $table_penyakit         = 'gangguan';
    protected $table_cf_user          = 'cf_user';
    protected $table_cf_pakar         = 'cf_pakar';
    protected $table_users            = 'admin_user';
    protected $table_pengetahuan      = 'basis_pengetahuan';
    protected $table_gangguan_gejala  = 'gangguan_gejala';


    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->select("{$this->table_riwayat}.*, {$this->table_penyakit}.nama as nama_gangguan, {$this->table_users}.email");
        $this->db->from($this->table_riwayat);
        $this->db->join($this->table_penyakit, "{$this->table_riwayat}.gangguan_id = {$this->table_penyakit}.id", 'left');
        $this->db->join($this->table_users, "{$this->table_users}.id = {$this->table_riwayat}.user_id", 'left');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function store($data)
    {
        $this->db->trans_start();

        $data_chunk = [
            'user_id'       => $data['user_id'] ?? null,
            'nama'          => $data['nama'],
            'umur'          => $data['umur'],
            'alamat'        => $data['alamat'] ?? null,
            'jenis_kelamin' => $data['jenis_kelamin'],
            'gangguan_id'   => null,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
            'deleted'       => 0
        ];

        $this->db->insert($this->table_riwayat, $data_chunk);
        $riwayat_id = $this->db->insert_id();

        $data_detail = [];
        foreach ($data['gejala'] as $gejala_id => $cf_id) {
            $data_detail[] = [
                'riwayat_id' => $riwayat_id,
                'gejala_id'  => $gejala_id,
                'cf_user_id' => $cf_id
            ];
        }

        $this->db->insert_batch($this->table_riwayat_detail, $data_detail);
        $this->db->trans_complete();

        return $riwayat_id;
    }

    public function get_cf_user()
    {
        $this->db->select('id, nilai, label');
        $this->db->from($this->table_cf_user);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_by_id($riwayat_id)
    {
        $this->db->select("{$this->table_riwayat}.user_id, {$this->table_riwayat}.nama, {$this->table_riwayat}.umur, {$this->table_riwayat}.alamat, {$this->table_riwayat}.jenis_kelamin, {$this->table_riwayat}.tanggal_lahir, {$this->table_riwayat}.gangguan_id, {$this->table_riwayat}.cf_hasil, {$this->table_users}.email,  {$this->table_penyakit}.nama as nama_gangguan, {$this->table_penyakit}.deskripsi as deskripsi_gangguan, GROUP_CONCAT({$this->table_gejala}.kode) as gejala_kode, GROUP_CONCAT({$this->table_gejala}.nama) as gejala_nama");
        $this->db->from($this->table_riwayat);
        $this->db->join($this->table_riwayat_detail, "{$this->table_riwayat}.id = {$this->table_riwayat_detail}.riwayat_id", 'left');
        $this->db->join($this->table_gejala, "{$this->table_riwayat_detail}.gejala_id = {$this->table_gejala}.id", 'left');
        $this->db->join($this->table_penyakit, "{$this->table_riwayat}.gangguan_id = {$this->table_penyakit}.id", 'left');
        $this->db->join($this->table_users, "{$this->table_users}.id = {$this->table_riwayat}.user_id", 'left');
        $this->db->where("{$this->table_riwayat}.id", $riwayat_id);
        $this->db->group_by("{$this->table_riwayat}.id");

        return $this->db->get()->row();
    }

    public function get_detail_by_id($riwayat_id)
    {
        // Ambil data utama pasien
        $this->db->select("r.user_id, r.nama, r.umur, r.tanggal_lahir, r.gangguan_id, r.cf_hasil, u.email");
        $this->db->from("{$this->table_riwayat} r");
        $this->db->join("{$this->table_users} u", 'u.id = r.user_id', 'left');
        $this->db->where('r.id', $riwayat_id);
        $pasien = $this->db->get()->row_array();

        // Query gejala dan cf
        $sql = "
        SELECT 
            pg.id,
            pg.kode,
            pg.gangguan_id,
            pg.gejala_id,
            cu_sub.nilai AS cf_user,
            cp_sub.nilai AS cf_pakar,
            p.kode AS kode_gangguan,
            g.kode AS kode_gejala,
            p.nama AS nama_gangguan,
            p.deskripsi AS deskripsi_gangguan,
            g.nama AS nama_gejala,
            (IFNULL(cu_sub.nilai, 0) * IFNULL(cp_sub.nilai, 0)) AS cfhe
        FROM ".$this->table_gangguan_gejala." pg
        JOIN ".$this->table_penyakit." p ON p.id = pg.gangguan_id
        JOIN ".$this->table_gejala." g ON g.id = pg.gejala_id
        LEFT JOIN (
            SELECT rd.gejala_id, cu.nilai
            FROM ".$this->table_riwayat_detail." rd
            JOIN cf_user cu ON cu.id = rd.cf_user_id
            WHERE rd.riwayat_id = ?
        ) cu_sub ON cu_sub.gejala_id = pg.gejala_id
        LEFT JOIN (
            SELECT pen.gangguan_id, pen.gejala_id, cp.nilai
            FROM ".$this->table_pengetahuan." pen
            JOIN cf_pakar cp ON cp.id = pen.cf_pakar_id
        ) cp_sub ON cp_sub.gangguan_id = pg.gangguan_id AND cp_sub.gejala_id = pg.gejala_id
        WHERE cu_sub.nilai IS NOT NULL
        ORDER BY pg.gangguan_id ASC
    ";

        $rows = $this->db->query($sql, [$riwayat_id])->result_array();

        // Proses pengelompokan per gangguan_id
        $penyakit_group = [];
        foreach ($rows as $row) {
            $pid = $row['gangguan_id'];

            // Jika belum ada penyakit ini, buatkan wadahnya
            if (!isset($penyakit_group[$pid])) {
                $penyakit_group[$pid] = [
                    'id'             => $row['id'],
                    'kode'           => $row['kode'],
                    'gangguan_id'    => $row['gangguan_id'],
                    'kode_gangguan'  => $row['kode_gangguan'],
                    'nama_gangguan'  => $row['nama_gangguan'],
                    'gejala'         => []
                ];
            }

            // Tambahkan gejala ke array penyakit tersebut
            $penyakit_group[$pid]['gejala'][] = [
                'gejala_id'    => $row['gejala_id'],
                'kode_gejala'  => $row['kode_gejala'],
                'nama_gejala'  => $row['nama_gejala'],
                'cf_user'      => $row['cf_user'],
                'cf_pakar'     => $row['cf_pakar'],
                'cfhe'         => $row['cfhe']
            ];
        }

        // Gabungkan hasil
        $pasien['penyakit'] = array_values($penyakit_group); // reset key agar jadi array biasa
        return $pasien;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table_riwayat, $data);
    }

    public function delete($id)
    {
        // db transaction
        $this->db->trans_start();
        // haps row di tabel riwayat detail
        $this->db->where('riwayat_id', $id);
        $this->db->delete($this->table_riwayat_detail);

        // hapus row di tabel riwayat
        $this->db->where('id', $id);
        $this->db->delete($this->table_riwayat);

        $this->db->trans_complete();

        return $this->db->affected_rows() > 0;
    }

    public function count_all()
    {
        $this->db->from($this->table_riwayat);
        return $this->db->count_all_results();
    }
}
