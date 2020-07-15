<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller {
	
	/*public function curl(){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, 'http://massivepc.com/ci/mail/enviar');
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS, 'mensaje='.$mensaje);
		$result = curl_exec($ch);
		curl_close($ch);
		echo $result;
	}*/
	
	public function __construct(){
		parent::__construct();
		
		$this->user = $this->session->userdata('logged_user');
	}
	
	public function limpiar(){
		$this->load->view('limpiar');
	}
	
	public function limpiar2(){
		if(!$this->user) redirect ('panel/login');
		$this->load->model('correos_model');
		
		$this->data['lista'] = $this->correos_model->get_lista();
		
		$this->load->view('limpiar2', $this->data);
	}
	
	public function set_mailchimp_batch(){
		$this->load->library('mailchimp_library');
		$this->load->helper('email');
		
		$string = $this->input->post('data');
		$string = preg_match_all('#([a-z0-9\._-]+@[a-z0-9\._-]+)#is',$string,$emails);
		$str2   = array_unique($emails[1]);
		
		foreach($str2 as $mail){
			if (valid_email($mail)){
				$m2=strtolower($mail);
				$batch[] = array('email' => array('email' => $m2));
			}
		}
		
		$result = $this->mailchimp_library->call('lists/batch-subscribe', array(
			'id'				=> 'd67515ace2',
			'batch'				=> $batch,
			'double_optin'		=> false,
			'update_existing'	=> false,
			'replace_interests'	=> false,
			'send_welcome'		=> false
		));
		echo json_encode($str2);
	}
	
	public function set_mailchimp_batch2(){
		if(!$this->user) redirect ('panel/login');
		$this->load->library('mailchimp_library');
		$this->load->helper('email');
		$this->load->model('correos_model');
		
		$fk_lista = $this->input->post('fk_lista');
		
		$string = $this->input->post('data');
		$string = preg_match_all('#([a-z0-9\._-]+@[a-z0-9\._-]+)#is',$string,$emails);
		$str2   = array_unique($emails[1]);
		
		$i=0;
		foreach($str2 as $mail){
			$m2=strtolower($mail);
			if (valid_email($m2)){
				$correo=$this->correos_model->select_correos_totales(array('correo'=>$m2));
				if($correo == NULL){
					$i++;
					$this->correos_model->insert_correos_totales(array('correo'=>$m2,'fk_lista'=>$fk_lista,'fk_usuario'=>$this->user->id_user));
				}
			}
		}
		
		echo json_encode(array('total'=>$i));
		
	}
	

	public function enviar(){
		
		$mensaje = $this->input->post('mensaje');
		
		$this->load->library('email');
		
		$config['protocol']  = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_user'] = 'juan.cruz@massivepc.com';
		$config['smtp_pass'] = '_-Pr0mS1st3m2017-_';
		$config['smtp_port'] = 465;
		$config['mailtype']	 = 'html';
		$config['smtp_crypto'] = 'ssl';

		$config['email_newline'] = "\r\n";
		$config['email_crlf'] = "\r\n";
		
		$this->email->initialize($config);
		
		$this->email->set_newline("\r\n"); 
		
		$this->email->from('juan.cruz@massivepc.com', 'Massivepc');
		$this->email->to('ventas@massivepc.com');
		$this->email->cc('eduardo@massivepc.com,sistemas@massivepc.com,ventas2@massivepc.com,zopim@massivepc.com');
		
		$this->email->subject('Massivepc - FAQ');
		$this->email->message($mensaje);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();
	
	}
}

/* End of file mail.php */
/* Location: ./application/controllers/mail.php */