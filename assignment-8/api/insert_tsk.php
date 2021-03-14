<?php
session_start();
	require "config/db_connection.php";
 	$response=[];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql="INSERT INTO `assign_task_tbl`(`student_id`,`user_email`, `title`, `description`, `start_date`, `end_date`, `is_task_assign`)
		 VALUES ('".$_POST['student_id']."','".$_SESSION['email']."','".$_POST['title']."','".$_POST['description']."' , '".date('Y-m-d',strtotime($_POST['startDate']))."' , '".date('Y-m-d',strtotime($_POST['endDate']))."' ,1)";

		 $result =mysqli_query($link,$sql);
		 if(mysqli_affected_rows($link)>0)
		{
				$response["status"]=200;
				$response["msg"]="Data enter successfully";	
	 	}
		else{
				$response["status"]=201;
				$response["msg"]= mysqli_error($link);
		} 
	 echo json_encode($response);
}
			
?>