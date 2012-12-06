<?php
class Users_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function user_select($username){
		$this->db->where('username',$username);
		$this->db->select('*');
		$query=$this->db->get('users');
		return $query->result();
	}
	
}

 ?>