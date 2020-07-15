<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directorio extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');
	}

	public function md5()
	{
		$map = directory_map('../images/');
		$img = array();
		foreach ($map as $k => $v) {
			if(preg_match('/^[0-9a-f]{32}.([jJ][pP][gG])$/i', $v)) {
		    	//echo $v.'<br>';
		    	array_push($img, $v);
			}
		}
		//echo json_encode($img);
		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($img));
	}

	
}

/* End of file Dir.php */
/* Location: ./application/controllers/Dir.php */