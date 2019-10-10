<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Peserta_model');
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'peserta/tbl_peserta_list', array(
            "data_kelas" => $this->Kelas_model->get_all(),
            "id_kelas"  => $this->input->get("id_kelas")
        ));
    }

    public function json()
    {
        
        header('Content-Type: application/json');
        echo $this->Peserta_model->json(array("id_kelas" => $this->input->post('id_kelas')));
    }

    public function create()
    {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('admin/peserta/create_action'),
            'id_peserta' => set_value('id_peserta'),
            'id_kelas' => set_value('id_kelas'),
            'nama' => set_value('nama'),
            'email' => set_value('email'),
            'password' => set_value('password'),
            'kelas' => $this->Kelas_model->get_all()
        );
        $this->template->load('template', 'peserta/tbl_peserta_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $password       = $this->input->post('password', TRUE);
            $options        = array("cost" => 4);
            $hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);

            $data = array(
                'id_kelas' => $this->input->post('id_kelas', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => $hashPassword
            );

            $this->Peserta_model->insert($data);
            $this->session->set_flashdata('message', 'Berhasil di buat');
            redirect(site_url('admin/peserta'));
        }
    }

    public function update($id)
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/peserta/update_action'),
                'id_peserta' => set_value('id_peserta', $row->id_peserta),
                'id_kelas' => set_value('id_kelas', $row->id_kelas),
                'nama' => set_value('nama', $row->nama),
                'email' => set_value('email', $row->email),
                'password' => set_value('password', $row->password),
                'kelas' => $this->Kelas_model->get_all()
            );
            $this->template->load('template', 'peserta/tbl_peserta_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/peserta'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_peserta', TRUE));
        } else {
            $data = array(
                'id_kelas' => $this->input->post('id_kelas', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE)
            );
            $password       = $this->input->post('password', TRUE);
            if ($password) {
                $options        = array("cost" => 4);
                $hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);
                $data['password'] = $hashPassword;
            }
            $this->Peserta_model->update($this->input->post('id_peserta', TRUE), $data);
            $this->session->set_flashdata('message', 'Data berhasil di update');
            redirect(site_url('admin/peserta'));
        }
    }

    public function delete($id)
    {
        $row = $this->Peserta_model->get_by_id($id);

        if ($row) {
            $this->Peserta_model->delete($id);
            $this->session->set_flashdata('message', 'Berhasil di hapus');
            redirect(site_url('admin/peserta'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ada');
            redirect(site_url('admin/peserta'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        $this->form_validation->set_rules('id_peserta', 'id_peserta', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
