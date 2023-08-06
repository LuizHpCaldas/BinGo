<?php

defined('BASEPATH') OR exit('Acao nao permitida');

class Usuarios extends CI_Controller{

    public function __construct() {
        parent::__construct();
         //Definir se existe sessao

    }

    public function index() {

        $data = array(

            'titulo' => 'Usuários Cadastrados',

            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
                
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
   
    public function edit($user_id = NULL){

        if(!$user_id || !$this->ion_auth->user($user_id)->row()){

            exit('Usuario, Nao encontrado!');
        }else {

            $data = array(
                'titulo' => 'Editar usuario',
                'usuario' => $this->ion_auth->user($user_id)->row(),
            );

            echo '<pre>';
            print_r($data['usuario']);
            exit();
            
            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/edit');
            $this->load->view('layout/footer');

        }

      
    }
}