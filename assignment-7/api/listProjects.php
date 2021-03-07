<?php
require "config/db_connection.php";

$response=[];
$sqlQuery="SELECT * FROM `project_details` WHERE is_delete=0";
$result=mysqli_query($link,$sqlQuery);

$dataList=[];
while($row=mysqli_fetch_assoc($result)){
	array_push($dataList,$row);
}

if(mysqli_num_rows($result)>0){
	$response["status"]=200;
	$response["list"]=$dataList;
}
else{
	$response["status"]=201;
	$response["msg"]=mysqli_error($link);
}
echo json_encode($response);
?>