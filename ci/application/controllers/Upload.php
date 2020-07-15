<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->database();
		$this->load->library('image_CRUD');
		$this->user = $this->session->userdata('logged_user');
	}
	
	function _example_output($output = null){
		$this->load->view('example.php',$output);	
	}
	
	function index(){
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	function galeria_productos(){
		if(!$this->user) redirect ('panel/login');
		$image_crud = new image_CRUD();
	
		$image_crud->set_primary_key_field('i');
		$image_crud->set_url_field('imagengrande');
		$image_crud->set_table('products_gallery')
		->set_relation_field('products_id')
		->set_ordering_field('priority')
		->set_image_path('../images');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);
	}

	
	
	
}