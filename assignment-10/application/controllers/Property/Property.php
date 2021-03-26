<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Property extends MY_Controller{

		public function __construct()
		{
			parent::__construct();
		}

		public function index(){
			$this->load->view('property/property-creation');
		}

		public function insertPropertyData(){
			$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());

				$data=[
				'pt_id'=>$this->input->post('pt_type'),
				'pu_id'=>$this->input->post('pu_unit'),
				'prt_id'=>$this->input->post('pt_id'),
				'p_name'=>$this->input->post('pt_name'),
				'p_site_no'=>$this->input->post('pt_site_no'),
				'p_sas_no'=>$this->input->post('sas_no'),
				'p_size'=>$this->input->post('pt_size'),
				'address'=>$this->input->post('address'),
				'p_Latitude'=>$this->input->post('p_lat'),
				'p_longitude'=>$this->input->post('p_long'),
				'p_status'=>$this->input->post('status'),
				'p_purchase_year'=>$this->input->post('p_year'),
				'p_oname'=>$this->input->post('p_oname'),
				'p_omobile'=>$this->input->post('p_omobile')
				];
				
				$query=$this->db->insert('property',$data);

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

		public function displayPropertyList(){
			$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());
				/* $this->db->select('p.id as pid,p.*,pt.*,pu.*')
					 ->from('property as p,property_type as pt,property_unit as pu')
					 ->where('p.pt_id = pt.id AND p.pu_id = pu.id');
				 */
				$this->db->where('is_delete',0);
				$this->db->select('p.id as pid,p.*,pt.*,pu.*')->from('property p');
				$this->db->join('property_type pt', 'p.pt_id = pt.id'); 
				$this->db->join('property_unit pu', 'p.pu_id = pu.id'); 			
				$result =$this->db->get();
				//echo $this->db->last_query();
				//$result=$this->db->query('SELECT p.id as pid,p.*,pt.pt_name,pu.pu_sname From property p JOIN property_type pt ON pt.id=p.pt_id JOIN property_unit pu ON pu.id=p.pu_id');
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
		public function oneDisplayProperty(){
			$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->where('id',$this->input->get('id'))->query('SELECT p.id as pid,p.*,pt.pt_name,pu.pu_sname From property p JOIN property_type pt ON pt.id=p.pt_id JOIN property_unit pu ON pu.id=p.pu_id');
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
		public function updateProperty(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'pt_id'=>$this->input->post('pt_type'),
				'pu_id'=>$this->input->post('pu_unit'),
				'prt_id'=>$this->input->post('pt_id'),
				'p_name'=>$this->input->post('pt_name'),
				'p_site_no'=>$this->input->post('pt_site_no'),
				'p_sas_no'=>$this->input->post('sas_no'),
				'p_size'=>$this->input->post('pt_size'),
				'address'=>$this->input->post('address'),
				'p_Latitude'=>$this->input->post('p_lat'),
				'p_longitude'=>$this->input->post('p_long'),
				'p_status'=>$this->input->post('status'),
				'p_purchase_year'=>$this->input->post('p_year'),
				'p_oname'=>$this->input->post('p_oname'),
				'p_omobile'=>$this->input->post('p_omobile')
				];
			$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('property');
			
			
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
	public function oneDisplayOwner(){
			$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->where('id',$this->input->get('id'))->query('SELECT p.id as pid,p.*,pt.pt_name,pu.pu_sname From property p JOIN property_type pt ON pt.id=p.pt_id JOIN property_unit pu ON pu.id=p.pu_id');
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
	public function UpdateOwerInfo(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'p_oname'=>$this->input->post('p_oname'),
				'p_omobile'=>$this->input->post('p_omobile')
				];
			$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('property');
			
			
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
	public function oneDisplayOwnerInfo(){
			$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->where('id',$this->input->get('id'))->query('SELECT p.id as pid,p.*,pt.pt_name,pu.pu_sname From property p JOIN property_type pt ON pt.id=p.pt_id JOIN property_unit pu ON pu.id=p.pu_id');
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

		}	echo json_encode($response);
	}
		public function deleteProperty(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$result=$this->db->where('id',$this->input->get('id'))->set('is_delete',1)->update('property');
			
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
	public function displayDeletePropertyList(){
			$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());
				$this->db->where('is_delete',1);
				$this->db->select('p.id as pid,p.*,pt.*,pu.*')->from('property p');
				$this->db->join('property_type pt', 'p.pt_id = pt.id'); 
				$this->db->join('property_unit pu', 'p.pu_id = pu.id'); 			
				$result =$this->db->get();
				//$result=$this->db->where('is_delete',1)->query('SELECT p.id as pid,p.*,pt.pt_name,pu.pu_sname From property p JOIN property_type pt ON pt.id=p.pt_id JOIN property_unit pu ON pu.id=p.pu_id');
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
		public function undoProperty(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$result=$this->db->where('id',$this->input->get('id'))->set('is_delete',0)->update('property');
			
			if ($result > 0) {
			
				$response=['status'=>200,'list'=>$result,'msg'=>'user is undo completely'];

			}
			else{

				$response=['status'=>201,'msg'=>'unable to fetch data'];
			
			}
		}
		catch(Exception $e){

		}
			echo json_encode($response);
	}
	public function insertMissingDocument()
	{
		
	}
		
}
?>