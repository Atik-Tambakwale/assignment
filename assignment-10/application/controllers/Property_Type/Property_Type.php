<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class PROPERTY_TYPE extends MY_Controller{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function index(){
			$this->load->view('master/property_master');
		}

		public function createPropertyType(){
			$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());

				$data=[
				'pt_name'=>$this->input->post('pt_name'),
				'pt_sname'=>$this->input->post('pt_sname')
				];
				
				$query=$this->db->insert('property_type',$data);

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

		public function displayPropertyType(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->get('property_type');
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

	public function deletePropertyType(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$query=$this->db->where('id',$this->input->get('id'))->delete('property_type');
			if($query>0){
				$response=[
					'status'=>200,
					'msg'=>"Property Type is deleted Successfully"
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