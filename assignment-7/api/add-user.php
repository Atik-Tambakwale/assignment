<?php
require "config/db_connection.php";
require "lib/Password.php";

$response=[];
if($_SERVER['REQUEST_METHOD']=='POST'){
	$pwd=new Password(); 
	$password=$pwd->generatePassword();

	$sqlQuery="INSERT INTO `user_details`( `role_id`, `fname`, `lname`, `mobile`, `email`, `password`, `initial_password`)
	 VALUES (".$_POST['role'].",'".$_POST['fname']."','".$_POST['lname']."',".$_POST['mobile'].",'".$_POST['email']."','".MD5($password)."','".$password."')";
	$result=mysqli_query($link,$sqlQuery);
	echo $result;
	
	if (mysqli_affected_rows($link)>0) {
		$response["status"]=200;
		$response["msg"]="Data is inserted successfully";
	}
	else{
		$response["status"]=201;
		$response["msg"]=mysqli_error($link);
	}
	echo json_encode($response);
}
?>