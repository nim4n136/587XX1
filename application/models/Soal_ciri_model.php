<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Soal_ciri_model extends CI_Model
{
    public $table = 'tbl_soal_ciri';
    public $id = 'id_ciri_soal';
    public $order = 'DESC';


    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_by_ciri($id_ciri)
    {
        $this->db->where("id_ciri", $id_ciri);
        $this->db->order_by($this->id, 'asc');
        return $this->db->get($this->table)->result();
    }

    public function delete_by_id_ciri($id_ciri)
    {
        $this->db->where("id_ciri", $id_ciri);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function update_by_id($id, $data)
    { 
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
}
