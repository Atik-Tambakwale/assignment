<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_inform extends CI_Model{
	
	public function __construct()
	{
		parent::__construct();
	}
	public function login_data($email,$password){
		$query=$this->db->where("email", $email)->where("password", md5($password))->get("user_tbl");
		return $query;
	}
}
?>