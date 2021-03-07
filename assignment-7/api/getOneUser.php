<?php
require "config/db_connection.php";

$response=[];
$sqlQuery="SELECT * FROM `user_details` WHERE `id`=".$_GET['id'];
$result=mysqli_query($link,$sqlQuery);

$dataList=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
	$response["status"]=200;
	$response["data"]=$dataList;
}
else{
	$response["status"]=201;
	$response["msg"]=mysqli_error($link);
}

echo json_encode($response);

?>