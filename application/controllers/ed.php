<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ed extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}

	public function producto($type, $id_producto){

		$this->load->model('products_model');

		$this->data['type']        = $type;
		
		$this->data['id_producto'] = $id_producto;

		$product = $this->products_model->get_product(array('products_id' => $this->data['id_producto']));

		switch($type){
			case 'pu':
				$this->data['precio'] = $product->products_price + (16*($product->products_price/100));
			break;
			case 'ma':
				$this->data['precio'] = $product->precio_mayoreo;
			break;
			case 'di':
				$this->data['precio'] = $product->precio_distribuidor;
			break;
		}
		$this->load->view('ed', $this->data);
	}

	public function pr_2($id_producto){
		//ini_set('error_reporting', E_ALL);
		$this->load->model('products_model');
		$this->data['id_producto']       = $id_producto;
		$product                         = $this->products_model->get_product_2($id_producto);
		$this->data['products_name']     = $product->products_name;
		$this->data['precio_pu']         = $product->products_price + (16*($product->products_price/100));
		$this->data['precio_ma']         = $product->precio_mayoreo;
		$this->data['precio_di']         = $product->precio_distribuidor;
		$this->data['precio_4']          = $product->precio_4;
		$this->data['precio_5']          = $product->precio_5;
		$this->data['precio_6']          = $product->precio_6;
		$this->data['costo_usd']         = $product->costo_usd;
		$this->data['id_video_youtube']  = $product->id_video_youtube;
		$this->data['remate']            = $product->remate;
		$this->data['nuevo']             = $product->nuevo;
		$this->data['stock_min']             = $product->stock_min;
		$this->data['stock_max']             = $product->stock_max;
		$this->data['proveedor']         = $product->proveedor;
		$this->data['proveedor1']        = $product->proveedor1;
		$this->data['proveedor2']        = $product->proveedor2;
		$this->data['proveedor3']        = $product->proveedor3;
		$this->data['numero_cajas']      = $product->numero_cajas;
		$this->data['productos_cajas']   = $product->productos_cajas;
		$this->data['precio_x_producto'] = $product->precio_x_producto;
		$this->data['fk_categoria']      = $product->fk_categoria;
		$this->data['oferta']            = $product->oferta;
		$this->data['costo']             = $product->costo;
		$this->data['costo_nacional']    = $product->costo_nacional;
		$this->data['costo_nacional1']   = $product->costo_nacional1;
		$this->data['costo_nacional2']   = $product->costo_nacional2;
		$this->data['costo_nacional3']   = $product->costo_nacional3;
		$this->data['manufacturers_id']  = $product->manufacturers_id;
		$this->data['fabricantes']       = $this->products_model->get_marcas();
		$this->data['categorias']        = $this->products_model->get_categories_all();
		$this->load->view('pr_2', $this->data);
	}

	public function producto_2($id_producto){
		//ini_set('error_reporting', E_ALL);
		$this->load->model('products_model');
		$this->data['id_producto']       = $id_producto;
		$product                         = $this->products_model->get_product_2($id_producto);
		$this->data['products_name']     = $product->products_name;
		$this->data['precio_pu']         = $product->products_price + (16*($product->products_price/100));
		$this->data['precio_ma']         = $product->precio_mayoreo;
		$this->data['precio_di']         = $product->precio_distribuidor;
		$this->data['precio_4']          = $product->precio_4;
		$this->data['precio_5']          = $product->precio_5;
		$this->data['precio_6']          = $product->precio_6;
		$this->data['costo_usd']         = $product->costo_usd;
		$this->data['id_video_youtube']  = $product->id_video_youtube;
		$this->data['remate']            = $product->remate;
		$this->data['nuevo']             = $product->nuevo;
		$this->data['proveedor']         = $product->proveedor;
		$this->data['proveedor1']        = $product->proveedor1;
		$this->data['proveedor2']        = $product->proveedor2;
		$this->data['proveedor3']        = $product->proveedor3;
		$this->data['numero_cajas']      = $product->numero_cajas;
		$this->data['productos_cajas']   = $product->productos_cajas;
		$this->data['precio_x_producto'] = $product->precio_x_producto;
		$this->data['fk_categoria']      = $product->fk_categoria;
		$this->data['oferta']            = $product->oferta;
		$this->data['costo']             = $product->costo;
		$this->data['stock_min']             = $product->stock_min;
		$this->data['stock_max']             = $product->stock_max;
		$this->data['costo_nacional']    = $product->costo_nacional;
		$this->data['costo_nacional1']   = $product->costo_nacional1;
		$this->data['costo_nacional2']   = $product->costo_nacional2;
		$this->data['costo_nacional3']   = $product->costo_nacional3;
		$this->data['manufacturers_id']  = $product->manufacturers_id;
		$this->data['fabricantes']       = $this->products_model->get_marcas();
		$this->data['categorias']        = $this->products_model->get_categories_all();
		$this->load->view('pr_2', $this->data);//ed_2
	}

	public function actualizar_2(){
		$this->load->model('products_model');
		$id_producto = $this->input->post('id_producto');
		$type        = $this->input->post('type');
		//$this->data['products_price'] = $this->input->post('precio');

		$this->data['products_name']    = $this->input->post('products_name');
		$this->data['precio_pu']        = $this->input->post('precio_pu');
		$this->data['precio_ma']        = $this->input->post('precio_ma');
		$this->data['precio_di']        = $this->input->post('precio_di');
		$this->data['precio_4']         = $this->input->post('precio_4');
		$this->data['precio_5']         = $this->input->post('precio_5');
		$this->data['precio_6']         = $this->input->post('precio_6');
		$this->data['costo_usd']        = $this->input->post('costo_usd');
		$this->data['id_video_youtube'] = $this->input->post('id_video_youtube');
		$this->data['remate']           = $this->input->post('remate');
		$this->data['nuevo']            = $this->input->post('nuevo');
		$this->data['proveedor']        = $this->input->post('proveedor');
		$this->data['proveedor1']       = $this->input->post('proveedor1');
		$this->data['proveedor2']       = $this->input->post('proveedor2');
		$this->data['proveedor3']       = $this->input->post('proveedor3');
		$this->data['numero_cajas']     = $this->input->post('numero_cajas');
		$this->data['productos_cajas']  = $this->input->post('productos_cajas');
		$this->data['precio_x_producto']  = $this->input->post('precio_x_producto');
		$this->data['fk_categoria']     = $this->input->post('fk_categoria');
		
		$this->data['oferta']           = $this->input->post('oferta');
		$this->data['manufacturers_id'] = $this->input->post('manufacturers_id');
		
		$this->data['costo']            = $this->input->post('costo');
		$this->data['costo_nacional']   = $this->input->post('costo_nacional');
		$this->data['costo_nacional1']   = $this->input->post('costo_nacional1');
		$this->data['costo_nacional2']   = $this->input->post('costo_nacional2');
		$this->data['costo_nacional3']   = $this->input->post('costo_nacional3');

		$this->data['stock_min']   = $this->input->post('stock_min');
		$this->data['stock_max']   = $this->input->post('stock_max');

		$this->products_model->update_products_desc($id_producto, array(
			'products_name'	=>	$this->data['products_name']
			
		));

		$operacion = $this->data['precio_pu'] / 1.16;
		$this->products_model->update_precio_pu($id_producto, array(
			'products_price'   =>   $operacion,
			'costo_usd'        =>	$this->data['costo_usd'],
			'costo'            =>	$this->data['costo'],
			'costo_nacional'   =>	$this->data['costo_nacional'],
			'costo_nacional1'  =>	$this->data['costo_nacional1'],
			'costo_nacional2'  =>	$this->data['costo_nacional2'],
			'costo_nacional3'  =>	$this->data['costo_nacional3'],
			'id_video_youtube' =>   $this->data['id_video_youtube'],
			'remate'           =>   $this->data['remate'],
			'nuevo'            =>   $this->data['nuevo'],
			'proveedor'        =>   $this->data['proveedor'],
			'proveedor1'       =>   $this->data['proveedor1'],
			'proveedor2'       =>   $this->data['proveedor2'],
			'proveedor3'       =>   $this->data['proveedor3'],
			'numero_cajas'     =>   $this->data['numero_cajas'],
			'productos_cajas' =>   $this->data['productos_cajas'],
			
			'stock_min'       =>   $this->data['stock_min'],
			'stock_max'       =>   $this->data['stock_max'],

			'oferta'           =>   $this->data['oferta'],
			'manufacturers_id' =>   $this->data['manufacturers_id']
			));
			
			$this->products_model->update_precio_ma($id_producto, array(
				'precio_mayoreo'      => $this->data['precio_ma'],
				'precio_distribuidor' => $this->data['precio_di'],
				'precio_4'            => $this->data['precio_4'],
				'precio_5'            => $this->data['precio_5'],
				'precio_6'            => $this->data['precio_6'],
				'fk_categoria'        => $this->data['fk_categoria'],
				'precio_x_producto'  =>   $this->data['precio_x_producto']
			));

		$this->products_model->insert_log_productos(
													array(
															'fk_usuario'		=> '3' ,
															'acl'				=> '1',
															'fk_product'		=> $id_producto ,
															'accion'			=> '2' ,
															'fecha_modificacion'=> date('Y-m-d H:i:s')
														)
												);

		//$log_precios = $this->products_model->get_log_precios_one(array('fk_product'=>$id_producto));

		//echo ''.var_dump($log_precios);

		/*if(isset($log_precios[0]->publico)){
				if($log_precios[0]->publico != $this->input->post('products_price')){
					$this->products_model->insert_log_precios(
													array(
															'fk_usuario'         => '3' ,
															'acl'                => '1' ,
															'fk_product'         => $id_producto ,
															'publico'            => $this->data['precio_pu'],
															'mayoreo'            => $this->data['precio_ma'] ,
															'distribuidor'       => $this->data['precio_di'] ,
															'fecha_modificacion' => date('Y-m-d H:i:s')
														)
													);
				}else{*/
					$this->products_model->insert_log_precios(
													array(
															'fk_usuario'         => '3' ,
															'acl'                => '1' ,
															'fk_product'         => $id_producto ,
															'publico'            => $this->data['precio_pu'],
															'mayoreo'            => $this->data['precio_ma'] ,
															'distribuidor'       => $this->data['precio_di'] ,
															'fecha_modificacion' => date('Y-m-d H:i:s')
														)
													);
				/*}
			}*/

		echo '<script>
		/*alert("Producto actualizado");*/
		/*location.href = \'https://www.massivepc.com/mayoreo/ed/producto_2/'.$id_producto.'\';*/
		window.close();
		</script>';
		
	}

	public function actualizar(){
		$this->load->model('products_model');
		$id_producto = $this->input->post('id_producto');
		$type        = $this->input->post('type');
		$this->data['products_price'] = $this->input->post('precio');

		$this->products_model->insert_log_productos(
													array(
															'fk_usuario'		=> '3' ,
															'acl'				=> '1',
															'fk_product'		=> $id_producto ,
															'accion'			=> '2' ,
															'fecha_modificacion'=> date('Y-m-d H:i:s')
														)
												);

		switch($type){

			case 'pu':
				$operacion = $this->data['products_price'] / 1.16;
				$this->products_model->update_precio_pu($id_producto, array('products_price'=>$operacion));
				$this->products_model->insert_log_precios(
													array(
															'fk_usuario'         => '3' ,
															'acl'                => '1' ,
															'fk_product'         => $id_producto ,
															'publico'            => $this->data['products_price'],
															'mayoreo'            => '' ,
															'distribuidor'       => '' ,
															'fecha_modificacion' => date('Y-m-d H:i:s')
														)
													);
			break;

			case 'ma':
				$this->products_model->update_precio_ma($id_producto, array('precio_mayoreo'=>$this->data['products_price']));
				$this->products_model->insert_log_precios(
													array(
															'fk_usuario'         => '3' ,
															'acl'                => '1' ,
															'fk_product'         => $id_producto ,
															'publico'            => '',
															'mayoreo'            => $this->data['products_price'] ,
															'distribuidor'       => '' ,
															'fecha_modificacion' => date('Y-m-d H:i:s')
														)
													);
			break;

			case 'di':
				$this->products_model->update_precio_ma($id_producto, array('precio_distribuidor'=>$this->data['products_price']));
				$this->products_model->insert_log_precios(
													array(
															'fk_usuario'         => '3' ,
															'acl'                => '1' ,
															'fk_product'         => $id_producto ,
															'publico'            => '',
															'mayoreo'            => '' ,
															'distribuidor'       => $this->data['products_price'] ,
															'fecha_modificacion' => date('Y-m-d H:i:s')
														)
													);
			break;

			case 't50':
				$this->products_model->update_precio_ma($id_producto, array('precio_4'=>$this->data['products_price']));
			break;

			case 't100':
				$this->products_model->update_precio_ma($id_producto, array('precio_5'=>$this->data['products_price']));
			break;

			case 't1000':
				$this->products_model->update_precio_ma($id_producto, array('precio_6'=>$this->data['products_price']));
			break;

		}

		


		echo '
			<script>
			/*window.opener.location = \'https://www.massivepc.com/mayoreo/home/compras/dc483e80a7a0bd9ef71d8cf973673924?rnd='.md5(time()).'#t_'.$id_producto.'\';*/
			window.close();
			</script>
		';
		
	}



}






















/* End of file ed.php */
/* Location: ./application/controllers/ed.php */