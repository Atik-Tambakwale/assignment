<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelController extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getNumber($data){
		for( $i = 2; $i <= count($data)+1; $i++ ) {
			return $i;
		}
	}
	public function phpExcelList()
	{
		$data=[];
			$search=$this->input->get('search');
			$colunm_name=$this->input->get('colounm_name');
			$orderBY_type=$this->input->get('orderby_colunm');

			$this->db->like('CITY',$search)->or_like('CITY',$search)->like('ADDRESS_1',$search)->like('ADDRESS_2',$search)->like('ADDRESS_3',$search);
			$this->db->like('NAME',$search)->or_like('TITLE',$search)->like('NAME',$search);
			$this->db->or_like('PIN',$search);
			if($colunm_name!='' && $orderBY_type!=''){
				$this->db->order_by($colunm_name." ".$orderBY_type);
			}
	
			$result =$this->db->get('ksa_list');
				
			$data=$result->result_array();

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
		
		$insert_data=$data;
		$k=2;
		$key=0;
			while($k!=count($insert_data)+2){					
				$spreadsheet->getActiveSheet()->setCellValue("A".$k,$insert_data[$key]['MEMBER_ID']);
				$spreadsheet->getActiveSheet()->setCellValue("B".$k,$insert_data[$key]['MEMBER_TYPE']);
				$spreadsheet->getActiveSheet()->setCellValue("C".$k,$insert_data[$key]['TITLE']);
				$spreadsheet->getActiveSheet()->setCellValue("D".$k,$insert_data[$key]['NAME']);
				$spreadsheet->getActiveSheet()->setCellValue("E".$k,$insert_data[$key]['ADDRESS_1']);
				$spreadsheet->getActiveSheet()->setCellValue("F".$k,$insert_data[$key]['ADDRESS_2']);
				$spreadsheet->getActiveSheet()->setCellValue("G".$k,$insert_data[$key]['ADDRESS_3']);
				$spreadsheet->getActiveSheet()->setCellValue("H".$k,$insert_data[$key]['ADDRESS_4']);
				$spreadsheet->getActiveSheet()->setCellValue("I".$k,$insert_data[$key]['CITY']);
				$spreadsheet->getActiveSheet()->setCellValue("J".$k,$insert_data[$key]['PIN']);
				$spreadsheet->getActiveSheet()->setCellValue("K".$k,$insert_data[$key]['MOBILE']);
				$spreadsheet->getActiveSheet()->setCellValue("L".$k,$insert_data[$key]['EMAIL']);
				$spreadsheet->getActiveSheet()->setCellValue("M".$k,$insert_data[$key]['MONTH']);
				$spreadsheet->getActiveSheet()->setCellValue("N".$k,$insert_data[$key]['YEAR']);
				$spreadsheet->getActiveSheet()->setCellValue("O".$k,$insert_data[$key]['MAGRETURN']);
				$spreadsheet->getActiveSheet()->setCellValue("P".$k,$insert_data[$key]['STOPMAIL']);
				$spreadsheet->getActiveSheet()->setCellValue("Q".$k,$insert_data[$key]['DESTFILE']);
				$spreadsheet->getActiveSheet()->setCellValue("R".$k,$insert_data[$key]['EXPIRED']);
				$spreadsheet->getActiveSheet()->setCellValue("S".$k,$insert_data[$key]['HANDDELV']);
				//$spreadsheet->getActiveSheet()->setCellValue("T".$k,$insert_data[$key]['']);
				$k++;
				$key++;
			}		  
		
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(30)->setHorizontalCentered(true);
			$writer = new Xlsx($spreadsheet); // instantiate Xlsx
            $filename = 'export-excel-report'; // set filename for excel file to be exported

            header('Content-Type: application/vnd.ms-excel'); // generate excel file
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');	// download file
		}
}
?>