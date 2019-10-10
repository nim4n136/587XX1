<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gayabelajar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Gaya_belajar_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'gayabelajar/tbl_gaya_belajar_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Gaya_belajar_model->json();
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('admin/gayabelajar/create_action'),
            'id_gaya' => set_value('id_gaya'),
            'nama' => set_value('nama'),
            'saran' => set_value('saran'),
            'keterangan' => set_value('keterangan'),
            'kode' => set_value('kode')
        );
        $this->template->load('template', 'gayabelajar/tbl_gaya_belajar_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'kode' => $this->input->post('kode', TRUE),
                'saran' => $this->input->post('saran', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE)
            );

            $this->Gaya_belajar_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil di buat');
            redirect(site_url('admin/gayabelajar'));
        }
    }

    public function update($id)
    {
        $row = $this->Gaya_belajar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/gayabelajar/update_action'),
                'id_gaya' => set_value('id_gaya', $row->id_gaya),
                'nama' => set_value('nama', $row->nama),
                'saran' => set_value('saran', $row->saran),
                'kode' =>  set_value('saran', $row->kode),
                'keterangan' => set_value('keterangan',  $row->keterangan)
            );
            $this->template->load('template', 'gayabelajar/tbl_gaya_belajar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/gayabelajar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_gaya', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'saran' => $this->input->post('saran', TRUE),
                'kode' => $this->input->post('kode', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE)
            );

            $this->Gaya_belajar_model->update($this->input->post('id_gaya', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/gayabelajar'));
        }
    }

    public function delete($id)
    {
        $row = $this->Gaya_belajar_model->get_by_id($id);

        if ($row) {
            $this->Gaya_belajar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/gayabelajar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/gayabelajar'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('saran', 'saran', 'trim|required');

        $this->form_validation->set_rules('id_gaya', 'id_gaya', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
