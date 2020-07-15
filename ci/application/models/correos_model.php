<?php

class Correos_model extends CI_Model{

	function get_mails_newsletter($limit1, $limit2){
		$this->db->distinct();
		$this->db->select('(customers_newsletter_email), mailchimp, customers_newsletter_id, fecha_alta ');
		$this->db->order_by('customers_newsletter_id', 'desc');
		$query =$this->db->get('customers_newsletter', $limit1, $limit2);
		return $query->result();
		//return $this->db->last_query();
	}

	function total_newsletter()
	{
		$consulta = $this->db->get('customers_newsletter');
		return  $consulta->num_rows() ;
	}
	
	function get_mails_registro(){
		$this->db->distinct();
		$this->db->select('(customers_email_address) as customers_newsletter_email, mailchimp, customers_id as customers_newsletter_id, customers_info_date_account_created as fecha_alta ');
		$this->db->join('customers_info', 'customers_info.customers_info_id = customers.customers_id');
		$this->db->order_by('customers_info_id', 'desc');
		$query =$this->db->get('customers');
		return $query->result();
	}
	
	function get_where_mails_newsletter($data){
		$this->db->distinct();
		$this->db->select('(customers_newsletter_email), mailchimp, customers_newsletter_id ');
		$this->db->order_by('mailchimp', 'asc'); 
		$query =$this->db->get_where('customers_newsletter', $data);
		return $query->result();
	}
	
	function get_where_mails_registro($data){
		$this->db->distinct();
		$this->db->select('(customers_email_address) as customers_newsletter_email, mailchimp, customers_id as customers_newsletter_id, customers_info_date_account_created as fecha_alta ');
		$this->db->join('customers_info', 'customers_info.customers_info_id = customers.customers_id');
		$this->db->order_by('mailchimp', 'asc'); 
		$query =$this->db->get_where('customers', $data);
		return $query->result();
	}
	
	function update_mails_newsletter($where,$data){
		$this->db->where($where);
		$this->db->update('customers_newsletter', $data); 
	}
	
	function update_mails_registro($where,$data){
		$this->db->where($where);
		$this->db->update('customers', $data); 
	}
	
	function insert_correos_totales($data){
		$this->db->insert('z_correos_totales', $data); 
	}
	
	function select_correos_totales($data){
		$query = $this->db->get_where('z_correos_totales', $data);
		return $query->row();
	}
	
	function get_lista(){
		$query = $this->db->get('z_correos_listas');
		return $query->result();
	}
	
}

?>