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
		
		$this->data['nombre']		=$this->input->post('nombre');
		$this->data['email']		=$this->input->post('email');
		$this->data['telefono']		=$this->input->post('telefono');
		$this->data['direccion']	=$this->input->post('direccion');
		$this->data['colonia']		=$this->input->post('colonia');
		$this->data['cp']			=$this->input->post('cp');
		$this->data['poblacion']	=$this->input->post('poblacion');
		$this->data['estado']		=$this->input->post('estado');
		$this->data['pais']			=$this->input->post('mex');
		$this->data['comentarios']  =$this->input->post('comentarios');
		
		$this->data['f_email']		=$this->input->post('f_email');
		$this->data['f_nombre']		=$this->input->post('f_nombre');
		$this->data['f_rfc']		=$this->input->post('f_rfc');
		$this->data['f_direccion']	=$this->input->post('f_direccion');
		$this->data['f_colonia']	=$this->input->post('f_colonia');
		$this->data['f_cp']			=$this->input->post('f_cp');
		$this->data['f_poblacion']	=$this->input->post('f_poblacion');
		$this->data['f_estado']		=$this->input->post('f_estado');
		$this->data['f_telefono']	=$this->input->post('f_telefono');

		$cookie = array(
			'name'   => 'data_envio',
			'value'  => json_encode($this->data),
			'expire' => 0,
			'prefix' => 'masda_'
		);

		set_cookie($cookie);

		$cart = $this->cart->contents();
		
		$p_precio ='';
		$p_mayoreo ='';
		$p_distribuidor ='';
		
		foreach($cart as $product1){
			$p_precio		+= $product1['price'] * $product1['qty'];
			$p_mayoreo		+= $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor	+= $product1['options']['distribuidor'] * $product1['qty'];
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
				
				if($p_precio > 9999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 4999){//p_mayoreo
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
			$content .= '<tr>';
				//if($total >= 500){
					//$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>Gratis</strong></td>';//Envío gratis día del niño
				//}else{
					$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;">$120</td>';
				//}
			$content .= '</tr>';
			$content .= '<tr>';
				$content .= '<td colspan="4"></td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Total:</td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total+120).'</strong></td>';
				//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total).'</strong></td>';//Envío gratis día del niño
				//if($total >= 500){
					//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total).'</strong></td>';//Envío gratis día del niño
				//}else{
					//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total+120).'</strong></td>';
				//}
			$content .= '</tr>';
		$content .= '</table><br>';

		$this->data['p_descripcion'] = $content;
		
		echo json_encode($this->data);		
	}

	public function proc_transfer(){

		if (!$this->input->is_ajax_request()) {
			exit('Solicitud incorrecta');
		}

		$this->load->library('encrypt');
		$this->load->model('products_model');

		setlocale(LC_MONETARY, 'es_ES');

		$coo = get_cookie('masda_data_envio');
		$jdco = json_decode($coo);

		$this->data['metodo_pago']	=$this->input->post('metodo_pago');
		
		$this->data['nombre']		=$jdco->nombre;
		$this->data['email']		=$jdco->email;
		$this->data['telefono']		=$jdco->telefono;
		$this->data['direccion']	=$jdco->direccion;
		$this->data['colonia']		=$jdco->colonia;
		$this->data['cp']			=$jdco->cp;
		$this->data['poblacion']	=$jdco->poblacion;
		$this->data['estado']		=$jdco->estado;
		//$this->data['pais']			=$jdco->mex;
		$this->data['comentarios']  =$jdco->comentarios;
		
		$this->data['f_email']		=$jdco->f_email;
		$this->data['f_nombre']		=$jdco->f_nombre;
		$this->data['f_rfc']		=$jdco->f_rfc;
		$this->data['f_direccion']	=$jdco->f_direccion;
		$this->data['f_colonia']	=$jdco->f_colonia;
		$this->data['f_cp']			=$jdco->f_cp;
		$this->data['f_poblacion']	=$jdco->f_poblacion;
		$this->data['f_estado']		=$jdco->f_estado;
		$this->data['f_telefono']	=$jdco->f_telefono;

		$cart = $this->cart->contents();

		$p_precio ='';
		$p_mayoreo ='';
		$p_distribuidor ='';
		
		foreach($cart as $product1){
			$p_precio		+= $product1['price'] * $product1['qty'];
			$p_mayoreo		+= $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor	+= $product1['options']['distribuidor'] * $product1['qty'];
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
				
				if($p_precio > 9999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 4999){//p_mayoreo
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
			$content .= '<tr>';
				//if($total >= 500){
					//$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>Gratis</strong></td>';//Envío gratis día del niño
				//}else{
					$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;">$120</td>';
				//}
				
			$content .= '</tr>';
			$content .= '<tr>';
				$content .= '<td colspan="4"></td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Total:</td>';
				//if($total >= 500){
					//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total).'</strong></td>';//Envío gratis día del niño
				//}else{
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total+120).'</strong></td>';
				//}				
			$content .= '</tr>';
		$content .= '</table><br>';
		
		
		$this->data['p_status']		='2';//1=Pagado, 2=Proceso, 3=Cancelado
		$this->data['p_tipo']		=$tipo;//1=publico, 2=mayoreo, 3=distribuidor
		$this->data['p_descripcion']=$content;
		$this->data['p_subtotal']	=$total;

		//if($total >= 500){
			//$this->data['p_envio']	=0;//Envío gratis día del niño
			//$this->data['p_total']	=$total;//Envío gratis día del niño
			//$footer_mail = '<strong>¡Envío Gratis! Hasta el 30 de Abril del 2016</strong><br><br>';
		//}else{
			$this->data['p_envio']	=120;
			$this->data['p_total']	=$total+120;
			$footer_mail = '<strong>Nota: El envío ampara hasta 20kg por caja y se realiza por DHL, en caso de que su pedido exceda de este peso se cobraran $120 pesos adicionales por caja de hasta 20kg</strong><br><br>';
		//}

		$pedido_id	= $this->pago_model->set_pedido($this->data);

		/*********/
			//set_mayoreo_pedidos_productos
			foreach($cart as $product){

				if($p_precio > 9999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 4999){//p_mayoreo
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

				$this->data_set_producto['fk_pedido'] = $pedido_id;
				$this->data_set_producto['id_producto'] = $product['id'];
				$this->data_set_producto['qty'] = $product['qty'];
				$this->data_set_producto['p_publico'] = $product['price'] / 1.16;
				$this->data_set_producto['p_p_iva'] = $product['price'] - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_mayoreo'] = $product['options']['mayoreo'] / 1.16;
				$this->data_set_producto['p_m_iva'] = $product['options']['mayoreo'] - $this->data_set_producto['p_mayoreo'];
				$this->data_set_producto['p_distribuidor'] = $product['options']['distribuidor'] / 1.16;
				$this->data_set_producto['p_d_iva'] = $product['options']['distribuidor'] - $this->data_set_producto['p_distribuidor'];
				$this->data_set_producto['total_sin_iva'] = $p_final_sub / 1.16;
				$this->data_set_producto['total_iva'] = $p_final_sub - $this->data_set_producto['total_sin_iva'];
				$this->data_set_producto['precio_aplicado'] = $tipo;
				$this->data_set_producto['fecha_insertado'] = date('Y-m-d H:i:s');

				$this->pago_model->set_mayoreo_pedidos_productos( $this->data_set_producto );

			}
				$this->data_set_producto['fk_pedido'] = $pedido_id;
				$this->data_set_producto['id_producto'] = '12906';
				$this->data_set_producto['qty'] = '1';
				$this->data_set_producto['p_publico'] = 120 / 1.16;
				$this->data_set_producto['p_p_iva'] = 120 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_mayoreo'] = 120 / 1.16;
				$this->data_set_producto['p_m_iva'] = 120 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_distribuidor'] = 120 / 1.16;
				$this->data_set_producto['p_d_iva'] = 120 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['total_sin_iva'] = 120 / 1.16;
				$this->data_set_producto['total_iva'] = 120 - $this->data_set_producto['total_sin_iva'];
				$this->data_set_producto['precio_aplicado'] = $tipo;
				$this->data_set_producto['fecha_insertado'] = date('Y-m-d H:i:s');
				$this->pago_model->set_mayoreo_pedidos_productos( $this->data_set_producto );
		/*********/
		
		$p_codigo   = $this->encrypt->encode($pedido_id);
		
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
					<tr><td style="padding:5px; border:solid thin #ddd;">Ciudad: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_poblacion'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Estado: </td><td style="padding:5px; border:solid thin #ddd;">	<strong>'.$this->data['f_estado'].'</strong></td></tr>
					<tr><td style="padding:5px; border:solid thin #ddd;">Teléfono: </td><td style="padding:5px; border:solid thin #ddd;"> <strong>'.$this->data['f_telefono'].'</strong></td></tr>
				</table></div>';
		}else{
			$factura_datos='';
		}
		
		$contenido_mail='
			<a href="https://www.massivepc.com/mayoreo"><img src="https://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png"/></a><br><br>
			Estimado <strong>'.$this->data['nombre'].'</strong>, su pedido será procesado en cuanto nos confirme su pago enviando el comprobante escaneado o fotografiado a la siguiente dirección: <strong><a href="mailto:ventas@massivepc.com">ventas@massivepc.com</a></strong><br>
			<br><strong>No manejamos sistemas de apartado, por favor realice y confirme su pago lo antes posible.</strong>
			
			<br><br>
			<hr style="background:#ddd; height:1px; border:none;">
			<br><br>

			Nº Pedido: <strong>'.$pedido_id.'</strong><br><br><br>
			<strong>Detalles del pedido:</strong><br><br><br>
			'.$content.'
			<br><br>
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
			Cuenta: 0194258703<br>
			CLABE Interbancaria para transferencias: 0123-2000-1942-5870-31<br>
			A nombre de: MASSIVE PC SA DE CV <br><br>

			<strong>SANTANDER</strong><br>
			Cuenta: 65-50403993-5<br>
			CLABE Interbancaria para transferencias: 0143-2065-5040-3993-55<br>
			A nombre de: MASSIVE PC SA DE CV <br><br>

			<strong>BANORTE / IXE </strong><br>
			Cuenta: 0212962231<br>
			CLABE Interbancaria para transferencias: 0723-2000-2129-6223-18<br>
			A nombre de: MASSIVE PC SA DE CV <br><br>

			<br><br>
			<div style="clear:both;"></div>
			'.$footer_mail.'
			<div style="clear:both;"></div>
			<br><br> <img src="http://www.massivepc.com/ci/assets/img/footer-correo-garantias.jpg" />';

			//¡Envío Gratis! Hasta el 30 de Abril del 2016
			//<strong>Nota: El envío ampara hasta 20kg por caja y se realiza por DHL, en caso de que su pedido exceda de este peso se cobraran $120 pesos adicionales por caja de hasta 20kg</strong><br><br>
		
			$this->load->library('email');
			
			$config['protocol']  = 'smtp';
			$config['smtp_host'] = 'smtp.gmail.com';
			$config['smtp_user'] = 'ventas@massivepc.com';
			$config['smtp_pass'] = 'Pr0mVent2017';
			$config['smtp_port'] = 465;
			$config['mailtype']	 = 'html';
			$config['smtp_crypto'] = 'ssl';
			$config['email_newline'] = "\r\n";
			$config['email_crlf'] = "\r\n";
			
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			
			$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');
			
			$this->email->from('ventas@massivepc.com', 'Massive PC');
			$this->email->to($this->data['email']);
			$this->email->bcc($list);
			
			$this->email->subject('Detalle de su pedido #'.$pedido_id.' - Transferencia');
			$this->email->message($contenido_mail);
			
			$this->email->send();
			
			$encrypted_pedido = $this->encrypt->encode($pedido_id,'@Lf42016_-');
			$completado = $this->encrypt->encode('completado');
			$cancel = $this->encrypt->encode('cancel');
		/*OFF*/
			$return_content = $contenido_mail;
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

		$this->data['metodo_pago']	=$this->input->post('metodo_pago');
		
		$this->data['nombre']		=$jdco->nombre;
		$this->data['email']		=$jdco->email;
		$this->data['telefono']		=$jdco->telefono;
		$this->data['direccion']	=$jdco->direccion;
		$this->data['colonia']		=$jdco->colonia;
		$this->data['cp']			=$jdco->cp;
		$this->data['poblacion']	=$jdco->poblacion;
		$this->data['estado']		=$jdco->estado;
		//$this->data['pais']			=$jdco->mex;
		$this->data['comentarios']  =$jdco->comentarios;
		
		$this->data['f_email']		=$jdco->f_email;
		$this->data['f_nombre']		=$jdco->f_nombre;
		$this->data['f_rfc']		=$jdco->f_rfc;
		$this->data['f_direccion']	=$jdco->f_direccion;
		$this->data['f_colonia']	=$jdco->f_colonia;
		$this->data['f_cp']			=$jdco->f_cp;
		$this->data['f_poblacion']	=$jdco->f_poblacion;
		$this->data['f_estado']		=$jdco->f_estado;
		$this->data['f_telefono']	=$jdco->f_telefono;


		
		$cart = $this->cart->contents();

		$p_precio ='';
		$p_mayoreo ='';
		$p_distribuidor ='';
		
		foreach($cart as $product1){
			$p_precio		+= $product1['price'] * $product1['qty'];
			$p_mayoreo		+= $product1['options']['mayoreo'] * $product1['qty'];
			$p_distribuidor	+= $product1['options']['distribuidor'] * $product1['qty'];
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
				
				if($p_distribuidor > 9999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 4999){//p_mayoreo
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
			$content .= '<tr>';
				//if($total >= 500){
					//$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>Gratis</strong></td>';//Envío gratis día del niño
				//}else{
					$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;">$120</td>';
				//}
				//$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;">$120</td>';
				//$content .= '<td colspan="4"></td><td style="padding:5px; border:solid thin #ddd; text-align:center;">Envío por DHL:</td><td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>Gratis</strong></td>';//Envío gratis día del niño
			$content .= '</tr>';
			$content .= '<tr>';
				$content .= '<td colspan="4"></td>';
				$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:center;">Total:</td>';
				//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total+120).'</strong></td>';
				//$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total).'</strong></td>';//Envío gratis día del niño
				//if($total >= 500){
				//	$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total).'</strong></td>';//Envío gratis día del niño
				//}else{
					$content .= '<td style="padding:5px; border:solid thin #ddd; text-align:right;"><strong>$'.number_format($total+120).'</strong></td>';
				//}
			$content .= '</tr>';
		$content .= '</table><br>';
		
		//echo 'Tipo='.$tipo;

		$this->data['p_status']		='2';//1=Pagado, 2=Proceso, 3=Cancelado
		$this->data['p_tipo']		=$tipo;//1=publico, 2=mayoreo, 3=distribuidor
		$this->data['p_descripcion']=$content;
		$this->data['p_subtotal']	=$total;

		//if($total >= 500){
		//	$this->data['p_envio']	=0;//Envío gratis día del niño
		//	$this->data['p_total']	=$total;//Envío gratis día del niño
		//	$footer_mail = '<strong>¡Envío Gratis! Hasta el 30 de Abril del 2016</strong><br><br>';
		//}else{
			$this->data['p_envio']	=120;
			$this->data['p_total']	=$total+120;
			$footer_mail = '<strong>Nota: El envío ampara hasta 20kg por caja y se realiza por DHL, en caso de que su pedido exceda de este peso se cobraran $120 pesos adicionales por caja de hasta 20kg</strong><br><br>';
		//}

		$pedido_id	= $this->pago_model->set_pedido($this->data);

		/*********/
			//set_mayoreo_pedidos_productos
			foreach($cart as $product){

				if($p_precio > 9999){//p_distribuidor
					$p_final_u 	 = $product['options']['distribuidor'];
					$p_final_sub = $product['options']['distribuidor'] * $product['qty'];
					$total       = $p_distribuidor;
					$tipo		 = '3';
				}else if($p_precio > 4999){//p_mayoreo
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

				$this->data_set_producto['fk_pedido'] = $pedido_id;
				$this->data_set_producto['id_producto'] = $product['id'];
				$this->data_set_producto['qty'] = $product['qty'];
				$this->data_set_producto['p_publico'] = $product['price'] / 1.16;
				$this->data_set_producto['p_p_iva'] = $product['price'] - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_mayoreo'] = $product['options']['mayoreo'] / 1.16;
				$this->data_set_producto['p_m_iva'] = $product['options']['mayoreo'] - $this->data_set_producto['p_mayoreo'];
				$this->data_set_producto['p_distribuidor'] = $product['options']['distribuidor'] / 1.16;
				$this->data_set_producto['p_d_iva'] = $product['options']['distribuidor'] - $this->data_set_producto['p_distribuidor'];
				$this->data_set_producto['total_sin_iva'] = $p_final_sub / 1.16;
				$this->data_set_producto['total_iva'] = $p_final_sub - $this->data_set_producto['total_sin_iva'];
				$this->data_set_producto['precio_aplicado'] = $tipo;
				$this->data_set_producto['fecha_insertado'] = date('Y-m-d H:i:s');

				$this->pago_model->set_mayoreo_pedidos_productos( $this->data_set_producto );

			}
				$this->data_set_producto['fk_pedido'] = $pedido_id;
				$this->data_set_producto['id_producto'] = '12906';
				$this->data_set_producto['qty'] = '1';
				$this->data_set_producto['p_publico'] = 120 / 1.16;
				$this->data_set_producto['p_p_iva'] = 120 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_mayoreo'] = 120 / 1.16;
				$this->data_set_producto['p_m_iva'] = 120 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['p_distribuidor'] = 120 / 1.16;
				$this->data_set_producto['p_d_iva'] = 120 - $this->data_set_producto['p_publico'];
				$this->data_set_producto['total_sin_iva'] = 120 / 1.16;
				$this->data_set_producto['total_iva'] = 120 - $this->data_set_producto['total_sin_iva'];
				$this->data_set_producto['precio_aplicado'] = $tipo;
				$this->data_set_producto['fecha_insertado'] = date('Y-m-d H:i:s');
				$this->pago_model->set_mayoreo_pedidos_productos( $this->data_set_producto );
		/*********/
		
		$p_codigo   = $this->encrypt->encode($pedido_id);
		
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
			<strong>Detalles del pedido:</strong><br><br><br>
			'.$content.'
			<br><br>
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
			Cuenta: 0194258703<br>
			CLABE Interbancaria para transferencias: 0123-2000-1942-5870-31<br>
			A nombre de: MASSIVE PC SA DE CV <br><br>

			<strong>SANTANDER</strong><br>
			Cuenta: 65-50403993-5<br>
			CLABE Interbancaria para transferencias: 0143-2065-5040-3993-55<br>
			A nombre de: MASSIVE PC SA DE CV <br><br>

			<strong>BANORTE / IXE </strong><br>
			Cuenta: 0212962231<br>
			CLABE Interbancaria para transferencias: 0723-2000-2129-6223-18<br>
			A nombre de: MASSIVE PC SA DE CV <br><br>

			<br><br>
			<div style="clear:both;"></div>
			'.$footer_mail.'
			<div style="clear:both;"></div>
			<br><br> <img src="http://www.massivepc.com/ci/assets/img/footer-correo-garantias.jpg" />';

			//¡Envío Gratis! Hasta el 30 de Abril del 2016
			//<strong>Nota: El envío ampara hasta 20kg por caja y se realiza por DHL, en caso de que su pedido exceda de este peso se cobraran $120 pesos adicionales por caja de hasta 20kg</strong><br><br>
		
			$this->load->library('email');
			
			$config['protocol']  = 'smtp';
			$config['smtp_host'] = 'smtp.gmail.com';
			$config['smtp_user'] = 'ventas@massivepc.com';
			$config['smtp_pass'] = 'Pr0mVent2017';
			$config['smtp_port'] = 465;
			$config['mailtype']	 = 'html';
			$config['smtp_crypto'] = 'ssl';
			$config['email_newline'] = "\r\n";
			$config['email_crlf'] = "\r\n";
			
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			
			$list = array('ventas@massivepc.com', 'eduardo@massivepc.com');
			
			$this->email->from('ventas@massivepc.com', 'Massive PC');
			$this->email->to($this->data['email']);
			$this->email->bcc($list);
			
			$this->email->subject('Detalle de su pedido #'.$pedido_id.' - PayPal');
			$this->email->message($contenido_mail);
			
			$this->email->send();
			
			$encrypted_pedido = $this->encrypt->encode($pedido_id,'@Lf42016_-');
			$completado = $this->encrypt->encode('completado');
			$cancel = $this->encrypt->encode('cancel');
		/*OFF*/
$return_content = '<script src="https://code.jquery.com/jquery-1.11.3.js"></script><form id="send_paypal_info" method="post" action="https://www.paypal.com/cgi-bin/webscr"><input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="cobrospaypal@massivepc.com"><input type="hidden" id="item_name" name="item_name" value="Pedido:'.$pedido_id.'"><input type="hidden" name="item_number" value="1"><input type="hidden" id="amount" name="amount" value="'.$this->data['p_total'].'"><input type="hidden" name="no_shipping" value="1"><input type="hidden" id="return" name="return" value="https://www.massivepc.com/mayoreo/#'.$completado.'-'.$encrypted_pedido.'"><input type="hidden" name="cancel_return" value="https://www.massivepc.com/mayoreo/#'.$cancel.'-'.$encrypted_pedido.'"><input type="hidden" name="currency_code" value="MXN"></form><script>$(function(){$(\'#send_paypal_info\').trigger(\'submit\');});</script>';
			echo json_encode(array('return_content' => $return_content));
			//$this->cart->destroy();
			//delete_cookie('masda_data_envio');
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