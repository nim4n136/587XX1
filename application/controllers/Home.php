<?php
class Home extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('Gaya_belajar_model');
        $this->load->model('Kelas_model');
        $this->load->model('Hasil_model');
        $this->load->model('Peserta_model');
        $this->load->library('form_validation');
    }

    public function login()
    {
        if ($this->session->userdata("is_login")) {
            return redirect(site_url());
        }
        $this->template->load('frontend/template', 'frontend/login', array(
            "title" => "Selamat datang "
        ));
    }

    public function index()
    {
        $hasil = $this->Hasil_model->where_data(array("id_peserta" => $this->session->userdata("id_peserta")));
        if ($hasil) {
            return redirect(site_url("test/hasil"));
        }
        $gaya_belajar = $this->Gaya_belajar_model->get_all();
        $this->template->load('frontend/template', 'frontend/home', array(
            "title" => "Selamat datang",
            "gaya_belajar" => $gaya_belajar
        ));
    }

    public function daftar()
    {
        if ($this->session->userdata("is_login")) {
            return redirect(site_url());
        }



        $this->template->load('frontend/template', 'frontend/daftar', array(
            "title" => "Selamat datang",
            "data_kelas" => $this->Kelas_model->get_all()
        ));
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        return redirect(site_url());
    }

    public function proses_daftar()
    {
        $this->__rules_register();
        if ($this->form_validation->run() == false) {
            $this->daftar();
        } else {
            $password       = $this->input->post('password', TRUE);
            $options        = array("cost" => 4);
            $hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);
            $simpan =  $this->Peserta_model->insert(array(
                "nama" => $this->input->post("nama"),
                "id_kelas" => $this->input->post("id_kelas"),
                "password" => $hashPassword,
                "email" => $this->input->post("email")
            ));
            if (!$simpan) {
                echo "terjadi kesalahan";
                return;
            }
            $this->session->set_userdata(
                array(
                    "nama" => $this->input->post("nama"),
                    "id_kelas" => $this->input->post("id_kelas"),
                    "email" => $this->input->post("email"),
                    "is_login" => true
                )
            );
            return redirect(site_url());
        }
    }

    public function proses_login()
    {
        $email  = $this->input->post('email');
        $password = $this->input->post('password', TRUE);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $test     = password_verify($password, $hashPass);
        $this->db->where('email', $email);
        $users  = $this->db->get('tbl_peserta');
        if ($users->num_rows() > 0) {
            $user = $users->row_array();
            if (password_verify($password, $user['password'])) {
                $user["is_login"] = true;
                $this->session->set_userdata($user);
                redirect(site_url());
            } else {
                $this->session->set_flashdata('error_login', 'Email atau password yang anda input salah');
                redirect(site_url("home/login"));
            }
        } else {
            $this->session->set_flashdata('error_login', 'Email atau password yang anda input salah');
            redirect(site_url("home/login"));
        }
    }

    private function __rules_register()
    {
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Alamat Email', 'is_unique[tbl_peserta.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_error_delimiters('<span class=" text-danger">', '</span>');
    }
}
