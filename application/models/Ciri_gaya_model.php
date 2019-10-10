<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ciri_gaya_model extends CI_Model
{
    public $table = 'tbl_ciri_gaya';
    public $id = 'id_ciri';
    public $order = 'ASC';

    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function  get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->result();
    }

    public function delete_by_id($id_ciri){
        $this->db->where($this->id, $id_ciri);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function update_by_id($id, $data)
    { 
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

}