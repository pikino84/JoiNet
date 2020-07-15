<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Boletin extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		//$this->load->model('products_model');
		$this->load->model('boletin_model');
		$this->load->helper('validarmail');
	}

	public function index(){
		
	}
	
	public function validar(){
		$this->data['customers_newsletter_email']	= $this->input->post('email');
		
		$result	= $this->boletin_model->get_correo($this->data);
		
		$this->data['mailchimp']	= '0';
		$this->data['customers_newsletter_invite']	= '1';
		
		if(empty($result)){
			
			$this->boletin_model->set_correo($this->data);
			$return = array('code'=>'1', 'msg'=>'<span class="glyphicon glyphicon-saved"></span> Correo agregado exitosamente.');
			
		}else{
			
			$return = array('code'=>'2', 'msg'=>'<span class="glyphicon glyphicon-save"></span> El correo ya se encuentra registrado en el boletín.');
		}
		echo json_encode($return);
	}
	
	
	

}






















/* End of file boletin.php */
/* Location: ./application/controllers/boletin
.php */