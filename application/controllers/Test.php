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


        $count_max = [];
        foreach($count as $key => $extract){
            $count_max[$extract][] = $key;
        }
        $max_value = max(array_keys($count_max));
        $max_gaya = $count_max[ $max_value];

        $persent = [];
        $total =  array_sum($count);
        foreach($count as $key => $value){
            $persent[$key] = ((int)$value *100) /$total;
        }
        $getgaya = $this->Gaya_belajar_model->get_all();
        $datagaya = [];
        foreach($getgaya as $gaya){
            $datagaya[$gaya->id_gaya] = $gaya;    
        }


        $result_persent = [];
        foreach($persent as $key => $persent){
            $result_persent[$key] = [
                "persent" => $persent,
                "gaya"    => $datagaya[$key]->nama,
                "id_gaya"    => $datagaya[$key]->id_gaya

            ];
        }

        $this->Hasil_model->insert(array(
            "id_peserta" => $this->session->userdata("id_peserta"),
            "id_gaya"   => json_encode(  $max_gaya),
            "persent"   => json_encode($result_persent),
        ));

        return redirect(site_url("test/hasil"));
    }

    public function hasil()
    {
        $hasil = $this->Hasil_model->where_data(array("id_peserta" => $this->session->userdata("id_peserta")));
        if (!$hasil || $this->session->userdata("id_peserta") == NULL) {
            return redirect(site_url());
        }
        $id_gaya = json_decode($hasil->id_gaya);
        foreach($id_gaya as $id){
            $gaya_belajar[$id] =  $this->Gaya_belajar_model->get_by_id($id);;
        }
        $persent = json_decode($hasil->persent,true);
        usort($persent, function($a, $b) {
            return $a['persent'] < $b['persent'];
        });
        $this->template->load('frontend/template', 'frontend/hasil-test', array(
            "title" => "Hasil",
            "persent" => $persent,
            "gaya_belajar" => $gaya_belajar
        ));
    }
}
