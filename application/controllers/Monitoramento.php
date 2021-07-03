<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoramento extends CI_Controller {

	public function __construct(){

		parent::__construct();
		
		
	}
	
	public function index() {

		permission();
		$this->load->model('monitoramento_model');
		$dados['monitoramento'] = $this->monitoramento_model->index();
		$dados['titulo'] = 'Sistemas - DMA';
		$this->load->view('monitoramento', $dados);

	}


	public function dados($mac){

		permission();
		$this->load->model('monitoramento_model');
		$dados['monitoramento'] = $this->monitoramento_model->index();
		$dados['cards'] = $this->monitoramento_model->cards($mac);
		$dados['graficos'] = $this->monitoramento_model->getDados($mac);
		$dados['sistemas'] = $this->monitoramento_model->dados($mac);
		$dados['titulo'] = 'Dados Monitoramento - D.M.A';
		$this->load->view('monitoramento', $dados);

		 
        } 

		
		
	public function store(){
		
		$this->load->model('monitoramento_model');

		$sql = array(
					'end_mac' => $_GET['end_mac'],
					'amonia' => $_GET['amonia'],
					'temperatura' => $_GET['temperatura'],
					'humidade' => $_GET['humidade'] 
		);
		
		if($this->monitoramento_model->store($sql)){
			echo "erro_ao_salvar";
			redirect('painel');

		}else{
			echo "salvo_com_sucesso";
			redirect('sistemas');
		}
		
	}
	

}

	

	
