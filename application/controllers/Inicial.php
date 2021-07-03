<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicial extends CI_Controller {


	
	public function index() {

		$this->load->model('login_model');
		$dados['titulo'] = 'Inicio - D.M.A';
		$this->load->view('inicial', $dados);

	}
}