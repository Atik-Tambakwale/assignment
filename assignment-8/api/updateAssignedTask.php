<?php
session_start();
	require "config/db_connection.php";
 	$response=[];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql="UPDATE `assign_task_tbl`
		 			SET `title`='".$_POST['updated_title']."',
					 		`description`='".$_POST['updated_description']."',
							`start_date`='".$_POST['updated_startDate']."',
							`end_date`='".$_POST['updated_endDate']."' 
		 			WHERE id=".$_POST['user_id'];

		 $result =mysqli_query($link,$sql);
		 if(mysqli_affected_rows($link)>0)
		{
				$response["status"]=200;
				$response["msg"]="Data is Updated successfully";	
	 	}
		else{
				$response["status"]=201;
				$response["msg"]= mysqli_error($link);
		} 
	 echo json_encode($response);
}
			
?>