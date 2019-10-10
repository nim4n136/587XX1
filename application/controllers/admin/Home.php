<?php 
class Home extends CI_Controller
{
    public function index(){
        is_login();

        $this->load->model('Hasil_model');
        $this->load->model('Peserta_model');
        $this->load->model('Kelas_model');

        $this->template->load('template', 'home', array(
            "peserta" => $this->db->count_all("tbl_peserta"),
            "kelas"  => $this->db->count_all("tbl_kelas"),
            "hasil_test" => $this->db->count_all("tbl_hasil")
        ));
    }
}