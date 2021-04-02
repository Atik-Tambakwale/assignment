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
				$colounm_name=$this->input->get('colounm_name');
				$orderby_colunm=$this->input->get('orderby_colunm');

				$this->db->like('CITY',$search)->or_like('CITY',$search)->like('ADDRESS_1',$search)->like('ADDRESS_2',$search)->like('ADDRESS_3',$search);
				$this->db->like('NAME',$search)->or_like('TITLE',$search)->like('NAME',$search);
				$this->db->or_like('PIN',$search);
				if($colounm_name!='' && $orderby_colunm!=''){
					$this->db->order_by($colounm_name." ".$orderby_colunm);
				}
				$this->db->limit(20);
				$result =$this->db->get('ksa_list');
				$data=$result->result();
				//echo $this->db->last_query($result);
				/* echo "<pre>";
				print_r($data);
				echo "</pre>"; */
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
	/* public function displaytableFormat()
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
	} */
	/* public function phpExcelList()
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
					"A1"=>"MEMBER_ID",
					"B1"=>"MEMBER_TYPE",
					"C1"=>"TITLE",
					"D1"=>"NAME",
					"E1"=>"ADDRESS_1",
					"F1"=>"ADDRESS_2",
					"G1"=>"ADDRESS_3",
					"H1"=>"ADDRESS_4",
					"I1"=>"CITY",
					"J1"=>"PIN",
					"K1"=>"MOBILE",
					"L1"=>"EMAIL",
					"M1"=>"MONTH",
					"N1"=>"YEAR",
					"O1"=>"MAGRETURN",
					"P1"=>"STOPMAIL",
					"Q1"=>"DESTFILE",
					"R1"=>"EXPIRED",
					"S1"=>"HANDDELV"
				];
				foreach ($table_columns as $key => $value) {
					$sheet->setCellValue($key, $value);	
				}
				

				$writer = new Xlsx($spreadsheet);
				$writer->save('export_excel.xlsx');
		 
	}	 */
}

?>