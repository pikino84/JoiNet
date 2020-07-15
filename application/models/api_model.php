<?php

class Api_model extends CI_Model{
	
	function get_products(){
		 
		$this->db->select('
		products.products_id,
		products_description.products_name,
		products.products_image,
		products.sae_exist,
		products.agotado');
		$this->db->join('products_description', 'products_description.products_id = products.products_id');
		$this->db->order_by('products_id', 'desc');

		$where = "sae_exist < 20 AND products_status = '1'";

		$this->db->where($where);

		$query = $this->db->get('products');
		
		return $query->result();
		//return $this->db->last_query();
	}

			
}

?>