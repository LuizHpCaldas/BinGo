<?php

defined('BASEPATH') OR exit ('Acao nao permitida');

class Login extends CI_Controller{
    public function index(){
        $this->load->view('login/index');
    }
}