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
			//$t = base64_decode($dec->name);
			$this->data['id']		=	$dec->id;
			$this->data['qty']		=	$dec->qty;
			$this->data['price']	=	$dec->price;
			//$this->data['name']		= 	url_title($dec->name,' ',FALSE);
			$this->data['name']		= 	'product'.uniqid();
			//$this->data['name']		= 	htmlentities($t);
			$this->data['options']	=	array(
				'mayoreo' 			=>		$dec->mayoreo,
				'distribuidor'		=>		$dec->distribuidor,
				'imagen'			=>		$dec->imagen,
				'exist'				=>		$dec->exist
			);
			$result[] = $this->cart->insert($this->data);
			
		}
		//$c_content = $this->cart->contents();
		/*$total_items = $this->cart->total_items();
		$total = $this->cart->total();

		$c_content = array( 'total_items' => $total_items, 'total' => $total );*/

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
		$qty = $this->input->post('qty');
		
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
		//	echo json_encode($result);
		//}else{
			echo json_encode($result+120);//Gratis día del niño
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
		
		$p_precio ='';
		$p_mayoreo ='';
		$p_distribuidor ='';
		
		foreach($cart as $product1){
			$p_precio		+= $product1['price'] * $product1['qty'];
			$p_mayoreo		+= $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor	+= $product1['options']['distribuidor'] * $product1['qty'];
		}
		 
		foreach($cart as $product){
			
			if($p_distribuidor > 9999){
				$total       = $p_distribuidor;
			}else if($p_mayoreo > 4999){
				$total       = $p_mayoreo;
			}else{
				$total       = $p_precio;
			}
			
		}
			
		$this->data['total_items']	= $this->cart->total_items();
		$this->data['total']	=number_format($total);

		echo json_encode($this->data);			
	}

	public function get_name_product(){
		$products_id = $this->input->get('id_product');
		$response = $this->products_model->get_name_product($products_id);
		$r=ucfirst(mb_strtolower($response->products_name));
		echo json_encode(array('products_name' => $r));
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */