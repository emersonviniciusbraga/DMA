<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{



	public function index()
	{

		$this->load->model('monitoramento_model');
		
	}

	public function dadosAmonia($end_mac)
	{

		permission();
		$this->load->model('monitoramento_model');
		$dados['monitoramento'] = $this->monitoramento_model->index();
		$dados['monitoramentos'] = $this->monitoramento_model->getDados($end_mac);
		$dados['titulo'] = 'Gráfico Amônia - D.M.A';
		$this->load->view('grafico-amonia', $dados);
	}

	public function dadosTemperatura($end_mac)
	{

		permission();
		$this->load->model('monitoramento_model');
		$dados['monitoramento'] = $this->monitoramento_model->index();
		$dados['monitoramentos'] = $this->monitoramento_model->getDados($end_mac);
		$dados['titulo'] = 'Gráfico Temperatura - D.M.A';
		$this->load->view('grafico-temperatura', $dados);
	}

	public function dadosUmidade($end_mac)
	{

		permission();
		$this->load->model('monitoramento_model');
		$dados['monitoramento'] = $this->monitoramento_model->index();
		$dados['monitoramentos'] = $this->monitoramento_model->getDados($end_mac);
		$dados['titulo'] = 'Gráfico Umidade - D.M.A';
		$this->load->view('grafico-umidade', $dados);
	}
}