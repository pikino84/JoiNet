<?php

class Products_model extends CI_Model{
	
	function get_categories(){
		$this->db->order_by('orden', 'asc');
		$this->db->where('id_categoria !=', '21');
		$query = $this->db->get('mayoreo_categorias');
		return $query->result();
	}

	function get_categories_volantes(){//$data
		$this->db->order_by('orden', 'asc');
		$this->db->where('id_categoria !=', '21');
		//$query = $this->db->get_where('mayoreo_categorias', $data);
		$query = $this->db->get('mayoreo_categorias');
		return $query->result();
	}
	
	function get_products_k(){
		 
		$this->db->select('SUM(products.costo) as costo_total');
		$query = $this->db->get_where('products', array('agotado'=>0,'products_status'=>0));
		return $query->row();
		//return $this->db->last_query();
	}

	function count_products($data){
		$this->db->where($data); 
		return $this->db->count_all_results('mayoreo_productos');
	}

	function get_products($data){
		 
		$this->db->select('
		products.products_id,
		products.products_model,
		products_description.products_name,
		products.products_image,
		products.products_imagelarge,
		products.products_price,
		products.sae_exist,
		products.sae_exist_7_1,
		products.sae_exist_7_2,
		products.agotado,
		products.manufacturers_id,
		products.ijei,
		products.costo,
		products.peso,
		products.costo_nacional,
		mayoreo_productos.precio_mayoreo,
		mayoreo_productos.precio_distribuidor,
		mayoreo_productos.precio_4,
		mayoreo_productos.precio_5,
		manufacturers.manufacturers_name,
		manufacturers.manufacturers_image');
		$this->db->join('products', 'products.products_id = mayoreo_productos.fk_producto');
		$this->db->join('products_description', 'products_description.products_id = products.products_id');
		$this->db->join('manufacturers', 'manufacturers.manufacturers_id = products.manufacturers_id');
		//$this->db->join('categories', 'categories.categories_id = products_to_categories.categories_id');
		//$this->db->order_by("orden", "asc"); 
		$this->db->order_by("sae_exist", "desc");
		$query = $this->db->get_where('mayoreo_productos', $data);
		
		return $query->result();
		//return $this->db->last_query();
	}

	function get_products_volantes($limit,$limit2){
		 
		$this->db->select('
		categoria,
		fk_categoria,
		products.products_id,
		products_description.products_name,
		products.products_imagelarge,
		products.products_price,
		products.manufacturers_id,
		manufacturers.manufacturers_image');
		$this->db->join('products', 'products.products_id = mayoreo_productos.fk_producto');
		$this->db->join('products_description', 'products_description.products_id = products.products_id');
		$this->db->join('manufacturers', 'manufacturers.manufacturers_id = products.manufacturers_id');
		$this->db->join('mayoreo_categorias', 'mayoreo_categorias.id_categoria = mayoreo_productos.fk_categoria');

		$where = "`fk_categoria` != '41' AND `fk_categoria` != '42' AND `fk_categoria` != '0' AND products.products_id != 12739 AND products.products_id != 13749 AND products.products_id != 12824 AND products.products_id != 12667 AND products.products_id != 14596 AND products.products_id != 13774 AND products.products_id != 13879 AND products.products_id != 14359 AND products.products_id != 14096 AND products.products_id != 13174 AND products.products_id != 13565";

		$this->db->limit($limit,$limit2);

		$this->db->where($where);

		$this->db->order_by('`mayoreo_categorias`.orden', 'asc');
		$query = $this->db->get('mayoreo_productos');
		
		return $query->result();
		//return $this->db->last_query();
	}

	function get_name_product($id){
		/*$this->db->select('products_description.products_name');
		$this->db->join('products_description', 'products_description.products_id = products.products_id');
		$query = $this->db->get_where('products', $data);
		return $query->row();*/

		$query = $this->db->query("
			SELECT
			pd.products_name
			FROM products p
			JOIN products_description pd ON pd.products_id = p.products_id
			WHERE p.products_id = $id
		");
		return $query->row();


	}

	function get_product($data){
		 
		$this->db->select('
		products.products_id,
		products.products_model,
		products.products_image,
		products.products_imagelarge,
		products.products_price,
		products.sae_exist,
		products.agotado,
		products.manufacturers_id,
		products.costo,
		products.peso,
		products.costo_nacional,
		mayoreo_productos.precio_mayoreo,
		mayoreo_productos.precio_distribuidor,
		mayoreo_productos.precio_4,
		mayoreo_productos.precio_5,
		mayoreo_productos.precio_6');
		$this->db->join('products', 'products.products_id = mayoreo_productos.fk_producto');
		//$this->db->join('products_description', 'products_description.products_id = mayoreo_productos.fk_producto');
		$this->db->order_by("orden", "desc"); 
		$query = $this->db->get_where('mayoreo_productos', $data);
		//echo $this->db->last_query();
		//die();
		return $query->row();
		// $query = $this->db->query("YOUR QUERY");
	}

	function get_product_2($products_id){
		$query = $this->db->query("
			SELECT 
				pd.products_id,
				pd.products_model,
				ps.products_name,
				pd.products_image,
				pd.products_imagelarge,
				pd.products_price,
				pd.sae_exist,
				pd.agotado,
				pd.manufacturers_id,
				pd.costo,
				pd.ijei,
				pd.peso,
				pd.costo_nacional,
				ma.precio_mayoreo,
				ma.precio_distribuidor,
				ma.precio_4,
				ma.precio_5,
				ma.precio_6
			FROM mayoreo_productos ma
			JOIN products pd ON pd.products_id = ma.fk_producto
			JOIN products_description ps ON ps.products_id = pd.products_id
			WHERE pd.products_id = '$products_id' ;");
		return $query->row();
	}
	
	function get_banners(){
		$this->db->order_by('orden', 'asc'); 
		$query = $this->db->get('mayoreo_banners');
		return $query->result();
	}

	function update_precio_pu($products_id, $data){
		$this->db->where('products_id', $products_id);
		$this->db->update('products', $data);
	}

	function update_precio_ma($products_id, $data){
		$this->db->where('fk_producto', $products_id);
		$this->db->update('mayoreo_productos', $data);
	}

	function update_products_desc($products_id, $data){
		$this->db->where('products_id', $products_id);
		$this->db->update('products_description', $data);
	}

	function get_marcas(){
		$query = $this->db->query("
			SELECT
			p.manufacturers_id as id_marca,
			UPPER(m.manufacturers_name) as marca
			FROM products p
			JOIN manufacturers m ON m.manufacturers_id = p.manufacturers_id
			WHERE p.products_status = 1
			GROUP BY p.manufacturers_id
			ORDER BY m.manufacturers_name ASC
		");
		return $query->result();
	}

	function search($id_marca, $id_categoria, $products_name){
		/*$query = $this->db->query("
			SELECT *

			FROM products p

			JOIN products_description pd ON pd.products_id = p.products_id
			JOIN mayoreo_productos mp ON mp.fk_producto = p.products_id
			JOIN manufacturers mn ON mn.manufacturers_id = p.manufacturers_id
			JOIN mayoreo_categorias mc ON mc.id_categoria = mp.fk_categoria

			WHERE p.products_id IS NOT NULL AND mn.manufacturers_id = 297 AND mc.id_categoria = 45 AND pd.products_name LIKE '%Sintonizador%'

			ORDER BY p.sae_exist DESC
		");*/

		$qry = '';

		
		

		if($id_marca != ''){
			$id_marca = $this->db->escape($id_marca);
			$qry .= " AND mn.manufacturers_id = $id_marca";
		}
		if($id_categoria != ''){
			$id_categoria = $this->db->escape($id_categoria);
			$qry .= " AND mc.id_categoria = $id_categoria";
		}
		if($products_name != ''){
			
			if(is_numeric($products_name)) {
		        $qry .= " AND p.products_id = '$products_name'";
		    } else {
		    	$products_name = strip_tags(addslashes($products_name));
		        $qry .= " AND pd.products_name LIKE '%$products_name%'";
		    }
			
		}

		$query = $this->db->query("
			SELECT *

			FROM products p

			JOIN products_description pd ON pd.products_id = p.products_id
			JOIN mayoreo_productos mp ON mp.fk_producto = p.products_id
			JOIN manufacturers mn ON mn.manufacturers_id = p.manufacturers_id
			JOIN mayoreo_categorias mc ON mc.id_categoria = mp.fk_categoria

			WHERE p.products_id IS NOT NULL $qry

			ORDER BY p.sae_exist DESC
		");
		return $query->result();
		//echo $this->db->last_query();
		//die($id_marca);

	}



	
			
}

?>