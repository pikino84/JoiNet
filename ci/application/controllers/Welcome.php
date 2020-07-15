<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		echo 'test';
		//$this->load->view('welcome_message');
	}
	
	
	public function test(){
		
		$this->load->library('email');

		$this->email->from('juan.cruz@massivepc.com');
		$this->email->to('juan.cruz@massivepc.com');
		
		$this->email->subject('Correo de Prueba');
		$this->email->message('Probando la clase email');
		
		$this->email->send();
		
		echo $this->email->print_debugger();
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */