<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Hasil_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model('Kelas_model');
    }

    public function index()
    {
        $this->template->load(
            'template',
            'hasil/tbl_hasil_list',
            array(
                "data_kelas" => $this->Kelas_model->get_all(),
                "id_kelas"  => $this->input->get("id_kelas")
            )
        );
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Hasil_model->json(array("id_kelas" => $this->input->post('id_kelas')));
    }

    public function delete($id)
    {
        $row = $this->Hasil_model->get_by_id($id);

        if ($row) {
            $this->Hasil_model->delete($id);
            $this->session->set_flashdata('message', 'Data berhasil di hapus');
            redirect(site_url('admin/hasil'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak di temukan');
            redirect(site_url('admin/hasil'));
        }
    }
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "hasil_peserta.xls";
        $judul = "tbl_hasil";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat Email");
        xlsWriteLabel($tablehead, $kolomhead++, "Gaya Belajar");

        foreach ($this->Hasil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama);
            xlsWriteLabel($tablebody, $kolombody++, $data->email);
            xlsWriteLabel($tablebody, $kolombody++, $data->gaya_belajar);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=hasil_peserta.doc");

        $data = array(
            'hasil_data' => $this->Hasil_model->get_all(),
            'start' => 0
        );

        $this->load->view('hasil/tbl_hasil_doc', $data);
    }
}
