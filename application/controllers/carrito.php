<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Carrito extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
	}

	public function actualizar(){
		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=1; $i <= count($rowid); $i++){
			$data = array(
               'rowid' => $rowid[$i],
               'qty'   => $qty[$i]
            );
			$this->cart->update($data);
		}
		//$ref = $this->agent->referrer();
		echo redirect('https://www.massivepc.com/mayoreo/'.'#modal_products', 'refresh');
	}

	public function agregar(){
		//$this->load->library('cart');
		//$this->load->helper('text');
		/*
		*/
		header("Cache-Control: no-store, no-cache, must-revalidate");

		$test = $this->input->post('set_data');
		$decode = json_decode($test);

		foreach($decode as $dec){
			//echo $dec->name.'<br>';
			$this->data['id']		=	$dec->id;
			$this->data['qty']		=	$dec->qty;
			$this->data['price']	=	$dec->price;
			$this->data['name']		= 	url_title($dec->name,' ',FALSE);
			$this->data['options']	=	array(
				'mayoreo' 			=>		$dec->mayoreo,
				'distribuidor'		=>		$dec->distribuidor,
				'imagen'			=>		$dec->imagen
			);
			$result[] = $this->cart->insert($this->data);
			
		}
		$c_content = $this->cart->contents();
		echo json_encode($c_content);
		//echo var_dump($decode);
	}

	public function add_ajax(){
		header("Cache-Control: no-store, no-cache, must-revalidate");
		$test = $this->input->post('set_data');
		$decode = json_decode($test);

		foreach($decode as $dec){
			$this->data['id']		=	$dec->id;
			$this->data['qty']		=	$dec->qty;
			$this->data['price']	=	$dec->price;
			$this->data['name']		= 	url_title($dec->name,' ',FALSE);
			$this->data['options']	=	array(
				'mayoreo' 			=>		$dec->mayoreo,
				'distribuidor'		=>		$dec->distribuidor,
				'imagen'			=>		$dec->imagen
			);
			$result[] = $this->cart->insert($this->data);
			
		}
		//$c_content = $this->cart->contents();
		$total_items = $this->cart->total_items();
		$total = $this->cart->total();

		$c_content = array( 'total_items' => $total_items, 'total' => $total );

		echo json_encode($c_content);

	}

	public function add_ajax_e(){
		header("Cache-Control: no-store, no-cache, must-revalidate");
		$da = $this->input->post('set_data');
		$decode = json_decode($da);

		foreach($decode as $dec){
			$this->data['id']		=	$dec->id;
			$this->data['qty']		=	$dec->qty;
			$this->data['price']	=	$dec->price;
			$this->data['name']		= 	'product'.uniqid();
			$this->data['options']	=	array(
				'mayoreo' 			=>		$dec->mayoreo,
				'distribuidor'		=>		$dec->distribuidor,
				'imagen'			=>		$dec->imagen,
				'exist'				=>		$dec->exist
			);
			$result[] = $this->cart->insert($this->data);
		}
		echo json_encode($this->data);
	}

	public function add_ajax_fixed()
	{
		header("Cache-Control: no-store, no-cache, must-revalidate");

		$da     = $this->input->post('set_data');
		$decode = json_decode($da);

		foreach($decode as $dec)
		{
			
			$this->data['id']       =	$dec->id;
			$this->data_p['data_p'] =   $this->products_model->get_product(array('products_id'=>$this->data['id']));

//modificado temporal	

			if($this->data_p['data_p']->productos_cajas != 0 && $this->data_p['data_p']->precio_x_producto > 0)
			{
			    
				//echo 'hay productos por caja.';
				if($dec->qty >= $this->data_p['data_p']->productos_cajas)
				{
 $caja        = 1;				    
					//echo $this->data['qty'] .' es mayor que '.$this->data_p['data_p']->productos_cajas;
					$price        = $this->data_p['data_p']->precio_x_producto;
					$mayoreo      = $this->data_p['data_p']->precio_x_producto;
					$distribuidor = $this->data_p['data_p']->precio_x_producto;
				}else{
					//echo $this->data_p['data_p']->productos_cajas.' es mayor que '.$this->data['qty'] ;
					$price        = $this->data_p['data_p']->products_price * 1.16;
					$mayoreo      = $this->data_p['data_p']->precio_mayoreo;
					$distribuidor = $this->data_p['data_p']->precio_distribuidor;
				}

			}else{
 $caja        = 0;			    
				//echo 'No hay prodcutos por caja';
				$price                  = $this->data_p['data_p']->products_price * 1.16;
				$mayoreo                = $this->data_p['data_p']->precio_mayoreo;
				$distribuidor           = $this->data_p['data_p']->precio_distribuidor;
			}

			$this->data['qty']		=	$dec->qty;
			$this->data['price']	=	$price;
			$this->data['name']		= 	'product'.uniqid();
			$this->data['options']	=	array(
				'mayoreo' 			=>  $mayoreo,
				'distribuidor'		=>  $distribuidor,
				'caja'		=>  $caja,				
				'imagen'			=>  $this->data_p['data_p']->products_image,
				'exist'				=>  $this->data_p['data_p']->sae_exist
			);

			$result[] = $this->cart->insert($this->data);
			
		}
		//$this->data['productos_cajas']	= $this->data_p['data_p']->productos_cajas;
		echo json_encode($this->data);
	}

	public function editar_ajax_fix(){

		if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}

		/*error_reporting(E_ALL);
		ini_set("display_errors", 1);
		*/
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		
		$rowid                  = $this->input->post('rowid');
		$qty                    = $this->input->post('qty');
		$product                = $this->cart->get_item($rowid);
 $caja        = 0;
		$this->data_p['data_p'] = $this->products_model->get_product(array('products_id'=>$product['id']));
//modificado temporal
		if($this->data_p['data_p']->productos_cajas > 1){

			if($qty >= $this->data_p['data_p']->productos_cajas){
			    $caja        = 1;
				$price        = $this->data_p['data_p']->precio_x_producto;
				$mayoreo      = $this->data_p['data_p']->precio_x_producto;
				$distribuidor = $this->data_p['data_p']->precio_x_producto;
			}else{
				$price        = $this->data_p['data_p']->products_price * 1.16;
				$mayoreo      = $this->data_p['data_p']->precio_mayoreo;
				$distribuidor = $this->data_p['data_p']->precio_distribuidor;
			}

		}else{
		    
			$price        = $this->data_p['data_p']->products_price * 1.16;
			$mayoreo      = $this->data_p['data_p']->precio_mayoreo;
			$distribuidor = $this->data_p['data_p']->precio_distribuidor;
			
		}
		
		/*if($qty >= $this->data_p['data_p']->productos_cajas){
			$price        = $this->data_p['data_p']->precio_x_producto;
			$mayoreo      = $this->data_p['data_p']->precio_x_producto;
			$distribuidor = $this->data_p['data_p']->precio_x_producto;
		}else{
			$price        = $this->data_p['data_p']->products_price * 1.16;
			$mayoreo      = $this->data_p['data_p']->precio_mayoreo;
			$distribuidor = $this->data_p['data_p']->precio_distribuidor;
		}*/

		$this->data['rowid']    =   $rowid;
		$this->data['qty']		=	$qty;
		$this->data['price']	=	$price;
		$this->data['options']	=	array(
			'mayoreo' 			=>  $mayoreo,
			'distribuidor'		=>  $distribuidor,
			'caja'		=>  $caja,
			'imagen'			=>  $this->data_p['data_p']->products_image,
			'exist'				=>  $this->data_p['data_p']->sae_exist
		);

		$this->cart->update($this->data);

		echo json_encode($this->data);
	}

	public function get_tti_fix(){

		if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}

		setlocale(LC_MONETARY, 'es_ES');
		
		$cart = $this->cart->contents();

		/*echo var_dump($cart);
		die();*/
		
		$p_precio       ='';
		$p_mayoreo      ='';
		$p_distribuidor ='';
		$p_caja ='';		
		/******************************/ //APLICAR PORCENTAJE DE DESCUENTO 16-01-2017
		$porc           = 0;
		$des_fin        = 0;
		/******************************/
		
		foreach($cart as $product1){
			$p_precio		+= $product1['price'] * $product1['qty'];
			$p_mayoreo		+= $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor	+= $product1['options']['distribuidor'] * $product1['qty'];
			$p_caja			+= $product1['options']['caja'] * $product1['qty'];			
		}
		 
		foreach($cart as $product){
			
			if($p_distribuidor > 4999)
			{
				$total       = $p_distribuidor;
			}else if($p_mayoreo > 2499){
				$total       = $p_mayoreo;
			}else{
				$total       = $p_precio;
			}
			
		}

		/******************************/ //APLICAR PORCENTAJE DE DESCUENTO 16-01-2017
		if($p_distribuidor > 50001){
			$porc = 5;
		}else if($p_distribuidor > 40001){
			$porc = 4;
		}else if($p_distribuidor > 30001){
			$porc = 3;
		}else if($p_distribuidor > 20001){
			$porc = 2;
		}else if($p_distribuidor > 10001){
			$porc = 1;
		}
		
		if($porc != 0){
			$desc         = $total * $porc;
			$desc         = $desc / 100;
			$imp_tot2     = $total - $desc;
			$imp_tot4     = $imp_tot2 * .16;
			$des_fin      = $desc;
			$cant_mas_iva = $imp_tot2 + $imp_tot4 ;
		}else{
			/*$imp_tot4   = $total * .16;
			$cant_mas_iva = $total + $imp_tot4 ;*/
			$imp_tot2     = $total;
		}
		/******************************/
			
		$this->data['porc']        = $porc;//APLICAR PORCENTAJE DE DESCUENTO 16-01-2017
		$this->data['total_items'] = $this->cart->total_items();
		//$this->data['total']     = number_format($total);
		$this->data['total']       = number_format($imp_tot2);//APLICAR PORCENTAJE DE DESCUENTO 16-01-2017

		echo json_encode($this->data);			
	}

	public function agregar_pag(){
		//header("Cache-Control: no-store, no-cache, must-revalidate");

		$test = $this->input->post('set_data');
		$decode = json_decode($test);

		foreach($decode as $dec){
			$this->data['id']		=	$dec->id;
			$this->data['qty']		=	$dec->qty;
			$this->data['price']	=	$dec->price;
			$this->data['name']		= 	url_title($dec->name,' ',FALSE);
			$this->data['options']	=	array(
				'mayoreo' 			=>		$dec->mayoreo,
				'distribuidor'		=>		$dec->distribuidor,
				'imagen'			=>		$dec->imagen
			);
			$result[] = $this->cart->insert($this->data);
			
		}
		//$c_content = $this->cart->contents();
		echo json_encode(array('entro'=>'si'));
	}

	public function agregar_s(){
		header("Cache-Control: no-store, no-cache, must-revalidate");

		$test = $this->input->post('set_data');
		$decode = json_decode($test);

		foreach($decode as $dec){
			$this->data['id']		=	$dec->id;
			$this->data['qty']		=	$dec->qty;
			$this->data['price']	=	$dec->price;
			$this->data['name']		= 	url_title($dec->name,' ',FALSE);
			$this->data['options']	=	array(
				'mayoreo' 			=>		$dec->mayoreo,
				'distribuidor'		=>		$dec->distribuidor,
				'imagen'			=>		$dec->imagen
			);
			$result[] = $this->cart->insert($this->data);
			
		}
		redirect('https://www.massivepc.com/mayoreo/home/v2015?rnd='.md5(time()).'&ver=carrito_detalles');
		//$c_content = $this->cart->contents();
		//echo json_encode($c_content);
	}
	
	public function g_agregar(){		
		$this->data['id']=$this->input->get('id');
		$this->data['qty']=$this->input->get('qty');
		$this->data['price']=$this->input->get('price');
		$this->data['name']= url_title($this->input->get('name'),' ',FALSE);
		$this->data['options']=array(
			'mayoreo' => $this->input->get('mayoreo'),
			'distribuidor' => $this->input->get('distribuidor'),
			'imagen' => $this->input->get('imagen')
		);
		$result = $this->cart->insert($this->data);
		redirect('http://www.massivepc.com/mayoreo/?rnd='.md5(time()).'&articulo=agregado#t_'.$this->data['id']);
	}
	
	public function editar(){
		//$this->load->library('cart');
		//$this->load->helper('text');
		
		$data = json_decode($this->input->post('data'));
		
		foreach($data as $d){
			$this->cart->update(array('rowid'=>$d->rowid,'qty'=>$d->qty));
		}
		echo json_encode(array('data'=>true));
	}
	
	public function total_items(){
		$result = $this->cart->total_items();
		echo json_encode($result);
	}
	
	public function contents(){
		$result = $this->cart->contents();
		echo json_encode($result);
	}
	
	

	public function editar_ajax(){

		if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		
		//$data = json_decode($this->input->post('data'));
		$rowid = $this->input->post('rowid');
		$qty   = $this->input->post('qty');
		
		//foreach($data as $d){
			$this->cart->update(array('rowid'=>$rowid,'qty'=>$qty));
		//}
		echo json_encode(array('data'=>'1'));
	}
	
	public function eliminar(){
		header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->data['rowid']	=$this->input->post('rowid');
		$this->data['qty']		='0';
		$result = $this->cart->update($this->data);
		echo json_encode($result);
	}

	public function delete_ajax(){
		header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->data['rowid']	=$this->input->post('rowid');
		$this->data['qty']		='0';
		$this->cart->update($this->data);

		$total_items = $this->cart->total_items();
		$total = $this->cart->total();

		$c_content = array( 'total_items' => $total_items, 'total' => $total );

		echo json_encode($c_content);
		//echo json_encode($result);
	}

	public function get_cookies_datos(){
		if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}
		
		$coo = get_cookie('masda_data_envio');
		echo $coo;
	}

	public function totales(){

		$total_items = $this->cart->total_items();
		$total = $this->cart->total();

		$c_content = array( 'total_items' => $total_items, 'total' => number_format($total) );

		echo json_encode($c_content);

	}
	
	public function g_eliminar(){
		$this->data['rowid']	=$this->input->get('rowid');
		$this->data['qty']		='0';
		$result = $this->cart->update($this->data);
		//echo json_encode($result);
		redirect('http://www.massivepc.com/mayoreo/?rnd='.md5(time()).'&articulo=eliminado');
	}
	
	public function total(){
		$result = $this->cart->total();
		/*$con_iva = $result + (16*($result/100));
		echo json_encode($con_iva+99);*/
		//
		//if($result >= 500){
			//echo json_encode($result);//Gratis día del niño
		//}else{
			echo json_encode($result+150);
		//}
	}

	public function destroy_cart(){
		$this->cart->destroy();
		echo json_encode(array('exito' => '1'));
	}

	public function get_tti(){

		if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}

		setlocale(LC_MONETARY, 'es_ES');
		
		$cart = $this->cart->contents();
		
		$p_precio       ='';
		$p_mayoreo      ='';
		$p_distribuidor ='';
		$p_caja ='';		
		/******************************/ //APLICAR PORCENTAJE DE DESCUENTO 16-01-2017
		$porc           = 0;
		$des_fin        = 0;
		/******************************/
		
		foreach($cart as $product1){
			$p_precio		+= $product1['price'] * $product1['qty'];
			$p_mayoreo		+= $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor	+= $product1['options']['distribuidor'] * $product1['qty'];
			$p_caja	+= $product1['options']['caja'] * $product1['qty'];			
		}
		 
		foreach($cart as $product){
			
			if($p_distribuidor > 4999)
			{
				$total       = $p_distribuidor;
			}else if($p_mayoreo > 2499){
				$total       = $p_mayoreo;
			}else{
				$total       = $p_precio;
			}
			
		}

		/******************************/ //APLICAR PORCENTAJE DE DESCUENTO 16-01-2017
		if($p_distribuidor > 50001){
			$porc = 5;
		}else if($p_distribuidor > 40001){
			$porc = 4;
		}else if($p_distribuidor > 30001){
			$porc = 3;
		}else if($p_distribuidor > 20001){
			$porc = 2;
		}else if($p_distribuidor > 10001){
			$porc = 1;
		}
		
		if($porc != 0){
			$desc         = $total * $porc;
			$desc         = $desc / 100;
			$imp_tot2     = $total - $desc;
			$imp_tot4     = $imp_tot2 * .16;
			$des_fin      = $desc;
			$cant_mas_iva = $imp_tot2 + $imp_tot4 ;
		}else{
			/*$imp_tot4   = $total * .16;
			$cant_mas_iva = $total + $imp_tot4 ;*/
			$imp_tot2     = $total;
		}
		/******************************/
			
		$this->data['porc']        = $porc;//APLICAR PORCENTAJE DE DESCUENTO 16-01-2017
		$this->data['total_items'] = $this->cart->total_items();
		//$this->data['total']     = number_format($total);
		$this->data['total']       = number_format($imp_tot2);//APLICAR PORCENTAJE DE DESCUENTO 16-01-2017

		echo json_encode($this->data);			
	}

	public function get_name_product(){
		$products_id = $this->input->get('id_product');
		$response    = $this->products_model->get_name_product($products_id);
		$r           = ucfirst(mb_strtolower($response->products_name));
		echo json_encode(array('products_name' => $r));
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */