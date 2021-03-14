<?php
require "./config/db_connection.php";
$response = [];
$sqlQuery="SELECT * FROM `user_details` where `id`=".$_GET['id'];
$result=mysqli_query($link,$sqlQuery);

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