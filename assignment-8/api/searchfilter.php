<?php
session_start();
require "./config/db_connection.php";

$response=[];

if($_SERVER['REQUEST_METHOD']=='POST'){
	$key=$_POST['search_input'];
	
	$sql="SELECT t.*, CONCAT(cr.fname, ' ', cr.lname) as creator, CONCAT(asg.fname, ' ', asg.lname) as assignee 
				FROM `assign_task_tbl` as t
				JOIN `user_details` as cr ON cr.email = t.user_email
				JOIN `user_details` as asg ON asg.id = t.student_id
				WHERE `t`.`title` LIKE '%".$key."%' AND ";
				$where = "";
				if($_POST['search_type'] === 'created')
					$where = "t.user_email = '".$_SESSION['email']."'";
				else
					$where = "t.student_id = '".$_SESSION['id']."'";
				$sql .= $where;
	// echo $sql;
  $result = mysqli_query($link,$sql);
	$datalist=[];
	while($row=mysqli_fetch_assoc($result)){
			array_push($datalist,$row);	
	}
	if (mysqli_num_rows($result) > 0) {
		$response['status'] = 200;
		$response['list'] = $datalist;
	}else{
		$response['status'] = 201;
		$response['msg'] = "No Records";
	} 
	echo json_encode($response);
}
?>