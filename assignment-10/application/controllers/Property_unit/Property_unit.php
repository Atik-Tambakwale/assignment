<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class Property_unit extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('master/property_master');
	}

	public function createPropertyUnit(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());

			$data=[
			'pu_name'=>$this->input->post('pu_name'),
			'pu_sname'=>$this->input->post('pu_sname')
			];
			
			$query=$this->db->insert('property_unit',$data);

			if($query>0){
				$response=[
					'status'=>200,
					'msg'=>"Property type data inserted Successfully"
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

	
	public function displayPropertyUnit(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->get('property_unit');
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

	public function oneDisplayPropertyUnit(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->where('id',$this->input->get('id'))->get('property_unit');
			$data=$result->result();
			
			if (count($data) > 0) {
				$response['status']=200;
				$response['data']=$data;
			}
			else{
				$response['status']=201;
				$response['msg']="no record found";
			}
		}	catch(Exception $e){

		}
		echo json_encode($response);
	}
	public function UpdatePropertyUnit(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'pu_name'=>$this->input->post('pu_name'),
				'pu_sname'=>$this->input->post('pu_sname'),
				];
			$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('property_unit');
			
			
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
	public function deletePropertyUnit(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$result=$this->db->where('id',$this->input->get('id'))->delete('property_unit');
			
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

}
?>