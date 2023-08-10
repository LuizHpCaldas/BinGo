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

            $this->session->set_flashdata('error','Usuario nao encontrado');
            redirect('usuarios');

        }else {

            $this->form_validation->set_rules('first_name', '', 'trim|required');
            $this->form_validation->set_rules('last_name', '', 'trim|required');  
            $this->form_validation->set_rules('username', '', 'trim|required|callback_username_check');
            $this->form_validation->set_rules('email', '', 'trim|required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'Senha', 'min_length[5]|max_length[255]'); 
            $this->form_validation->set_rules('confirm_password', 'Confirme', 'matches[password]');   


            if($this->form_validation->run()){

                exit('validado');

            }else{

                $data = array(
                    'titulo' => 'Editar usuario',
                    'usuario' => $this->ion_auth->user($user_id)->row(),
                    'perfil' =>  $this->ion_auth->get_users_groups($user_id)->row(),
                );
    
    
                
                $this->load->view('layout/header', $data);
                $this->load->view('usuarios/edit');
                $this->load->view('layout/footer');

           
           
            }

 

        }
    







    }

    public function email_check($email) {

        $usuario_id = $this->input->post('usuario_id');

        if($this->Core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))){

        $this->form_validation->set_message('email_check','Este email ja esta em uso');

            return FALSE;
        }else{
            return TRUE;
        }

    }

    public function username_check($username) {

        $usuario_id = $this->input->post('usuario_id');

        if($this->Core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))){

        $this->form_validation->set_message('username_check','Este usuario ja esta em uso');

            return FALSE;
        }else{
            return TRUE;
        }

    }

}
    