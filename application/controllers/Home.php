<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('Database_model');
	}

	public function index() {
		$this->load->view('header');
	}

	public function item(){
	    $this->load->model('Item_model');
        $dados['itens'] = $this->Item_model->getDados();
        $dados['moedas'] = $this->Database_model->get('moeda', FALSE);
        $dados['materiais'] = $this->Database_model->get('material', FALSE);
        $this->load->view('header');
        $this->load->view('item', $dados);
    }

	public function moeda(){
	    $dados['moedas'] = $this->Database_model->get('moeda');
	    $dados['paises'] = $this->Database_model->get('pais');
        $this->load->view('header');
        $this->load->view('moeda', $dados);
    }

	public function pais(){

	    $dados['paises'] = $this->Database_model->get('pais');
        $dados['regioes'] = $this->Database_model->get('regiao');

        $this->load->view('header');
        $this->load->view('pais', $dados);
    }

	public function material(){
	    $dados['materiais'] = $this->Database_model->get('material');
        $this->load->view('header');
        $this->load->view('material', $dados);
    }

    public function regiao(){
	    $dados['regioes'] = $this->Database_model->get('regiao');
	    $this->load->view('header');
	    $this->load->view('regiao', $dados);
    }

    // AJAX
    public function add_item(){
        if( !$this->input->post('id_moeda')
            OR !$this->input->post('id_material')
            OR !$this->input->post('descricao')
            OR !$this->input->post('valor')
            OR !$this->input->post('data_compra')
            OR !$this->input->post('data_producao'))
        {
            echo "Favor preencher os dados corretamente";
            return FALSE;
        }
        $dados = [
            "id_moeda" => $this->input->post('id_moeda'),
            "id_material" => $this->input->post('id_material'),
            "descricao" => $this->input->post('descricao'),
            "valor" => $this->input->post('valor'),
            "data_compra" => $this->input->post('data_compra'),
            "data_producao" => $this->input->post('data_producao'),
        ];
        $itemInserido = $this->Database_model->set('item', $dados);
        if( $itemInserido ){
            echo json_encode(['id_item' => $itemInserido]);
        }else{
            return FALSE;
        }
    }

    public function del_item(){
        if( !$this->input->post('id_item') ){
            return FALSE;
        }
        $id_item = $this->input->post('id_item');
        if( $this->Database_model->del('item', $id_item) ){
            echo json_encode(['response' => TRUE]);
        }else{
            return FALSE;
        }
    }

    public function add_moeda(){
        if( !$this->input->post('nome') OR !$this->input->post('id_pais') ){
            return FALSE;
        }
        $dados = [
            "nome"=> $this->input->post('nome'),
            "id_pais"=> $this->input->post('id_pais'),
        ];

        $moedaCadastrada = $this->Database_model->set('moeda', $dados);
        if( $moedaCadastrada ){
            echo json_encode([ 'id_moeda' => $moedaCadastrada ]);
        }else{
            return FALSE;
        }
    }

    public function del_moeda(){
        if( !$this->input->post('id_moeda') ){
            return FALSE;
        }
        $id_moeda = $this->input->post('id_moeda');
        if( $this->Database_model->del('moeda', $id_moeda) ){
            echo json_encode(['reponse' => TRUE]);
        }else{
            return FALSE;
        }
    }

    public function add_pais(){
        if( !$this->input->post('nome') OR !$this->input->post('id_regiao') ){
            return FALSE;
        }
        $pais = [
            "nome" =>$this->input->post('nome'),
            "id_regiao" => $this->input->post('id_regiao')
        ];

        $paisCadastrado = $this->Database_model->set('pais', $pais);
        if($paisCadastrado){
            echo json_encode([ 'id_pais' => $paisCadastrado ]);
        }else{
            return FALSE;
        }
    }

    public function add_material(){
        if( !$this->input->post('tipo') ){
            return FALSE;
        }
        $dados = [
            'tipo' => $this->input->post('tipo')
        ];
        $id_material = $this->Database_model->set('material', $dados);
        if( $id_material ){
            echo json_encode(['id_material' => $id_material]);
        }else{
            return FALSE;
        }
    }

    public function del_material(){
        if( !$this->input->post('id_material') ){
            return FALSE;
        }
        $id_material = $this->input->post('id_material');
        if( $this->Database_model->del('material', $id_material) ){
            echo json_encode(['reponse'=>TRUE]);
        }else{
            return FALSE;
        }
    }

    public function add_regiao(){
        if( !$this->input->post('regiao') ){
            return FALSE;
        }
        $dados = [ 'regiao' => $this->input->post('regiao') ];
        $id_regiao = $this->Database_model->set('regiao', $dados);

        if( $id_regiao ){
            echo json_encode(['id_regiao'=> $id_regiao]);
        }else{
            return FALSE;
        }
    }
}
