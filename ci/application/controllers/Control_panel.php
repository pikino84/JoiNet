<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control_panel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('login_model');
		$this->load->model('products_model');
        $this->load->helper('form');
		$this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->helper('text');
		$this->user = $this->session->userdata('logged_user');
	}
	
	public function productos(){

		$this->data['productos'] = $this->products_model->get_productos_all_info( array('products_status' => '1') );
		$this->data['categorias_publico'] = $this->products_model->get_categories_public();
		$this->data['categorias_mayoreo'] = $this->products_model->get_categories_mayoreo();
		$this->data['fabricantes'] = $this->products_model->get_manufacturers();

		$this->load->view('cp_header', $this->data);
		$this->load->view('control_panel');
		$this->load->view('cp_footer');

	}

	public function edit_product($products_id){

		$this->data['categorias_publico'] = $this->products_model->get_categories_public();
		$this->data['categorias_mayoreo'] = $this->products_model->get_categories_mayoreo();
		$this->data['fabricantes'] = $this->products_model->get_manufacturers();
		
		$this->data['producto'] = $this->products_model->get_product($products_id);

		$this->load->view('cp_header', $this->data);
		$this->load->view('cp_edit_product_info');
		$this->load->view('cp_footer');

	}

	public function get_product(){

		$this->data['products_id'] = $this->input->post('products_id');

		$result = $this->products_model->get_product($this->data['products_id']);

		echo json_encode($result);
	}

	public function save_product(){

		$this->data1['products_status'] = $this->input->post('products_status');
		$this->data1['manufacturers_id'] = $this->input->post('manufacturers_id');
		$this->data1['products_model'] = $this->input->post('products_model');
		$this->data1['costo'] = $this->input->post('costo');
		$this->data1['costo_nacional'] = $this->input->post('costo_nacional');
		$this->data1['products_price'] = $this->input->post('products_price');
		$this->data1['products_retail_price2'] = 20;
		$this->data1['retail'] = 2;
		

		/*$insert_id = $this->products_model->set_products($this->data1);

		if(!is_numeric($insert_id)){
			echo json_encode( array('code'=>'error', 'data'=>'Ocurrio un error'.$insert_id) );
			exit;
		}

		$this->data2['products_id'] = $insert_id;
		$this->data2['products_name'] = $this->input->post('products_name');
		$this->data2['language_id'] = 3;
		$this->products_model->set_product_name($this->data2);

		$this->data3['products_id'] = $insert_id;
		$this->data3['categories_id'] = $this->input->post('id_categoria');
		$this->products_model->set_products_to_categories($this->data3);


		$this->data4['fk_categoria'] = $this->input->post('fk_categoria');
		$this->data4['precio_mayoreo'] = $this->input->post('precio_mayoreo');
		$this->data4['precio_distribuidor'] = $this->input->post('precio_distribuidor');
		$this->products_model->set_mayoreo_productos($this->data4);*/
		
		$insert_id = 123;

		echo json_encode( array('code'=>'successful', 'data'=>'Producto guardado correctamente código:'.$insert_id) );

		//$this->data['products_image'] = $this->input->post('products_image');
		//$this->data['products_imagelarge'] = $this->input->post('products_imagelarge');
		//$this->data['descripcion'] = $this->input->post('descripcion');

		//echo json_encode($this->data);

		/*$config['upload_path'] = '../images/';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '60';
		$config['max_width']  = '80';
		$config['max_height']  = '80';
		$config['overwrite']  = 'false';
		$config['encrypt_name']  = 'true';
		$config['remove_spaces']  = 'true';

		$this->load->library('upload', $config);

		$field_name = "products_image";
		if (!$this->upload->do_upload($field_name)){
			$this->data['error'] = array('error' => $this->upload->display_errors());
		}else{
			$this->data['upload_data'] = $this->upload->data();
		}*/

		//echo json_encode($this->data);

		

	}
	
	
}