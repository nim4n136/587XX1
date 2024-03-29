<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gaya_belajar_model extends CI_Model
{

    public $table = 'tbl_gaya_belajar';
    public $id = 'id_gaya';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_gaya,kode,nama');
        $this->datatables->from('tbl_gaya_belajar');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_gaya_belajar.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('admin/gayabelajar/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
                ".anchor(site_url('admin/gayabelajar/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_gaya');
        return $this->datatables->generate();
    }

    // get all
    function get_all($order = false)
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_gaya', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('saran', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_gaya', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('saran', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }


    function where_data(array $where){
        $this->db->where($where);
        return $this->db->get($this->table)->row();
    }
    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
