<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta_model extends CI_Model
{

    public $table = 'tbl_peserta';
    public $id = 'id_peserta';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json(array $whereData = []) {
        $this->datatables->select('id_peserta,id_kelas,nama,email,password');
        // where kelas
        if(!empty($whereData)){
            $this->datatables->where($whereData);
        }
        $this->datatables->from('tbl_peserta');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_peserta.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('admin/peserta/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
                ".anchor(site_url('admin/peserta/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_peserta');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
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
    function total_rows($q = NULL) {
        $this->db->like('id_peserta', $q);
	$this->db->or_like('id_kelas', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_peserta', $q);
	$this->db->or_like('id_kelas', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
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
