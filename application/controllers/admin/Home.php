<?php 
class Home extends CI_Controller
{
    public function index(){
        is_login();
        $this->template->load('template', 'home');
    }
}
