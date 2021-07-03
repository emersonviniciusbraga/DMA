<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	public function __construct(){

		parent::__construct();
		permission();
		
	}

	public function index() {

		$this->load->model('sistemas_model');
		$dados['sistemas'] = $this->sistemas_model->index();
		$dados['titulo'] = 'Painel - D.M.A';
		$this->load->view('sistemas', $dados);
	}


}




    

