<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todos extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('products_model');
		$this->load->model('varios_model');
		$this->load->library('user_agent');
	}

    public function index(){
        $this->load->library('user_agent');
        $this->load->helper('detect');
        
        detect_www();

        $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            
        $this->data['categories']   = $this->products_model->get_categories();
        $this->data['fecha']        = $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
        
        $this->data['solo_ofertas'] = $this->varios_model->get_solo_ofertas();

        $this->data['marcas']       = $this->products_model->get_marcas();

        $this->data['marca_id']     = $this->input->get('marca');
        $this->data['categoria_id'] = $this->input->get('categoria');
        $this->data['palabra']      = $this->input->get('palabra');

        $this->data['existencias']  = $this->input->get('existencias');
        $this->data['ordenar']      = $this->input->get('ordenar');
        
        $this->data['mostrar']      = $this->input->get('mostrar');
        $this->data['where']        = '';

        if( $this->data['mostrar'] == 'agotados'){
            $this->data['where'] = array( 'sae_exist' => '0' );
        }

        $this->data['products']     = '';

        /*if($this->data['marca_id'] != '' || $this->data['categoria_id'] != '' || $this->data['palabra'] != '' || $this->data['existencias'] != '' || $this->data['ordenar'] != ''){
            $this->data['products'] = $this->products_model->search($this->data['marca_id'], $this->data['categoria_id'], $this->data['palabra'], $this->data['existencias'], $this->data['ordenar']);
            if($this->data['products'] == NULL){
                $this->data['products'] = 'No se encontraron resultados, modifique su el filtro de búsqueda.';
            }
        }*/
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

        $this->load->view('header_todos', $this->data);
        $this->load->view('home_todos');
        $this->load->view('footer_todos');
    }

	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */