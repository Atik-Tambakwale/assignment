<?php


defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Import_excel extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		ini_set('max_execution_time',600);
        ini_set('memory_limit','-1');
        set_time_limit(600);
	}
	
	public function import_excel_file()
	{
		$response=[];
			/* try{ */
				//$auth = $this->token->decodeToken($this->token_verification());
				$config=[
					'upload_path'=>'uploads/',
					'allowed_types'=>'xls|xlsx|csv',
					'max_size'=>1000000
				];
				
				// $this->load->library('upload', );
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('excel_file')){
					echo $this->upload->display_errors();
				}else{
					$fd=$this->upload->data();
				//	 print_r($fd);
					 $file= $fd['file_path']."/".$fd['file_name'];
					 $file_type=\PhpOffice\PhpSpreadsheet\IOFactory::identify($file);
					 $reader =\PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

					 $spreadsheet=$reader->load($file);

					 $data=$spreadsheet->getActiveSheet()->toArray();
					//print_r($data);
						foreach ($data as $row) {
							$insert_data=[
								"t_member"=>$row[1],
								"NUMB"=>$row[2],
								"NAME"=>$row[3],
								"ADDR1"=>$row[4],
								"ADDR2"=>$row[5],
								"ADDR3"=>$row[6],
								"ADDR4"=>$row[7],
								"CITY"=>$row[8],
								"PIN"=>$row[9],
								"TITLE"=>$row[10],
								"MAGRETURN"=>$row[11],
								"STOPMAIL"=>$row[12],
								"DESTFILE"=>$row[13],
								"EXPIRED"=>$row[14],
								"LASTUPDT"=>$row[15],
								"OLDNUMB"=>$row[16],
								"TOMON"=>$row[17],
								"TOYR"=>$row[18],
								"HANDDELV"=>$row[19]
							];
							 //print_r($insert_data);
							$query=$this->db->insert("ksa_list",$insert_data);
						}
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
				/* $filename=$_FILES["excel_file"]["name"];
				 $file = fopen( $filename, "r" );
				 echo $file;
				if($_FILES["excel_file"]['name']!='')
				{
					$allowed_extension=array('xls','csv','xlsx');
					$file_array=explode(".",$_FILES["excel_file"]["name"]);
					$file_extension=end($file_array);
					if(is_array($allowed_extension,$file_extension))				
					 {
						$file_type=\PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES['excel_file']["name"]);
						$reader =\PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
						$spreadsheet=$reader->load($_FILES['excel_file']["tmp_name"]);

						$data=$spreadsheet->getActiveSheet()->toArray();

						foreach ($data as $row) {
							$insert_data=[
								"NUMB"=>$row['NUMB'],
								"t_member"=>$row['t_member'],
								"TITLE"=>$row['TITLE'],
								"NAME"=>$row['NAME'],
								"ADDR1"=>$row['ADDR1'],
								"ADDR2"=>$row['ADDR2'],
								"ADDR3"=>$row['ADDR3'],
								"ADDR4"=>$row['ADDR4'],
								"CITY"=>$row['CITY'],
								"PIN"=>$row['PIN'],
								"MAGRETURN"=>$row['MAGRETURN'],
								"STOPMAIL"=>$row['STOPMAIL'],
								"DESTFILE"=>$row['DESTFILE'],
								"EXPIRED"=>$row['EXPIRED'],
								"LASTUPDT"=>$row['LASTUPDT'],
								"OLDNUMB"=>$row['OLDNUMB'],
								"TOMON"=>$row['TOMON'],
								"TOYR"=>$row['TOYR'],
								"HANDDELV"=>$row['HANDDELV']
							];
							echo $insert_data;
							$query=$this->db->insert("ksa_list",$insert_data);

							echo $this->db->last_query($query->result());
							//$query->result();
							if($query>0){
									$response=[
										'status'=>200,
										'msg'=>"excel file is imported Successfully"
									];
								}
								else{
									$response=[
										'status'=>200,
										'msg'=>"Insert error !"
									];
								}

						}
					}

				}
			}
			catch(Exception $e){

			} */
			echo json_encode($response);
		}
}

?>