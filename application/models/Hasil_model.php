<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasil_model extends CI_Model
{

    public $table = 'tbl_hasil';
    public $id = 'id_hasil';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json(array $whereData = [])
    {
        $this->datatables->select('id_hasil,tbl_peserta.nama as nama, tbl_peserta.email as email,id_gaya as gaya_belajar, persent');
        $this->datatables->from('tbl_hasil');

        // where kelas
        if (!empty($whereData)) {
            $this->datatables->where($whereData);
        }
        //add this line for join
        $this->datatables->join('tbl_peserta', 'tbl_hasil.id_peserta = tbl_peserta.id_peserta');

        $this->datatables->edit_column("gaya_belajar",'$1',"get_gaya_belajar(gaya_belajar)");
        $this->datatables->edit_column("persent",'$1',"get_persent_gaya(persent)");
        $this->datatables->add_column(
            'action',
            anchor(site_url('admin/hasil/delete/$1'), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Kamu yakin?\')"'),
            'id_hasil'
        );
        return $this->datatables->generate();
    }

    public function export(array $whereData = []){
        $this->db->select('id_hasil,tbl_peserta.nama as nama, tbl_peserta.email as email, tbl_gaya_belajar.nama as gaya_belajar,tbl_gaya_belajar.kode');
        $this->db->from('tbl_hasil');

        // where kelas
        if (!empty($whereData)) {
            $this->db->where($whereData);
        }
        //add this line for join
        $this->db->join('tbl_peserta', 'tbl_hasil.id_peserta = tbl_peserta.id_peserta');
        $this->db->join('tbl_gaya_belajar', 'tbl_hasil.id_gaya = tbl_gaya_belajar.id_gaya ');
        $this->db->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->select('id_hasil,tbl_kelas.nama as kelas,tbl_peserta.nama as nama, tbl_peserta.email as email, id_gaya, persent');
        $this->db->join('tbl_peserta', 'tbl_hasil.id_peserta = tbl_peserta.id_peserta');
        $this->db->join('tbl_kelas', 'tbl_peserta.id_kelas = tbl_kelas.id_kelas');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function where_data(array $where){
        $this->db->where($where);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id_hasil', $q);
        $this->db->or_like('id_peserta', $q);
        $this->db->or_like('id_gaya', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_hasil', $q);
        $this->db->or_like('id_peserta', $q);
        $this->db->or_like('id_gaya', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}
