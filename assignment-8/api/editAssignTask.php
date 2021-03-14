<?php
require "config/db_connection.php";
$response=[];

$password=
$sqlQuery="UPDATE `user_details` SET `role_id`=".$_GET['updated_role'].",`fname`='".$_GET['updated_fname']."',`lname`='".$_GET['updated_lname']."',`mobile`=".$_GET['updated_mobile'].",`email`='".$_GET['updated_email']."',`password`='".MD5($_GET['updated_password'])."',`initial_password`='".$_GET['updated_password']."',`is_delete`=0  WHERE `id`=".$_GET['updated_id']."";

$result=mysqli_query($link,$sqlQuery);

if(mysqli_affected_rows($link)>0){
	$response["status"]=200;
	$response["msg"]="user detail updated successfully";
}
else{
	$response["status"]=201;
	$response["msg"]=mysqli_error($link);
}
echo json_encode($response);	

?>