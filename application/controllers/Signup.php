<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {


	
	public function index() {

		$dados['titulo'] = 'Cadastro - D.M.A';
		$this->load->view('signup', $dados);

	}
	public function store(){

		$this->load->model('usuarios_model');
		$usuarios = array(
			'nome' => $_POST['nome'],
			'email' => $_POST['email'],
			'senha' => md5($_POST['senha'])
		);
		

		if(!$this->usuarios_model->verificaEmail($usuarios['email'])){
			$this->usuarios_model->store($usuarios);
			$this->usuarios_model->success($usuarios);
			$this->session->set_flashdata('sucesso', 'Cadastrado com sucesso!');
			redirect('login');
		}else{
			$this->session->set_flashdata('error', 'Error ao cadastrar, email em uso!');
			redirect('signup');
		}

	}
}