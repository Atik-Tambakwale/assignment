<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Document extends MY_Controller{

			public function __construct()
		{
			parent::__construct();
		}

		public function index(){
			$this->load->view('master/property_master');
		}
		public function displayPropertyUsername(){
			$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->get('property');
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
		public function insertDocument_upload(){
			$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());

				$data=[
					'p_id'=>$this->input->post('p_name'),
					'dt_id'=>$this->input->post('p_document'),
					'du_doc_no'=>$this->input->post('p_doc_no'),
					'du_description'=>$this->input->post('p_desc')
				];
				
				$config=[
					'upload_path'=>'uploads/',
					'allowed_types'=>'jpg|png|jpeg|pdf',
					'max_size'=>1000000
				];
				
				// $this->load->library('upload', );
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('pdf_file')){
					echo $this->upload->display_errors();
				}else{
					$fd=$this->upload->data();
					$fn=$fd['file_name'];
					$data['pdf_file']=$fn;
					$query=$this->db->insert('document_upload',$data);

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

				}
				

			}catch(Exception $e){

			}
			echo json_encode($response);			
		} 		
		public function displayDocumentUpload(){
			$response=[];
		
			try{
				$auth = $this->token->decodeToken($this->token_verification());
				
				$username= $this->input->post('fp_name') ;
				$document_name=$this->input->post('fd_name');
				($document_name=='') ? $this->db->where('du.p_id',$username):$this->db->where('du.p_id',$username)->where('du.dt_id',$document_name);
				$this->db->select('du.id as duid,du.*,p.p_name,dt.d_name');
				$this->db->from('document_upload du');
				$this->db->join('property p','du.p_id=p.id');
				$this->db->join('document_type dt','du.dt_id=dt.id');
				$result=$this->db->get();
				//query('SELECT du.id as duid,du.*,p.p_name,dt.d_name From document_upload du JOIN property p ON du.p_id=p.id JOIN document_type dt ON du.dt_id=dt.id');
				//echo $this->db->last_query();
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
		public function DeleteDocumentUpload(){
			$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$result=$this->db->where('id',$this->input->get('id'))->delete('document_upload');
			
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
		public function insertMDocuments()
		{
				$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'md_p_id '=>$this->input->post('md_name'),
				'md_dt_id '=>$this->input->post('md_document'),
				'remark'=>$this->input->post('md_remark')
			];
			
			$query=$this->db->insert('missing_doc_tbl',$data);

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
		public function displayMissingDocument()
		{
			$response=[];
		
			try{
				$auth = $this->token->decodeToken($this->token_verification());
				
				$username= $this->input->post('mdf_name') ;
				$this->db->where('mdt.md_p_id',$username);
				$this->db->select('mdt.id as mdid,mdt.*,p.*,dt.*');
				$this->db->from('missing_doc_tbl mdt');
				$this->db->join('property p','mdt.md_p_id=p.id');
				$this->db->join('document_type dt','mdt.md_dt_id=dt.id');
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
		public function oneDisplayMissingDocument()
		{
			$response=[];
		
			try{
				$auth = $this->token->decodeToken($this->token_verification());
				
				$this->db->where('mdt.id',$this->input->get('id'));
				$this->db->select('mdt.id as mdid,mdt.*,p.*,dt.*');
				$this->db->from('missing_doc_tbl mdt');
				$this->db->join('property p','mdt.md_p_id=p.id');
				$this->db->join('document_type dt','mdt.md_dt_id=dt.id');
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
		public function updateMissingDocument()
		{
			$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());
				$data=[
					'p_oname'=>$this->input->post('p_oname'),
					'p_omobile'=>$this->input->post('p_omobile')
					];
				$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('missing_doc_tbl');
				
				
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
		public function deleteMissingDocument(){
			$response=[];
				try{
				$auth = $this->token->decodeToken($this->token_verification());
				
				$result=$this->db->where('id',$this->input->get('id'))->delete('missing_doc_tbl');
				
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