<?php

class Sistemas_model extends CI_Model {
	
	public function index(){

		
		return $this->db->get('sistema')->result_array();
	}

	public function store($system){

		$this->db->insert('sistema', $system);
	}

	public function show($codigo){

		return $this->db->get_where('sistema', array('codigo' => $codigo))->row_array();

	}

	public function update($codigo, $dispositivos){

		$this->db->where('codigo', $codigo);
		return $this->db->update('sistema', $dispositivos);
	}

	public function destroy($codigo){

		$this->db->where('codigo', $codigo);
		return $this->db->delete('sistema');
	}

	public function verificaMac($mac){

		$this->db->where('mac',$mac);
		return $this->db->get('sistema')->row_array();
	}

	public function getSistema($codigo){

		$this->db->where("codigo", $codigo);
		return $this->db->get('sistema')->result_array();
	}

	public function map(){

		
		return $this->db->get('sistema')->result_array();
	}
}
