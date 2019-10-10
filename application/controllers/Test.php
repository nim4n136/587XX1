<?php
class Test extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('Gaya_belajar_model');
        $this->load->model('Kelas_model');
        $this->load->model('Peserta_model');
        $this->load->model('Ciri_gaya_model');
        $this->load->model('Soal_ciri_model');
        $this->load->model('Hasil_model');

        $this->load->library('form_validation');
    }


    public function test()
    {
        if (!$this->session->userdata("is_login")) {
            return redirect(site_url());
        }
        $hasil = $this->Hasil_model->where_data(array("id_peserta" => $this->session->userdata("id_peserta")));
        if ($hasil) {
            return redirect(site_url("test/hasil"));
        }

        $this->template->load('frontend/template', 'frontend/test', array(
            "title" => "Selamat datang",
            "ciri_gaya" => $this->Ciri_gaya_model->get_all()
        ));
    }

    public function save()
    {
        $input = $this->input->post();
        if (!$input) {
            return redirect(site_url("test/test"));
        }
        $count = array_count_values($input);

        // ambil data terbesar dari gaya belajar yang di pilih
        $id_gaya = array_search(max($count), $count);

        $this->Hasil_model->insert(array(
            "id_peserta" => $this->session->userdata("id_peserta"),
            "id_gaya"   => $id_gaya
        ));

        return redirect(site_url("test/hasil"));
    }

    public function hasil()
    {
        $hasil = $this->Hasil_model->where_data(array("id_peserta" => $this->session->userdata("id_peserta")));
        if (!$hasil) {
            return redirect(site_url());
        }
        $gaya_belajar = $this->Gaya_belajar_model->get_by_id($hasil->id_gaya);
        $this->template->load('frontend/template', 'frontend/hasil-test', array(
            "title" => "Hasil",
            "gaya_belajar" => $gaya_belajar
        ));
    }
}
