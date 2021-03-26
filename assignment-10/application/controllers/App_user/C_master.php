<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_master extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AppUserModel');
	}
	public function index(){
		$this->load->view('master/property_master');
	}
	public function createAppUser(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$password=$this->randomPassword();

			$data=[
				'name'=>$this->input->post('name'),
				'mobile'=>$this->input->post('mobile'),
				'email'=>$this->input->post('email'),
				'user_type_id'=>$this->input->post('user_type'),
				'password'=>md5($password),
				'initial_password'=>$password
			];
			
			$query=$this->db->insert('app_users',$data);

			if($query>0){
				$response=[
					'status'=>200,
					'msg'=>"User database inserted Successfully"
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
	public function oneDisplayAppUser(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$this->db->where('au.id',$this->input->get('id'))
				->select('au.id as uid ,au.*,ut.*')
				->from('app_users au')
				->join('user_type ut', 'ut.id = au.user_type_id');
			$result=$this->db->get();
			$data=$result->result();
			
			if (count($data) > 0) {
			
				$response=[
					'status'=>200,
					'data'=>$data
				];
			}
				else{
				$response=[
					'status'=>200,
					'msg'=>"display error !"
				];
			}


		}catch(Exception $e){

		}
		echo json_encode($response);
	}
	public function updateAppUser(){
		
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'name'=>$this->input->post('name'),
				'mobile'=>$this->input->post('mobile'),
				'email'=>$this->input->post('email'),
				'user_type_id'=>$this->input->post('user_type'),
				];
			$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('app_users');
			
			
			if ($result > 0) {
			$response=['status'=>200,'list'=>$result,'msg'=>'data is updated successfully'];	
			}
			else{
				$response=['status'=>201,'msg'=>'unable to fetch data'];
			}
		}
		catch(Exception $e){

		}
			echo json_encode($response);
	
	}
	public function displayAppUser(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$this->db->select('au.id as uid ,au.*,ut.*')
				->from('app_users au')
				->join('user_type ut', 'ut.id = au.user_type_id');
			$result=$this->db->get();
			$data=$result->result();
			
			if (count($data) > 0) {
			
				$response=[
					'status'=>200,
					'data'=>$data
				];
			}
				else{
				$response=[
					'status'=>200,
					'msg'=>"display error !"
				];
			}


		}catch(Exception $e){

		}
		echo json_encode($response);		
	}
	public function DeleteAppUser(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$query=$this->db->where('id',$this->input->get('id'))->delete('app_users');
			if($query>0){
				$response=[
					'status'=>200,
					'msg'=>"App User is deleted Successfully"
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
	public function update_status(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'status' => $this->input->post('status'),
				'id' => $this->input->post('id')
			];
			$result=$this->db->where('id',$data['id'])->set('status',$data['status'])->update('app_users');
    		
			if ($result > 0) {
			$response=['status'=>200,'list'=>$result,'msg'=>'data is updated successfully'];	
			}
			else{
				$response=['status'=>201,'msg'=>'unable to fetch data'];
			}
		}
		catch(Exception $e){

		}
			echo json_encode($response);
    
	}
	public function update_userType(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'user_type_id' => $this->input->post('user_type'),
				'id' => $this->input->post('id')
			];
			$result=$this->db->where('id',$data['id'])->set('user_type_id',$data['user_type_id'])->update('app_users');
    		
			if ($result > 0) {
			$response=['status'=>200,'list'=>$result,'msg'=>'data is updated successfully'];	
			}
			else{
				$response=['status'=>201,'msg'=>'unable to fetch data'];
			}
		}
		catch(Exception $e){

		}
			echo json_encode($response);
	}
	public function ReGeneratePasswordAppUser(){
		
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$password=$this->randomPassword();
			
			 $data=[
				'password'=>md5($password),
				'initial_password'=>$password
			];
			
			
			$result=$this->db->where('id',$this->input->get('id'))->set($data)->update('app_users');
				
				if ($result > 0) {
				$response=['status'=>200,'list'=>$result,'msg'=>'Password has Regenerates successfully'];	
				}
				else{
					$response=['status'=>201,'msg'=>'unable to fetch data'];
				}
		}
		catch(Exception $e){

		}
			echo json_encode($response);

	
	}
	
}
?>