<?php
require "config/db_connection.php";

$response=[];
if($_SERVER['REQUEST_METHOD']=='POST'){
$sqlQuery="INSERT INTO `project_details`(`role_id`, `supervisor_name`, `project_name`, `address`) 
VALUES (2,'".$_POST['supervisor_name']."','".$_POST['project_name']."','".$_POST['address']."')";
$result=mysqli_query($link,$sqlQuery);

if(mysqli_affected_rows($link)>0){
	$response["status"]=200;
	$response["msg"]="data is inserted successfully";
}
else{
	$response["status"]=201;
	$response["msg"]=mysqli_error($link);
}
echo json_encode($response);
}
?>