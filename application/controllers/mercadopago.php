<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mercadopago extends CI_Controller {
	
	public function index(){

		$this->load->library('mercadopago');

		$mp	= new MP ('2062037664686861', 'HKU7lmubNXVka9ZkEDKxjaMR3ihLK82c');

		$access_token	= $mp->get_access_token();

		$mpr	= new MPRestClient();

		$data	= array(
						'site_id'	=> 'MLM'
						);

		$result			= $mpr->post('/users/test_user?access_token=' . $access_token, $data);

		print_r($result);

		/*
			Array
			(
				[status] => 201
				[response] => Array
				(
					[id] => 186139167
					[nickname] => TETE1096337
					[password] => qatest1128
					[site_status] => active
					[email] => test_user_84975598@testuser.com
				)
			)
		*/

	}

	public function sandbox(){

		$this->load->view('sandbox');

	}

	public function sandbox2(){

		$this->load->library('mercadopago');
		
			$mp	= new MP ('2062037664686861', 'HKU7lmubNXVka9ZkEDKxjaMR3ihLK82c');

			$mp->sandbox_mode(FALSE);
			
			$preference_data	= array(
					    'items' => array(
					        array(
					            'title'			=> 'Pago de pedido #',
					            'currency_id'	=> 'MXN',
					            'category_id'	=> 'Category',
					            'quantity'		=> 1,
					            'unit_price'	=> 10.2
					        )
					    ),
					    'payer'	=>	array(
					    	array(
					    		'email'			=>	'jpcruzgarcia@outlook.com'
					    	)
					    )
			);

		$preference				= $mp->create_preference($preference_data);

		$this->data['button']	=	$preference['response']['init_point'];

		$this->load->view('sandbox2', $this->data);

	}

}
