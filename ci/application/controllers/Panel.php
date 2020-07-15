<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Panel extends CI_Controller {



	public function __construct(){

		parent::__construct();

		$this->load->library('Grocery_CRUD');

		$this->load->model('login_model');

		$this->load->model('products_model');

        $this->load->helper('form');

		$this->load->helper('security');

        $this->load->library('form_validation');

		$this->user = $this->session->userdata('logged_user');

	}

	public function login(){
		//if($this->user) redirect ('Panel/productos');
		$this->load->view('r00t3d/login');
	}



	public function salir(){
        $this->session->unset_userdata('logged_user');
		$this->session->sess_destroy();
        redirect('Panel/login');
    }

	

	public function auth(){
		$email=$this->input->get('email');
		$passmd5= do_hash($this->input->get('password'), 'md5');
		if(!empty($email) && !empty($passmd5)){	
			$usr_pass=$this->login_model->login_user($email,$passmd5);
			if($usr_pass == TRUE){
				$this->session->set_userdata('logged_user', $usr_pass);
				$data['auth']=TRUE;
			}else{
				$data['auth']=FALSE;
			}
			echo json_encode($data);
		} 

	}



	public function _panel_output($output = null){

		$this->load->view('panel',$output);

	}



	public function index(){

		//header('Location: http://192.168.0.3/');

		if(!$this->user) redirect ('Panel/login');

		$this->_panel_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));

	}



	public function no_foto(){

		$productos = $this->products_model->get_no_foto();



		foreach($productos as $producto){

			echo $producto->products_id.' - '.$producto->products_name.'<br>';

		}

	}

	

	public function productos(){

			//header('Location: http://192.168.0.3/');

			//echo var_dump($this->user);
			//die();


			//if(!$this->user) redirect ('Panel/login');

			//if($this->user->id_user!='1') redirect ('Panel/productos_descripcion');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products');

			$crud->set_subject('Producto');

			$crud->order_by('products_id','desc');

			$crud->where('MyBusiness20','1');

			

			$crud->columns('products_id','articulo','products_name','products_quantity','products_imagelarge','Precio Neto','Precio mayoreo','Precio distribuidor','Galería','orden','MyBusinessPos20','products_quantity_ct','fecha_actualizado');

			$crud->edit_fields('products_status','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','articulo','products_shipping','products_image','products_imagelarge','descripcion','agotado','orden','peso');//tpm_img_desc

			$crud->add_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','articulo','products_shipping','products_image','products_imagelarge','descripcion','agotado','orden','peso');//tpm_img_desc



			$crud->display_as('products_id','Clave')

				->display_as('products_quantity_ct','Ventas')
						
				 ->display_as('id_categoria','Categoría')

				 ->display_as('manufacturers_id','Fabricante')

				 ->display_as('products_status','Estado')

				 ->display_as('products_name','Nombre')

				 ->display_as('products_price','Precio (sin iva)')

				 ->display_as('precio_neto','Precio (neto)')

				 ->display_as('products_retail_price2','Porcentaje falso de aumento')

				 ->display_as('products_quantity','Cantidad')

				 //->display_as('products_model','Modelo')

				 ->display_as('products_weight','Peso')

				 ->display_as('products_image','Imagen pequeña (80px x 80px)')

				 ->display_as('products_imagelarge','Imagen Grande (666px × 500px)')

				 //->display_as('products_warranty','Garantia')

				 ->display_as('products_shipping','Envio')

				 ->display_as('tpm_img_desc','Imagen de descripción');

				 

			$crud->required_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','products_model','products_shipping');

			

			//$crud->field_type('products_warranty', 'string');

			$crud->field_type('products_shipping','dropdown',array('En almacén' => 'En almacén','Agotado' => 'Agotado'));

			$crud->field_type('products_status','dropdown',array('1' => 'Disponible','0' => 'Agotado'));

			$crud->field_type('agotado','dropdown',array('1' => 'Si','0' => 'No'));

			$crud->field_type('solo_sae','dropdown',array('1' => 'Si','0' => 'No'));

			$crud->field_type('products_quantity', 'hidden', '999');

			

			

			//$crud->callback_edit_field('products_name',array($this,'edit_products_name'));

			$crud->callback_edit_field('descripcion',array($this,'edit_descripcion'));

			//$crud->callback_column('products_name',array($this,'_callback_products_name'));

			$crud->callback_column('Precio Neto',array($this,'_callback_precio_neto'));

			$crud->callback_column('Precio mayoreo',array($this,'_callback_precio_mayoreo'));

			$crud->callback_column('Precio distribuidor',array($this,'_callback_precio_distribuidor'));

			$crud->callback_after_update(array($this, 'products_desc_after_update'));

			$crud->callback_after_insert(array($this, 'categories_after_insert')); // Despues de insertar

			$crud->callback_column('Galería',array($this,'_callback_galeria'));

			$crud->callback_column('MyBusinessPos20',array($this,'_callback_sae'));

			$crud->callback_add_field('products_name',array($this,'add_products_name'));

			$crud->callback_add_field('products_name',array($this,'add_products_name'));

			$crud->callback_field('precio_neto',array($this,'precio_neto_blank'));



			$crud->set_relation('manufacturers_id','manufacturers','manufacturers_name');

			$crud->set_relation('id_categoria','categories_description','categories_name');

			$crud->set_relation('usuario_actualizo','r00t3d','nombre');

			

			$crud->set_field_upload('products_imagelarge','../images');

			$crud->set_field_upload('products_image','../images');

			//$crud->set_field_upload('tpm_img_desc','../images');



			$crud->callback_after_upload(array($this,'_callback_after_upload_80_500'));

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	

	

	public function _callback_sae($value, $row){

		if($row->MyBusiness20 == '1'){

			return '

			<div class="tools">

				<div class="btn-group">

					<button class="btn btn-success">SI</button>

					<button data-toggle="dropdown" class="btn dropdown-toggle">

						<span class="caret"></span>

					</button>

					<ul class="dropdown-menu">

						<li>

							<a title="Actualizar" href="#" onClick="window.open(\'http://192.168.0.3:8080/sae/update_producto/'.$row->products_id.'\', \'_blank\', \'width=500,height=200,scrollbars=no,status=no,resizable=no,screenx=0,screeny=0\');">

								<i class="icon-pencil"></i>

								Actualizar

							</a>

						</li>

						<li>

					</ul>

				</div>

				<div class="clear"></div>

			</div>';

		}else{

			return '

			<div class="tools">

				<div class="btn-group">

					<button class="btn btn-danger">NO</button>

					<button data-toggle="dropdown" class="btn dropdown-toggle">

						<span class="caret"></span>

					</button>

					<ul class="dropdown-menu">

						<li>

							<a title="Agregar" href="#" onClick="window.open(\'http://192.168.0.3:8080/sae/set_producto/'.$row->products_id.'\', \'_blank\', \'width=500,height=200,scrollbars=no,status=no,resizable=no,screenx=0,screeny=0\');">

								<i class="icon-plus"></i>

								Agregar

							</a>

						</li>

						<li>

					</ul>

				</div>

				<div class="clear"></div>

			</div>';

		}

	}

	

	public function productos_print(){

			//if(!$this->user) redirect ('panel/login');

			//if($this->user->id_user!='1') redirect ('panel/productos_descripcion');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products');

			$crud->set_subject('Producto');

			$crud->order_by('products_id','desc');

			$crud->where('products_status','1');

			

			$crud->columns('products_id','products_imagelarge','products_name','Precio Neto','Precio mayoreo','Precio distribuidor');

			//$crud->edit_fields('products_status','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado');

			//$crud->add_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado');



			$crud->display_as('products_id','Clave')

				 ->display_as('id_categoria','Categoría')

				 ->display_as('manufacturers_id','Fabricante')

				 ->display_as('products_status','Estado')

				 ->display_as('products_name','Nombre')

				 ->display_as('products_price','Precio (sin iva)')

				 ->display_as('precio_neto','Precio (neto)')

				 ->display_as('products_retail_price2','Porcentaje falso de aumento')

				 ->display_as('products_quantity','Cantidad')

				 ->display_as('products_model','Modelo')

				 ->display_as('products_weight','Peso')

				 ->display_as('products_image','Imagen pequeña (80px x 80px)')

				 ->display_as('products_imagelarge','Imagen')

				 //->display_as('products_warranty','Garantia')

				 ->display_as('products_shipping','Envio')

				 ->display_as('tpm_img_desc','Imagen de descripción');

			

			//$crud->field_type('products_warranty', 'string');

			$crud->field_type('products_shipping','dropdown',array('En almacén' => 'En almacén','Agotado' => 'Agotado'));

			$crud->field_type('products_status','dropdown',array('1' => 'Disponible','0' => 'Agotado'));

			$crud->field_type('products_quantity', 'hidden', '999');

			

			

			//$crud->callback_edit_field('products_name',array($this,'edit_products_name'));

			//$crud->callback_edit_field('descripcion',array($this,'edit_descripcion'));

			$crud->callback_column('products_name',array($this,'_callback_products_name'));

			$crud->callback_column('Precio Neto',array($this,'_callback_precio_neto_print'));

			$crud->callback_column('Precio mayoreo',array($this,'_callback_precio_mayoreo_print'));

			$crud->callback_column('Precio distribuidor',array($this,'_callback_precio_distribuidor_print'));

			//$crud->callback_after_update(array($this, 'products_desc_after_update'));

			//$crud->callback_after_insert(array($this, 'categories_after_insert')); // Despues de insertar

			//$crud->callback_column('Galería',array($this,'_callback_galeria'));

			//$crud->callback_add_field('products_name',array($this,'add_products_name'));



			$crud->set_relation('manufacturers_id','manufacturers','manufacturers_name');

			$crud->set_relation('id_categoria','categories_description','categories_name');

			

			$crud->set_field_upload('products_imagelarge','../images');

			$crud->set_field_upload('products_image','../images');

			$crud->set_field_upload('tpm_img_desc','../images');



			

			$crud->unset_add();

			$crud->unset_edit();

			$crud->unset_delete();

			$crud->unset_export();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function productos_print2(){

			//if(!$this->user) redirect ('panel/login');

			//if($this->user->id_user!='1') redirect ('panel/productos_descripcion');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products');

			$crud->set_subject('Producto');

			$crud->order_by('products_id','desc');

			$crud->where('products_status','1');

			

			$crud->columns('products_id','products_imagelarge','products_name','Precio Neto','Precio mayoreo','Precio distribuidor');

			//$crud->edit_fields('products_status','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado');

			//$crud->add_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado');



			$crud->display_as('products_id','Clave')

				 ->display_as('id_categoria','Categoría')

				 ->display_as('manufacturers_id','Fabricante')

				 ->display_as('products_status','Estado')

				 ->display_as('products_name','Nombre')

				 ->display_as('products_price','Precio (sin iva)')

				 ->display_as('precio_neto','Precio (neto)')

				 ->display_as('products_retail_price2','Porcentaje falso de aumento')

				 ->display_as('products_quantity','Cantidad')

				 ->display_as('products_model','Modelo')

				 ->display_as('products_weight','Peso')

				 ->display_as('products_image','Imagen pequeña (80px x 80px)')

				 ->display_as('products_imagelarge','Imagen')

				 //->display_as('products_warranty','Garantia')

				 ->display_as('products_shipping','Envio')

				 ->display_as('tpm_img_desc','Imagen de descripción');

			

			//$crud->field_type('products_warranty', 'string');

			$crud->field_type('products_shipping','dropdown',array('En almacén' => 'En almacén','Agotado' => 'Agotado'));

			$crud->field_type('products_status','dropdown',array('1' => 'Disponible','0' => 'Agotado'));

			$crud->field_type('products_quantity', 'hidden', '999');

			

			

			//$crud->callback_edit_field('products_name',array($this,'edit_products_name'));

			//$crud->callback_edit_field('descripcion',array($this,'edit_descripcion'));

			$crud->callback_column('products_name',array($this,'_callback_products_name'));

			$crud->callback_column('Precio Neto',array($this,'_callback_precio_neto_print'));

			$crud->callback_column('Precio mayoreo',array($this,'_callback_precio_mayoreo_print'));

			$crud->callback_column('Precio distribuidor',array($this,'_callback_precio_distribuidor_print'));

			//$crud->callback_after_update(array($this, 'products_desc_after_update'));

			//$crud->callback_after_insert(array($this, 'categories_after_insert')); // Despues de insertar

			//$crud->callback_column('Galería',array($this,'_callback_galeria'));

			//$crud->callback_add_field('products_name',array($this,'add_products_name'));



			$crud->set_relation('manufacturers_id','manufacturers','manufacturers_name');

			$crud->set_relation('id_categoria','categories_description','categories_name');

			

			$crud->set_field_upload('products_imagelarge','../images');

			$crud->set_field_upload('products_image','../images');

			$crud->set_field_upload('tpm_img_desc','../images');



			

			$crud->unset_add();

			$crud->unset_edit();

			$crud->unset_delete();

			$crud->unset_export();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function _callback_precio_neto_print($value, $row){

		if($row->products_price > '1'){

			$con_iva = $row->products_price + (16*($row->products_price/100));

			return '$'.round($con_iva,2);

		}

	}

	

	public function _callback_precio_mayoreo_print($value, $row){

		$precio=$this->products_model->get_precio_mayoreo(array('fk_producto'=>$row->products_id));

		if(!empty($precio->precio_mayoreo)){

			return '$'.$precio->precio_mayoreo;

		}

	}

	

	public function _callback_precio_distribuidor_print($value, $row){

		$precio=$this->products_model->get_precio_mayoreo(array('fk_producto'=>$row->products_id));

		if(!empty($precio->precio_distribuidor)){

			return '$'.$precio->precio_distribuidor;

		}

	}

	

	public function _callback_precio_neto($value, $row){

		$con_iva = $row->products_price + (16*($row->products_price/100));

		return '$'.round($con_iva,2);

	}

	

	public function _callback_precio_publico($value, $row){

		$precio=$this->products_model->get_precio_publico(array('products_id'=>$row->fk_producto));

		if(!empty($precio->products_price)){

			//return '$'.$precio->products_price;

			$con_iva = $precio->products_price + (16*($precio->products_price/100));

			return '$'.round($con_iva,2);

		}else{

			return '';

		}

	}

	

	public function _callback_precio_mayoreo($value, $row){

		$precio=$this->products_model->get_precio_mayoreo(array('fk_producto'=>$row->products_id));

		if(!empty($precio->precio_mayoreo)){

			return '$'.$precio->precio_mayoreo;

		}else{

			return '<a class="btn btn-primary" onclick="window.open(\''.base_url().'panel/mayoreo_productos_popup/'.$row->products_id.'/add\', \'_blank\', \'width=800,height=600,scrollbars=no,status=no,resizable=no,screenx=0,screeny=0\');" href="javascript:void(0);">Agregar</a>';

		}

	}

	

	public function _callback_precio_distribuidor($value, $row){

		$precio=$this->products_model->get_precio_mayoreo(array('fk_producto'=>$row->products_id));

		if(!empty($precio->precio_distribuidor)){

			return '$'.$precio->precio_distribuidor;

		}else{

			return '<a class="btn btn-primary" onclick="window.open(\''.base_url().'panel/mayoreo_productos_popup/'.$row->products_id.'/add\', \'_blank\', \'width=800,height=600,scrollbars=no,status=no,resizable=no,screenx=0,screeny=0\');" href="javascript:void(0);">Agregar</a>';

		}

	}

	

	public function add_products_name(){

		//$test=$this->db->insert_id();

		$this->db->select_max('products_id');

		$query = $this->db->get('products');

		$r=$query->row();

		//$query = $this->db->row();

		//$this->db->insert('products_description',$product_insert);

		return '<input type="text" name="products_name"><br>El producto se insertara con el siguiente ID: '.($r->products_id + '1');

	}

	

	

	

	public function productos_todos(){

		//header('Location: http://192.168.0.3/');

			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user!='1' and $this->user->id_user!='9') redirect ('panel/productos_descripcion');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products');

			$crud->set_subject('Producto');

			$crud->order_by('products_id','desc');

			//$crud->where('products_status','1');

			

			$crud->columns('products_id','products_name','products_imagelarge','Precio Neto','Precio mayoreo','Precio distribuidor','Galería','orden');

			$crud->edit_fields('products_status','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado','orden');//tpm_img_desc

			$crud->add_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado','orden');//tpm_img_desc



			$crud->display_as('products_id','Clave')

				 ->display_as('id_categoria','Categoría')

				 ->display_as('manufacturers_id','Fabricante')

				 ->display_as('products_status','Estado')

				 ->display_as('products_name','Nombre')

				 ->display_as('products_price','Precio (sin iva)')

				 ->display_as('precio_neto','Precio (neto)')

				 ->display_as('products_retail_price2','Porcentaje falso de aumento')

				 ->display_as('products_quantity','Cantidad')

				 ->display_as('products_model','Modelo')

				 ->display_as('products_weight','Peso')

				 ->display_as('products_image','Imagen pequeña (80px x 80px)')

				 ->display_as('products_imagelarge','Imagen Grande (666px × 500px)')

				 //->display_as('products_warranty','Garantia')

				 ->display_as('products_shipping','Envio')

				 ->display_as('tpm_img_desc','Imagen de descripción');

				 

			$crud->required_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','products_model','products_shipping');

			

			//$crud->field_type('products_warranty', 'string');

			$crud->field_type('products_shipping','dropdown',array('En almacén' => 'En almacén','Agotado' => 'Agotado'));

			$crud->field_type('products_status','dropdown',array('1' => 'Disponible','0' => 'Agotado'));

			$crud->field_type('agotado','dropdown',array('1' => 'Si','0' => 'No'));

			$crud->field_type('products_quantity', 'hidden', '999');

			

			$crud->callback_edit_field('products_name',array($this,'edit_products_name'));

			//$crud->callback_edit_field('descripcion',array($this,'edit_descripcion'));

			$crud->callback_column('products_name',array($this,'_callback_products_name'));

			$crud->callback_column('Precio Neto',array($this,'_callback_precio_neto'));

			$crud->callback_column('Precio mayoreo',array($this,'_callback_precio_mayoreo'));

			$crud->callback_column('Precio distribuidor',array($this,'_callback_precio_distribuidor'));

			$crud->callback_after_update(array($this, 'products_desc_after_update'));

			$crud->callback_after_insert(array($this, 'categories_after_insert')); // Desdpues de insertar

			$crud->callback_column('Galería',array($this,'_callback_galeria'));

			$crud->callback_field('precio_neto',array($this,'precio_neto_blank'));



			

			

			$crud->set_relation('manufacturers_id','manufacturers','manufacturers_name');

			$crud->set_relation('id_categoria','categories_description','categories_name');

			

			$crud->set_field_upload('products_imagelarge','../images');

			$crud->set_field_upload('products_image','../images');

			//$crud->set_field_upload('tpm_img_desc','../images');

			$crud->callback_after_upload(array($this,'_callback_after_upload_80_500'));

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function categories_after_insert($post_array,$primary_key){

		$categories_insert = array(

			'products_id' => $primary_key,

			'categories_id' => $post_array['id_categoria']

		);

		$this->db->insert('products_to_categories',$categories_insert);

		

		$product_insert = array(

			'products_id' => $primary_key,

			'language_id' => '3',

			'products_name' => $post_array['products_name'],

			'products_description' => $post_array['descripcion']

			//'products_description' => '<img style=" display:block; margin:auto;" src="http://www.massivepc.com/images/'.$post_array['tpm_img_desc'].'"/>'

		);

		

		$this->db->insert('products_description',$product_insert);

		

		/*if($post_array['products_retail_price2'] >= '1'){

			$retail = '2';

		}else{

			$retail = '0';

		}*/

		

		$product_update = array(

			'products_retail_price2' => 20,

			'retail' => 2,

			'usuario_actualizo' => $this->user->id_user

		);

		$this->db->update('products',$products_update,array('products_id' => $primary_key));

		

		return true;

	}

	

	public function edit_products_name($value, $primary_key){

		$p_name=$this->products_model->get_products_description(array('products_id'=>$this->uri->segment(4)));

		return '<input id="products_name_js" type="text" value="'.addslashes($p_name->products_name).'" name="products_name" ><br><span id="counter_js"></span>';

	}

	

	public function edit_descripcion($value, $primary_key){

		$p_name=$this->products_model->get_products_description(array('products_id'=>$this->uri->segment(4)));

		return '

		<script src="http://massivepc.com/ci/assets/grocery_crud/texteditor/ckeditor/ckeditor.js"></script>

		<script src="http://massivepc.com/ci/assets/grocery_crud/texteditor/ckeditor/adapters/jquery.js"></script>

		<script src="http://massivepc.com/ci/assets/grocery_crud/js/jquery_plugins/config/jquery.ckeditor.config.js"></script>

		<textarea id="field-descripcion" name="descripcion" class="texteditor" >'.$p_name->products_description.'</textarea>';

	}

	

	public function _callback_products_name($value, $row){

		$p_name=$this->products_model->get_products_description(array('products_id'=>$row->products_id));

		if(!empty($p_name->products_name)){

			return '<a style="text-transform:uppercase;" target="_blank" href="http://www.massivepc.com/-p-'.$row->products_id.'.html">'.$p_name->products_name.'</a>';

		}else{

			return '';

		}

	}

	

	public function products_desc_after_update($post_array,$primary_key){

		$products_update = array(

			'products_name' => $post_array['products_name'],

			//'products_description' => '<img style=" display:block; margin:auto;" src="http://www.massivepc.com/images/'.$post_array['tpm_img_desc'].'"/>'

			'products_description' => $post_array['descripcion']

		);

		$this->db->update('products_description',$products_update,array('products_id' => $primary_key));

		

		

		/*if($post_array['products_retail_price2'] >= '1'){

			$retail = '2';

		}else{

			$retail = '0';

		}*/

		

		$product_retail_update = array(

			'products_retail_price2' => 20,

			'retail'      => 2,

			'usuario_actualizo' => $this->user->id_user

		);

		$this->db->update('products',$product_retail_update,array('products_id' => $primary_key));

		

		return true;

	}

	

	public function uploads_2015(){

		

		if(!$this->user) redirect ('panel/login');



		$crud = new grocery_CRUD();

		$crud->set_theme('twitter-bootstrap');

		$crud->set_table('uploads_2015');

		$crud->set_subject('Imagen');



		$crud->add_fields('imagen');

    	$crud->edit_fields('imagen');



    	$crud->where('usuario_inserto', $this->user->id_user);



    	$crud->set_relation('usuario_inserto','r00t3d','nombre');

    	$crud->set_relation('usuario_actualizo','r00t3d','nombre');



		$crud->set_field_upload('imagen','../images');

		$crud->order_by('id_imagen','desc');

		$crud->required_fields('imagen');

		$crud->unset_delete();

		$crud->unset_print();

		$crud->unset_export();



		$crud->callback_after_insert(array($this, 'log_user_after_insert'));

		$crud->callback_after_update(array($this, 'log_user_after_update'));



		$output = $crud->render();

		$this->_panel_output($output);

	

	}



	function log_user_after_insert($post_array,$primary_key){



		date_default_timezone_set('America/Mexico_City');



	    $user_logs_update = array(

	        'usuario_inserto' => $this->user->id_user,

	        'fecha_insertado' => date('Y-m-d H:i:s')

    	);

 

    	$this->db->update('uploads_2015',$user_logs_update,array('id_imagen' => $primary_key));

 

    	return true;

	}



	function log_user_after_update($post_array,$primary_key){



	    $user_logs_update = array(

	        'usuario_actualizo' => $this->user->id_user

    	);

 

    	$this->db->update('uploads_2015',$user_logs_update,array('id_imagen' => $primary_key));

 

    	return true;

	}



	

	

	public function productos_descripcion(){

		

			switch($this->user->id_user){

				case '1':

					redirect ('panel/productos_descripcion');

				break;

				case '3':

					redirect ('panel/mail_list');

				break;

				case '4':

					redirect ('panel/mayoreo_pedidos');

				break;

				case '5':

					redirect ('panel/productos_inventario');

				break;

				case '9':

					redirect ('panel/productos_compras');

				break;

				case '10':

					redirect ('panel/products_faq');

				break;

				case '11':

					redirect ('panel/products_faq');

				break;

				case '12':

					redirect ('panel/mayoreo_garantias');

				break;

				case '13':

					redirect ('panel/mayoreo_garantias');

				break;

				case '14':

					redirect ('panel/mayoreo_garantias');

				break;

				case '15':

					redirect ('panel/mayoreo_garantias');

				break;

				case '16':

					redirect ('panel/mayoreo_garantias');

				break;

				case '17':

					redirect ('panel/mayoreo_garantias');

				break;

				case '18':

					redirect ('panel/products_faq');

				break;

				case '19':

					redirect ('panel/productos_compras_p');

				break;

				case '20':

					redirect ('panel/ch_orders');

				break;



			}

		

			

			if(!$this->user) redirect ('panel/login');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products');

			$crud->set_subject('Producto');

			$crud->order_by('products_id','desc');

			//$crud->where('products_status','1');



			$crud->set_relation('usuario_actualizo','r00t3d','nombre');

			

			$crud->columns('products_id','products_name','products_imagelarge','Galería','usuario_actualizo','fecha_actualizado');

			$crud->edit_fields('products_image','products_imagelarge','descripcion');//tpm_img_desc



			$crud->display_as('products_id','Clave')

				 ->display_as('products_name','Nombre')

				 ->display_as('products_image','Imagen pequeña (80px x 80px)')

				 ->display_as('products_imagelarge','Imagen Grande (666px × 500px)')

				 ->display_as('descripcion','Descripción');

				 //->display_as('tpm_img_desc','Imagen de descripción');

			

			$crud->callback_column('products_name',array($this,'_callback_products_name'));

			$crud->callback_after_update(array($this, 'products_img_desc_after_update'));

			$crud->callback_column('Galería',array($this,'_callback_galeria'));

			

			$crud->unset_add();

			$crud->unset_delete();

			

			//$crud->set_field_upload('tpm_img_desc','../images');

			$crud->set_field_upload('products_image','../images');

			$crud->set_field_upload('products_imagelarge','../images');

			$crud->callback_after_upload(array($this,'_callback_after_upload_80_500'));

			//$crud->callback_after_update(array($this, 'log_user_after_update2'));

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	function log_user_after_update2($post_array,$primary_key){



	    $user_logs_update = array(

	        'usuario_actualizo' => $this->user->id_user

    	);

 

    	$this->db->update('products',$user_logs_update,array('products_id' => $primary_key));

 

    	return true;

	}

	

	public function _callback_galeria($value, $row){

		$atts = array(

			'class'		 =>	'btn btn-primary',

			'width'      => '800',

			'height'     => '600',

			'scrollbars' => 'no',

			'status'     => 'no',

			'resizable'  => 'no',

			'screenx'    => '0',

			'screeny'    => '0'

		);

		

		return anchor_popup('Upload/galeria_productos/'.$row->products_id, 'Agregar/Editar', $atts);

	}

	

	

	public function products_img_desc_after_update($post_array,$primary_key){

		$products_update = array(

			'products_description' => $post_array['descripcion']

			//'products_description' => '<img style=" display:block; margin:auto;" src="http://www.massivepc.com/images/'.$post_array['tpm_img_desc'].'"/>'

		);

		$this->db->update('products_description',$products_update,array('products_id' => $primary_key));



		$user_logs_update = array(

	        'usuario_actualizo' => $this->user->id_user

    	);

 

    	$this->db->update('products',$user_logs_update,array('products_id' => $primary_key));

		return true;

	}

	

	public function banners_header(){

		

			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user!='1') redirect ('panel/productos_descripcion');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('banners_header');

			$crud->set_subject('Banner');

			$crud->order_by('posicion','asc');

			
            //http://elegate.mx/mayoreo/assets/img/banner-remate.jpg?rnd=47b61e38ccdc36aa579f1a0e5de93caa
			$crud->set_field_upload('banner','../mayoreo/assets/img/');

			

			$crud->field_type('target','dropdown',

            array('1' => '_blank', '2' => '_self'));

			

			$crud->required_fields('banner');

			

			$output = $crud->render();

			$this->_panel_output($output);

	

	}

	

	public function mayoreo_archivos_admin(){

		

			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user!='1') redirect ('panel/productos_descripcion');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_archivos');

			$crud->set_subject('Archivo');

			$crud->order_by('id_archivo','desc');

			

			$crud->field_type('fk_usuario','invisible');

			

			$crud->columns('archivo','usuario');

			

			$crud->callback_before_insert(array($this,'fk_usuario_callback'));

			$crud->callback_column('usuario',array($this,'_callback_usuario_nombre'));

			

			$crud->set_field_upload('archivo','../mayoreo');

			

			$crud->required_fields('archivo');

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function _callback_usuario_nombre($value, $row){

		$this->load->model('login_model');

		$usuario=$this->login_model->get_usuario(array('id_user'=>$row->fk_usuario));

		return $usuario->nombre;

	}

	

	/*public function mayoreo_archivos(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_archivos');

			$crud->set_subject('Archivo');

			

			$crud->field_type('fk_usuario','invisible');

			

			$crud->callback_before_insert(array($this,'fk_usuario_callback'));

			

			$crud->columns('archivo');



			$crud->set_field_upload('archivo','../mayoreo');

			

			$output = $crud->render();

			$this->_panel_output($output);

	}*/

	

	public function fk_usuario_callback($post_array) {

		$post_array['fk_usuario'] = $this->user->id_user;

		return $post_array;

	}

	

	/*public function agregar_varios(){

		if(!$this->user) redirect ('panel/login');

	}*/

	

	public function correos_listas(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('z_correos_listas');

			$crud->set_subject('Lista');

			

			$crud->unset_export();

			$crud->unset_print();

			$crud->unset_delete();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function correos_totales(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('z_correos_totales');

			

			if($this->user->id_user == '6'){

				$crud->where('fk_usuario','6');

			}elseif($this->user->id_user == '7'){

				$crud->where('fk_usuario','7');

			}

			

			$crud->columns('correo','fk_lista','fk_usuario','fecha_agregado','mailchimp');

			

			$crud->add_fields('correo','fk_lista');

			$crud->edit_fields('correo','fk_lista');

			

			$crud->set_relation('fk_lista','z_correos_listas','lista');

			$crud->set_relation('fk_usuario','r00t3d','nombre');

			

			$crud->display_as('fk_lista','Lista')->display_as('fk_usuario','Usuario');

			

			$crud->required_fields('answert','aprove');

			

			$crud->callback_column('mailchimp',array($this,'_callback_mailchimp'));

			

			if($this->user->id_user != '3'){

				$crud->unset_export();

				$crud->unset_print();

				$crud->unset_edit();

				$crud->unset_delete();

			}

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function _callback_mailchimp($value, $row){

		if($value=='1'){

			return '<span class="label label-primary">Si</span>';

		}else{

			return '<span class="label label-default">No</span>';

		}

	}

		

	public function mail_list(){

		if(!$this->user) redirect ('panel/login');



		$this->load->helper('email');

		$this->load->model('correos_model');



		$mailchimp = $this->input->get('mailchimp');

		$this->data['mailchimp']=$mailchimp;

		//$this->data['mails'] = $this->correos_model->get_mails_newsletter();

		//$this->load->view('mail_list_bootstrap', $this->data);



		$this->load->library('pagination');

		$config['base_url'] = 'http://massivepc.com/ci/panel/mail_list/pagina/';

		$config['total_rows'] = $this->correos_model->total_newsletter();  

		$config['per_page'] = 250; 

        $config['num_links'] = 20;

 		$config['first_link'] = 'Primera';

		$config['last_link'] = 'Última';

        $config['uri_segment'] = 4;

		$config['next_link'] = 'Siguiente';

		$config['prev_link'] = 'Anterior';

		$config['full_tag_open'] = '<div id="paginacion">';

		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);		

		$this->data['mails'] = $this->correos_model->get_mails_newsletter($config['per_page'],$this->uri->segment(4));			

        //echo $this->data['mails'];

		$this->load->view('mail_list_bootstrap', $this->data);

	}

	

	public function mail_list2($mailchimp=false){

		if(!$this->user) redirect ('panel/login');



		$this->load->helper('email');

		$this->load->model('correos_model');

		$this->data['mailchimp']=$mailchimp;

		$this->data['mails'] = $this->correos_model->get_mails_registro();

		$this->load->view('mail_list_bootstrap2', $this->data);

	}

	

	/*public function set_mailchimp(){

		$this->load->library('mailchimp_library');

		$result = $this->mailchimp_library->call('lists/subscribe', array(

			'id'                => 'd67515ace2',

			'email'             => array('email'=>'sh41.ssl@gmail.com'),

			'merge_vars'        => array('FNAME'=>'Juan Pablo', 'LNAME'=>'Cruz García'),

			'double_optin'      => false,

			'update_existing'   => false,

			'replace_interests' => false,

			'send_welcome'      => false

		));

		print_r($result);

	}*/

	

	public function set_mailchimp_batch(){

		$this->load->library('mailchimp_library');

		$this->load->helper('email');

		

		$this->load->model('correos_model');

		$this->data['mails'] = $this->correos_model->get_where_mails_newsletter(array('mailchimp'=>'0'));

		

		foreach($this->data['mails'] as $mail){

			if (valid_email($mail->customers_newsletter_email)){

				$m2=strtolower($mail->customers_newsletter_email);

				$batch[] = array('email' => array('email' => $m2));

				$this->correos_model->update_mails_newsletter(array('customers_newsletter_id'=>$mail->customers_newsletter_id),array('mailchimp'=>'1'));

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

		echo json_encode($result);

	}

	

	public function set_mailchimp_batch2(){

		$this->load->library('mailchimp_library');

		$this->load->helper('email');

		

		$this->load->model('correos_model');

		$this->data['mails'] = $this->correos_model->get_where_mails_registro(array('mailchimp'=>'0'));

		

		foreach($this->data['mails'] as $mail){

			if (valid_email($mail->customers_newsletter_email)){

				$m2=strtolower($mail->customers_newsletter_email);

				$batch[] = array('email' => array('email' => $m2));

				$this->correos_model->update_mails_registro(array('customers_id'=>$mail->customers_newsletter_id),array('mailchimp'=>'1'));

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

		echo json_encode($result);

	}

	

	public function get_mailchimp(){

		$this->load->library('mailchimp_library');

		$lists = $this->mailchimp_library->call('lists/members',array(

			'id'	=>	'd67515ace2'

		));



		foreach ($lists['data'] as $list_r){

			echo $list_r['email'].' '.$list_r['status'].'<br>';

		}

	}

	

	public function mayoreo_categorias(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_categorias');

			$crud->set_subject('Categoria');

			$crud->order_by('orden','asc');

			

			$crud->required_fields('categoria');

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function mayoreo_productos(){
			if(!$this->user) redirect ('panel/login');
			$crud = new grocery_CRUD();
			$crud->where('MyBusiness20','1');
			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('mayoreo_productos');
			$crud->set_subject('Producto');
			$crud->columns('fk_producto','fk_categoria','nombre','precio','precio_mayoreo','precio_distribuidor');
			$crud->set_relation('fk_producto','products','products_id');
			$crud->set_relation('fk_categoria','mayoreo_categorias','categoria');
			$crud->display_as('fk_producto','Clave')
				 ->display_as('fk_categoria','Categoría');
			$crud->order_by('fk_categoria','asc');
			$crud->callback_column('nombre',array($this,'_callback_products_name_mayoreo'));
			$crud->callback_column('precio',array($this,'_callback_precio_publico'));
			$crud->required_fields('fk_producto','precio_mayoreo','precio_distribuidor');
			$output = $crud->render();
			$this->_panel_output($output);
	}

	public function mayoreo_productos_compras(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_productos');

			$crud->set_subject('Producto');

			$crud->order_by('fk_producto','desc');

			

			$crud->columns('fk_producto','fk_categoria','nombre','precio','precio_mayoreo','precio_distribuidor','precio_4','precio_5','precio_6');

			

			$crud->set_relation('fk_producto','products','products_id');

			$crud->set_relation('fk_categoria','mayoreo_categorias','categoria');

			

			$crud->display_as('fk_producto','Clave')

				 ->display_as('fk_categoria','Categoría')

				 ->display_as('precio_4','50 TABLETS')

				 ->display_as('precio_5','100 TABLETS')

				 ->display_as('precio_6','1000 TABLETS');

				 

			//$crud->order_by('fk_categoria','asc');

			

			$crud->callback_column('nombre',array($this,'_callback_products_name_mayoreo'));

			$crud->callback_column('precio',array($this,'_callback_precio_publico'));

			

			$crud->required_fields('fk_producto','precio_mayoreo','precio_distribuidor');

			

			

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function mayoreo_productos_popup($fk_producto = 0){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_productos');

			$crud->set_subject('Producto');

			

			$crud->columns('fk_producto','fk_categoria','nombre','precio','precio_mayoreo','precio_distribuidor');

			

			//$crud->set_relation('fk_producto','products','products_id');

			$crud->field_type('fk_producto', 'hidden', $fk_producto);

			$crud->set_relation('fk_categoria','mayoreo_categorias','categoria');

			

			$crud->display_as('fk_producto','Clave')

				 ->display_as('fk_categoria','Categoría');

				 

			$crud->order_by('fk_categoria','asc');

			

			$crud->callback_column('nombre',array($this,'_callback_products_name_mayoreo'));

			$crud->callback_column('precio',array($this,'_callback_precio_publico'));

			

			$crud->required_fields('fk_producto','fk_categoria','precio_mayoreo','precio_distribuidor');

			

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function _callback_products_name_mayoreo($value, $row){

		$p_name=$this->products_model->get_products_description(array('products_id'=>$row->fk_producto));

		if(!empty($p_name->products_name)){

			return '<a target="_blank" href="http://www.massivepc.com/-p-'.$row->fk_producto.'.html">'.$p_name->products_name.'</a>';

		}else{

			return '';

		}

	}

	

	/*public function mayoreo_banners(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_banners');

			$crud->set_subject('Banner');

			$crud->order_by('orden','asc');

			

			$crud->set_field_upload('banner','../mayoreo/banners');

			

			$crud->required_fields('banner','link');

			

			$output = $crud->render();

			$this->_panel_output($output);

	}*/

	

	public function correos_txt(){

		$this->load->helper('file');

		$cadena = read_file('mayoreo.txt');

$explode=explode('

',$cadena);

		foreach($explode as $ex){

			$email_valid=ValidarMail($ex);

			if($email_valid['code']=='200'){

				echo $ex.'<br>';

			}

		}

	}

	

	public function mayoreo_pedidos(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_pedidos');

			$crud->set_subject('Pedidos');

			$crud->order_by('id','desc');

			

			$crud->field_type('p_status','dropdown',

            array('1' => 'Pagado', '2' => 'Proceso', '3' => 'Cancelado'));

			

			$crud->field_type('p_tipo','dropdown',

            array('1' => 'Publico', '2' => 'Mayoreo', '3' => 'Distribuidor'));



            $crud->columns('nombre','email','telefono','p_fecha','sae','p_total');



            $crud->callback_column('sae',array($this,'_callback_sae_pedido'));

			

			$crud->unset_add();

			//$crud->unset_edit();

			$crud->unset_delete();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function _callback_sae_pedido($value, $row){



		$atts = array(

		'width'      => '300',

		'height'     => '300',

		'scrollbars' => 'yes',

		'status'     => 'yes',

		'resizable'  => 'yes',

		'screenx'    => '0',

		'screeny'    => '0',

		'class'	   => 'btn btn-primary'

		);



		if($row->sae == '1'){

			return 'En sae';

		}else{

			return anchor_popup('http://192.168.0.3:82/sae/frm/'.$row->id, 'Insertar', $atts);

		}

	}

	

	public function products_faq(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products_faq');

			

			$crud->display_as('answert','Respuesta')

			->display_as('question','Pregunta')

			->display_as('aprove','Aprobada')

			->display_as('products_id','Producto');

			

			$crud->field_type('aprove','dropdown',

            array('1' => 'Si', '0' => 'No'));



            $crud->order_by('faq','desc');

			

			$crud->required_fields('answert','aprove');

			

			$crud->callback_column('products_id',array($this,'_callback_products_id'));



			$crud->callback_after_update(array($this, 'log_user_after_update4'));

			

			$crud->columns('products_id','alias','question','answert','fecha','usuario_respondio');



			//$crud->edit_fields('question','answert');



			$crud->field_type('products_id', 'hidden');

			$crud->field_type('alias', 'hidden');

			$crud->field_type('email_address', 'hidden');

			$crud->field_type('usuario_respondio', 'hidden');



			$crud->callback_field('question',array($this,'_pregunta_c'));

			$crud->callback_field('answert',array($this,'_respuesta_c'));



			 $crud->unset_texteditor('question','answert');

			 $crud->unset_add();

			 //$crud->unset_delete();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function _pregunta_c($value = '', $primary_key = null){

		return '<textarea style="width:650px; height:450px;" id="field-question" name="question">'.$value.'</textarea>';

	}



	public function _respuesta_c($value = '', $primary_key = null){

		return '<textarea style="width:650px; height:450px;" id="field-answert" name="answert">'.$value.'</textarea>';

	}



	function log_user_after_update4($post_array,$primary_key)

	{

		//return var_dump($post_array);

	    $user_logs_update = array(

	        "usuario_respondio" => $this->user->nombre

	    );

	 

	    $this->db->update('products_faq',$user_logs_update,array('faq' => $primary_key));



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

		

		$this->email->from('juan.cruz@massivepc.com', 'Massive PC');

		$this->email->to('ventas@massivepc.com');

		$this->email->cc('eduardo@massivepc.com,sistemas@massivepc.com,ventas2@massivepc.com,zopim@massivepc.com');

		

		$this->email->subject('Massive PC - FAQ');



		$mensaje = 'Estimado <b>'.$post_array['alias'].'</b>, hemos respondido tu pregunta: <b>'.$post_array['question'].'</b> <br>

				Para consultarla entra al siguiente <a href="http://www.massivepc.com/-p-'.$post_array['products_id'].'.html">link</a>.';



		$this->email->message($mensaje);

		

		$this->email->send();

	 

	    return true;

	}



	public function products_opinion(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products_opinion');



            $crud->order_by('apo','desc');

			

			$crud->required_fields('aprove');



			$crud->field_type('aprove','dropdown',

            array('1' => 'Si', '0' => 'No'));

			

			$crud->callback_column('products_id',array($this,'_callback_products_id'));

			

			$crud->columns('products_id','alias','estado','opinion','aprove','calificacion');



			$crud->edit_fields('aprove');



			$crud->unset_add();

            $crud->unset_edit();

            //$crud->unset_delete();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function mayoreo_material_p(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_material_p');

			

			$crud->set_field_upload('imagen','../mayoreo/assets/uploads/publicidad');

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function solo_ofertas(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('solo_ofertas');

			

			$crud->set_field_upload('imagen','../mayoreo/assets/uploads/solo_ofertas');

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function test_upload(){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_archivos');

			

			$crud->set_field_upload('archivo','../images');

			$crud->set_field_upload('fk_usuario','../images');

			//$crud->callback_before_upload(array($this,'example_callback_before_upload'));

			$crud->callback_after_upload(array($this,'_callback_after_upload_80_500'));

			

			$output = $crud->render();

			$this->_panel_output($output);

	}

   

	function _callback_after_upload_80_500($uploader_response,$field_info, $files_to_upload){

		//$crud->set_field_upload('products_imagelarge','../images');

		//$crud->set_field_upload('products_image','../images');



		/*$this->load->library('ftp');



		$config['hostname'] = '104.238.78.74';

		$config['username'] = 'massive';

		$config['password'] = 'S1st3m4s2015_';

		$config['debug'] = TRUE;

		$config['port']     = 21;

		$config['passive']  = FALSE;

		$this->ftp->connect($config);*/



		$campo	= $field_info->field_name;

		$name   = '../images/'.$uploader_response[0]->name;

		$tamano = getimagesize($name);



		if($campo == 'products_image'){

			if($tamano[0] == '80' && $tamano[1] == '80'){

				$filename = $field_info->encrypted_field_name;

				if($files_to_upload[$filename]['size'] > '4000'){

					return 'El archivo debe ser menor a 4 KB';

				}else{

					//$this->ftp->upload('/home/massivep/public_html/images/'.$uploader_response[0]->name, '/public_html/cdn/images/thumb/'.$uploader_response[0]->name);

					return true;

				}

			}else{

				return 'El tamaño de la imagen debe de ser de 80px x 80px';

			}

		}elseif($campo == 'products_imagelarge'){

			if($tamano[0] == '666' && $tamano[1] == '500'){

				$filename = $field_info->encrypted_field_name;

				if($files_to_upload[$filename]['size'] > '120000'){

					return 'El archivo debe ser menor a 120 KB';

				}else{

					//$this->ftp->upload('/home/massivep/public_html/images/'.$uploader_response[0]->name, '/public_html/cdn/images/large/'.$uploader_response[0]->name);

					return true;

				}

			}else{

				return 'El tamaño de la imagen debe de ser de 666px x 500px';

			}

		}else{

			return 'Error con el campo de archivo.';

		}



		//$this->ftp->close();



	}

 

	

	public function productos_inventario(){

			if(!$this->user) redirect ('panel/login');

			//if($this->user->id_user!='1') redirect ('panel/productos_descripcion');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products');

			$crud->set_subject('Producto');

			$crud->order_by('products_id','desc');

			$crud->where('products_status','1');

			$crud->callback_column('products_name',array($this,'_callback_products_name'));

			$crud->columns('products_id','products_name','products_imagelarge');

			$crud->edit_fields('agotado');

			

			$crud->set_field_upload('products_imagelarge','../images');



			$crud->display_as('products_id','Clave')

				 ->display_as('id_categoria','Categoría')

				 ->display_as('products_imagelarge','Imagen');

			

			$crud->field_type('agotado','dropdown',array('1' => 'Si','0' => 'No'));

			

			$crud->unset_add();

			$crud->unset_delete();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function productos_compras(){

			

			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user!='9') redirect ('panel/productos_descripcion');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products');

			$crud->set_subject('Producto');

			$crud->order_by('products_id','desc');

			

			$crud->columns('products_id','products_name','products_imagelarge','Precio Neto','Precio mayoreo','Precio distribuidor','Galería','orden','SAE','costo','costo_nacional','peso','precio_4','precio_5','precio_6');

			$crud->edit_fields('products_status','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado','orden','costo','peso');//tpm_img_desc

			$crud->add_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado','orden','costo','peso');//tpm_img_desc



			$crud->display_as('products_id','Clave')

				 ->display_as('id_categoria','Categoría')

				 ->display_as('manufacturers_id','Fabricante')

				 ->display_as('products_status','Estado')

				 ->display_as('products_name','Nombre')

				 ->display_as('products_price','Precio (sin iva)')

				 ->display_as('precio_neto','Precio (neto)')

				 ->display_as('precio_4','50 TABLETS')

				 ->display_as('precio_5','100 TABLETS')

				 ->display_as('precio_6','1000 TABLETS')

				 ->display_as('products_retail_price2','Porcentaje falso de aumento')

				 ->display_as('products_quantity','Cantidad')

				 ->display_as('products_model','Modelo')

				 ->display_as('products_weight','Peso')

				 ->display_as('products_image','Imagen pequeña (80px x 80px)')

				 ->display_as('products_imagelarge','Imagen Grande (666px × 500px)')

				 //->display_as('products_warranty','Garantia')

				 ->display_as('products_shipping','Envio')

				 ->display_as('tpm_img_desc','Imagen de descripción');

				 

			$crud->required_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','products_model','products_shipping');

			

			//$crud->field_type('products_warranty', 'string');

			$crud->field_type('products_shipping','dropdown',array('En almacén' => 'En almacén','Agotado' => 'Agotado'));

			$crud->field_type('products_status','dropdown',array('1' => 'Disponible','0' => 'Agotado'));

			$crud->field_type('agotado','dropdown',array('1' => 'Si','0' => 'No'));

			$crud->field_type('solo_sae','dropdown',array('1' => 'Si','0' => 'No'));

			$crud->field_type('products_quantity', 'hidden', '999');

			

			

			$crud->callback_edit_field('products_name',array($this,'edit_products_name'));

			$crud->callback_edit_field('descripcion',array($this,'edit_descripcion'));

			$crud->callback_field('precio_neto',array($this,'precio_neto_blank'));

			$crud->callback_column('products_name',array($this,'_callback_products_name'));

			$crud->callback_column('Precio Neto',array($this,'_callback_precio_neto'));

			$crud->callback_column('Precio mayoreo',array($this,'_callback_precio_mayoreo'));

			$crud->callback_column('Precio distribuidor',array($this,'_callback_precio_distribuidor'));

			$crud->callback_after_update(array($this, 'products_desc_after_update'));

			$crud->callback_after_insert(array($this, 'categories_after_insert')); // Despues de insertar

			$crud->callback_column('Galería',array($this,'_callback_galeria'));

			$crud->callback_column('SAE',array($this,'_callback_sae'));

			$crud->callback_add_field('products_name',array($this,'add_products_name'));

			$crud->callback_add_field('products_name',array($this,'add_products_name'));



			$crud->set_relation('manufacturers_id','manufacturers','manufacturers_name');

			$crud->set_relation('id_categoria','categories_description','categories_name');

			

			$crud->set_field_upload('products_imagelarge','../images');

			$crud->set_field_upload('products_image','../images');

			//$crud->set_field_upload('tpm_img_desc','../images');



			//$crud->callback_after_upload(array($this,'_callback_after_upload_80_500'));

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function precio_neto_blank($value = '', $primary_key = null){



		$product = $this->products_model->get_precio_publico(array('products_id'=>$primary_key));



		



		if($value == ''){

			return '<input type="text" maxlength="255" value="" name="precio_neto" id="field-precio_neto">';

		}else{

			$con_iva = $product->products_price + (16*($product->products_price/100));



			$con_iva2 = round($con_iva,2);

			return '<input type="text" maxlength="255" value="'.$con_iva2.'" name="precio_neto" id="field-precio_neto">';

		}

		

	}

	

	public function _callback_products_id($value, $row){

		$p_name=$this->products_model->get_products_description(array('products_id'=>$row->products_id));

		if(!empty($p_name->products_name)){

			return '<a target="_blank" href="http://www.massivepc.com/-p-'.$row->products_id.'.html">'.$p_name->products_id.'</a> - '.$p_name->products_name;

		}else{

			return '';

		}

	}



	public function marcas(){



			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user!='1') redirect ('panel/productos_descripcion');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('manufacturers');

			$crud->order_by('manufacturers_id','desc');

			

			$crud->columns('manufacturers_name','manufacturers_image');



			$crud->display_as('manufacturers_name','Marca')

				 ->display_as('manufacturers_image','Imagen 100 x 50');

			

			$crud->set_field_upload('manufacturers_image','../images');

			$crud->set_field_upload('imag_ex','../images');



			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function mayoreo_garantias(){



			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user != '1' and $this->user->id_user != '4' and $this->user->id_user != '12' and $this->user->id_user != '13' and $this->user->id_user != '14' and $this->user->id_user != '15' and $this->user->id_user != '16' and $this->user->id_user != '17') redirect ('panel/productos_descripcion');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_garantias');

			$crud->order_by('id_garantia','desc');

			$crud->set_subject('Garantía');



			$crud->columns('id_garantia','fecha_solicitud','n_ticket','fecha_compra','nombre','estatus','tecnico','Productos','ultima_actualizacion','Tiempo transcurrido');

			

			$crud->display_as('id_garantia','Folio');



			$crud->field_type('estatus','dropdown',array('0' => 'Pendiente por recibir', '1' => 'Recibido', '2' => 'En proceso', '3' => 'Reparado'));

			$crud->field_type('tecnico','dropdown',array('13' => 'Técnico 1', '14' => 'Técnico 2', '15' => 'Técnico 3', '16' => 'Técnico 4'));

			$crud->field_type('fecha_solicitud', 'readonly');

			$crud->field_type('n_ticket', 'readonly');

			$crud->field_type('fecha_compra', 'readonly');

			//$crud->field_type('nombre', 'readonly');

			//$crud->field_type('correo', 'readonly');

			$crud->field_type('calle', 'readonly');

			$crud->field_type('n_exterior', 'readonly');

			$crud->field_type('n_interior', 'readonly');

			$crud->field_type('colonia', 'readonly');

			$crud->field_type('estado', 'readonly');

			$crud->field_type('municipio', 'readonly');

			$crud->field_type('cp', 'readonly');

			$crud->field_type('envio_fecha', 'readonly');

			$crud->field_type('envio_n_guia', 'readonly');

			$crud->field_type('envio_empresa', 'readonly');

			$crud->field_type('ultima_actualizacion', 'readonly');

			$crud->field_type('ultimo_editor', 'readonly');



			$crud->set_relation('ultimo_editor','r00t3d','nombre');

			//$crud->set_relation('tecnico','r00t3d','nombre');

			

			$crud->callback_column('Técnico',array($this,'_callback_asignar_tecnico'));

			$crud->callback_column('Productos',array($this,'_callback_mayoreo_garantias_productos'));

			$crud->callback_column('Tiempo transcurrido',array($this,'_callback_tiempo_transcurrido'));



			$crud->callback_after_update(array($this, 'estatus_after_update'));



			$crud->required_fields('nombre','correo','estatus');



			$crud->unset_add();

			$crud->unset_delete();



			if($this->user->id_user == '13' || $this->user->id_user == '14' || $this->user->id_user == '15' || $this->user->id_user == '16'){

				$crud->where('tecnico', $this->user->id_user);

			}



			if($this->user->id_user == '4' || $this->user->id_user == '13' || $this->user->id_user == '14' || $this->user->id_user == '15' || $this->user->id_user == '16'){

				$crud->unset_edit();

			}



			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function _callback_tiempo_transcurrido($value, $row){



		$date   = date('Y-m-d H:i:s');

		$fecha1 = new DateTime($row->fecha_solicitud);

		$fecha2 = new DateTime($date);

		$fecha  = $fecha1->diff($fecha2);



		//if($row->estatus == '2'){

			if($fecha->d < '2'){

				$estatus_color = '';

			}else if($fecha->d < '3'){

				$estatus_color = '#FBC02D';

			}else if($fecha->d >= '3'){

				$estatus_color = '#DB4437';

			}else{

				$estatus_color = '';

			}

		/*}else{

			$estatus_color = '#0F9D58';

		}*/



		return '<span style="background:'.$estatus_color.'"><b>'.$fecha->m.'</b> meses - <b>'.$fecha->d.'</b> días - <b>'.$fecha->h.'</b> horas - <b>'.$fecha->i.'</b> minutos</span>';



		//printf('%d meses, %d días, %d horas, %d minutos', $fecha->m, $fecha->d, $fecha->h, $fecha->i);



	}



	public function estatus_after_update($post_array,$primary_key){

			$this->load->library('email');



			$config['protocol']  = 'smtp';

			$config['smtp_host'] = 'smtp.gmail.com';

			$config['smtp_user'] = 'ventas@massivepc.com';

			$config['smtp_pass'] = 'CC_massivepc_7102';

			$config['smtp_port'] = 465;

			$config['mailtype']	 = 'html';

			$config['smtp_crypto'] = 'ssl';

			$config['email_newline'] = "\r\n";

			$config['email_crlf'] = "\r\n";



			$this->email->initialize($config);

			$this->email->set_newline("\r\n");



			$list = array('sistemas@massivepc.com', 'juan.cruz@massivepc.com');

			

			$this->email->from('noresponder@massivepc.com', 'Massive PC');

			$this->email->to($post_array['correo']);

			$this->email->bcc($list);



			$contenido_mail = '<a href="http://www.massivepc.com"><img src="https://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png"/></a><br><b>'.$post_array['nombre'].'</b><br><br>';

			$footer = '<br><br> <img src="http://www.massivepc.com/ci/assets/img/footer-correo-garantias.jpg" />';

			

			switch($post_array['estatus']){

				case '1':

					$estatus = 'Recibido.';

					$contenido_mail .= 'Su solicitud de garantía con Folio: <b>GW'.$primary_key.'</b> ha cambiado de estatus a <b>'.$estatus.'</b>'.$footer;

					$this->email->subject('Actualización de estatus de garantía GW'.$primary_key);

					$this->email->message($contenido_mail);

					$this->email->send();

				break;

				case '2':

					$estatus = 'En proceso.';

					$contenido_mail .= 'Su solicitud de garantía con Folio: <b>GW'.$primary_key.'</b> ha cambiado de estatus a <b>'.$estatus.'</b>'.$footer;

					$this->email->subject('Actualización de estatus de garantía GW'.$primary_key);

					$this->email->message($contenido_mail);

					$this->email->send();

				break;

				case '3':

					$estatus = 'Reparado.';

					$contenido_mail .= 'Su solicitud de garantía con Folio: <b>GW'.$primary_key.'</b> ha cambiado de estatus a <b>'.$estatus.'</b>'.$footer;

					$this->email->subject('Actualización de estatus de garantía GW'.$primary_key);

					$this->email->message($contenido_mail);

					$this->email->send();

				break;

			}

			date_default_timezone_set('America/Mexico_City');

			$last_update = array(

		        'ultima_actualizacion' => date('Y-m-d H:i:s'),

		        'ultimo_editor' => $this->user->id_user

		    );

		 

		    $this->db->update('mayoreo_garantias',$last_update,array('id_garantia' => $primary_key));

		 

	    return true;

	    

	}



	public function mayoreo_garantias_productos($fk_garantia = 0){



			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user != '12' and $this->user->id_user != '13' and $this->user->id_user != '14' and $this->user->id_user != '15' and $this->user->id_user != '16' and $this->user->id_user != '17') redirect ('panel/productos_descripcion');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_garantias_productos');

			$crud->order_by('id_gapr','desc');

			$crud->set_subject('Producto');



			$crud->display_as('fk_garantia','Folio');



			$crud->where('fk_garantia',$fk_garantia);



			$crud->field_type('estatus','dropdown',array('0' => 'En proceso', '1' => 'Reparado'));



			$crud->field_type('fk_garantia', 'readonly');

			$crud->field_type('modelo', 'readonly');

			$crud->field_type('color', 'readonly');

			$crud->field_type('n_serie', 'readonly');

			$crud->field_type('ultimo_editor', 'readonly');



			$crud->edit_fields('fk_garantia','modelo','color','n_serie','estatus','observaciones','ultimo_editor');



			$crud->callback_after_update(array($this, 'estatus_after_update_productos'));



			$crud->required_fields('estatus');



			$crud->unset_add();

			$crud->unset_delete();

			$crud->unset_texteditor('observaciones');



			$crud->set_relation('ultimo_editor','r00t3d','nombre');



			if($this->user->id_user == '17'){

				$crud->unset_edit();

			}



			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function estatus_after_update_productos($post_array,$primary_key){



			$this->db->join('mayoreo_garantias', 'mayoreo_garantias.id_garantia = mayoreo_garantias_productos.fk_garantia');

			$query = $this->db->get_where('mayoreo_garantias_productos', array( 'id_gapr' => $primary_key ));

			$r =  $query->row();



			$this->load->library('email');



			$config['protocol']  = 'smtp';

			$config['smtp_host'] = 'smtp.gmail.com';

			$config['smtp_user'] = 'ventas@massivepc.com';

			$config['smtp_pass'] = 'CC_massivepc_7102';

			$config['smtp_port'] = 465;

			$config['mailtype']	 = 'html';

			$config['smtp_crypto'] = 'ssl';

			$config['email_newline'] = "\r\n";

			$config['email_crlf'] = "\r\n";



			$this->email->initialize($config);

			$this->email->set_newline("\r\n");



			$list = array('sistemas@massivepc.com', 'juan.cruz@massivepc.com');

			

			$this->email->from('noresponder@massivepc.com', 'Massive PC');

			$this->email->to($r->correo);

			$this->email->bcc($list);



			$contenido_mail = '<a href="http://www.massivepc.com"><img src="https://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png"/></a><br><b>'.$r->nombre.'</b><br><br>';

			

			if($post_array['estatus']=='1'){

				$estatus = 'Reparado';

				$contenido_mail .= 'Su artículo <b>'.$r->modelo.'</b> con Folio de garantía: <b>GW'.$r->fk_garantia.'</b> se encuentra reparado.';

				$contenido_mail .= '<br><br> <img src="http://www.massivepc.com/ci/assets/img/footer-correo-garantias.jpg" />';

				$this->email->subject('Actualización de estatus de garantía GW'.$r->fk_garantia);

				$this->email->message($contenido_mail);

				$this->email->send();

			}



			date_default_timezone_set('America/Mexico_City');

			$last_update = array(

		        'ultima_actualizacion' => date('Y-m-d H:i:s'),

		        'ultimo_editor' => $this->user->id_user

		    );

		 

		    $this->db->update('mayoreo_garantias_productos',$last_update,array('id_gapr' => $primary_key));

		 

		   //echo var_dump($r);

	    return true;

	    

	}



	public function _callback_asignar_tecnico($value, $row){

		if($row->tecnico == '0'){

			return '<span class="label label-danger">No asignado</span>';

		}else{

			return '<span class="label label-success">'.$row->tecnico.'</span>';

		}

	}



	public function _callback_mayoreo_garantias_productos($value, $row){

		return '<a class="btn btn-primary btn-xs" href="http://massivepc.com/ci/panel/mayoreo_garantias_productos/'.$row->id_garantia.'">Revisar</a>';

	}



	public function mayoreo_garantias_cierres(){



			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user!='1' and $this->user->id_user!='12') redirect ('panel/productos_descripcion');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_garantias_cierres');

			$crud->order_by('id_cierre','desc');

			$crud->set_subject('Cierre');



			$crud->display_as('fk_garantia','Folio');

			$crud->set_relation('fk_garantia','mayoreo_garantias','id_garantia');

			$crud->add_fields('fk_garantia','folio_sae','observaciones');



			$crud->callback_after_insert(array($this, '_after_insert_call'));



			$crud->required_fields('fk_garantia','folio_sae');

			$crud->set_relation('ultimo_editor','r00t3d','nombre');



			$crud->unset_delete();

			$crud->unset_edit();

			$crud->unset_texteditor('observaciones');



			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function _after_insert_call($post_array,$primary_key){

	    

		date_default_timezone_set('America/Mexico_City');

		$last_update = array(

		    'fecha_cierre' => date('Y-m-d H:i:s'),

		    'ultimo_editor' => $this->user->id_user

		);



		$this->db->update('mayoreo_garantias_cierres',$last_update,array('id_cierre' => $primary_key));

	 

	    return true;

	}



	public function mayoreo_garantias_envios(){



			if(!$this->user) redirect ('panel/login');

			if($this->user->id_user!='1' and $this->user->id_user!='12' and $this->user->id_user!='4') redirect ('panel/productos_descripcion');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('mayoreo_garantias_envios');

			$crud->order_by('id_envio','desc');

			$crud->set_subject('Envío');



			$crud->display_as('fk_garantia','Folio');

			$crud->set_relation('fk_garantia','mayoreo_garantias','id_garantia');

			$crud->add_fields('fk_garantia','n_guia','observaciones');



			$crud->callback_after_insert(array($this, '_update_envio'));



			$crud->required_fields('fk_garantia','n_guia');

			$crud->set_relation('ultimo_editor','r00t3d','nombre');



			$crud->unset_delete();

			$crud->unset_edit();

			$crud->unset_texteditor('observaciones');



			$output = $crud->render();

			$this->_panel_output($output);

	}

	

	public function _update_envio($post_array,$primary_key){



		$this->db->join('mayoreo_garantias', 'mayoreo_garantias.id_garantia = mayoreo_garantias_envios.fk_garantia');

		$query = $this->db->get_where('mayoreo_garantias_envios', array( 'id_envio' => $primary_key ));

		$r =  $query->row();



	    date_default_timezone_set('America/Mexico_City');

		$last_update = array(

		    'fecha_envio' => date('Y-m-d H:i:s'),

		    'ultimo_editor' => $this->user->id_user

		);



		$this->db->update('mayoreo_garantias_envios',$last_update,array('id_envio' => $primary_key));



		$this->load->library('email');



		$config['protocol']  = 'smtp';

		$config['smtp_host'] = 'smtp.gmail.com';

		$config['smtp_user'] = 'ventas@massivepc.com';

		$config['smtp_pass'] = 'CC_massivepc_7102';

		$config['smtp_port'] = 465;

		$config['mailtype']	 = 'html';

		$config['smtp_crypto'] = 'ssl';

		$config['email_newline'] = "\r\n";

		$config['email_crlf'] = "\r\n";



		$this->email->initialize($config);

		$this->email->set_newline("\r\n");



		$list = array('sistemas@massivepc.com', 'juan.cruz@massivepc.com');

		

		$this->email->from('noresponder@massivepc.com', 'Massive PC');

		$this->email->to($r->correo);

		$this->email->bcc($list);



		$contenido_mail = '<a href="http://www.massivepc.com"><img src="https://www.massivepc.com/mayoreo/Logo-Massive-Mayoreo.png"/></a><br><b>'.$r->nombre.'</b><br><br>';

			



		$contenido_mail .= 'Te informamos que tu garantía con folio <b>GW'.$r->fk_garantia.'</b> fue enviada por DHL con el siguiente número de guía: <b>'.$r->n_guia.'</b>';

		if(!empty($r->observaciones)){

			$contenido_mail .= '<br><br><b>Observaciones:</b>'.$r->observaciones;

		}

		$contenido_mail .= '<br><br> <img src="http://www.massivepc.com/ci/assets/img/footer-correo-garantias.jpg" />';

		

		$this->email->subject('Garantía GW'.$r->fk_garantia.' enviada');

		$this->email->message($contenido_mail);

		$this->email->send();

	 

	    return true;

	}



	public function productos_compras_p(){



			if(!$this->user) redirect ('panel/login');

			//if($this->user->id_user!='1') redirect ('panel/productos_descripcion');

			

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('products');

			$crud->set_subject('Producto');

			$crud->order_by('products_id','desc');

			$crud->where('products_status','1');

			

			$crud->columns('products_id','products_name','sae_exist','Precio Neto','Precio mayoreo','Precio distribuidor','costo_nacional');

			$crud->edit_fields('products_status','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado','orden','solo_sae','peso','costo_nacional');//tpm_img_desc

			$crud->add_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','precio_neto','products_retail_price2','products_quantity','products_model','products_weight','products_shipping','products_image','products_imagelarge','descripcion','agotado','orden','solo_sae','peso','costo_nacional');//tpm_img_desc



			$crud->display_as('products_id','Clave')

				 ->display_as('id_categoria','Categoría')

				 ->display_as('sae_exist','Existencias')

				 ->display_as('manufacturers_id','Fabricante')

				 ->display_as('products_status','Estado')

				 ->display_as('products_name','Nombre')

				 ->display_as('products_price','Precio (sin iva)')

				 ->display_as('precio_neto','Precio (neto)')

				 ->display_as('products_retail_price2','Porcentaje falso de aumento')

				 ->display_as('products_quantity','Cantidad')

				 ->display_as('products_model','Modelo')

				 ->display_as('products_weight','Peso')

				 ->display_as('products_image','Imagen pequeña (80px x 80px)')

				 ->display_as('products_imagelarge','Imagen Grande (666px × 500px)')

				 //->display_as('products_warranty','Garantia')

				 ->display_as('products_shipping','Envio')

				 ->display_as('tpm_img_desc','Imagen de descripción');

				 

			$crud->required_fields('products_status','id_categoria','manufacturers_id','products_name','products_price','products_model','products_shipping');

			

			//$crud->field_type('products_warranty', 'string');

			$crud->field_type('products_shipping','dropdown',array('En almacén' => 'En almacén','Agotado' => 'Agotado'));

			$crud->field_type('products_status','dropdown',array('1' => 'Disponible','0' => 'Agotado'));

			$crud->field_type('agotado','dropdown',array('1' => 'Si','0' => 'No'));

			$crud->field_type('solo_sae','dropdown',array('1' => 'Si','0' => 'No'));

			$crud->field_type('products_quantity', 'hidden', '999');

			

			$crud->edit_fields('costo_nacional');

			

			//$crud->callback_edit_field('products_name',array($this,'edit_products_name'));

			//$crud->callback_edit_field('descripcion',array($this,'edit_descripcion'));

			$crud->callback_column('products_name',array($this,'_callback_products_name'));

			$crud->callback_column('Precio Neto',array($this,'_callback_precio_neto'));

			$crud->callback_column('Precio mayoreo',array($this,'_callback_precio_mayoreo'));

			$crud->callback_column('Precio distribuidor',array($this,'_callback_precio_distribuidor'));

			//$crud->callback_after_update(array($this, 'products_desc_after_update'));

			//$crud->callback_after_insert(array($this, 'categories_after_insert')); // Despues de insertar

			$crud->callback_column('Galería',array($this,'_callback_galeria'));

			$crud->callback_column('SAE',array($this,'_callback_sae'));

			//$crud->callback_add_field('products_name',array($this,'add_products_name'));

			//$crud->callback_add_field('products_name',array($this,'add_products_name'));



			$crud->set_relation('manufacturers_id','manufacturers','manufacturers_name');

			$crud->set_relation('id_categoria','categories_description','categories_name');

			

			//$crud->set_field_upload('products_imagelarge','../images');

			//$crud->set_field_upload('products_image','../images');

			//$crud->set_field_upload('tpm_img_desc','../images');



			//$crud->callback_after_upload(array($this,'_callback_after_upload_80_500'));



			$crud->unset_delete();

			//$crud->unset_edit();

			$crud->unset_add();

			$crud->unset_print();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function ch_orders(){

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('ch_orders');

			$crud->set_subject('Order');

			$crud->order_by('id_order','desc');

			$crud->columns('order','products');

			$crud->callback_column('products',array($this,'_callback_products_ch'));



			if($this->user->id_user == 20){

    			$crud->unset_add();

    		}



			$crud->unset_export();

			$crud->unset_edit();

			$crud->unset_delete();

			$crud->unset_print();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function _callback_products_ch($value, $row){



		$btn_add_product = '';

		if($this->user->id_user != 20){

			$btn_add_product = '<a class="m_iframe btn btn-primary btn-small" target="_blank" href="http://massivepc.com/ci/panel/ch_products_order/'.$row->id_order.'">Add / Edit</a>';

		}



		$products = $this->products_model->get_ch_products_order(array('fk_order'=>$row->id_order));

		$p = '<table class="table table-bordered table-condensed table-striped"><thead><tr><th>Product</th><th>Quantity</th><th>Arrival date</th><th>Shipments</th><th>Remaining</th><th>'.$btn_add_product.'</th></tr></thead>';

		foreach($products as $product){

			$p .= '

			<tr>

				<td>

					<img class="img-circle" style="height:50px;" src="https://www.massivepc.com/images/'.$product->products_image.'" /> '.$product->products_id.' </td>

				<td>

					<span class="badge badge-success">'.$product->quantity.'</span>

				</td>

			<td>';

			if($product->arrival_date != null){

				$p .= $product->arrival_date;

			}else{

				if($this->user->id_user == 20){

					$p .= '<a class="m_iframe btn btn-primary btn-small" href="http://massivepc.com/ci/panel/ch_products_order/'.$row->id_order.'/edit/'.$product->id_product_order.'">Add</a>';

				}

			}

			

			$p .='</td>';

			$p .='<td>

				<table class="table table-bordered">

					<thead>

						<th>

							Departure date

						</th>

						<th>

							Quantity

						</th>

						<th>

							Guides

						</th>

						<th>';

						if($this->user->id_user == 20){

							$p .= '<a class="m_iframe btn btn-primary btn-small" href="http://massivepc.com/ci/panel/ch_shipments/'.$product->id_product_order.'/add">Add</a>';

						}

						$p .='</th>

					</thead>

					<tbody>';

					$q = 0;

					$shipments = $this->products_model->get_ch_shipments(array('fk_product'=>$product->id_product_order));

					foreach($shipments as $shipment){

						$p.='<tr><td>'.$shipment->departure_date.'</td><td>'.$shipment->quantity.'</td><td>'.$shipment->guides.'</td><td></td></tr>';

						$q += $shipment->quantity;

					}

				$p.='</tbody>

				</table>

			</td>';



			$p .= '<td><span class="badge badge-success">'.($product->quantity - $q).'</span></td>';

			$p .= '<td> </td>';

			$p .='</tr>';

		}

		$p .= '</table>';

		return '

		<script>

			$(".m_iframe").fancybox({

			\'width\'			: \'75%\',

			\'height\'			: \'75%\',

			\'autoScale\'		: false,

			\'transitionIn\'	: \'none\',

			\'transitionOut\'	: \'none\',

			\'type\'			: \'iframe\'

			});

		</script>'.$p;

	}



	public function ch_products_order($fk_order = 0){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('ch_products_order');

			$crud->set_subject('Product');

			$crud->order_by('id_product_order','desc');



			$crud->set_relation('fk_product_order','products','products_id');



			$crud->columns('fk_product_order','quantity','arrival_date');

			

			$crud->display_as('fk_product_order','Product');



			$crud->where('fk_order',$fk_order);



			$crud->field_type('fk_order', 'hidden', $fk_order);

			$crud->field_type('remaining', 'hidden', '');

			



    		if($this->user->id_user == 20){



    			$crud->unset_add();

    			//$crud->field_type('fk_product_order', 'hidden', '');

    			$crud->field_type('quantity', 'hidden', '');

				$crud->edit_fields('arrival_date');



    		}else{

    			

    			$crud->required_fields('fk_product_order','quantity');

    			$crud->field_type('arrival_date', 'hidden', '');



    		}



			$crud->unset_export();

			$crud->unset_delete();

			$crud->unset_print();

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	public function ch_shipments($fk_product = 0){

		

			if(!$this->user) redirect ('panel/login');

			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');

			$crud->set_table('ch_shipments');

			$crud->set_subject('Shipment');



			$crud->columns('departure_date','quantity','guides');

			$crud->required_fields('departure_date','quantity','guides');



			$crud->where('fk_product',$fk_product);



			$crud->field_type('fk_product', 'hidden', $fk_product);

			

			$output = $crud->render();

			$this->_panel_output($output);

	}



	//

	

	

}