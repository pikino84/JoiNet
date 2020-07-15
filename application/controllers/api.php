<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	
	/*public function __construct(){
		parent::__construct();
		$this->load->model('api_model');
	}*/

	public function agotado($email='1'){

		date_default_timezone_set('America/Mexico_City');

		$this->load->model('api_model');

		$productos = $this->api_model->get_products();

		$content = 'Reporte generado el <b>'.date("d-m-Y, h:i:s a").'</b>, para ver el reporte online pueden acceder al siguiente <a href="https://www.massivepc.com/mayoreo/api/agotado/2">enlace.</a> <br>
			En total <b>'.count($productos).'</b> productos agotados o con existencia menor a 20 piezas.
			<br><br>';

		$content .= '<table border="1">';

		$content .= '<tr> <td>Existencia</td> <td>Código</td> <td>Producto</td></tr>';

		foreach($productos as $producto){
			if($producto->sae_exist=='0'){ $style = 'style="background:#EBCCCC;"'; }else{$style = 'style="background:#D0E9C6;"';}
			$content .=  '<tr><td '.$style.'>'.$producto->sae_exist.'</td><td '.$style.'>'.$producto->products_id.'</td><td '.$style.'><a href="http://www.massivepc.com/-p-'.$producto->products_id.'.html">'.$producto->products_name.'</a></td></tr>';
		}

		$content .= '</table>';

		$this->load->library('email');

		$config['protocol']  = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_user'] = 'sistemas@massivepc.com';
		$config['smtp_pass'] = 'MassiveTotal2050';
		$config['smtp_port'] = 465;
		$config['mailtype']	 = 'html';
		$config['smtp_crypto'] = 'ssl';
		$config['email_newline'] = "\r\n";
		$config['email_crlf'] = "\r\n";

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from('sistemas@massivepc.com', 'Sistemas');
		$this->email->to('eduardo@massivepc.com,juan.cruz@massivepc.com,compras@massivepc.com,jaime@massivepc.com,fanfanbenita@hotmail.com,aura@massivepc.com,1033763272@qq.com');

		$this->email->subject('Productos agotados');
		$this->email->message($content);

		if($email == '1'){
			$this->email->send();
		}else{
			echo '<meta charset="utf-8">'.$content;
		}
		

		//echo $this->email->print_debugger();

	}

	
	
}

/* End of file api.php */
/* Location: ./application/controllers/api.php */