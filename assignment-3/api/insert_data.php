<?php
		require "./config/db_connection.php";
		if($_SERVER['REQUEST_METHOD'] == 'POST')
{
		$calculator=$_POST['calculation'];
		$count=$_POST['investigation_count'];
		$total_amt=$calculator;
		
		$sqlQuery="INSERT INTO `daily_investigation_entry_tbl`
		( `service_id`, `doctor_id`, `investigation_count`, `total_amount_collection`, `date`, `commission_percent`, `commission_amount`, `calculations`, `created_at`, `updated_at`) 
			VALUES (".$_POST['service_id'].", ".$_POST['doctor_id']." , ".$count.", ".$total_amt." , '".date('Y-m-d', strtotime($_POST['date']))."', ".$_POST['commission_percent'].", '".$_POST['commission_amount']."', '".$calculator."', '".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."')";
			
		$result=mysqli_query($link,$sqlQuery);
		$response=[];
		
		if(mysqli_affected_rows($link) > 0){
			$response['status']=200;
			$response['msg']="your data is successfully Addede";
		}
		else{
			$response['status']=201;
			$response['msg']=mysqli_error($link);
		}
		
		echo json_encode($response);
	}
?>