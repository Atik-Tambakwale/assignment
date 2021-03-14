<?php

require "./config/db_connection.php";

$response=[];

	$sql="SELECT  `ud`.*,`att`.*
				FROM `user_details` AS `ud` 
				JOIN `assign_task_tbl` AS `att`
						 ON `ud`.`id`=`att`.`student_id` 
				WHERE DATE(`att`.`start_date`) BETWEEN '".date('Y-m-d',strtotime($_POST['start_date']))."' AND '".date('Y-m-d',strtotime($_POST['end_date']))."'
						 OR DATE(`att`.`end_date`) BETWEEN '".date('Y-m-d',strtotime($_POST['start_date']))."' AND '".date('Y-m-d',strtotime($_POST['end_date']))."'";
	// echo $sql;
  $result=mysqli_query($link,$sql);
	$dataList=[];
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result))
	{		
		array_push($dataList,$row);
	}
	$response['status'] = 200;
	$response['list'] = $dataList;
}else{
		$response['status'] = 201;
		$response['msg'] = "No Records";
} 
echo json_encode($response);	


?>