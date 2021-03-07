<?php
require "./config/db_connection_1.php";

$response=[];

$sql= "SELECT `id`, `doctor_id`, `depart_id`, `fname`, `lname`, `mobile`, `image`, `email`, `dob`, `age`, `gender`, `address`, `post_code`, `city`, `state`, `country`, `aadhar` 
FROM `patient_details` WHERE `id`=".$_GET['id'];
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