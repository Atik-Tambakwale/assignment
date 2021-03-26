<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

class Document_type extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('master/property_master');
	}
	
	public function createDocumentType(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());

			$data=[
			'd_name'=>$this->input->post('dt_name'),
			];
			
			$query=$this->db->insert('document_type',$data);
			
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
	
	public function displayDocumentType(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->get('document_type');
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

	public function oneDisplayDocumentType(){		
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->where('id',$this->input->get('id'))->get('document_type');
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

	public function UpdateDocumentType(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'd_name'=>$this->input->post('dt_name'),
				];
			$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('document_type');
			
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

	public function deleteDocumentType(){
		$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());

				$query=$this->db->where('id',$this->input->get('id'))->delete('document_type');
				
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
}
?>