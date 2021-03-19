<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_forget extends CI_Controller{

	function __construct()
	{
		parent::__construct();

	}
	public function index(){
		$this->load->view('forgot-password');
	}
	public function getDtEml(){
		$response=[];
		
		$query=$this->db->where('email',$this->input->post('email'))->get('user_tbl');
		$result=$query->result();

		if($result>0){
			$response=['status'=>200,'list'=>$result,'msg'=>'fetch email is successfully'];
		}
		else{
			$response=['status'=>201,'msg'=>'unable to fetch'];
		}

		echo json_encode($response);
	}
	
}
?>