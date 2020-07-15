<?php

class Boletin_model extends CI_Model{
	
	/*function set_pedido($data){
		$this->db->insert('mayoreo_pedidos', $data);
		return $this->db->insert_id();
	}
	
	function get_pedido($data){
		$this->db->select('nombre, email, telefono, direccion, colonia, cp, poblacion, estado, pais, f_nombre, f_rfc, f_direccion, f_colonia, f_cp, f_poblacion, f_estado, f_telefono');
		$query = $this->db->get_where('mayoreo_pedidos', $data, 1, 0);
		return $query->result();
	}
	
	function update_pedido($data,$where){
		$this->db->update('mayoreo_pedidos', $data, $where);
	}*/
	
	function get_correo($data){
		$this->db->order_by('customers_newsletter_email', 'desc'); 
		$this->db->select('customers_newsletter_email');
		$query = $this->db->get_where('customers_newsletter', $data, 1, 0);
		return $query->row();
	}
	
	function set_correo($data){
		$this->db->insert('customers_newsletter', $data);
		return $this->db->insert_id();
	}
			
}

?>