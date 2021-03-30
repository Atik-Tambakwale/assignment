<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_list extends MY_Controller{

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index(){
		if(!$this->session->userdata("id"))
			return redirect(base_url());
		$this->load->view('display-list/display_list');
		
	}
	public function displayKSAList()
	{
		$response=[];
			try{
				$auth = $this->token->decodeToken($this->token_verification()); 
				$search=$this->input->get('search');
				$this->db->like('city',$search)->or_like('city',$search)->like('ADDR1',$search)->like('ADDR2',$search)->or_like('ADDR3',$search)->or_like('ADDR4',$search);	
						
				$result =$this->db->order_by('NAME ASC')->get('ksa_members_list_as_on_04032021_1');
				$data=$result->result();
				//echo $this->db->last_query($result);
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
	public function displaytableFormat()
	{
		$this->load->view('display-list/excel_report');
	}
	public function searchDisplayList(){
		$response=[]; 
			 try{ 
				$data=[];
				$auth = $this->token->decodeToken($this->token_verification());
				$result =$this->db->order_by('NUMB ASC')->get('ksa_members_list_as_on_04032021_1');
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
	public function phpExcelList()
	{
		 $response=[];
		 		$data=[];
		 		$search=$this->input->get('search');
		 		$this->db->like('city',$search);
		 		$result =$this->db->order_by('NUMB ASC')->get('ksa_members_list_as_on_04032021_1');		
		 		$data=$result->result();

				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();
				$table_columns = [
					"A1"=>"NUMB",
					"B1"=>"t_member",
					"C1"=>"TITLE",
					"D1"=>"NAME",
					"E1"=>"ADDR1",
					"F1"=>"ADDR2",
					"G1"=>"ADDR3",
					"H1"=>"ADDR4",
					"I1"=>"CITY",
					"J1"=>"PIN",
					"K1"=>"MAGRETURN",
					"L1"=>"STOPMAIL",
					"M1"=>"DESTFILE",
					"N1"=>"EXPIRED",
					"O1"=>"LASTUPDT",
					"P1"=>"OLDNUMB",
					"Q1"=>"TOMON",
					"R1"=>"TOYR",
					"S1"=>"HANDDELV"
				];
				foreach ($table_columns as $key => $value) {
					$sheet->setCellValue($key, $value);	
				}
				

				$writer = new Xlsx($spreadsheet);
				$writer->save('export_excel.xlsx');
		 
	}	
}

?>