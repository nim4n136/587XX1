<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cirigaya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ciri_gaya_model');
        $this->load->model('Gaya_belajar_model');
        $this->load->model('Soal_ciri_model');

        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->template->load('template', 'cirigaya/list', array(
            "ciri_gaya" => $this->Ciri_gaya_model->get_all()
        ));
    }

    public function create()
    {
        $this->template->load('template', 'cirigaya/form_create', [
            "form_action" => site_url('admin/cirigaya/create_action'),
            "gaya_belajar" => $this->Gaya_belajar_model->get_all("asc")
        ]);
    }

    public function edit($id)
    {
        $get_ciri = $this->Ciri_gaya_model->get_by_id($id);
        if (empty($get_ciri)) {
            $this->session->set_flashdata("error", "Data tidak di temukan");
            redirect(site_url("admin/cirigaya"));
            return;
        }
        $get_ciri = $get_ciri[0];
        $gaya_belajar = [];
        foreach ($this->Gaya_belajar_model->get_all("asc") as $gaya) {
            $gaya_belajar[$gaya->id_gaya] = $gaya;
        }
        $this->template->load("template", "cirigaya/form_edit", [
            "gaya_belajar" => $gaya_belajar,
            "ciri_gaya" => $get_ciri,
            "soal"  => $this->Soal_ciri_model->get_by_ciri($id),
            'form_action' => site_url("admin/cirigaya/edit_action/" . $id)
        ]);
    }

    public function edit_action($id)
    {
        $input = $this->input->post();
        $soal_update = [];
        foreach ($input as $name => $soal) {
            if (is_array($soal)) {
                foreach ($soal as $key => $value) {
                    $soal_update[$key][$name] = $value;
                }
            }
        }
        $this->Ciri_gaya_model->update_by_id($id, ["nama" => $input['nama']]);
        foreach ($soal_update as $id => $value) {
            $upload =  $this->upload_foto($id);
            $this->Soal_ciri_model->update_by_id($id, [
                "kode" => $value['kode'],
                "soal" => $value['ciriciri'],
                "gambar" =>isset($upload['file_name']) ? $upload['file_name'] : null
            ]);
        }
        $this->session->set_flashdata("message", "Data berhasild di update");
        redirect(site_url("admin/cirigaya"));
    }


    public function upload_foto($id)
    {
        if(!$_FILES['image']['name'][$id]){
            return;
        }
        $config['upload_path']          = './assets/upload';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $_FILES['file']['name']     = $_FILES['image']['name'][$id];
        $_FILES['file']['type']     = $_FILES['image']['type'][$id];
        $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$id];
        $_FILES['file']['error']     = $_FILES['image']['error'][$id];
        $_FILES['file']['size']     = $_FILES['image']['size'][$id];

        $this->load->library('upload', $config);
        $this->upload->do_upload("file");
        return $this->upload->data();
    }

    public function delete($id)
    {
        $this->Ciri_gaya_model->delete_by_id($id);
        $this->Soal_ciri_model->delete_by_id_ciri($id);
        $this->session->set_flashdata('message', 'Data berhasil di hapus');
        redirect(site_url("admin/cirigaya"));
    }

    public function create_action()
    {
        $input = $this->input->post();
        $this->db->trans_begin();

        $item_id = $this->Ciri_gaya_model->insert(["nama" => $input['nama']]);
        $gaya_belajar = $this->Gaya_belajar_model->get_all();
        foreach ($gaya_belajar as $gaya) {
            // jika ada id yang tidak di isi
            if (!isset($input["ciriciri"][$gaya->id_gaya]) || !isset($input["kode"][$gaya->id_gaya])) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('error', 'Data gagal di simpan');
                redirect('admin/cirigaya/create');
                return;
            }
           $upload =  $this->upload_foto($gaya->id_gaya);

            $this->Soal_ciri_model->insert([
                "id_ciri" => $item_id,
                "id_gaya" => $gaya->id_gaya,
                "soal"  => $input["ciriciri"][$gaya->id_gaya],
                "kode"  => $input["kode"][$gaya->id_gaya],
                "gambar" => isset($upload['file_name']) ? $upload['file_name'] : null
            ]);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('error', 'Data gagal di simpan');
            redirect('admin/cirigaya/create');
            return;
        } else {
            $this->db->trans_commit();
            $this->session->set_flashdata('message', 'Data sukse di simpan');
            redirect('admin/cirigaya');
            return;
        }
    }
}
