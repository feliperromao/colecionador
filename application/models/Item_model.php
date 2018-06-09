<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Item_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getDados($id_item = FALSE){
        if( $id_item === FALSE ){
            $itens = $this->db->get('dados_item');
            return $itens ? $itens->result_array() : FALSE;
        }else{
            $item = $this->db->get_where('dados_item', ['id' => $id_item]);
            return $item ? $item->row_array() : FALSE;
        }
    }
}