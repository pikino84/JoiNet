<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pago extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pago_model');
		$this->load->library('cart');
	}

	public function index(){
		$this->load->view('pago');
	}
	
	public function ajax(){
		$this->load->view('pago_ajax');
	}

	public function ajax_paypal(){
		$this->load->model('varios_model');

		$this->data['estados'] = $this->varios_model->get_estados();

		$this->load->view('pago_ajax_paypal', $this->data);

	}

	public function metodo_ajax(){
		$this->load->model('varios_model');

		$this->data['estados'] = $this->varios_model->get_estados();

		$this->load->view('metodo_pago_ajax', $this->data);

	}


	public function s_e_p(){

		$this->load->library('encrypt');
		
		$p_status = $this->input->get('op');

		$p_status = $this->encrypt->decode($p_status);

		$id = $this->input->get('nc');

		if(!empty($p_status) and !empty($id)){

			if($p_status == 'cancel'){
				$status_w = 3;
				$this->data_r['estatus_return'] = 'Cancelado';
			}elseif($p_status == 'completado'){
				$status_w = 4;
				$this->data_r['estatus_return'] = 'Completado';
			}

			$id_w = $this->encrypt->decode($id,'@Lf42016_-');

			//echo $id_w.':--------';

			$this->pago_model->update_pedido_paypal($status_w,$id_w);

			$this->data_r['pedido'] = $this->pago_model->get_pedido_one_paypal(array('id'=>$id_w));

			echo json_encode($this->data_r);


		}
		
	}
	


	
	
	public function member($rnd=false){
		$email	=	$this->input->post('email'); 
		$pedido	=	$this->pago_model->get_pedido(array('email'=>$email));
		
		echo json_encode($pedido);
		
	}

	public function verificar(){

		if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}

		$this->load->model('products_model');

		setlocale(LC_MONETARY, 'es_ES');
		
		$this->data['nombre']          =$this->input->post('nombre');
		$this->data['email']           =$this->input->post('email');
		$this->data['telefono']        =$this->input->post('telefono');
		$this->data['direccion']       =$this->input->post('direccion');
		$this->data['colonia']         =$this->input->post('colonia');
		$this->data['cp']              =$this->input->post('cp');
		$this->data['poblacion']       =$this->input->post('poblacion');
		$this->data['estado']          =$this->input->post('estado');
		//$this->data['pais']            =$this->input->post('mex');
		$this->data['comentarios']     =$this->input->post('comentarios');
		$this->data['vendedor']        =$this->input->post('vendedor');
		
		$this->data['f_email']         =$this->input->post('f_email');
		$this->data['f_nombre']        =$this->input->post('f_nombre');
		$this->data['f_rfc']           =$this->input->post('f_rfc');
		$this->data['f_direccion']     =$this->input->post('f_direccion');
		$this->data['f_colonia']       =$this->input->post('f_colonia');
		$this->data['f_cp']            =$this->input->post('f_cp');
		$this->data['f_transferencia'] =$this->input->post('f_transferencia');
		$this->data['f_poblacion']     =$this->input->post('f_poblacion');
		$this->data['f_estado']        =$this->input->post('f_estado');
		$this->data['f_telefono']      =$this->input->post('f_telefono');

		$cookie = array(
			'name'   => 'data_envio',
			'value'  => json_encode($this->data),
			'expire' => 0,
			'prefix' => 'masda_'
		);

		set_cookie($cookie);

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
			$p_precio       += $product1['price'] * $product1['qty'];
			$p_mayoreo      += $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor += $product1['options']['distribuidor'] * $product1['qty'];
			$p_caja += $product1['options']['caja'] * $product1['qty'];
		}
		 
		$content  = '<table style="border:solid thin #ddd; width:100%;margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">';
			$content .= '<tr>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Código</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Imagen</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Producto</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Cantidad</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">P/U</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Subtotal</td>';
			$content .= '</tr>';
			
			foreach($cart as $product){
				
				if($p_precio > 4999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';

				}else if($p_precio > 2499){//p_mayoreo
					$p_final_u 	 = $product['options']['mayoreo'];
					$p_final_sub = $product['options']['mayoreo'] * $product['qty'];
					$total       = $p_mayoreo;
					$tipo		 = '2';
				}else{
					$p_final_u 	 = $product['price'];
					$p_final_sub = $product['price'] * $product['qty'];
					$total       = $p_precio;
					$tipo		 = '1';
				}
				
				$products_id = $product['id'];
				$response = $this->products_model->get_name_product($products_id);

				$content .= '<tr>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;"">'.$product['id'].'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;"><img width="80px" height="80px" class="img-thumbnail" src="/images/'.$product['options']['imagen'].'" style="max-width:none;"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:left;">'.ucfirst(mb_strtolower($response->products_name)).'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">'.$product['qty'].'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">$'.number_format($p_final_u).'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;">$'.number_format($p_final_sub).'</td>';
				$content .= '</tr>';
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
                if($p_caja>0)
                 $porc = 0;
			if($porc != 0){
				$desc         = $total * $porc;
				$desc         = $desc / 100;
				$imp_tot2     = $total - $desc;
			}else{
				$imp_tot2     = $total;
			}
			/******************************/
			
			if($porc != 0)
			{

				$content .= '<tr>';
					$content .= '<td colspan="4"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Porcentaje de descuento:</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>'.$porc.'</strong></td>';
				$content .= '</tr>';

				$content .= '<tr>';
					$content .= '<td colspan="4"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Subtotal con descuento:</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($imp_tot2).'</strong></td>';
				$content .= '</tr>';

			}
			
			$content .= '<tr>';
				//if($total >= 500){
					//$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>Gratis</strong></td>';//Envío gratis día del niño
				//}else{
//costo_envio					
					$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;">$185</td>';
				//}
			$content .= '</tr>';


			if($imp_tot2 == ''){
				$imp_tot2 = $total;
			}
			
			$content .= '<tr>';	
				$content .= '<td colspan="4"></td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">S.E.U.O. Total:</td>';
				//if($total >= 500){
					//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total).'</strong></td>';//Envío gratis día del niño
				//}else{
//costo_envio					
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($imp_tot2+185).'</strong></td>';
				//}
			$content .= '</tr>';
		$content .= '</table><br>';

		$this->data['p_descripcion'] = $content;
		
		echo json_encode($this->data);		
	}

	public function proc_transfer(){

		/*if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}*/

		$this->load->library('encrypt');
		$this->load->model('products_model');

		setlocale(LC_MONETARY, 'es_ES');

		$coo = get_cookie('masda_data_envio');
		$jdco = json_decode($coo);

		$this->data['metodo_pago']	=$this->input->post('metodo_pago');
		
		$this->data['nombre']          =$jdco->nombre;
		$this->data['email']           =$jdco->email;
		$this->data['telefono']        =$jdco->telefono;
		$this->data['direccion']       =$jdco->direccion;
		$this->data['colonia']         =$jdco->colonia;
		$this->data['cp']              =$jdco->cp;
		$this->data['poblacion']       =$jdco->poblacion;
		$this->data['estado']          =$jdco->estado;
		$this->data['vendedor']        =$jdco->vendedor;
		//$this->data['pais']          =$jdco->mex;
		$this->data['comentarios']     =$jdco->comentarios;
		
		$this->data['f_email']         =$jdco->f_email;
		$this->data['f_nombre']        =$jdco->f_nombre;
		$this->data['f_rfc']           =$jdco->f_rfc;
		$this->data['f_direccion']     =$jdco->f_direccion;
		$this->data['f_colonia']       =$jdco->f_colonia;
		$this->data['f_cp']            =$jdco->f_cp;
		$this->data['f_transferencia'] =$jdco->f_transferencia;
		$this->data['f_poblacion']     =$jdco->f_poblacion;
		$this->data['f_estado']        =$jdco->f_estado;
		$this->data['f_telefono']      =$jdco->f_telefono;

		$cart = $this->cart->contents();

		$p_precio       = '';
		$p_mayoreo      = '';
		$p_distribuidor = '';
		$p_caja = '';
		/******************************/ //APLICAR PORCENTAJE DE DESCUENTO 16-01-2017
		$porc           = 0;
		$des_fin        = 0;
		/******************************/
		
		foreach($cart as $product1){
			$p_precio       += $product1['price'] * $product1['qty'];
			$p_mayoreo      += $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor += $product1['options']['distribuidor'] * $product1['qty'];
			$p_caja += $product1['options']['caja'] * $product1['qty'];
		}
		 
		$content  = '<table style="border:solid thin #ddd; width:100%;margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">';
			$content .= '<tr>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Código</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Imagen</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Producto</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Cantidad</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">P/U</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Subtotal</td>';
			$content .= '</tr>';

			foreach($cart as $product){
				
				if($p_precio > 4999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 2499){//p_mayoreo
					$p_final_u 	 = $product['options']['mayoreo'];
					$p_final_sub = $product['options']['mayoreo'] * $product['qty'];
					$total       = $p_mayoreo;
					$tipo		 = '2';
				}else{
					$p_final_u 	 = $product['price'];
					$p_final_sub = $product['price'] * $product['qty'];
					$total       = $p_precio;
					$tipo		 = '1';
				}

				$products_id = $product['id'];
				$response    = $this->products_model->get_name_product($products_id);
				
				$content .= '<tr>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;"">'.$product['id'].'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;"><img width="80px" height="80px" class="img-thumbnail" src="https://www.massivepc.com/images/'.$product['options']['imagen'].'" style="max-width:none;"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:left;">'.ucfirst(mb_strtolower($response->products_name)).'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">'.$product['qty'].'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">$'.number_format($p_final_u).'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;">$'.number_format($p_final_sub).'</td>';
				$content .= '</tr>';
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
            if($p_caja>0)
                $porc = 0;
			if($porc != 0){
				$desc         = $total * $porc;
				$desc         = $desc / 100;
				$imp_tot2     = $total - $desc;
			}else{
				$imp_tot2     = $total;
			}
			/******************************/
			if($porc != 0)
			{

				$content .= '<tr>';
					$content .= '<td colspan="4"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Porcentaje de descuento:</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>'.$porc.'</strong></td>';
				$content .= '</tr>';

				$content .= '<tr>';
					$content .= '<td colspan="4"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Subtotal con descuento:</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($imp_tot2).'</strong></td>';
				$content .= '</tr>';

			}

			$content .= '<tr>';
				//if($total >= 500){
					//$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>Gratis</strong></td>';//Envío gratis día del niño
				//}else{
//costo_envio					
					$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;">$185</td>';
				//}
				
			$content .= '</tr>';
			$content .= '<tr>';
				$content .= '<td colspan="4"></td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">S.E.U.O. Total:</td>';
				//if($total >= 500){
					//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total).'</strong></td>';//Envío gratis día del niño
				//}else{
//costo_envio					
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($imp_tot2+185).'</strong></td>';
				//}				
			$content .= '</tr>';
		$content .= '</table><br>';
		
		
		$this->data['p_status']             ='2';//1=Pagado, 2=Proceso, 3=Cancelado
		$this->data['p_tipo']               =$tipo;//1=publico, 2=mayoreo, 3=distribuidor
		$this->data['p_descripcion']        =$content;
		$this->data['p_subtotal']           =$imp_tot2;
		$this->data['porcentaje_descuento'] =$porc;
		$this->data['importe_descuento']    =$imp_tot2;

		//if($total >= 500){
			//$this->data['p_envio']	=0;//Envío gratis día del niño
			//$this->data['p_total']	=$total;//Envío gratis día del niño
			//$footer_mail = '<strong>¡Envío Gratis! Hasta el 2 de Junio del 2016</strong><br><br>';
		//}else{
//costo_envio			
			$this->data['p_envio']	=185;
			$this->data['p_total']	=$imp_tot2+185;
			$footer_mail = '<strong>Nota: El envío ampara hasta 20kg por caja y se realiza por DHL, en caso de que su pedido exceda de este peso se cobraran $185 pesos adicionales por caja de hasta 20kg</strong><br><br>';
		//}

		$pedido_id	= $this->pago_model->set_pedido($this->data);

		/*********/
			//set_mayoreo_pedidos_productos
			foreach($cart as $product){

				if($p_precio > 4999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 2499){//p_mayoreo
					$p_final_u 	 = $product['options']['mayoreo'];
					$p_final_sub = $product['options']['mayoreo'] * $product['qty'];
					$total       = $p_mayoreo;
					$tipo		 = '2';
				}else{
					$p_final_u 	 = $product['price'];
					$p_final_sub = $product['price'] * $product['qty'];
					$total       = $p_precio;
					$tipo		 = '1';
				}

				$this->data_set_producto['fk_pedido']       = $pedido_id;
				$this->data_set_producto['id_producto']     = $product['id'];
				$this->data_set_producto['qty']             = $product['qty'];
				$this->data_set_producto['p_publico']       = $product['price'] / 1.16;
				$this->data_set_producto['p_p_iva']         = $product['price'] - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_mayoreo']       = $product['options']['mayoreo'] / 1.16;
				$this->data_set_producto['p_m_iva']         = $product['options']['mayoreo'] - $this->data_set_producto['p_mayoreo'];
				$this->data_set_producto['p_distribuidor']  = $product['options']['distribuidor'] / 1.16;
				$this->data_set_producto['p_d_iva']         = $product['options']['distribuidor'] - $this->data_set_producto['p_distribuidor'];
				$this->data_set_producto['total_sin_iva']   = $p_final_sub / 1.16;
				$this->data_set_producto['total_iva']       = $p_final_sub - $this->data_set_producto['total_sin_iva'];
				$this->data_set_producto['precio_aplicado'] = $tipo;
				$this->data_set_producto['fecha_insertado'] = date('Y-m-d H:i:s');

				$this->pago_model->set_mayoreo_pedidos_productos( $this->data_set_producto );

			}
				$this->data_set_producto['fk_pedido']       = $pedido_id;
				$this->data_set_producto['id_producto']     = '12906';
				$this->data_set_producto['qty']             = '1';
//costo_envio				
				$this->data_set_producto['p_publico']       = 185 / 1.16;
				$this->data_set_producto['p_p_iva']         = 185 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_mayoreo']       = 185 / 1.16;
				$this->data_set_producto['p_m_iva']         = 185 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_distribuidor']  = 185 / 1.16;
				$this->data_set_producto['p_d_iva']         = 185 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['total_sin_iva']   = 185 / 1.16;
				$this->data_set_producto['total_iva']       = 185 - $this->data_set_producto['total_sin_iva'];
				$this->data_set_producto['precio_aplicado'] = $tipo;
				$this->data_set_producto['fecha_insertado'] = date('Y-m-d H:i:s');
				$this->pago_model->set_mayoreo_pedidos_productos( $this->data_set_producto );
		/*********/
		
		$p_codigo = $this->encrypt->encode($pedido_id);
		
		$this->data_update['p_codigo']=md5($p_codigo);
		
		$this->pago_model->update_pedido($this->data_update, array('id'=>$pedido_id));
		
		if(!empty($this->data['f_nombre']) and !empty($this->data['f_rfc'])){
			$factura_datos='
				<div style="float:left; width:380px;">
				<strong>Datos de Facturación:</strong><br><br>
				<table style="border:solid thin #ddd; width:380px; margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">
					<tr><td style="padding:5px; border:solid thin #ddd;">Correo:	</td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_email'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Nombre:	</td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_nombre'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">RFC:	</td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_rfc'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Dirección: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_direccion'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Colonia: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_colonia'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Código Postal: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_cp'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">uso del CFDI que desea que aparezca en su factura y la forma de pago: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_transferencia'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Ciudad: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_poblacion'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Estado: </td><td style="padding:5px; border:solid thin #ddd;">	<strong>'.$this->data['f_estado'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Teléfono: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_telefono'].'</strong></td></tr>
				</table></div>';
		}else{
			$factura_datos='';
		}
		
			$arrVendedor=array();
//		    $arrVendedor[]='218-Berenice Parra';			
//		    $arrVendedor[]='200-Virginia Mora Mosqueda';	
			$arrVendedor[]='246-Miguel Marmolejo';
//			$arrVendedor[]='245-Emmanuel Bobadilla';
			$arrVendedor[]='177-Andrea Romero';
			$arrVendedor[]='28-Luis Meza';
		    $arrVendedor[]='151-Juan Pablo Daniel Garcia Mendez';			    
			$arrVendedor[]='79-David Valencia';
//			$arrVendedor[]='228-Efren Herrera';		
//			$arrVendedor[]='232-Carlos Torres';				
//			$arrVendedor[]='224-Daniel Sanchez';
//            $arrVendedor[]='225-Hernan Cortez';
			
//		    $arrVendedor[]='213-Denisse Mendivil Gaxiola';				
			$arrVendedor[]='26-Sergio Mendoza';		    
			$arrVendedor[]='87-Cuquis Zamora';		    
if($this->data['vendedor']!="Cualquier vendedor"){
    $vendedor=$this->data['vendedor'];
}else{//    $vendedor="Cualquier vendedor"
$aleatorio=rand(0, 5);
 $vendedor=$arrVendedor[$aleatorio];
}
$datosContacto="<hr><b>Datos Vendedor Asignado: </b><br>";
$frommail='ventas@massivepc.com';
			switch($vendedor)
			{
case '246-Miguel Marmolejo':
$frommail='ventas7@massivepc.com';
$datosContacto.="Correo: ".'ventas6@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'332043-2358';
$list = array('ventas7@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;					
case '245-Emmanuel Bobadilla':
$frommail='ventas6@massivepc.com';
$datosContacto.="Correo: ".'ventas6@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'332201-2834';
$list = array('ventas6@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;					
case '177-Andrea Romero':
$frommail='ventas5@massivepc.com';
$datosContacto.="Correo: ".'ventas5@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'331051-9340';
$list = array('ventas5@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;					
case '28-Luis Meza':
$frommail='luis.meza@massivepc.com';
$datosContacto.="Correo: ".'luis.meza@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'333158-9463';
$list = array('luis.meza@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;				    
						
case '232-Carlos Torres':
$frommail='ventas@massivepc.com';
$datosContacto.="Correo: ".'ventas@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'332201-2834';
$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');break;					
case '228-Efren Herrera':
$frommail='ventas6@massivepc.com';
$datosContacto.="Correo: ".'ventas6@massivepc.com<br>';    
//$datosContacto.="Cel/whatsapp: ".'331786-0862';
$list = array('ventas6@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;				    
				
case '225-Hernan Cortez':
$frommail='ventas5@massivepc.com';
$datosContacto.="Correo: ".'ventas5@massivepc.com<br>';    
$list = array('ventas5@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;

case '224-Daniel Sanchez':
$frommail='ventas6@massivepc.com';
$datosContacto.="Correo: ".'ventas6@massivepc.com<br>';    
//$datosContacto.="Cel/whatsapp: ".'331786-0862';
$list = array('ventas6@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;				    

case '218-Berenice Parra':
$frommail='ventas6@massivepc.com';
$datosContacto.="Correo: ".'berenice.parra@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'331786-0862';
$list = array('ventas6@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;	

case '200-Virginia Mora Mosqueda':
$frommail='ventas5@massivepc.com';
$datosContacto.="Correo: ".'virginiamora@massivepc.com<br>';    
$list = array('ventas5@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;	

case '151-Juan Pablo Daniel Garcia Mendez':
$frommail='ventas3@massivepc.com';    
$datosContacto.="Correo: ".'juanpablomendez@massivepc.com<br>';    
$list = array('ventas3@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;					    

case '213-Denisse Mendivil Gaxiola':
$frommail='ventas4@massivepc.com';        
$datosContacto.="Correo: ".'denissemendivil@massivepc.com<br>';
$datosContacto.="Cel/whatsapp: ".'332175-0706';
$list = array('ventas4@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;

case '26-Sergio Mendoza':
$frommail='sergio@massivepc.com';        
$datosContacto.="Correo: ".'sergio@massivepc.com<br>';
$list = array('sergio@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;

case '79-David Valencia':
$frommail='ventas2@massivepc.com';            
$datosContacto.="Correo: ".'david@massivepc.com<br>';
$list = array('ventas2@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;			 

case '87-Cuquis Zamora':
$frommail='cuquis@massivepc.com'; 
$datosContacto.="Correo: ".'cuquis@massivepc.com<br>';
$datosContacto.="Cel/whatsapp: ".'331318-6873';
$list = array('cuquis@massivepc.com','ventas@massivepc.com',  'eduardo@massivepc.com');
break;

case '10-Henry Borja':
$frommail='enrique.borja@massivepc.com'; 
$datosContacto.="Correo: ".'enrique.borja@massivepc.com<br>';    
$list = array('enrique.borja@massivepc.com', 'ventas@massivepc.com', 'eduardo@massivepc.com');
break;

				default:
					$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');
				break;
			}		



			
 $api="30W02RHHz008X7E5EnSDTV3xBZ";
 $merid="689062";
 $ref="Ped".$pedido_id;
//costo_envio 
 $amount=number_format(($imp_tot2+185)*1.04,2 ,".", "");
 $amountMP=number_format(($imp_tot2+185)*1.045,2 ,".", "");
 
 $currency="MXN";
 $accountId="691947";
$tax="0";
$taxb="0";
$pcorreo=$this->data['email'];
$descrip="Pedido ".$pedido_id;		
	//	
	$btnPagarMP="";
//if($pcorreo=="makedim@yahoo.com"){

require_once ('/home/massivep/www/mayoreo/ML/lib/mercadopago.php');
$mp = new MP ("2062037664686861", "HKU7lmubNXVka9ZkEDKxjaMR3ihLK82c");
$mp->sandbox_mode(FALSE);
$preference_data = array(
"items" => array(
array("title" => $descrip,"quantity" => 1,"currency_id" => "MXN","unit_price" => (double)$amountMP)
),"back_urls" => array("success" => "","failure" => "","pending" => "")
);
$preference = $mp->create_preference($preference_data);	

/*
$btnPagarMP = '<table border="1" align="center"><tr><td align="center">
<a style="background: #32b3ff;color: white;font-size: x-large;font-weight: bold;" href="'.$preference['response']['init_point'].'">PAGAR CON MERCADOPAGO</a> 
</td></tr>
</table>
';
*/
	
$btnPagarMP = '<table border="1" align="center"><tr><td align="center">
<a href="'.$preference['response']['init_point'].'">
<img src="https://www.massivepc.com/mayoreo/imgs/Banner_mercado_pago.jpg?fech=201811" alt="Pagar con mercadopago"/>
</a> 
</td></tr>
</table>
';

$btnPagarPayu = '<hr style="background:#ddd; height:1px; border:none;">
<table border="1" align="center"><tr><td align="center">
 Para proceder a pagar con PAYU dar click en el siguiente enlace: <form method="post" action="https://checkout.payulatam.com/ppp-web-gateway-payu/">
  <input name="merchantId"    type="hidden"  value="'.$merid.'"   >
  <input name="accountId"     type="hidden"  value="'.$accountId.'" >
  <input name="description"   type="hidden"  value="'.$descrip.'"  >
  <input name="referenceCode" type="hidden"  value="'.$ref.'" >
  <input name="amount"        type="hidden"  value="'.$amount.'"   >
  <input name="tax"           type="hidden"  value="'.$tax.'"  >
  <input name="taxReturnBase" type="hidden"  value="'.$taxb.'" >
  <input name="currency"      type="hidden"  value="'.$currency.'" >
  <input name="signature"     type="hidden"  value="'.md5($api."~".$merid."~".$ref."~".$amount."~".$currency).'">
  <input name="test"          type="hidden"  value="0" >
  <input name="buyerEmail"    type="hidden"  value="'.$pcorreo.'" >
  <input name="responseUrl"    type="hidden"  value="https://massivepc.com/respuesta.php" >
  <input name="confirmationUrl"    type="hidden"  value="" >
<input type="image" src="https://www.massivepc.com/mayoreo/imgs/Banner_pay_u.jpg?fech=2018" alt="Submit">  
    <input name="lng" type="hidden" value="es"/>
</form>	</td></tr><tr><td>
<span style="font-size:small;color:blue">
* Los pagos podran verse reflejados hasta 24 horas despues de haberse hecho el deposito (excepto transferencias).<br>
* Los recibos de pago expiran 48 horas despues de su expedicion.<br>
* Una vez seleccionado el tipo de pago no es posible cambiarlo
</span>
</td></tr>
</table>';

//}
$btnPagarMP = '';
$btnPagarPayu = '';	
		$contenido_mail='
			<a href="https://www.massivepc.com/mayoreo"><img src="https://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png"/></a><br><br>
			Estimado <strong>'.$this->data['nombre'].'</strong>, su pedido será procesado en cuanto nos confirme su pago enviando el comprobante escaneado o fotografiado a la siguiente dirección: 
<strong><a href="mailto:ventas@massivepc.com">ventas@massivepc.com</a></strong><br>
			<br><strong>No manejamos sistemas de apartado, por favor realice y confirme su pago lo antes posible.</strong>

			<hr style="background:#ddd; height:1px; border:none;">
			Nº Pedido: <strong>'.$pedido_id.'</strong><br>
			Vendedor:<strong>'.$vendedor.'</strong><br><br>
			<strong>Detalles del pedido:</strong><br>
			'.$content.'
			<br>

			<!--
			<div style="float:left; width:380px; margin-right:20px;">
			<strong>Vendedor:</strong><br><br>
			<table style="border:solid thin #ddd; width:380px; margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">
				<tr><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$vendedor.'</strong></td></tr>
			</table>
			</div>-->

			<div style="float:left; width:380px; margin-right:20px;">
			<strong>Datos de Envío:</strong><br><br>
			<table style="border:solid thin #ddd; width:380px; margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">
				<tr><td style="padding:5px; border:solid thin #ddd;">Nombre: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['nombre'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Correo: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['email'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Teléfono: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['telefono'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Dirección: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['direccion'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Colonia: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['colonia'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Código Postal: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['cp'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Ciudad: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['poblacion'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Estado: </td><td style="padding:5px; border:solid thin #ddd;">	<strong>'.$this->data['estado'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Comentarios: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['comentarios'].'</strong></td></tr>
			</table>
			</div>	
			
			'.$factura_datos.'
			<div style="clear:both;"></div>

			<br><br>
			<hr style="background:#ddd; height:1px; border:none;">
			<br>	
'.
$btnPagarPayu.'<hr>
'.$btnPagarMP.'<hr>			
			<br>

			<strong>CUENTAS BANCARIAS</strong><br><br>
			
			<strong>BANCOMER</strong><br>
			Cuenta: 0111395874<br>
			CLABE Interbancaria para transferencias: 0121-8000-1113-9587-49<br>
			A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV <br><br>

			<strong>SANTANDER</strong><br>
			Cuenta: 65-50656553-7<br>
			CLABE Interbancaria para transferencias: 0141-8065-5065-6553-79<br>
			A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV <br><br>

			
<p><b>Importante: Ningún pedido será surtido sin pago previo</b></p>
			<br><br>
			<div style="clear:both;"></div>
			'.$footer_mail.'
			<div style="clear:both;"></div>
			<br><br> <img src="http://www.massivepc.com/ci/assets/img/footer-correo-garantias.jpg" />'.$datosContacto;

			//¡Envío Gratis! Hasta el 30 de Abril del 2016
			//<strong>Nota: El envío ampara hasta 20kg por caja y se realiza por DHL, en caso de que su pedido exceda de este peso se cobraran $160 pesos adicionales por caja de hasta 20kg</strong><br><br>
		
			$this->load->library('email');
			
			$config['protocol']      = 'sendmail';
		
			/*
			$config['protocol']      = 'smtp';
		//	$config['smtp_host']     = 'smtp.gmail.com';
			$config['smtp_host']     = 'mail.massivepc.com';		
			$config['smtp_user']     = 'sistemas@massivepc.com';
			//$config['smtp_pass']     = '_-Pr0mS1st3m2017-_';
			$config['smtp_pass']     = 'S1st3m2015M4ssiv3_';
			$config['smtp_port']     = 587; //465;
			*/
			
			$config['mailtype']      = 'html';
			//$config['smtp_crypto']   = 'ssl';
			$config['email_newline'] = "\r\n";
			$config['email_crlf']    = "\r\n";
			
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			/*if($this->data['vendedor'] == '87-Cuquis Zamora'){
				$list = array('cuquis@massivepc.com', 'ventas@massivepc.com', 'eduardo@massivepc.com');
			}elseif($this->data['vendedor'] == '10-Henry Borja'){
				$list = array('enrique.borja@massivepc.com', 'ventas@massivepc.com', 'eduardo@massivepc.com','juan.cruz@massivepc.com');
			}else{
				$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');
			}
			

                                    write_r += '<option value="79-David Valencia">David Valencia</option>';
                                    write_r += '<option value="87-Cuquis Zamora">Cuquis Zamora</option>';
                                    
                                    write_r += '<option value="151-Juan Pablo García">Juan Pablo García</option>';			
                                    write_r += '<option value="26-Sergio Mendoza">Sergio Mendoza</option>';                                    
			*/

			
			//$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');
			
			$this->email->from($frommail, 'Massive PC');
			$this->email->to($this->data['email']);
			$this->email->bcc($list);
			
			$this->email->subject('Detalle de su pedido #'.$pedido_id.' - Transferencia - '.$vendedor);
			$this->email->message($contenido_mail);
			
			$this->email->send();
			
			$encrypted_pedido = $this->encrypt->encode($pedido_id,'@Lf42016_-');
			$completado       = $this->encrypt->encode('completado');
			$cancel           = $this->encrypt->encode('cancel');
			/*OFF*/
			$return_content   = $contenido_mail;
			echo json_encode(array('return_content' => $return_content));
			$this->cart->destroy();
			delete_cookie('masda_data_envio');
	}

	public function proc_paypal(){
		
		/*if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}*/

		$this->load->library('encrypt');
		$this->load->model('products_model');

		setlocale(LC_MONETARY, 'es_ES');

		$coo = get_cookie('masda_data_envio');
		$jdco = json_decode($coo);

		$this->data['metodo_pago']     =$this->input->post('metodo_pago');
		
		$this->data['nombre']          =$jdco->nombre;
		$this->data['email']           =$jdco->email;
		$this->data['telefono']        =$jdco->telefono;
		$this->data['direccion']       =$jdco->direccion;
		$this->data['colonia']         =$jdco->colonia;
		$this->data['cp']              =$jdco->cp;
		$this->data['poblacion']       =$jdco->poblacion;
		$this->data['estado']          =$jdco->estado;
		$this->data['vendedor']        =$jdco->vendedor;
		//$this->data['pais']          =$jdco->mex;
		$this->data['comentarios']     =$jdco->comentarios;
		
		$this->data['f_email']         =$jdco->f_email;
		$this->data['f_nombre']        =$jdco->f_nombre;
		$this->data['f_rfc']           =$jdco->f_rfc;
		$this->data['f_direccion']     =$jdco->f_direccion;
		$this->data['f_colonia']       =$jdco->f_colonia;
		$this->data['f_cp']            =$jdco->f_cp;
		$this->data['f_transferencia'] =$jdco->f_transferencia;
		$this->data['f_poblacion']     =$jdco->f_poblacion;
		$this->data['f_estado']        =$jdco->f_estado;
		$this->data['f_telefono']      =$jdco->f_telefono;


		
		$cart           = $this->cart->contents();
		
		$p_precio       ='';
		$p_mayoreo      ='';
		$p_distribuidor ='';
		/******************************/ //APLICAR PORCENTAJE DE DESCUENTO 16-01-2017
		$porc           = 0;
		$des_fin        = 0;
		/******************************/
		
		foreach($cart as $product1){
			$p_precio       += $product1['price'] * $product1['qty'];
			$p_mayoreo      += $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor += $product1['options']['distribuidor'] * $product1['qty'];
		}


		 
		$content  = '<table style="border:solid thin #ddd; width:100%;margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">';
			$content .= '<tr>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Código</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Imagen</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Producto</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Cantidad</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">P/U</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Subtotal</td>';
			$content .= '</tr>';

			foreach($cart as $product){
				
				if($p_distribuidor > 4999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 2499){//p_mayoreo
					$p_final_u 	 = $product['options']['mayoreo'];
					$p_final_sub = $product['options']['mayoreo'] * $product['qty'];
					$total       = $p_mayoreo;
					$tipo		 = '2';
				}else{
					$p_final_u 	 = $product['price'];
					$p_final_sub = $product['price'] * $product['qty'];
					$total       = $p_precio;
					$tipo		 = '1';
				}

				$products_id = $product['id'];
				$response = $this->products_model->get_name_product($products_id);
				
				$content .= '<tr>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;"">'.$product['id'].'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;"><img width="80px" height="80px" class="img-thumbnail" src="https://www.massivepc.com/images/'.$product['options']['imagen'].'" style="max-width:none;"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:left;">'.ucfirst(mb_strtolower($response->products_name)).'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">'.$product['qty'].'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">$'.number_format($p_final_u).'</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;">$'.number_format($p_final_sub).'</td>';
				$content .= '</tr>';
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
			}else{
				$imp_tot2     = $total;
			}
			/******************************/

			if($porc != 0)
			{

				$content .= '<tr>';
					$content .= '<td colspan="4"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Porcentaje de descuento:</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>'.$porc.'</strong></td>';
				$content .= '</tr>';

				$content .= '<tr>';
					$content .= '<td colspan="4"></td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Subtotal con descuento:</td>';
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($imp_tot2).'</strong></td>';
				$content .= '</tr>';

			}

			$content .= '<tr>';
				//if($total >= 500){
					//$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>Gratis</strong></td>';//Envío gratis día del niño
				//}else{
//costo_envio					
					$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;">$185</td>';
				//}
			$content .= '</tr>';
			$content .= '<tr>';
				$content .= '<td colspan="4"></td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">S.E.U.O. Total:</td>';
				//if($total >= 500){
					//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total).'</strong></td>';//Envío gratis día del niño
				//}else{
//costo_envio					
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($imp_tot2+185).'</strong></td>';
				//}
			$content .= '</tr>';
		$content .= '</table><br>';
		
		//echo 'Tipo='.$tipo;

		$this->data['p_status']             ='2';//1=Pagado, 2=Proceso, 3=Cancelado
		$this->data['p_tipo']               =$tipo;//1=publico, 2=mayoreo, 3=distribuidor
		$this->data['p_descripcion']        =$content;
		$this->data['p_subtotal']           =$imp_tot2;
		$this->data['porcentaje_descuento'] =$porc;
		$this->data['importe_descuento']    =$imp_tot2;

		//if($total >= 500){
			//$this->data['p_envio']	=0;//Envío gratis día del niño
			//$this->data['p_total']	=$total;//Envío gratis día del niño
			//$footer_mail = '<strong>¡Envío Gratis! Hasta el 02 de Junio del 2016</strong><br><br>';
		//}else{
//costo_envio			
			$this->data['p_envio']	=185;
			$this->data['p_total']	=$imp_tot2+185;
			$footer_mail = '<strong>Nota: El envío ampara hasta 20kg por caja y se realiza por DHL, en caso de que su pedido exceda de este peso se cobraran $185 pesos adicionales por caja de hasta 20kg</strong><br><br>';
		//}

		$pedido_id	= $this->pago_model->set_pedido($this->data);

		/*********/
			//set_mayoreo_pedidos_productos
			foreach($cart as $product){

				if($p_precio > 4999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 2499){//p_mayoreo
					$p_final_u 	 = $product['options']['mayoreo'];
					$p_final_sub = $product['options']['mayoreo'] * $product['qty'];
					$total       = $p_mayoreo;
					$tipo		 = '2';
				}else{
					$p_final_u 	 = $product['price'];
					$p_final_sub = $product['price'] * $product['qty'];
					$total       = $p_precio;
					$tipo		 = '1';
				}

				$this->data_set_producto['fk_pedido']       = $pedido_id;
				$this->data_set_producto['id_producto']     = $product['id'];
				$this->data_set_producto['qty']             = $product['qty'];
				$this->data_set_producto['p_publico']       = $product['price'] / 1.16;
				$this->data_set_producto['p_p_iva']         = $product['price'] - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_mayoreo']       = $product['options']['mayoreo'] / 1.16;
				$this->data_set_producto['p_m_iva']         = $product['options']['mayoreo'] - $this->data_set_producto['p_mayoreo'];
				$this->data_set_producto['p_distribuidor']  = $product['options']['distribuidor'] / 1.16;
				$this->data_set_producto['p_d_iva']         = $product['options']['distribuidor'] - $this->data_set_producto['p_distribuidor'];
				$this->data_set_producto['total_sin_iva']   = $p_final_sub / 1.16;
				$this->data_set_producto['total_iva']       = $p_final_sub - $this->data_set_producto['total_sin_iva'];
				$this->data_set_producto['precio_aplicado'] = $tipo;
				$this->data_set_producto['fecha_insertado'] = date('Y-m-d H:i:s');

				$this->pago_model->set_mayoreo_pedidos_productos( $this->data_set_producto );

			}
				$this->data_set_producto['fk_pedido']       = $pedido_id;
				$this->data_set_producto['id_producto']     = '12906';
				$this->data_set_producto['qty']             = '1';
//costo_envio				
				$this->data_set_producto['p_publico']       = 185 / 1.16;
				$this->data_set_producto['p_p_iva']         = 185 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_mayoreo']       = 185 / 1.16;
				$this->data_set_producto['p_m_iva']         = 185 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_distribuidor']  = 185 / 1.16;
				$this->data_set_producto['p_d_iva']         = 185 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['total_sin_iva']   = 185 / 1.16;
				$this->data_set_producto['total_iva']       = 185 - $this->data_set_producto['total_sin_iva'];
				$this->data_set_producto['precio_aplicado'] = $tipo;
				$this->data_set_producto['fecha_insertado'] = date('Y-m-d H:i:s');
				$this->pago_model->set_mayoreo_pedidos_productos( $this->data_set_producto );
		/*********/
		
		$p_codigo   = $this->encrypt->encode($pedido_id);
		
		$this->data_update['p_codigo']=md5($p_codigo);
		
		$this->pago_model->update_pedido($this->data_update, array('id'=>$pedido_id));
		
			$arrVendedor=array();
//		    $arrVendedor[]='218-Berenice Parra';				
//		    $arrVendedor[]='200-Virginia Mora Mosqueda';	
$arrVendedor[]='246-Miguel Marmolejo';
//$arrVendedor[]='245-Emmanuel Bobadilla';
$arrVendedor[]='177-Andrea Romero';
$arrVendedor[]='28-Luis Meza';
		    $arrVendedor[]='151-Juan Pablo Daniel Garcia Mendez';			    
			$arrVendedor[]='79-David Valencia';
//			$arrVendedor[]='228-Efren Herrera';			
//			$arrVendedor[]='232-Carlos Torres';				
//			$arrVendedor[]='224-Daniel Sanchez';
//			$arrVendedor[]='225-Hernan Cortez';
			
//		    $arrVendedor[]='213-Denisse Mendivil Gaxiola';				
			$arrVendedor[]='26-Sergio Mendoza';
			$arrVendedor[]='87-Cuquis Zamora';		    
if($this->data['vendedor']!="Cualquier vendedor"){
    $vendedor=$this->data['vendedor'];
}else{//    $vendedor="Cualquier vendedor"
$aleatorio=rand(0, 5);
 $vendedor=$arrVendedor[$aleatorio];
}
$datosContacto="<hr><b>Datos Vendedor Asignado: </b><br>";
$frommail='ventas@massivepc.com';
			switch($vendedor)
			{
case '246-Miguel Marmolejo':
$frommail='ventas7@massivepc.com';
$datosContacto.="Correo: ".'ventas6@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'332043-2358';
$list = array('ventas7@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;		

case '245-Emmanuel Bobadilla':
$frommail='ventas6@massivepc.com';
$datosContacto.="Correo: ".'ventas6@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'332201-2834';
$list = array('ventas6@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;				
case '177-Andrea Romero':
$frommail='ventas5@massivepc.com';
$datosContacto.="Correo: ".'ventas5@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'331051-9340';
$list = array('ventas5@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;				
case '28-Luis Meza':
$frommail='luis.meza@massivepc.com';
$datosContacto.="Correo: ".'luis.meza@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'333158-9463';
$list = array('luis.meza@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;						
case '232-Carlos Torres':
$frommail='ventas@massivepc.com';
$datosContacto.="Correo: ".'ventas@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'332201-2834';
$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');break;					
case '228-Efren Herrera':
$frommail='ventas6@massivepc.com';
$datosContacto.="Correo: ".'ventas6@massivepc.com<br>';    
//$datosContacto.="Cel/whatsapp: ".'331786-0862';
$list = array('ventas6@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;	
				
				
case '225-Hernan Cortez':
$frommail='ventas5@massivepc.com';
$datosContacto.="Correo: ".'ventas5@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'333191-0700';
$list = array('ventas5@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;			    
case '224-Daniel Sanchez':
$frommail='ventas6@massivepc.com';
$datosContacto.="Correo: ".'ventas6@massivepc.com<br>';    
//$datosContacto.="Cel/whatsapp: ".'331786-0862';
$list = array('ventas6@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;				    
			    
case '218-Berenice Parra':
$frommail='ventas6@massivepc.com';
$datosContacto.="Correo: ".'berenice.parra@massivepc.com<br>';    
$datosContacto.="Cel/whatsapp: ".'331786-0862';

$list = array('ventas6@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;				    
case '200-Virginia Mora Mosqueda':
$frommail='ventas5@massivepc.com';    
$datosContacto.="Correo: ".'virginiamora@massivepc.com<br>';    
$list = array('ventas5@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;	

case '151-Juan Pablo Daniel Garcia Mendez':
$frommail='ventas3@massivepc.com';    
$datosContacto.="Correo: ".'juanpablomendez@massivepc.com<br>';    
$list = array('ventas3@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;					    

case '213-Denisse Mendivil Gaxiola':
$frommail='ventas4@massivepc.com';    
$datosContacto.="Correo: ".'denissemendivil@massivepc.com<br>';
$datosContacto.="Cel/whatsapp: ".'332175-0706';
$list = array('ventas4@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;

case '26-Sergio Mendoza':
$frommail='sergio@massivepc.com';    
$datosContacto.="Correo: ".'sergio@massivepc.com<br>';
$list = array('sergio@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;

case '79-David Valencia':
$frommail='ventas2@massivepc.com';    
$datosContacto.="Correo: ".'david@massivepc.com<br>';
$list = array('ventas2@massivepc.com','ventas@massivepc.com', 'eduardo@massivepc.com');break;			 

case '87-Cuquis Zamora':
$datosContacto.="Correo: ".'cuquis@massivepc.com<br>';
$list = array('cuquis@massivepc.com','ventas@massivepc.com',  'eduardo@massivepc.com');
break;

case '10-Henry Borja':
$datosContacto.="Correo: ".'enrique.borja@massivepc.com<br>';    
$list = array('enrique.borja@massivepc.com', 'ventas@massivepc.com', 'eduardo@massivepc.com');
break;

				default:
					$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');
				break;
			}	
		
		
		if(!empty($this->data['f_nombre']) and !empty($this->data['f_rfc'])){
			$factura_datos='
				<div style="float:left; width:380px;">
				<strong>Datos de Facturación:</strong><br><br>
				<table style="border:solid thin #ddd; width:380px; margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">
					<tr><td style="padding:5px; border:solid thin #ddd;">Correo:	</td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_email'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Nombre:	</td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_nombre'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">RFC:	</td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_rfc'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Dirección: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_direccion'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Colonia: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_colonia'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Código Postal: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_cp'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">uso del CFDI que desea que aparezca en su factura y la forma de pago: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_transferencia'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Ciudad: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_poblacion'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Estado: </td><td style="padding:5px; border:solid thin #ddd;">	<strong>'.$this->data['f_estado'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Teléfono: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_telefono'].'</strong></td></tr>
				</table></div>';
		}else{
			$factura_datos='';
		}
		
		
		
		
		$contenido_mail='
			<a href="https://www.massivepc.com/mayoreo"><img src="https://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png"/></a><br><br>
			Estimado <strong>'.$this->data['nombre'].'</strong>, en cuanto recibamos la confirmación de <b>PayPal</b> su pedido será procesado.
			
			<br><br>
			<hr style="background:#ddd; height:1px; border:none;">
			<br><br>

			Nº Pedido: <strong>'.$pedido_id.'</strong><br><br><br>
			Vendedor:<strong>'.$vendedor.'</strong><br><br><br>
			<strong>Detalles del pedido:</strong><br><br><br>
			'.$content.'
			<br><br>
<!--
			<div style="float:left; width:380px; margin-right:20px;">
			<strong>Vendedor:</strong><br><br>
			<table style="border:solid thin #ddd; width:380px; margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">
				<tr><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$vendedor.'</strong></td></tr>
			</table>
			</div>-->

			<div style="float:left; width:380px; margin-right:20px;">
			<strong>Datos de Envío:</strong><br><br>
			<table style="border:solid thin #ddd; width:380px; margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">
				<tr><td style="padding:5px; border:solid thin #ddd;">Nombre:	</td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['nombre'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Correo: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['email'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Teléfono: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['telefono'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Dirección: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['direccion'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Colonia: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['colonia'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Código Postal: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['cp'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Ciudad: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['poblacion'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Estado: </td><td style="padding:5px; border:solid thin #ddd;">	<strong>'.$this->data['estado'].'</strong></td></tr>
				<tr><td style="padding:5px; border:solid thin #ddd;">Comentarios:	</td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['comentarios'].'</strong></td></tr>
			</table>
			</div>	
			
			'.$factura_datos.'
			<div style="clear:both;"></div>

			<br><br>
			<hr style="background:#ddd; height:1px; border:none;">
			<br><br>

			<strong>CUENTAS BANCARIAS</strong><br><br>
	
			<strong>BANCOMER</strong><br>
			Cuenta: 0111395874<br>
			CLABE Interbancaria para transferencias: 0121-8000-1113-9587-49<br>
			A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV<br><br>

			<strong>SANTANDER</strong><br>
			Cuenta: 65-50656553-7<br>
			CLABE Interbancaria para transferencias: 0141-8065-5065-6553-79<br>
			A nombre de: URQUIZA Y GARCIA LOGISTICA SA DE CV<br><br>

		
<p><b>Importante: Ningún pedido será surtido sin pago previo</b></p>
			<br><br>
			<div style="clear:both;"></div>
			'.$footer_mail.'
			<div style="clear:both;"></div>
			<br><br> <img src="http://www.massivepc.com/ci/assets/img/footer-correo-garantias.jpg" />'.$datosContacto;

			//¡Envío Gratis! Hasta el 30 de Abril del 2016
			//<strong>Nota: El envío ampara hasta 20kg por caja y se realiza por DHL, en caso de que su pedido exceda de este peso se cobraran $160 pesos adicionales por caja de hasta 20kg</strong><br><br>
		
			$this->load->library('email');
			
			$config['protocol']      = 'sendmail';		
/*			
			$config['protocol']      = 'smtp';
		//	$config['smtp_host']     = 'smtp.gmail.com';
			$config['smtp_host']     = 'mail.massivepc.com';		
			$config['smtp_user']     = 'sistemas@massivepc.com';
			//$config['smtp_pass']     = '_-Pr0mS1st3m2017-_';
			$config['smtp_pass']     = 'S1st3m2015M4ssiv3_';
			$config['smtp_port']     = 587; //465;
			*/
			$config['mailtype']      = 'html';
//			$config['smtp_crypto']   = 'ssl';
			$config['email_newline'] = "\r\n";
			$config['email_crlf']    = "\r\n";
			
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			
			//$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');

			/*if($this->data['vendedor'] == '87-Cuquis Zamora'){
				$list = array('cuquis@massivepc.com', 'ventas@massivepc.com', 'eduardo@massivepc.com');
			}elseif($this->data['vendedor'] == '10-Henry Borja'){
				$list = array('enrique.borja@massivepc.com', 'ventas@massivepc.com', 'eduardo@massivepc.com','juan.cruz@massivepc.com');
			}else{
				$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');
			}*/

			
			$this->email->from($frommail, 'Massive PC');
			$this->email->to($this->data['email']);
			$this->email->bcc($list);
			
			$this->email->subject('Detalle de su pedido #'.$pedido_id.' - PayPal - '.$vendedor);
			$this->email->message($contenido_mail);
			
			$this->email->send();

			$aumento          = 5 * $this->data['p_total'] / 100;
			$total_aumento    = $this->data['p_total'] + $aumento;
			
			$encrypted_pedido = $this->encrypt->encode($pedido_id,'@Lf42016_-');
			$completado       = $this->encrypt->encode('completado');
			$cancel           = $this->encrypt->encode('cancel');
		/*OFF*/
$return_content = '<script src="https://code.jquery.com/jquery-1.11.3.js"></script><form id="send_paypal_info" method="post" action="https://www.paypal.com/cgi-bin/webscr"><input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="cobrospaypal@massivepc.com"><input type="hidden" id="item_name" name="item_name" value="Pedido:'.$pedido_id.'"><input type="hidden" name="item_number" value="1"><input type="hidden" id="amount" name="amount" value="'.$total_aumento.'"><input type="hidden" name="no_shipping" value="1"><input type="hidden" id="return" name="return" value="https://www.massivepc.com/mayoreo/#'.$completado.'-'.$encrypted_pedido.'"><input type="hidden" name="cancel_return" value="https://www.massivepc.com/mayoreo/#'.$cancel.'-'.$encrypted_pedido.'"><input type="hidden" name="currency_code" value="MXN"></form><script>$(function(){$(\'#send_paypal_info\').trigger(\'submit\');});</script>';
			echo json_encode(array('return_content' => $return_content));
			$this->cart->destroy();
			delete_cookie('masda_data_envio');
	}

	public function clear_cart(){
		$this->cart->destroy();
		echo json_encode(array('clear'=>'1'));
	}

	public function get_pedido($pedido_id){
		$pedido = $this->pago_model->get_pedido_one(array('id' => $pedido_id));
		
	}
	
}

/* End of file pago.php */
/* Location: ./application/controllers/pago.php */