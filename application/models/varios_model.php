<?php

class Varios_model extends CI_Model{
	
	function get_solo_ofertas(){
		$query = $this->db->get('solo_ofertas');
		return $query->result();
	}

	function get_estados(){
		$this->db->order_by('nombre','ASC');
		$query = $this->db->get('estados');
		return $query->result();
	}

	function get_proveedores_sae(){
		$this->db->order_by('nombre','ASC');
		$query = $this->db->get('proveedores_sae');
		return $query->result();
	}
			
}

?>