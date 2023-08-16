<?php

defined('BASEPATH') OR exit ('Acao nao permitida');

class Login extends CI_Controller{
    public function index(){


        $identity = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $remember = FALSE; // remember the user
        
        if($this->ion_auth->login($identity, $password, $remember)){
            redirect('/');
        }else{
            echo 'Erro de validacao';
            $this->load->view('layout/header');
            $this->load->view('login/index');
        }



    }
}