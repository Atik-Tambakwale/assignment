<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_recover_pass extends CI_Controller{

	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('recover-password');
	}
	public function updatePassword(){
		$response=[];
		$password=$this->input->post('password');
		$rep_password=$this->input->post('rep_password');
		if($password != $rep_password){
			$response=['msg'=>'please enter same password'];	
		}
		$query=$this->db->where('email',$this->input->post('email'))
						->set('password',md5($password))
						->set('initial_password',$password)
						->update('user_tbl');
		
		if($query>0){
			$response=['status'=>200,'msg'=>'Your password is Changed successfully'];
		}
		else{
			$response=['status'=>201,'msg'=>'Please enter correctly password'];
		}
		echo json_encode($response);

	}
}
?>