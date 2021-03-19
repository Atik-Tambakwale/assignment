<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function display_data(){
		$query=$this->db->query("select * from user_tbl");
		return $query->result();
	}
	public function display_single_data($id){
		$query=$this->db->query("SELECT * FROM user_tbl WHERE id='".$id."'");
		return $query-> result();
	}

}
?>