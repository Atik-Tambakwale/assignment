<?php
require "config/db_connection.php";
$response=[];
$sqlQuery="UPDATE `user_details` SET `is_delete`=0 WHERE `id`=".$_GET['id'];
$result=mysqli_query($link,$sqlQuery);

if(mysqli_affected_rows($link)>0){
	$response["status"]=200;
	$response["msg"]="user is undo list";
}
else{
	$response["status"]=201;
	$response["msg"]=mysqli_error($link);
}
echo json_encode($response);
?>