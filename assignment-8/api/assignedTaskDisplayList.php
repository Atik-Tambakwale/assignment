<?php
session_start();
require "./config/db_connection.php";

	$sql="SELECT  `ud`.*,`att`.*
				FROM `user_details` AS `ud` 
				JOIN `assign_task_tbl` AS `att`
						 ON `ud`.`id`=`att`.`student_id` 
						 WHERE `ud`.`email`='".$_SESSION['email']."'";

	$result=mysqli_query($link,$sql) or die(mysqli_error($link));;
	
		$data = [];
		while($row = mysqli_fetch_assoc($result)){
				array_push($data, $row);	
		}
		if (count($data) > 0) {
				$response['status'] = 200;
				$response['list'] = $data;
		}else{	
				$response['status'] = 201;
				$response['msg'] = "No Records";
		}
		echo json_encode($response);
	
?>