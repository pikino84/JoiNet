<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Garantias extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('garantias_model');
		/*$this->load->model('varios_model');
		$this->load->library('user_agent');*/
	}

	public function index(){
		$this->data['estados'] = $this->garantias_model->get_estados();
		$this->load->view('garantias_registro', $this->data);
	}

	public function get_municipios(){
		$estado_id  = $this->input->post('estado_id');
		$municipios = $this->garantias_model->get_municipios(array('estado_id' => $estado_id));
		echo json_encode($municipios);
	}

	public function set_g_data(){
		date_default_timezone_set('America/Mexico_City');
		$this->data['n_ticket'] = $this->input->post('n_ticket');
		$this->data['fecha_solicitud'] = date('Y-m-d H:i:s');//2015-11-24 19:43:39
		$this->data['ultima_actualizacion'] = date('Y-m-d H:i:s');//2015-11-24 19:43:39
		$this->data['fecha_compra'] = $this->input->post('fecha_compra');
		$this->data['nombre'] = $this->input->post('nombre');
		$this->data['correo'] = $this->input->post('correo');
		$this->data['calle'] = $this->input->post('calle');
		$this->data['n_exterior'] = $this->input->post('n_exterior');
		$this->data['n_interior'] = $this->input->post('n_interior');
		$this->data['colonia'] = $this->input->post('colonia');
		$this->data['estado'] = $this->input->post('estado');
		$this->data['municipio'] = $this->input->post('municipio');
		$this->data['cp'] = $this->input->post('cp');
		$this->data['envio_fecha'] = $this->input->post('envio_fecha');
		$this->data['envio_n_guia'] = $this->input->post('envio_n_guia');
		$this->data['envio_empresa'] = $this->input->post('envio_empresa');

		$this->data_p['modelo'] = $this->input->post('modelo');
		$this->data_p['color'] = $this->input->post('color');
		$this->data_p['n_serie'] = $this->input->post('n_serie');

		$fk_garantia = $this->garantias_model->set_garantia($this->data);

		foreach($this->data_p['modelo'] as $clave => $valor){

			$modelo = $this->data_p['modelo'][$clave];
			$color  = $this->data_p['color'][$clave];
			$n_serie = $this->data_p['n_serie'][$clave];
			$ultima_actualizacion = date('Y-m-d H:i:s');

			if(!empty($modelo) && !empty($color) && !empty($n_serie)){
				$this->garantias_model->set_garantia_productos(array( 'fk_garantia' => $fk_garantia,'modelo'=> $modelo, 'color' => $color, 'n_serie' => $n_serie, 'ultima_actualizacion' => $ultima_actualizacion));
			}
		}

		$data_garantia = $this->garantias_model->get_garantia(array( 'id_garantia' => $fk_garantia ));

		$footer = '<br><br> <img src="http://www.massivepc.com/ci/assets/img/footer-correo-garantias.jpg" />';

		$contenido_mail='
			<a href="http://www.massivepc.com"><img src="https://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png"/></a><br><b>'.$this->data['nombre'].'</b><br><br>
			<table style="border:solid thin #ddd; width:380px; margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Nº Folio</td>
					<td style="padding:5px; border:solid thin #ddd;">GW_'.$fk_garantia.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Fecha solicitud</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->fecha_solicitud.'</td>
				</tr>
				<tr>
					<td colspan="2" style="padding:5px; border:solid thin #ddd;"><h4>Datos de compra</h4></td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Nº de Factura ó Ticket</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->n_ticket.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Fecha de compra</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->fecha_compra.'</td>
				</tr>
				<tr>
					<td colspan="2" style="padding:5px; border:solid thin #ddd;"><h4>Datos de cliente</h4></td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Nombre</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->nombre.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Correo</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->correo.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Calle</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->calle.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Nº exterior</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->n_exterior.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Nº interior</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->n_interior.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Colonia</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->colonia.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Estado</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->estado.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Municipio</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->municipio.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">C.P.</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->cp.'</td>
				</tr>
				<tr>
					<td colspan="2" style="padding:5px; border:solid thin #ddd;"><h4>Datos de envío</h4></td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Fecha de envío</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->envio_fecha.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Nº de guia</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->envio_n_guia.'</td>
				</tr>
				<tr>
					<td style="padding:5px; border:solid thin #ddd;">Empresa de envío</td>
					<td style="padding:5px; border:solid thin #ddd;">'.$data_garantia->envio_empresa.'</td>
				</tr>
				<tr>
					<td colspan="2" style="padding:5px; border:solid thin #ddd;"><h4>Artículos que envía a garantía</h4></td>
				</tr>';

				$contenido_mail .= '
					<tr>
						<td>
							<table style="border:solid thin #ddd; width:380px; margin: 0px;padding: 0px;border-spacing: 0;border-collapse: collapse;">

				                <tr>
				                    <td style="padding:5px; border:solid thin #ddd;">Descripción ó Modelo</td>
				                    <td style="padding:5px; border:solid thin #ddd;">Color</td>
				                    <td style="padding:5px; border:solid thin #ddd;">Nº de Serie</td>
				                </tr>
				';

				foreach($this->data_p['modelo'] as $clave => $valor){

					$modelo = $this->data_p['modelo'][$clave];
					$color  = $this->data_p['color'][$clave];
					$n_serie = $this->data_p['n_serie'][$clave];

					$contenido_mail .= '<tr><td style="padding:5px; border:solid thin #ddd;">'.$modelo.'</td><td style="padding:5px; border:solid thin #ddd;">'.$color.'</td><td style="padding:5px; border:solid thin #ddd;">'.$n_serie.'</td></tr>';

				}

				$contenido_mail .= '</table></td></tr>';

				
			$contenido_mail .= '</table>
		';

		if(!empty($fk_garantia)){

			$this->load->library('email');

			$config['protocol']      = 'smtp';
			$config['smtp_host']     = 'smtp.gmail.com';
			$config['smtp_user']     = 'ventas@massivepc.com';
			$config['smtp_pass']     = 'Pr0mVent2017';
			$config['smtp_port']     = 465;
			$config['mailtype']      = 'html';
			$config['smtp_crypto']   = 'ssl';
			$config['email_newline'] = "\r\n";
			$config['email_crlf']    = "\r\n";

			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$list = array('sistemas@massivepc.com', 'juan.cruz@massivepc.com');
			
			$this->email->from('noresponder@massivepc.com', 'Massive PC');
			$this->email->to($this->data['correo']);
			$this->email->bcc($list);
			
			$this->email->subject('Solicitud de garantía GW_'.$fk_garantia);
			$this->email->message($contenido_mail.$footer);
			
			$this->email->send();

			echo json_encode(array( 'folio'=>$fk_garantia, 'error' => 'false' ));

		}else{

			echo json_encode(array( 'folio'=>$fk_garantia, 'error' => 'true' ));

		}

	}

}

/* End of file garantias.php */
/* Location: ./application/controllers/garantias.php */