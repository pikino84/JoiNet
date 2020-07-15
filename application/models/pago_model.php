<?php

class Pago_model extends CI_Model{
	
	function set_pedido($data){
		$this->db->insert('mayoreo_pedidos', $data);
		return $this->db->insert_id();
	}
	
	function get_pedido($data){
		$this->db->select('nombre, email, telefono, direccion, colonia, cp, poblacion, estado, pais, f_nombre, f_rfc, f_direccion, f_colonia, f_cp, f_poblacion, f_estado, f_telefono');
		$this->db->order_by('id','desc');
		$query = $this->db->get_where('mayoreo_pedidos', $data, 1, 0);
		return $query->result();
	}

	function get_pedido_one($data){
		//$this->db->select('nombre, email, telefono, direccion, colonia, cp, poblacion, estado, pais, f_nombre, f_rfc, f_direccion, f_colonia, f_cp, f_poblacion, f_estado, f_telefono');
		$query = $this->db->get_where('mayoreo_pedidos', $data);
		return $query->row();
	}
	
	function update_pedido($data,$where){
		$this->db->update('mayoreo_pedidos', $data, $where);
	}

	function update_pedido_paypal($p_status,$id){
		//$this->db->update('mayoreo_pedidos', $data, $where);
		//return $this->db->last_query();
		$this->db->query("UPDATE mayoreo_pedidos SET p_status = $p_status WHERE id = $id");
	}

	function get_pedido_one_paypal($data){
		$this->db->select('id,nombre, email, telefono, direccion, colonia, cp, poblacion, estado, pais, f_nombre, f_rfc, f_direccion, f_colonia, f_cp, f_poblacion, f_estado, f_telefono');
		$query = $this->db->get_where('mayoreo_pedidos', $data);
		return $query->row();
	}

	function set_mayoreo_pedidos_productos($data){
		$this->db->insert('mayoreo_pedidos_productos', $data);
	}
			
}

?>