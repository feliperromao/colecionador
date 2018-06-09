<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Database_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function get($table, $id = FALSE){
        if( $id === FALSE ){
            $results = $this->db->get($table);
            return $results ? $results->result_array() : FALSE;
        }else{
            $results = $this->db->get_where($table, ['id' => $id]);
            return $results ? $results->row_array() : FALSE;
        }
    }

    public function set($table, $dados){
        if( is_array($dados) ){
            return $this->db->insert($table, $dados) ? $this->db->insert_id() : FALSE;
        }
        return FALSE;
    }

    public function update($table, $id, $dados){
        if( is_array($dados) ){
            $this->db->where(['id' => $id]);
            return $this->db->update($table, $dados) ? TRUE : FALSE;
        }
        return FALSE;
    }
    public function del($table, $id){
        return $this->db->delete($table,['id'=>$id]) ? TRUE : FALSE;
    }
}