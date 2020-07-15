<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//session_start();
class Proveedores extends CI_Controller {

	

	public function __construct(){

		parent::__construct();

		$this->load->model('products_model');

		$this->load->model('varios_model');

		$this->load->library('user_agent');

	}







	public function index($session_id=false){//prv9e7b9f0a7



		/*if(empty($session_id)){

			header("HTTP/1.1 404 Not Found");

			die();

		}



		if($session_id != 'ecdd9eb0b49e7b9f0a70d58d2797acc1'){

			header("HTTP/1.0 404 Not Found");

			die();

		}*/

/*
		if($this->session->userdata('logged_in'))
		{      
		$this->load->view('header');
		$this->load->view('employee');
		$this->load->view('login/footer');
	   }else{
		   redirect('user_authentication/user_login_show');
		}*/
		if( $this->session->userdata('isLoggedIn') ) {
			//redirect('/main/show_main');
			$this->load->helper('moneda');
			$dias	= array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
			$meses	= array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			$this->data['categories'] = $this->products_model->get_categories();
			$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');	
			$this->load->library('user_agent');
			$this->load->helper('detect');
			$this->data['categories']   = $this->products_model->get_categories();
			$this->data['fecha']        = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
			$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
			$this->data['marcas']       = $this->products_model->get_marcas();
			$this->data['proveedor_id'] = $this->input->get('proveedor_id');
			$this->data['marca_id']     = $this->input->get('marca');
			$this->data['categoria_id'] = $this->input->get('categoria');
			$this->data['palabra']      = $this->input->get('palabra');
			$this->data['existencias']  = $this->input->get('existencias');
			$this->data['ordenar']      = $this->input->get('ordenar');
			$this->data['mostrar']      = $this->input->get('mostrar');
			$this->data['where']        = '';
			$products_status            = $this->input->get('products_status');
			$products_id                = $this->input->get('products_id');
			if($products_status != '' && $products_id != ''){
				if($products_status == 'ocultar'){
					$this->products_model->update_products_($products_id,array('products_status'=>'0'));
				}else{
					$this->products_model->update_products_($products_id,array('products_status'=>'1'));
				}
			}
			if( $this->data['mostrar'] == 'agotados'){
				$this->data['where'] = array( 'sae_exist' => '0' );
			}
			$this->data['products']	= '';
			$this->data['provmd5'] = md5(trim($this->data['proveedor_id'])*10);
			$this->data['prov01'] = $this->varios_model->get_proveedores_sae();
			//echo var_dump($this->data['prov']);
			$this->load->view('proveedores', $this->data);
		} else {
		//	$this->show_login(false);
		$this->load->view('Login');
		}



	}

	function show_login( $show_error = false ) {
		$data['error'] = $show_error;
		$this->load->helper('form');
		$this->load->view('login',$data);
	}
	public function Autenticar()
	{

		$this->data['password'] = md5($this->input->post('password'));
		$this->data['enabled']  = '1';
		$this->data['return']='';
//		$this->data['return']   = $this->cloud_model->get_usuario( $this->data );
/*if($this->data['password']== md5("159")){
//	$this->data['return']->id_user = "1";
	$this->data['return']->acl = "3";
}*/



if($this->data['password']==md5("159")){
			$this->data_r['login_status'] = 'success';
			$this->data_r['redirect_url'] = base_url()."proveedores";
//			$this->session->userdata('isLoggedIn')=true;
			$this->session->set_userdata(
				array(
					'logged_in' => TRUE,
					'isLoggedIn' => TRUE
				)
			);

		}
		else
		{
			$this->data_r['login_status'] = 'invalid';
		}

		echo json_encode( $this->data_r );
	}

	public function Salir()
	{
		$this->session->sess_destroy();
		redirect('proveedores');
	}
	public function codigo($md5,$id){



		if(empty($md5) || empty($id)){

			header("HTTP/1.1 404 Not Found");

			die();

		}



		$this->load->helper('moneda');

		$this->load->library('user_agent');



		$this->data['provmd5'] = md5(trim($id)*10);



		if($this->data['provmd5'] == $md5){



				//$proveedor = str_pad($id, 10, ' ', STR_PAD_LEFT);

				$proveedor = trim($id);



				$products1 = $this->products_model->search_($proveedor, '', '', '', '', 'ventas');



				$this->data['products'] = $products1;



				//echo var_dump($this->data['products']);



				$this->load->view('codigo_compras', $this->data);



		}else{

			header("HTTP/1.0 404 Not Found");

			die();

		}

		

		//

	}



	



}



/* End of file proveedores.php */

/* Location: ./application/controllers/proveedores.php */