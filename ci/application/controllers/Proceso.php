<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proceso extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
	}
	
	public function index(){

		$this->load->helper('file');

		$this->load->library('ftp');

		/*$config['hostname'] = '104.238.78.74';
		$config['username'] = 'massive';
		$config['password'] = 'S1st3m4s2015_';
		$config['debug'] = TRUE;
		$config['port']     = 21;
		$config['passive']  = FALSE;
		$this->ftp->connect($config);*/

		
		
		$this->data['result'] = $this->products_model->get_productos(array('products_status'=>'1'));
		echo '<table border="1">';
		foreach($this->data['result'] as $product){

			if($cadena = read_file('../images/'.$product->products_image)){

			$medida = getimagesize('../images/'.$product->products_image);
			$peso = filesize('../images/'.$product->products_image);

			if($peso > '5000'){
				$status = '#F72327';
			}else{
				$status = '#006401';
			}

			if($medida[0] == '80' && $medida[1] == '80'){
				$status2 = '#006401';
			}else{
				$status2 = '#F72327';
			}

				echo '<tr>
					<td>'.$product->products_id.'</td>
					<td><img src="../images/'.$product->products_image.'" /></td>
					<td> '.$product->products_image.'</td>
					<td style="background:'.$status.';">'.filesize('../images/'.$product->products_image).'</td>
					<td style="background:'.$status2.';">'.$medida[0].'px x '.$medida[1].'px</td>
				</tr>';

				//$this->ftp->upload('/home/massivep/public_html/images/'.$product->products_image, '/public_html/cdn/images/thumb/'.$product->products_image);

			}


		}

	//$this->ftp->close();

		echo '</tabel>';
		/*$this->data['result'] = $this->products_model->get_productos(array('products_status'=>'1'));
		echo '<table border="1">';
		foreach($this->data['result'] as $product){

			$medida = getimagesize('../images/'.$product->products_image_large);
			$peso = filesize('../images/'.$product->products_image_large);

			if($peso > '50000'){
				$status = '#F72327';
			}else{
				$status = '#006401';
			}

			if($medida[0] == '666' && $medida[1] == '500'){
				$status2 = '#006401';
			}else{
				$status2 = '#F72327';
			}

			echo '<tr>
					<td>'.$product->products_id.'</td>
					<td><img src="../images/'.$product->products_image_large.'" /></td>
					<td> '.$product->products_image_large.'</td>
					<td style="background:'.$status.';">'.filesize('../images/'.$product->products_image_large).'</td>
					<td style="background:'.$status2.';">'.$medida[0].'px x '.$medida[1].'px</td>
				</tr>';

		}
		echo '</tabel>';*/

	}


	/*public function ftp_sinc(){

		$this->load->library('ftp');

		$config['hostname'] = '104.238.78.74';
		$config['username'] = 'massive';
		$config['password'] = 'S1st3m4s2015_';
		$config['debug'] = TRUE;
		$config['port']     = 21;
		$config['passive']  = FALSE;
		$this->ftp->connect($config);

		$this->ftp->upload('/home/massivep/public_html/images/62cfe-cti_80.jpg', '/public_html/cdn/images/62cfe-cti_80.jpg');

		$this->ftp->close();

	}*/

	public function delete(){
		$this->load->helper('file');
		
		/*delete_files('/home/massivep/public_html/images/index.htm');
		$cadena = read_file('/home/massivep/public_html/images/index.htm');
		echo $cadena;*/
		$datos = '';

		if ( ! write_file('/home/massivep/public_html/images/index.htm', $datos))
		{
		     echo 'No se pudo escribir el archivo';
		}
		else
		{
		     echo 'Archivo escrito!';
		}
	}

	
}