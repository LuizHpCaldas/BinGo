<?php

defined('BASEPATH') OR exit('Acao nao permitida');

class Usuarios extends CI_Controller{

    public function __construct() {
        parent::__construct();
         //Definir se existe sessao

    }

    public function index() {

        $data = array(

            'styles' => array(
                'vendor/fontawesome-free/css/all.min.css',
            ),

            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),

            'usuarios' => $this->ion_auth->users()->result(), //pega todos os usuarios
        );

     /*   echo '<pre>';
        print_r($data['usuarios']);*/

        $this->load->view('layout/header', $data);
        $this->load->view('usuarios/index');
        $this->load->view('layout/footer');
    }
   
}