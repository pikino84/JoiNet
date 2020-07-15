<?php

class Products_model extends CI_Model{
	
	function get_products_description($data){
		$query = $this->db->get_where('products_description', $data);
		return $query->row();
	}
	
	function get_products_to_categories($data){
		/*$this->db->select('*');
		$this->db->from('blogs');*/
		//$this->db->join('categories_description', 'categories_description.categories_id = products_to_categories.categories_id');
		
		$query = $this->db->get_where('products_to_categories', $data);
		
		return $query->row();
	}
	
	function get_precio_mayoreo($data){
		$query = $this->db->get_where('mayoreo_productos', $data);
		return $query->row();
	}
	
	function get_precio_publico($data){
		$query = $this->db->get_where('products', $data);
		return $query->row();
	}

	function get_productos($data){
		$query = $this->db->get_where('products', $data);
		return $query->result();
	}

	function get_productos_all_info($data){
		$this->db->order_by('products.products_id', 'desc'); 
		$this->db->join('products_description', 'products_description.products_id = products.products_id');
		$this->db->join('mayoreo_productos', 'mayoreo_productos.fk_producto = products.products_id');
		$query = $this->db->get_where('products', $data);
		return $query->result();
	}

	function get_categories_public(){
		$this->db->order_by('categories_name','asc');
		$query = $this->db->get('categories_description');
		return $query->result();
	}

	function get_categories_mayoreo(){
		$this->db->order_by('categoria','asc');
		$query = $this->db->get('mayoreo_categorias');
		return $query->result();
	}

	function get_manufacturers(){
		$this->db->order_by('manufacturers_name','asc');
		$query = $this->db->get('manufacturers');
		return $query->result();
	}

	function get_ch_products_order($data){
		$this->db->join('products', 'products.products_id = ch_products_order.fk_product_order');
		$query = $this->db->get_where('ch_products_order', $data);
		return $query->result();
	}

	function get_ch_shipments($data){
		$query = $this->db->get_where('ch_shipments', $data);
		return $query->result();
	}

	function set_products($data){
		$this->db->insert('products', $data); 
		return $this->db->insert_id();
	}

	function set_product_name($data){
		$this->db->insert('products_description', $data); 
	}

	function set_products_to_categories($data){
		$this->db->insert('products_to_categories',$data);
	}

	function set_mayoreo_productos($data){
		$this->db->insert('mayoreo_productos',$data);	
	}

	function get_product($data){

		$this->db->select('products_status, categories_id, fk_categoria, manufacturers_id, pd.products_name, products_model, costo, costo_nacional, products_price, precio_mayoreo, precio_distribuidor');
		$this->db->join('products_to_categories pc', 'pc.products_id = ps.products_id', 'left');
		$this->db->join('products_description pd', 'pd.products_id = ps.products_id', 'left');
		$this->db->join('mayoreo_productos mp', 'mp.fk_producto = ps.products_id', 'left');
		$query = $this->db->get_where('products ps', array('ps.products_id'=>$data) );
		return $query->row();
	}

	function get_no_foto(){
		$this->db->order_by('products_id', 'desc');
		$where = "products_image IS NULL AND products_status = 1";
		$this->db->select('ps.products_id, pd.products_name');
		$this->db->where($where);
		$this->db->join('products_description pd', 'pd.products_id = ps.products_id', 'left');
		$query = $this->db->get('products ps');
		return $query->result();
	}

	
		
}

?>