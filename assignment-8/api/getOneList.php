<?php
require "./config/db_connection.php";

$response=[];

	$sql="SELECT  `ud`.*,`att`.*
				FROM `user_details` AS `ud` 
				JOIN `assign_task_tbl` AS `att`
						 ON `ud`.`id`=`att`.`student_id`
						 WHERE `att`.`id`=".$_GET['id'];
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) {
		$response['status'] = 200;
		$response['list'] = $row;
}else{
		$response['status'] = 201;
		$response['msg'] = "No Records";
}
echo json_encode($response);
?>