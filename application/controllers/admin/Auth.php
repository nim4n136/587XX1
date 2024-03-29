<?php
Class Auth extends CI_Controller{
    
    function index(){
        $this->load->view('auth/login');
    }
    
    function cheklogin(){
        $email      = $this->input->post('email');
        $password = $this->input->post('password',TRUE);
        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        
        // query chek users
        $this->db->where('email',$email);
        $users       = $this->db->get('tbl_user');
        if($users->num_rows()>0){
            $user = $users->row_array();
            if(password_verify($password,$user['password'])){
                // retrive user data to session
                $this->session->set_userdata($user);
                redirect('admin/kelolamenu');
            }else{
                redirect('admin/auth');
            }
        }else{
            $this->session->set_flashdata('status_login','email atau password yang anda input salah');
            redirect('admin/auth');
        }
    }
    
    function logout(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
        redirect('admin/auth');
    }
}
