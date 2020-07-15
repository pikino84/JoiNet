<?php

class Products_model extends CI_Model{

	function custom_re($data){
		$query = $this->db->query($data);
		return $query->result();
	}

	function insert_log_productos($data)
	{
		$this->db->insert('log_productos', $data);
		return $this->db->insert_id();
	}

	function insert_log_precios($data)
	{
		$this->db->insert('log_precios', $data);
		return $this->db->insert_id();
	}

	function get_log_precios_one($data)
	{
		$this->db->order_by('fecha_modificacion','desc');
		$this->db->join('r00t3d', 'r00t3d.id_user = log_precios.fk_usuario', 'left');
		$query = $this->db->get_where('log_precios', $data);
		return $query->result();
	}
	
	function get_categories(){
		$this->db->order_by('orden', 'asc');
		$this->db->where('id_categoria !=', '21');
		$query = $this->db->get('mayoreo_categorias');
		return $query->result();
	}

	function get_categories_all(){
		$this->db->order_by('orden', 'asc');
		//$this->db->where('id_categoria !=', '21');
		$query = $this->db->get('mayoreo_categorias');
		return $query->result();
	}

	function get_categories_volantes($idcat){
		$this->db->order_by('orden', 'asc');

		//$where2 = "`id_categoria` = '15'";
		$where2 = "`id_categoria` = '$idcat'";

		//$this->db->where('id_categoria !=', '21');

		$this->db->where($where2);

		$query = $this->db->get('mayoreo_categorias');
		return $query->result();
		//return $this->db->last_query();
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
		products.articulo,
		products.products_model,
		products_description.products_name,
		products.products_image,
		products.products_imagelarge,
		products.products_price,
		products.products_quantity AS sae_exist,
		products.sae_exist_7_1,
		products.sae_exist_7_2,
		products.agotado,
		products.manufacturers_id,
		products.ijei,
		products.costo,
		products.peso,
		products.remate,
		products.nuevo,
		products.proveedor,
		products.numero_cajas,
		products.productos_cajas,
		products.oferta,
		products.costo_nacional,
		products.costo_usd,
		products.id_video_youtube,
		products.products_status,
		products.products_quantity_ct,
		products.products_name_ct,
		products.products_id_ct,	
		products.vmes1,
		products.vmes3,
		mayoreo_productos.precio_mayoreo,
		mayoreo_productos.precio_distribuidor,
		mayoreo_productos.precio_4,
		mayoreo_productos.precio_5,
		mayoreo_productos.productos_x_caja,
		mayoreo_productos.precio_x_producto,
		mayoreo_categorias.categoria,
		manufacturers.manufacturers_name,
		manufacturers.manufacturers_image');
		$this->db->join('products', 'products.products_id = mayoreo_productos.fk_producto', 'left');
		$this->db->join('products_description', 'products_description.products_id = products.products_id', 'left');
		$this->db->join('manufacturers', 'manufacturers.manufacturers_id = products.manufacturers_id', 'left');
		$this->db->join('mayoreo_categorias', 'mayoreo_categorias.id_categoria = mayoreo_productos.fk_categoria', 'left');
		//$this->db->join('categories', 'categories.categories_id = products_to_categories.categories_id');
		//$this->db->order_by("orden", "asc"); 
		//$this->db->order_by("sae_exist", "desc");
		
		$query = $this->db->get_where('mayoreo_productos', $data);
		
		return $query->result();
		//return $this->db->last_query();
	}

	function get_products_volantes($where){//products.products_imagelarge,
		$this->db->select('
		fk_categoria,
		categoria,
		products.products_id,
		products_description.products_name,
		products.products_price,
		products.manufacturers_id,
		manufacturers.manufacturers_image,
		products_gallery.imagengrande');

		$this->db->join('products', 'products.products_id = mayoreo_productos.fk_producto');
		$this->db->join('products_description', 'products_description.products_id = products.products_id');
		$this->db->join('products_gallery', 'products_gallery.products_id = products.products_id');
		$this->db->join('manufacturers', 'manufacturers.manufacturers_id = products.manufacturers_id');
		$this->db->join('mayoreo_categorias', 'mayoreo_categorias.id_categoria = mayoreo_productos.fk_categoria');
		
		/*$where2 = "`fk_categoria` != '42' AND `fk_categoria` != '73' AND `fk_categoria` != '18' AND `fk_categoria` != '36' AND `fk_categoria` != '41' AND `fk_categoria` != '83' AND `fk_categoria` != '4' AND `fk_categoria` != '72' AND `fk_categoria` != '67' AND `fk_categoria` != '30' AND `fk_categoria` != '27' AND `fk_categoria` != '69' AND `fk_categoria` != '76' AND `fk_categoria` != '58' AND `fk_categoria` != '39' AND `fk_categoria` != '21' AND products.sae_exist > 3 AND products.products_status = 1";*/

		$where2 = "products.sae_exist > 3 AND products.products_status = 1";

		//$this->db->limit($limit1,$limit2);

		$this->db->where($where);
		$this->db->where($where2);
		
		//$this->db->order_by('products_gallery.priority', 'asc');
		//$this->db->group_by('products_gallery.products_id');
		
		$query = $this->db->get('mayoreo_productos');
		
		return $query->result();
		//return $this->db->last_query();
	}

	function query_volantes($fk_categoria){

		$qv = "

				SELECT `fk_categoria`, `categoria`, `products`.`products_id`, `products_description`.`products_name`, `products`.`products_price`, `products`.`manufacturers_id`, `manufacturers`.`manufacturers_image`, `products_gallery`.`imagengrande`
				FROM (`mayoreo_productos`)
				JOIN `products` ON `products`.`products_id` = `mayoreo_productos`.`fk_producto`
				JOIN `products_description` ON `products_description`.`products_id` = `products`.`products_id`
				JOIN `products_gallery` ON `products_gallery`.`products_id` = (SELECT imagengrande FROM products_gallery WHERE products_id = `products`.`products_id` GROUP BY products_gallery.products_id ORDER BY priority ASC )
				JOIN `manufacturers` ON `manufacturers`.`manufacturers_id` = `products`.`manufacturers_id`
				JOIN `mayoreo_categorias` ON `mayoreo_categorias`.`id_categoria` = `mayoreo_productos`.`fk_categoria`
				WHERE `fk_categoria` =  '$fk_categoria'
				AND `fk_categoria` != '42' AND `fk_categoria` != '73' AND `fk_categoria` != '18' AND `fk_categoria` != '36' AND `fk_categoria` != '41' AND `fk_categoria` != '83' AND `fk_categoria` != '4' AND `fk_categoria` != '72' AND `fk_categoria` != '67' AND `fk_categoria` != '30' AND `fk_categoria` != '27' AND `fk_categoria` != '69' AND `fk_categoria` != '76' AND `fk_categoria` != '58' AND `fk_categoria` != '39' AND `fk_categoria` != '21' AND products.sae_exist > 3 AND products.products_status = 1
				GROUP BY `products_gallery`.`products_id`
				ORDER BY `products_gallery`.`priority` asc

				  ";

		$query = $this->db->query($qv);

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
		products.productos_cajas,
		mayoreo_productos.precio_mayoreo,
		mayoreo_productos.precio_distribuidor,
		mayoreo_productos.precio_4,
		mayoreo_productos.precio_5,
		mayoreo_productos.precio_6,
		mayoreo_productos.precio_x_producto');
		$this->db->join('products', 'products.products_id = mayoreo_productos.fk_producto');
		$this->db->order_by("orden", "desc"); 
		$query = $this->db->get_where('mayoreo_productos', $data);
		return $query->row();
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
				pd.oferta,
				pd.remate,
				pd.nuevo,
				pd.stock_min,
				pd.stock_max,
				pd.proveedor,
				pd.proveedor1,
				pd.proveedor2,
				pd.proveedor3,
				pd.numero_cajas,
				pd.productos_cajas,
				pd.costo_nacional,
				pd.costo_usd,
				pd.costo_nacional1,
				pd.costo_nacional2,
				pd.costo_nacional3,
				pd.id_video_youtube,
				ma.fk_categoria,
				ma.precio_mayoreo,
				ma.precio_distribuidor,
				ma.precio_4,
				ma.precio_5,
				ma.precio_6,
				ma.precio_x_producto
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

	function update_products_($products_id, $data){
		$this->db->where('products_id', $products_id);
		$this->db->update('products', $data);
	}

	function update_products_2($products_id, $data){
		$this->db->where('products_id', $products_id);
		$this->db->update('products', $data);
		return $this->db->last_query();
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

	function search($id_marca, $id_categoria, $products_name, $existencias = FALSE, $ordenar = FALSE){

		$qry = '';

		switch ($ordenar) {
			case 'ventas':
			    $order = " ORDER BY p.products_quantity_ct DESC";
			break;
			case 'ventas1':
			    $order = " ORDER BY p.vmes1 DESC";
			break;			
			case 'ventas3':
			    $order = " ORDER BY p.vmes3 DESC";
			break;						
			case 'precio':
				$order = " ORDER BY p.products_price DESC";
			break;
			case 'mayor_precio':
				$order = " ORDER BY p.products_price DESC";
			break;
			case 'menor_precio':
			    $order = " ORDER BY p.products_price ASC";
			break;					
			case 'fecha_alta':
				$order = " ORDER BY p.products_id DESC";
			break;
			case 'existencia':
				$order = " ORDER BY p.sae_exist DESC";
			break;
			default:
				$order = " ORDER BY p.sae_exist DESC";
			break;
		}

		if($existencias != FALSE){
			$qry .= " AND p.sae_exist > 3";
		}

		$qry .= " AND mc.id_categoria != 21";

		if($id_marca != ''){
			$id_marca = $this->db->escape($id_marca);
			$qry .= " AND mn.manufacturers_id = $id_marca";
		}

		if($id_categoria != ''){
			$id_categoria = $this->db->escape($id_categoria);
			$qry .= " AND mc.id_categoria = $id_categoria";
		}

		if($products_name != ''){
			
			/*if(is_numeric($products_name)) {

		        $qry .= " AND p.products_id = '$products_name'";

		    } else {*/

		    	$search_keywords = strip_tags(addslashes($products_name));

				$search_keywords = trim($search_keywords);

				$search_keywords = explode(' ', $search_keywords);

				$query = " AND ( ";

				foreach ($search_keywords as $key => $value)
				{
					$query .= "(pd.products_name LIKE '%$value%') AND ";
					//$query .= "(p.products_id LIKE '%$value%') AND ";
				}

				$query .= ")";

				$explode = explode('AND )', $query, -1);
		    	
		        $qry .= $explode[0] . ")";
		   // }
			
		}

		$query = $this->db->query("
			SELECT 

			p.products_id,
			pd.products_name,
			mn.manufacturers_id,
			mn.manufacturers_image,
			p.products_image,
			p.products_quantity AS sae_exist,
			p.products_price,
			mp.precio_mayoreo,
			mp.precio_distribuidor,
			mp.productos_x_caja,
			mp.precio_x_producto,
			mc.id_categoria,
			mc.categoria,
			p.peso,
			p.costo,
			p.ijei,
			p.costo_usd,
			p.costo_nacional,
			p.products_status,
			p.id_video_youtube,
			p.remate,
			p.nuevo,
			p.proveedor,
			p.numero_cajas,
			p.productos_cajas,
			p.oferta,
			p.descontinuado

			FROM products p

			LEFT JOIN products_description pd ON pd.products_id = p.products_id
			LEFT JOIN mayoreo_productos mp ON mp.fk_producto = p.products_id
			LEFT JOIN manufacturers mn ON mn.manufacturers_id = p.manufacturers_id
			LEFT JOIN mayoreo_categorias mc ON mc.id_categoria = mp.fk_categoria

			WHERE p.products_status = '1' AND p.MyBusiness20 = '1' $qry

			$order
		");
		return $query->result();

	}

	function search2($products_name, $existencias = FALSE, $ordenar = FALSE){

		$qry = '';

		switch ($ordenar) {
			case 'ventas':
				    $order = " ORDER BY p.products_quantity_ct DESC";
				break;		
			case 'ventas1':
			    $order = " ORDER BY p.vmes1 DESC";
			break;			
			case 'ventas3':
			    $order = " ORDER BY p.vmes3 DESC";
			break;				
			case 'precio':
					$order = " ORDER BY p.products_price DESC";
				break;	
			case 'mayor_precio':
					$order = " ORDER BY p.products_price DESC";
				break;
			case 'menor_precio':
				    $order = " ORDER BY p.products_price ASC";
				break;					
			case 'fecha_alta':
				$order = " ORDER BY p.products_id DESC";
			break;
			case 'existencia':
				$order = " ORDER BY p.sae_exist DESC";
			break;
			default:
				$order = " ORDER BY p.sae_exist DESC";
			break;
		}

		if($existencias != FALSE){
			$qry .= " AND p.products_quantity > 3";
		}

		$qry .= " AND mc.id_categoria != 21";

		if($products_name != ''){
			
	    	$search_keywords = strip_tags(addslashes($products_name));
			$search_keywords = trim($search_keywords);
			$search_keywords = explode(' ', $search_keywords);
			$query = " AND ( ";
			foreach ($search_keywords as $key => $value)
			{
				$query .= "(p.products_id LIKE '%$value%') AND ";
			}
			$query .= ")";
			$explode = explode('AND )', $query, -1);
	        $qry .= $explode[0] . ")";
		}

		$query = $this->db->query("
			SELECT 
			p.products_id,
			pd.products_name,
			mn.manufacturers_id,
			mn.manufacturers_image,
			p.products_image,
			p.products_quantity AS sae_exist,
			p.products_price,
			mp.precio_mayoreo,
			mp.precio_distribuidor,
			mp.productos_x_caja,
			mp.precio_x_producto,
			mc.id_categoria,
			p.peso,
			p.costo,
			p.ijei,
			p.costo_usd,
			p.costo_nacional,
			p.products_status,
			p.id_video_youtube,
			p.remate,
			p.nuevo,
			p.proveedor,
			p.numero_cajas,
			p.productos_cajas,
			p.oferta

			FROM products p

			LEFT JOIN products_description pd ON pd.products_id = p.products_id
			LEFT JOIN mayoreo_productos mp ON mp.fk_producto = p.products_id
			LEFT JOIN manufacturers mn ON mn.manufacturers_id = p.manufacturers_id
			LEFT JOIN mayoreo_categorias mc ON mc.id_categoria = mp.fk_categoria

			WHERE p.products_status = '1' AND MyBusiness20 = '1' $qry

			$order
		");
		return $query->result();

	}

	/***********************/
	function search_($proveedor_id, $id_marca, $id_categoria, $products_name, $existencias = FALSE, $ordenar = FALSE){

		$qry = '';

		switch ($ordenar) {
			case 'ventas':
				    $order = " ORDER BY p.products_quantity_ct DESC";
				break;		
			case 'ventas1':
			    $order = " ORDER BY p.vmes1 DESC";
			break;			
			case 'ventas3':
			    $order = " ORDER BY p.vmes3 DESC";
			break;				
			case 'precio':
					$order = " ORDER BY p.products_price DESC";
				break;			    
			case 'mayor_precio':
					$order = " ORDER BY p.products_price DESC";
				break;
			case 'menor_precio':
				    $order = " ORDER BY p.products_price ASC";
				break;					
			case 'fecha_alta':
					$order = " ORDER BY p.products_id DESC";
				break;

				case 'existencia':
					$order = " ORDER BY p.sae_exist DESC";
				break;
			
				default:
					$order = " ORDER BY p.sae_exist DESC";
				break;
		}

		/*if($existencias != FALSE){
			$qry .= " AND p.products_quantity > 3";
		}

		if($id_marca != ''){
			$id_marca = $this->db->escape($id_marca);
			$qry .= " AND mn.manufacturers_id = $id_marca";
		}

		if($id_categoria != ''){
			$id_categoria = $this->db->escape($id_categoria);
			$qry .= " AND mc.id_categoria = $id_categoria";
		}

		if($proveedor_id != ''){
			$proveedor_id = $this->db->escape($proveedor_id);
			$qry .= " AND TRIM(p.proveedor) = $proveedor_id "; // Cambio de = por
			$qry .= " OR TRIM(p.proveedor1) = $proveedor_id ";
			$qry .= " OR TRIM(p.proveedor2) = $proveedor_id ";
			$qry .= " OR TRIM(p.proveedor3) = $proveedor_id ";
		}*/



		if($products_name != ''){
			
			/*if(is_numeric($products_name)) {

		        $qry .= " AND p.products_id = '$products_name'";

		    } else {*/

		    	$search_keywords = strip_tags(addslashes($products_name));

				$search_keywords = trim($search_keywords);

				$search_keywords = explode(' ', $search_keywords);

				$query = " AND ( ";

				foreach ($search_keywords as $key => $value)
				{
					$query .= "(pd.products_name LIKE '%$value%') AND ";
					//$query .= "(p.products_id LIKE '%$value%') AND ";
				}

				$query .= ")";

				$explode = explode('AND )', $query, -1);
		    	
		        $qry .= $explode[0] . ")";
		   // }
			
		}

		$query = $this->db->query("
			SELECT 

			p.products_id,
			pd.products_name,
			mn.manufacturers_id,
			mn.manufacturers_image,
			p.products_image,
			p.products_quantity AS sae_exist,
			p.products_price,
			mp.precio_mayoreo,
			mp.precio_distribuidor,
			mp.precio_x_producto,
			mc.id_categoria,
			mc.categoria,
			p.peso,
			p.costo,
			p.remate,
			p.nuevo,
			p.proveedor,
			p.numero_cajas,
			p.productos_cajas,
			p.oferta,
			p.ijei,
			p.costo_usd,
			p.costo_nacional,
			p.products_status,
			p.stock_min,
			p.stock_max,
			p.descontinuado,
			p.products_quantity_ct,
			p.products_name_ct,
			p.products_id_ct,
			p.vmes1,p.vmes3,
			psae.nombre AS prov_n

			FROM products p

			LEFT JOIN products_description pd ON pd.products_id = p.products_id
			LEFT JOIN mayoreo_productos mp ON mp.fk_producto = p.products_id
			LEFT JOIN manufacturers mn ON mn.manufacturers_id = p.manufacturers_id
			LEFT JOIN mayoreo_categorias mc ON mc.id_categoria = mp.fk_categoria
			LEFT JOIN proveedores_sae psae ON psae.clave = TRIM(p.proveedor)

			WHERE p.MyBusiness20 = '1' $qry

			$order
		");
		return $query->result();
		//return $this->db->last_query();

	}

	function search2_($products_name, $existencias = FALSE, $ordenar = FALSE){

		$qry = '';

		switch ($ordenar) {
		    			case 'ventas':
				    $order = " ORDER BY p.products_quantity_ct DESC";
				break;	
			case 'ventas1':
			    $order = " ORDER BY p.vmes1 DESC";
			break;			
			case 'ventas3':
			    $order = " ORDER BY p.vmes3 DESC";
			break;				
			case 'precio':
					$order = " ORDER BY p.products_price DESC";
				break;
			case 'mayor_precio':
					$order = " ORDER BY p.products_price DESC";
				break;
			case 'menor_precio':
				    $order = " ORDER BY p.products_price ASC";
				break;					
			case 'fecha_alta':
				$order = " ORDER BY p.products_id DESC";
			break;
			case 'existencia':
				$order = " ORDER BY p.sae_exist DESC";
			break;
			default:
				$order = " ORDER BY p.sae_exist DESC";
			break;
		}

		if($existencias != FALSE){
			$qry .= " AND p.sae_exist > 3";
		}

		if($products_name != ''){
			
	    	$search_keywords = strip_tags(addslashes($products_name));
			$search_keywords = trim($search_keywords);
			$search_keywords = explode(' ', $search_keywords);
			$query = " AND ( ";
			foreach ($search_keywords as $key => $value)
			{
				$query .= "(p.products_id LIKE '%$value%') AND ";
			}
			$query .= ")";
			$explode = explode('AND )', $query, -1);
	        $qry .= $explode[0] . ")";
		}

		$query = $this->db->query("
			SELECT 
			p.products_id,
			pd.products_name,
			mn.manufacturers_id,
			mn.manufacturers_image,
			p.products_image,
			p.sae_exist,
			p.products_price,
			mp.precio_mayoreo,
			mp.precio_distribuidor,
			mp.precio_x_producto,
			mc.id_categoria,
			mc.categoria,
			p.peso,
			p.remate,
			p.nuevo,
			p.proveedor,
			p.numero_cajas,
			p.productos_cajas,
			p.oferta,
			p.costo,
			p.ijei,
			p.costo_usd,
			p.costo_nacional,
			p.products_status,
			p.descontinuado,
			p.products_quantity_ct,
			p.products_name_ct,
			p.products_id_ct,	
p.vmes1,p.vmes3,			
			p.stock_min

			FROM products p

			LEFT JOIN products_description pd ON pd.products_id = p.products_id
			LEFT JOIN mayoreo_productos mp ON mp.fk_producto = p.products_id
			LEFT JOIN manufacturers mn ON mn.manufacturers_id = p.manufacturers_id
			LEFT JOIN mayoreo_categorias mc ON mc.id_categoria = mp.fk_categoria

			WHERE p.MyBusiness20 = '1' $qry

			$order
		");
		return $query->result();

	}
	/***********************/
			
}

?>