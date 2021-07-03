<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistemas extends CI_Controller {

	public function __construct(){

		parent::__construct();
		permission();
		
	}
	
	public function index() {

		$this->load->model('sistemas_model');
		$dados['sistemas'] = $this->sistemas_model->index();	
		$dados['titulo'] = 'Sistemas - D.M.A';
		$this->load->view('sistemas', $dados);

	}

	public function new(){

		$dados['titulo'] = 'Cadastro de Sistema - DMA';
		$dados['nome'] = 'Cadastro de Sistema';
		$this->load->view('form-sistemas', $dados);
	}

	public function store(){

		$system = $_POST;
		$system['usuario_id'] = $_SESSION['logged_user']['id'];
		$this->load->model('sistemas_model');

		if(!$this->sistemas_model->verificaMac($system['mac'])){
			$this->sistemas_model->store($system);
			$this->session->set_flashdata('sucesso', 'Cadastrado com sucesso!');
			redirect('sistemas');
		}else{
			$this->session->set_flashdata('error', 'Error ao cadastrar, MAC já cadastrado!');
			redirect('sistemas/new');
		}
	}

	public function edit($codigo) {

		$this->load->model('sistemas_model');
		$dados['sistemas'] = $this->sistemas_model->show($codigo);
		$dados['titulo'] = 'Editar Sistema - DMA';
		$dados['nome'] = 'Editar Sistema';
		$this->load->view('form-sistemas', $dados);

	}

	public function update($codigo){

		$this->load->model('sistemas_model');
		$dispositivos = $_POST;
		$this->sistemas_model->update($codigo, $dispositivos);
		redirect('sistemas');
	}

	public function delete($codigo){

		$this->load->model('sistemas_model');

		if($this->sistemas_model->destroy($codigo)){
			$this->session->set_flashdata('sucesso_exclusao', 'Excluído com sucesso!');
			redirect('sistemas');
		}else{
			$this->session->set_flashdata('error_esclusao', 'Error ao excluir, dados do monitoramento ainda exixstentes!');
			redirect('sistemas');
		}
	}

	public function dadosSistema($codigo)
	{

		permission();
		$this->load->model('sistemas_model');
		$dados['sistema'] = $this->sistemas_model->index();
		$dados['sistemas'] = $this->sistemas_model->getSistema($codigo);
		$dados['titulo'] = 'Gráfico Amônia - D.M.A';
		$this->load->view('map', $dados);
	}
}