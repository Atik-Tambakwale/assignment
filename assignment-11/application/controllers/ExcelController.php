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
		// $spreadsheet->getActiveSheet()->setCellValue( "A" . $i, $row['NUMB'] );
		}
	}
	public function phpExcelList()
	{
		$data=[];
			$search=$this->input->get('search');
			
			$result =$this->db->like('city',$search)->or_like('city',$search)->like('ADDR1',$search)->order_by('NUMB ASC')->get('ksa_members_list_as_on_04032021_1');		
			$data=$result->result_array();
/* echo "<pre>";
echo print_r($data);
echo "</pre>"; */
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
		
		$insert_data=$data;
		$k=2;
		$key=0;
			while($k!=count($insert_data)+2){					
				$spreadsheet->getActiveSheet()->setCellValue("A".$k,$insert_data[$key]['NUMB']);
				$spreadsheet->getActiveSheet()->setCellValue("B".$k,$insert_data[$key]['t_member']);
				$spreadsheet->getActiveSheet()->setCellValue("C".$k,$insert_data[$key]['TITLE']);
				$spreadsheet->getActiveSheet()->setCellValue("D".$k,$insert_data[$key]['NAME']);
				$spreadsheet->getActiveSheet()->setCellValue("E".$k,$insert_data[$key]['ADDR1']);
				$spreadsheet->getActiveSheet()->setCellValue("F".$k,$insert_data[$key]['ADDR2']);
				$spreadsheet->getActiveSheet()->setCellValue("G".$k,$insert_data[$key]['ADDR3']);
				$spreadsheet->getActiveSheet()->setCellValue("H".$k,$insert_data[$key]['ADDR4']);
				$spreadsheet->getActiveSheet()->setCellValue("I".$k,$insert_data[$key]['CITY']);
				$spreadsheet->getActiveSheet()->setCellValue("J".$k,$insert_data[$key]['PIN']);
				$spreadsheet->getActiveSheet()->setCellValue("K".$k,$insert_data[$key]['MAGRETURN']);
				$spreadsheet->getActiveSheet()->setCellValue("L".$k,$insert_data[$key]['STOPMAIL']);
				$spreadsheet->getActiveSheet()->setCellValue("M".$k,$insert_data[$key]['DESTFILE']);
				$spreadsheet->getActiveSheet()->setCellValue("N".$k,$insert_data[$key]['EXPIRED']);
				$spreadsheet->getActiveSheet()->setCellValue("O".$k,$insert_data[$key]['LASTUPDT']);
				$spreadsheet->getActiveSheet()->setCellValue("P".$k,$insert_data[$key]['OLDNUMB']);
				$spreadsheet->getActiveSheet()->setCellValue("Q".$k,$insert_data[$key]['TOMON']);
				$spreadsheet->getActiveSheet()->setCellValue("R".$k,$insert_data[$key]['TOYR']);
				$spreadsheet->getActiveSheet()->setCellValue("S".$k,$insert_data[$key]['HANDDELV']);
				//$spreadsheet->getActiveSheet()->setCellValue("T".$k,$insert_data[$key]['']);
				$k++;
				$key++;
			}		  
		
		
			$writer = new Xlsx($spreadsheet); // instantiate Xlsx
            $filename = 'export-excel-report'; // set filename for excel file to be exported

            header('Content-Type: application/vnd.ms-excel'); // generate excel file
            header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
            header('Cache-Control: max-age=0');

            $writer->save('php://output');	// download file
		}
}
?>