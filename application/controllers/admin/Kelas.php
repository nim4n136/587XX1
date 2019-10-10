<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'kelas/tbl_kelas_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Kelas_model->json();
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/kelas/create_action'),
            'id_kelas' => set_value('id_kelas'),
            'nama' => set_value('nama'),
        );
        $this->template->load('template', 'kelas/tbl_kelas_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
            );

            $this->Kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('admin/kelas'));
        }
    }

    public function update($id)
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/kelas/update_action'),
                'id_kelas' => set_value('id_kelas', $row->id_kelas),
                'nama' => set_value('nama', $row->nama),
            );
            $this->template->load('template', 'kelas/tbl_kelas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kelas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelas', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
            );

            $this->Kelas_model->update($this->input->post('id_kelas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/kelas'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $this->Kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kelas'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');

        $this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}