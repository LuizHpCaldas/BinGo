 <?php

 defined('BASEPATH') OR exit('Acao nao permitida');

 class Core_model extends CI_Model {

    public function get_all($tabela = NULL, $condicao = NULL) {

        if($tabela) {

            if(is_array($condicao)) {

                $this->db->where($condicao);
            }
            return $this->db->get($tabela) ->result();
        }else {
            return FALSE;
        }
    }


    public function get_by_id($tabela = NULL, $condicao = NULL) {

        if($tabela && is_array($condicao)) {

            $this->db->where($condicao);
            $this->db->limit(1);

            return $this->db->get($tabela)->row();

        }else {
            return FALSE;
        }
    }
    
    public function insert($tabela = NULL, $data = NULL, $get_last_id = NULL){

        if($tabela && is_array($data)){

        $this->db->insert($tabela, $data);

            if($get_last_id) {
                $this->session->set_userdata('las_id', $this->db->insert_id());
            }

                if($this->db->affcted_rows() > 0){
                
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');

                }else{
                    $this->session->set_flashdata('error', 'Erro ao salvar dados!');
                    }
        

        }else{
         
        }

    }

    public function update($tabela = NULL, $data = NULL, $condicao = NULL) {

        if($data && is_array($data) && is_array($condicao)){

            if($this->db->update($tabela, $data, $condicao)) {

                $this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');

            }else{
                $this->session->set_flashdata('error', 'Erro ao atualizar dados!');
            }

        }else{
            return FALSE;
        }
    }


    public function delete($tabela = NULL, $condicao = NULL){

            $this->db->db_debug = FALSE;

        if($tabela && is_array($condicao)){

            $status = $this->db->delete($tabela, $condicao);
            $error = $this->db->error();

            if(!$status) {
                foreach ($error as $code) {
                    if($code == 1451){
                        $this->session->set_flashdata('error', 'Este Registro nao podera ser excluido pois esta sendo utilizado!');
                    }else{
                        $this->session->set_flashdata('sucesso', 'Registro excluido com sucesso!');
                }
                }
            }

            $this->db->db_debug = TRUE;

        }else {
            return FALSE;
        }

    }


 }