<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	
	public function index() {

		$this->load->model('login_model');
		$dados['titulo'] = 'Entrar - D.M.A';
		$this->load->view('login', $dados);

	}
	public function store(){

		$this->load->model('login_model');
		$email = $_POST['email'];
		$senha = md5($_POST['senha']);
		$user = $this->login_model->store($email, $senha);

		if($user){
			$this->session->set_userdata('logged_user', $user);
			$this->session->set_flashdata('success', 'Logado com sucesso!');
			redirect('painel');
		}else{
			$this->session->set_flashdata('danger', 'Usuário e/ou senha inválidos!');
			redirect('login');
		}
	}

	public function logout(){

		$this->session->unset_userdata('logged_user');
		redirect('inicial');
	}
}