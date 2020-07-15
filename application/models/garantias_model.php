<?php

class garantias_model extends CI_Model{

	function set_garantia($data){
		$this->db->insert('mayoreo_garantias', $data);
		return $this->db->insert_id();
	}

	function set_garantia_productos($data){
		$this->db->insert('mayoreo_garantias_productos', $data);
	}

	function get_garantia($data){
		$query = $this->db->get_where('mayoreo_garantias', $data);
		return $query->row();
	}

	function get_estados(){
		$this->db->order_by('nombre','asc');
		$query = $this->db->get('estados');
		return $query->result();
	}

	function get_municipios($data){
		$this->db->order_by('nombre','asc');
		$query = $this->db->get_where('municipios', $data);
		return $query->result();
	}
			
}

?>