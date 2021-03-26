<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$this->load->view('user/user_creation');
	}
	public function insertData(){
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
			
			$query=$this->db->insert('user_tbl',$data);

			if($query>0){
				$response['status']=200;
				$response['msg']="User database inserted Successfully";
			}
				else{
				$response['status']=200;
				$response['msg']="Insert error !";
			}

		}catch(Exception $e){

		}
		echo json_encode($response);
	}

	public function loadUserType(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$query=$this->db->get('user_type');
			$result=$query->result();

			if (count($result) > 0) {
				$response=['status'=>200,'list'=>$result];	
			}
			else{
				$response=['status'=>201,'msg'=>'unable to fetch data'];
			}
		}
		catch(Exception $e){

		}
		echo json_encode($response);
	}

	public function DisplayUserData(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$this->db->select('u.id as uid ,u.*,ut.*')
				->from('user_tbl u')
				->join('user_type ut', 'ut.id = u.user_type_id');
			$result=$this->db->get();
			$data=$result->result();
			
			if (count($data) > 0) {
				$response['status']=200;
				$response['data']=$data;
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
	public function oneDisplayData(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->where('id',$this->input->get('id'))->get('user_tbl');
			$data=$result->result();
			
			if (count($data) > 0) {
				$response['status']=200;
				$response['data']=$data;
			}
			else{
				$response['status']=201;
				$response['msg']="no record found";
			}
		}
		catch(Exception $e){

		}
			echo json_encode($response);
	}
	public function UpdateuserData(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'name'=>$this->input->post('name'),
				'mobile'=>$this->input->post('mobile'),
				'email'=>$this->input->post('email'),
				'user_type_id'=>$this->input->post('user_type')
				];
			$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('user_tbl');
			
			
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
	public function deleteuserData(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$result=$this->db->where('id',$this->input->get('id'))->delete('user_tbl');
			
			
			if ($result > 0) {
			
				$response=['status'=>200,'list'=>$result,'msg'=>'user is deleted completely'];

			}
			else{

				$response=['status'=>201,'msg'=>'unable to fetch data'];
			
			}
		}
		catch(Exception $e){

		}
			echo json_encode($response);
	}
	public function regeneratePassword()
	{	
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$password=$this->randomPassword();
			$data=[
				'password'=>md5($password),
				'initial_password'=>$password
			];
			$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('user_tbl');
				
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