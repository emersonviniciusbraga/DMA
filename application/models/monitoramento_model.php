<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoramento_model extends CI_Model {
	
	public function index(){
		$this->db->order_by("id_monitoramento", "DESC");
		$this->db->limit(10);
		return $this->db->get('monitoramento')->result_array();
	}

	public function cards($mac){
		$this->db->where("end_mac", $mac);
		$this->db->order_by("id_monitoramento", "DESC");
		$this->db->limit(1);
		return $this->db->get('monitoramento')->row_array();
		
	}

	public function dados($mac){

		return $this->db->get_where('sistema', array('mac' => $mac))->row_array();	
		
	}


	public function store($sql){

		$this->db->insert('monitoramento', $sql);
				

	}

	
	public function getDados($mac){

		$this->db->where("end_mac", $mac);
		return $this->db->get('monitoramento')->result_array();
		
	
		
		// return $this->db->get('monitoramento')->result();
	}

	// public function getTeste($var){
	// 	$this->db->where("end_mac", $var);
	// 	return $this->db->get('monitoramento')->result();
	// }
	
	
}