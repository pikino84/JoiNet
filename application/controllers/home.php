<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

error_reporting(-1);
ini_set('memory_limit', '512M');

class Home extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('varios_model');
		$this->load->library('user_agent');
	}



	public function index(){//x_caja
		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories']	= $this->products_model->get_categories();
		$this->data['categories_a']	= $this->products_model->get_categories_volantes(1);
		$this->data['fecha']		= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas']		= $this->products_model->get_marcas();

		$this->data['marca_id']		= $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra']		= $this->input->get('palabra');

		$this->data['existencias']	= $this->input->get('existencias');
		$this->data['ordenar']		= $this->input->get('ordenar');
		
		$this->data['mostrar']		= $this->input->get('mostrar');
		$this->data['where'] 		= '';

		if( $this->data['mostrar'] == 'agotados'){
			$this->data['where'] = array( 'sae_exist' => '0' );
		}

		$this->data['products']		= '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){

			$products1 = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);

			if(is_numeric($this->data['palabra']))
			{
				$products2 = $this->products_model->search2($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
				$this->data['products'] = array_merge($products1, $products2);
			}else{
				$this->data['products'] = $products1;
			}

			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		$this->load->view('header_buscador', $this->data);
		$this->load->view('x_caja');
		//$this->load->view('home_filtro');
		$this->load->view('footer_fix');
	}

	public function foo(){
		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories']	= $this->products_model->get_categories();
		$this->data['categories_a']	= $this->products_model->get_categories_volantes(1);
		$this->data['fecha']		= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas']		= $this->products_model->get_marcas();

		$this->data['marca_id']		= $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra']		= $this->input->get('palabra');

		$this->data['existencias']	= $this->input->get('existencias');
		$this->data['ordenar']		= $this->input->get('ordenar');
		
		$this->data['mostrar']		= $this->input->get('mostrar');
		$this->data['where'] 		= '';

		if( $this->data['mostrar'] == 'agotados'){
			$this->data['where'] = array( 'sae_exist' => '0' );
		}

		$this->data['products']		= '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){

			$products1 = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);

			if(is_numeric($this->data['palabra']))
			{
				$products2 = $this->products_model->search2($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
				$this->data['products'] = array_merge($products1, $products2);
			}else{
				$this->data['products'] = $products1;
			}

			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		$this->load->view('header_buscador', $this->data);
		$this->load->view('home_filtro_a');
		//$this->load->view('home_filtro');
		$this->load->view('footer_buscador2');
	}

	public function index_temp(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories']	= $this->products_model->get_categories();
		$this->data['fecha']		= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas']		= $this->products_model->get_marcas();

		$this->data['marca_id']		= $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra']		= $this->input->get('palabra');

		$this->data['existencias']	= $this->input->get('existencias');
		$this->data['ordenar']		= $this->input->get('ordenar');
		
		$this->data['mostrar']		= $this->input->get('mostrar');
		$this->data['where'] 		= '';

		if( $this->data['mostrar'] == 'agotados'){
			$this->data['where'] = array( 'sae_exist' => '0' );
		}

		$this->data['products']		= '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){

			$products1 = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
			//$products2 = $this->products_model->search2($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);

			//$this->data['products'] = array_merge($products1, $products2);

			if(is_numeric($this->data['palabra']))
			{
				$products2 = $this->products_model->search2($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
				$this->data['products'] = array_merge($products1, $products2);
			}else{
				$this->data['products'] = $products1;
			}

			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		//echo var_dump($this->data['products']);

		$this->load->view('header_buscador', $this->data);
		//$this->load->view('home_filtro2');
		$this->load->view('home_filtro');
		$this->load->view('footer_buscador');
	}

	public function todos(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories']	= $this->products_model->get_categories();
		$this->data['fecha']		= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas']		= $this->products_model->get_marcas();

		$this->data['marca_id']		= $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra']		= $this->input->get('palabra');

		$this->data['existencias']	= $this->input->get('existencias');
		$this->data['ordenar']		= $this->input->get('ordenar');
		
		$this->data['mostrar']		= $this->input->get('mostrar');
		$this->data['where'] 		= '';

		if( $this->data['mostrar'] == 'agotados'){
			$this->data['where'] = array( 'sae_exist' => '0' );
		}

		$this->data['products']		= '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){
			$this->data['products'] = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		$this->load->view('header_buscador', $this->data);
		$this->load->view('home_filtro');
		$this->load->view('footer_buscador');
	}

	 

	public function dist()//index //prueba_buscador
	{
		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories']	= $this->products_model->get_categories();
		$this->data['fecha']		= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas']		= $this->products_model->get_marcas();

		$this->data['marca_id']		= $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra']		= $this->input->get('palabra');

		$this->data['existencias']	= $this->input->get('existencias');
		$this->data['ordenar']		= $this->input->get('ordenar');
		
		$this->data['mostrar']		= $this->input->get('mostrar');
		$this->data['where'] 		= '';

		if( $this->data['mostrar'] == 'agotados'){
			$this->data['where'] = array( 'sae_exist' => '0' );
		}

		$this->data['products']		= '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){

			$products1 = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
			//$products2 = $this->products_model->search2($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);

			//$this->data['products'] = array_merge($products1, $products2);

			if(is_numeric($this->data['palabra']))
			{
				$products2 = $this->products_model->search2($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
				$this->data['products'] = array_merge($products1, $products2);
			}else{
				$this->data['products'] = $products1;
			}

			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		//echo var_dump($this->data['products']);

		$this->load->view('header_buscador', $this->data);
		$this->load->view('home_filtro');
		$this->load->view('footer_buscador');
	}

	public function v7()//Prueba de paginador
	{
		$this->load->library('user_agent');
		$this->load->helper('detect');
		$this->load->library('pagination');
		
		detect_www();

		$dias  = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories']	= $this->products_model->get_categories();
		$this->data['fecha']		= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->data['marcas']		= $this->products_model->get_marcas();
		
		$this->data['marca_id']		= $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra']		= $this->input->get('palabra');
		
		$this->data['existencias']	= $this->input->get('existencias');
		$this->data['ordenar']		= $this->input->get('ordenar');
		
		$this->data['mostrar']		= $this->input->get('mostrar');
		$this->data['where'] 		= '';

		if( $this->data['mostrar'] == 'agotados'){
			$this->data['where'] = array( 'sae_exist' => '0' );
		}

		$this->data['products'] = '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){

			$products1 = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);

			if(is_numeric($this->data['palabra'])){
				$products2 = $this->products_model->search2($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
				$this->data['products'] = array_merge($products1, $products2);
			}else{
				$this->data['products'] = $products1;
			}

			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		$this->load->view('header_buscador', $this->data);
		$this->load->view('v7');
		$this->load->view('footer_buscador');
	}

	public function sae7(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas'] = $this->products_model->get_marcas();

		$this->data['marca_id'] = $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra'] = $this->input->get('palabra');

		$this->data['products'] = '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != ''){
			$this->data['products'] = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra']);
			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		$this->load->view('header_buscador', $this->data);
		$this->load->view('home_sae7');
		$this->load->view('footer_buscador');
	}

	public function volantes()
	{
		set_time_limit(0);
		error_reporting(-1);
		/*$this->data['limit1']     = $limit1;
		$this->data['limit2']     = $limit2;*/
		$this->data['categories'] = $this->products_model->get_categories_volantes();
		$this->load->view('volantes2', $this->data);
	}

	public function lista($idcat)
	{
		set_time_limit(0);
		error_reporting(-1);
		/*$this->data['limit1']     = $limit1;
		$this->data['limit2']     = $limit2;*/
		$this->data['categories'] = $this->products_model->get_categories_volantes($idcat);
		$this->load->view('lista', $this->data);
	}

	/*public function index(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->load->view('home4_ajax', $this->data);
	}*/

	/*public function buscador(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas'] = $this->products_model->get_marcas();

		$this->data['marca_id'] = $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra'] = $this->input->get('palabra');

		$this->data['products'] = '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != ''){
			$this->data['products'] = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra']);
			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		$this->load->view('header_buscador', $this->data);
		$this->load->view('home_buscador');
		$this->load->view('footer_buscador');
	}*/

	public function orden(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		$this->data['marcas'] = $this->products_model->get_marcas();

		$this->data['marca_id'] = $this->input->get('marca');
		$this->data['categoria_id'] = $this->input->get('categoria');
		$this->data['palabra'] = $this->input->get('palabra');

		$this->data['products'] = '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != ''){
			$this->data['products'] = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra']);
			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}

		$this->data['estados'] = $this->varios_model->get_estados();

		$this->data['cart_contents'] = $cart = $this->cart->contents();

		if(empty($this->data['cart_contents'])){
			redirect('/home/buscador/', 'refresh');
		}

		$this->load->view('header_buscador', $this->data);
		$this->load->view('orden');
		$this->load->view('footer_buscador');
	}

	public function paginador(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->load->view('home4_ajax_paginador', $this->data);
	}

	public function cat(){

		$fk_categoria= $this->input->post('cat');

		$return_cat = $this->products_model->get_products(array('fk_categoria'=>$fk_categoria));

		echo json_encode($return_cat);

	}

	/*public function index(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->load->view('home4', $this->data);
	}

	public function ajax(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->load->view('home4_ajax', $this->data);
	}*/

	public function h11(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		/*$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		$no_cache = $this->input->get('no_cache');
		if(!empty($no_cache)){
			$this->cache->clean();
		}

		$this->output->cache(5);*/

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		//$this->data['total_items_j']= $this->cart->total_items();
		
		//$this->data['banners'] = $this->products_model->get_banners();
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->load->view('home-11-dic', $this->data);
	}

	public function no_precio(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();


		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->load->view('home_no_precio', $this->data);
	}

	public function v2015(){

		$this->load->library('user_agent');
		$this->load->helper('detect');

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		$this->data['ver'] = $this->input->get('ver');
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		//$this->data['cart_contents'] = $this->cart->contents(); 
		
		//echo var_dump($this->data['cart_contents']);

		$this->load->view('v2015', $this->data);
		//$this->load->view('form_test', $this->data);
	}

	public function form_test(){

		$this->load->library('user_agent');
		$this->load->helper('detect');

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

		$this->data['ver'] = $this->input->get('ver');
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		//$this->data['cart_contents'] = $this->cart->contents(); 
		
		//echo var_dump($this->data['cart_contents']);

		$this->load->view('form_test', $this->data);
	}
	
	public function v3(){
		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['total_items_j']= $this->cart->total_items();
		
		$this->data['banners'] = $this->products_model->get_banners();
		
		$this->load->view('home3', $this->data);
	}

	public function v4(){

		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		$no_cache = $this->input->get('no_cache');
		if(!empty($no_cache)){
			$this->cache->clean();
		}

		$this->output->cache(5);

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['total_items_j']= $this->cart->total_items();
		
		//$this->data['banners'] = $this->products_model->get_banners();
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->load->view('home4', $this->data);
	}

	public function v5(){

		//$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		$no_cache	=	$this->input->get('no_cache');

		if(!empty($no_cache)){
			$this->cache->clean();
		}

		date_default_timezone_set('America/Mexico_City');

		$dias	= array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');
		$meses	= array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');



		//$dias	=array( "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
		//$meses	=array( "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		//$fecha	=$dias[date( 'w')]. " ".date( 'd'). " de ".$meses[date( 'n')-1]. " del ".date( 'Y');
							
		$this->data['categories']	=	$this->products_model->get_categories();
		$this->data['fecha']		=	$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		$this->data['solo_ofertas']	=	$this->varios_model->get_solo_ofertas();

		//$this->output->cache(5);
		
		$this->load->view('home5', $this->data);
	}

	public function v6(){//Versión 6.0 Integración de Botón de Mercado Pago

		//$this->load->library('mercadopago');	//Cargamos Libreria de Mercado Pago

		date_default_timezone_set('America/Mexico_City');	//Seteamos la zona horaria de Mexico

		$dias	= array('Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado');	//Hacemos un arreglo para mostrar los dias de la semana en la vista
		$meses	= array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');	//Arreglo para mostrar los meses en la vista
							
		$this->data['categories']	=	$this->products_model->get_categories();	//Cargamos las categorias para mostrarlas en la vista
		$this->data['fecha']		=	$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');	//Le damos formato a la fecha "Última actualización: Martes 23 de Junio del 2015"
		$this->data['solo_ofertas']	=	$this->varios_model->get_solo_ofertas();	//Cargamos las imagenes de solo ofertas

		$this->load->view('home6', $this->data);	//Cargamos la vista de nuestra versión 6 y pasamos el objeto con la información a desplegar
	}
	
	public function google_merchant(){
		
		$pxml = '<?xml version="1.0"?>
					<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
						<channel>
							<title>Massive PC</title>
							<link>http://www.massivepc.com/mayoreo/</link>
							<description>Massive Pc - Mayorista en equipo de cómputo</description>';
		
		$this->data['categories'] = $this->products_model->get_categories();
		
		foreach($this->data['categories'] as $categorie):
			if($categorie->id_categoria != 21){
				$this->data['products'] = $this->products_model->get_products(array('fk_categoria'=>$categorie->id_categoria,'sae_exist >'=>'3','products_status'=>'1'));
			}
			
			foreach($this->data['products'] as $product):
				$con_iva = $product->products_price + (16*($product->products_price/100));
				//if($product->products_id!='20336')
$os = array(
'7809','17310','10449','10458','12534','16204','13811','14859','17537','17551','17608','17854','17895','20055','20307','20480','20500','20680','20681','20682','20683','20684','20685',
'20500','20680','20681',
'15747','16408','17235','16407','16409','16537','16278','17093','17000','17008','17092','17074','17087','17097','17242','17101','17094','17089','17331','17324',
'13045','14121','15411','15412','15437','15477','15497','15867','15878','16351','16399','16575','16615','16660','16669','16673','16677','16678','16680','16859','16918','16959','17166','17167','17442','17461','17505','17564','17625','18154','18778','18847','18957','19386','19534','19541','19924','19975','19986','20050','20110','20178','20181','20185','20296','20297','20302','20339','20395','20422','20451','20505','20512','20602','20603','20604','20605','20606','20607','20628','20629','20702','20725','20726'
);
if (!in_array($product->products_id, $os)){	
				$pxml .=  '
				<item>
					<title>'.ucfirst(mb_strtolower($product->products_name)).'</title>
					<link>http://www.massivepc.com/-p-'.$product->products_id.'.html</link>
					<description>'.ucfirst(mb_strtolower($product->products_name)).'</description>
					<g:image_link>http://www.massivepc.com/images/'.$product->products_imagelarge.'</g:image_link>
					<g:price>'.$con_iva.'</g:price>
					<g:condition>new</g:condition>
					<g:availability>in stock</g:availability>
					<g:id>'.$product->products_id.'</g:id>
				</item>';
				$test.=$product->products_id." - ". ucfirst(mb_strtolower($product->products_name))."<br>\n";
}
			endforeach;
        endforeach;   
		


		//			die($test);
		$pxml .=  '</channel>
					</rss>';					
		echo $pxml;
		$this->output->set_content_type('text/xml');
		
	}

	public function mercadopago(){

		/*$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		$no_cache = $this->input->get('no_cache');
		if(!empty($no_cache)){
			$this->cache->clean();
		}

		$this->output->cache(5);
*/
		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		//$this->data['total_items_j']= $this->cart->total_items();
		
		//$this->data['banners'] = $this->products_model->get_banners();
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		$this->load->view('home4_mercadopago', $this->data);
	}

	public function p_estatus()
	{
		$estatus     = $this->input->post('estatus');
		$products_id = $this->input->post('products_id');

		if($estatus != '' && $products_id != '')
		{
			if($estatus == '0')
			{
				$q = $this->products_model->update_products_2($products_id,array('products_status'=>'0'));
				//$this->products_model->update_precio_ma($products_id, array('fk_categoria'=>'21'));
				echo json_encode(array('e'=>$estatus,'p'=>$products_id, 'q'=>$q));
			}else{
				$q = $this->products_model->update_products_2($products_id,array('products_status'=>'1'));
				echo json_encode(array('e'=>$estatus,'p'=>$products_id, 'q'=>$q));

			}
		}
	}

	public function p_descontinuado()
	{
		$descontinuado = $this->input->post('descontinuado');
		$products_id   = $this->input->post('products_id');

		if($descontinuado != '' && $products_id != '')
		{
			if($descontinuado == '0')
			{
				$q = $this->products_model->update_products_2($products_id,array('descontinuado'=>'0'));
			}else{
				$q = $this->products_model->update_products_2($products_id,array('descontinuado'=>'1'));
			}
		}
	}

	

	public function compras($session_id=false){

		/*if(empty($session_id)){
			header("HTTP/1.1 404 Not Found");
			die();
		}

		if($session_id != 'a3807781fa06fa7cb5c11014839d2ea6'){
			header("HTTP/1.0 404 Not Found");
			die();
		}*/


		$this->load->helper('moneda');
		$this->load->model('compras_model');

		$dias	= array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses	= array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories']   = $this->products_model->get_categories_all();
		$this->data['fecha']        = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
		
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();
		
		

		/************************************/
		$this->load->library('user_agent');
		$this->load->helper('detect');
		
		detect_www();

		$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		//$this->data['categories']   = $this->products_model->get_categories();
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

		$this->data['products']		= '';

		if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != '' || $this->data['proveedor_id'] != ''){

			$products1 = $this->products_model->search_($this->data['proveedor_id'], $this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
			
			//echo var_dump($products1);
			//die();

			if(is_numeric($this->data['palabra']))
			{
				$products2 = $this->products_model->search2_($this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
				$this->data['products'] = array_merge($products1, $products2);
			}else{
				$this->data['products'] = $products1;
			}
			

			if($this->data['products'] == NULL){
				$this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
			}
		}
		
		
		/************************************/
		$this->data['prov'] = $this->varios_model->get_proveedores_sae();
		
		//echo var_dump($this->data);
		//echo 'test';
		$this->load->view('home4_compras', $this->data);
	}

	public function compras_k($session_id=false){

		if(empty($session_id)){
			header("HTTP/1.1 404 Not Found");
			die();
		}

		if($session_id != 'a3807781fa06fa7cb5c11014839d2ea6'){
			header("HTTP/1.0 404 Not Found");
			die();
		}

		$this->load->helper('moneda');

		$dias	= array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
		$meses	= array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
							
		$this->data['categories'] = $this->products_model->get_categories();
		$this->data['fecha']=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
				
		$this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

		/*$this->data['fleteinternacional'] = $this->input->get('fleteinternacional');
		$this->data['fletenacional'] = $this->input->get('fletenacional');
		$this->data['custodia'] = $this->input->get('custodia');
		$this->data['impuestosaduanales'] = $this->input->get('impuestosaduanales');
		$this->data['otros'] = $this->input->get('otros');*/
		$this->data['sumc'] = $this->input->get('sumc');
		
		$this->load->view('home4_compras_k', $this->data);
	}

	public function getrmb(){


		$moneda_origen = 'CNY';
		$moneda_destino = 'MXN';
		$cantidad = 1;

		$get = file_get_contents("https://www.google.com/finance/converter?a=$cantidad&from=$moneda_origen&to=$moneda_destino");
		$get = explode("<span class=bld>",$get);
		$get = explode("</span>",$get[1]);  
		echo preg_replace("/[^0-9\.]/", null, $get[0]);




	}

	private function conversor_monedas($moneda_origen,$moneda_destino,$cantidad) {
		$get = file_get_contents("https://www.google.com/finance/converter?a=$cantidad&from=$moneda_origen&to=$moneda_destino");
		$get = explode("<span class=bld>",$get);
		$get = explode("</span>",$get[1]);  
		return preg_replace("/[^0-9\.]/", null, $get[0]);
	}
	

}






















/* End of file home.php */
/* Location: ./application/controllers/home.php */