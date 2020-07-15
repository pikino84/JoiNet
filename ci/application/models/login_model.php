<?php

class Login_model extends CI_Model{

	function login_user($email,$password){
		$query =$this->db->get_where('r00t3d', array('email' => $email,'password'=>$password));
		return $query->row();
		//echo $this->db->last_query();
	}
	
	function get_usuario($data){
		$query =$this->db->get_where('r00t3d', $data);
		return $query->row();
	}
	
}

?>