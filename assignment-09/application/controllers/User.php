<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('create-user');
	}

	public function insertData(){
		$headers = $this->input->request_headers();
	
		if ($headers['Authorization'] == $this->session->token) {
			$response=[];
			$data=[
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'password'=>md5($this->input->post('password')),
				'initial_password'=>$this->input->post('password')
			];
			
			$query=$this->db->insert('user_tbl',$data);

			if($query>0){
				$response['status']=200;
				$response['msg']="User database inserted Successfully";
			}
				else{
				$response['status']=200;
				$response['msg']="Insert error !";
			}
			echo json_encode($response);
		}
		
	}

	public function DisplayUserData(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->User_model->display_data();
			
			if (count($result) > 0) {
				$response['status']=200;
				$response['data']=$result;
			}
			else{
				$response['status']=201;
				$response['msg']="no record found";
			}
		}
		catch(Exception $e){

		}
			echo json_encode($response);
		//}
	}
	public function deleteUser(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification);
			$id = $this->input->get('id');
			
			$result=$this->db->query("delete FROM user_tbl WHERE id='".$id."'"); 
			
			if($result>0){
				$response['status']=200;
				$response['msg']="data is deleted completely";
			}
			else{
				$response['status']=201;
				$response['msg']=" unable  to delete user record";
			}
		}catch(Exception $e){
			$response['status']=201;
			$response['msg']=" Access Denied";
		}	
		echo json_encode($response);	
	}
	public function single_data(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification);
			$id=$this->input->get('id');
			
			$result=$this->User_model->display_single_data($id);
			
			if(count($result)>0){
				$response['status']=200;
				$response['list']=$result;
			}
			else{
				$response['status']=201;
				$response['msg']="unable to fetch single user data";
			}
		}
		catch(Exception $e){
			$response['status']=201;
			$response['msg']=" Access Denied";
		}	
			echo json_encode($response);
		
	}
	public function updateData(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification);

			$data=[];
			$id						  = $this->input->post('id');
			$data['name']	 		  = $this->input->post('name');
			$data['email']	  		  = $this->input->post('email');
			$data['password'] 		  = md5($this->input->post('password'));
			$data['initial_password'] = $this->input->post('password');

			$this->db->where('id', $id);
			$result=$this->db->update('user_tbl', $data);
			
			if($result>0){
				$response['status']=200;
				$response['msg']="Data is Updated successfully";
			}
			else{
				$response['status']=201;
				$response['msg']="unable to execution update query";
			} 
		}catch(Exception $e){
			$response['status']=201;
			$response['msg']=" Access Denied";
		}	
			echo json_encode($response);
		
	}
}
?>
