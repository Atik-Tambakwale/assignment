<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NProperty extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('notification/notification_creation');
	}
	public function displayRemainder()
	{
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$result=$this->db->get('notification_type_tbl');
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
	public function insertNotificationProperty(){
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());

			$data=[
				'p_id'=>$this->input->post('nfn_name'),
				'nt_id '=>$this->input->post('nfn_type'),
				'next_date'=>date('Y-m-d',strtotime($this->input->post('next_date')))
				
			];
			$query=$this->db->insert('notification_tbl',$data);

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
	public function oneDisplayNTList(){		
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			$result=$this->db->where('id',$this->input->get('id'))->select('id,next_date')->get('notification_tbl');
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

	public function updateNTList(){
		$response=[];
			try{
			$auth = $this->token->decodeToken($this->token_verification());
			$data=[
				'next_date'=>date('Y-m-d',strtotime($this->input->post('update_next_date'))),
				];
			$result=$this->db->where('id',$this->input->post('id'))->set($data)->update('notification_tbl');
			
			if ($result > 0) {
			$response=['status'=>200,'list'=>$result,'msg'=>'date is updated successfully'];	
			}
			else{
				$response=['status'=>201,'msg'=>'unable to fetch data'];
			}
		}
		catch(Exception $e){

		}
			echo json_encode($response);
	}

	public function deleteNotification(){
		$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification());

				$query=$this->db->where('id',$this->input->get('id'))->delete('notification_tbl');
				
				if($query>0){
					$response=[
						'status'=>200,
						'msg'=>"Notification is deleted Successfully"
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
	public function displayNotificationProperty()
	{
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());
			
			$this->db->select('nt.id as nid ,nt.*,p.*,ntt.nt_sname')
				->from('notification_tbl nt')
				->join('property p', 'p.id = nt.p_id')
				->join(' notification_type_tbl ntt','ntt.id=nt.nt_id');
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
	public function upcomingNotificationProperty()
	{
		$response=[];
		try{
			$auth = $this->token->decodeToken($this->token_verification());

			 $dt = new DateTime();
    		 $today=$dt->format('Y-m-d');
			 $enddate=date('Y-m-d', strtotime($today. ' + 10 day'));
			
			$this->db->where("next_date between '$today' and '$enddate'")->select('nt.id as nid ,nt.*,p.*,ntt.nt_sname')
						->from('notification_tbl nt')
						->join('property p', 'p.id = nt.p_id')
						->join(' notification_type_tbl ntt','ntt.id=nt.nt_id');
			$result=$this->db->get();
				
				
			
		/* 	 $this->db->select('nt.id as nid ,nt.*,p.*,ntt.nt_sname')
				->from('notification_tbl nt')
				->join('property p', 'p.id = nt.p_id')
				->join(' notification_type_tbl ntt','ntt.id=nt.nt_id');
		 */	
			
			
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
}
?>