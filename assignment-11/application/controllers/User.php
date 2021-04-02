<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('user/add_user');
	}
	public function insertUserData(){
			$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());

				$data=[
				'MEMBER_ID'=>$this->input->post('u_MEMBER_ID'),
				'MEMBER_TYPE'=>$this->input->post('u_MEMBER_TYPE'),	
				'TITLE'=>$this->input->post('u_TITLE'),
				'NAME'=>$this->input->post('u_NAME'),
				'ADDRESS_1'=>$this->input->post('u_ADDRESS_1'),
				'ADDRESS_2'=>$this->input->post('u_ADDRESS_2'),
				'ADDRESS_3'=>$this->input->post('u_ADDRESS_3'),
				'ADDRESS_4'=>$this->input->post('u_ADDRESS_4'),
				'CITY'=>$this->input->post('u_CITY'),
				'PIN'=>$this->input->post('u_PIN'),
				'MOBILE'=>$this->input->post('u_MOBILE'),
				'EMAIL'=>$this->input->post('u_EMAIL'),
				'MONTH'=>$this->input->post('u_MONTH'),
				'YEAR'=>$this->input->post('u_YEAR'),
				'MAGRETURN'=>$this->input->post('u_MAGRETURN'),
				'STOPMAIL'=>$this->input->post('u_STOPMAIL'),
				'DESTFILE'=>$this->input->post('u_DESTFILE'),
				'EXPIRED'=>$this->input->post('u_EXPIRED'),
				'HANDDELV'=>$this->input->post('u_HANDELV')
				];
			/* 	echo "<pre>";
				print_r($data);
				echo "</pre>"; */

				$query=$this->db->insert('ksa_list',$data);
				//echo $this->db->last_query($query);

				if($query>0){
					$response=[
						'status'=>200,
						'msg'=>"Property data is inserted Successfully"
					];
				}
					else{
					$response=[
						'status'=>200,
						'msg'=>"Insert error !"
					];
				}


			}catch(Exception $e){

			}
			echo json_encode($response);
		}
}
?>