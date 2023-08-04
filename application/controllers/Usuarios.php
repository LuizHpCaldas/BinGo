<?php

defined ('BASEPATH') OR exit('Acao nao permitida');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
         //Definir se existe sessao

    }

    public function index() {

        $data = array(
            'usuarios' => $this->ion_auth->users()->result(), //pega todos os usuarios
        );

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }
   
}