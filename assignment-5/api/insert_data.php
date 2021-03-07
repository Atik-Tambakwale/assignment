<?php 
	require "./config/db_connection.php";

	if($_SERVER['REQUEST_METHOD']=='POST'){
	$response=[];
	$password=md5($_POST['password']);

	$sqlQuery="INSERT INTO `user_table`( `fname`, `lname`, `email`, `password`, `mobile`) 
						VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$password."','".$_POST['mobile']."')";
	$result=mysqli_query($link,$sqlQuery);
	
	if(mysqli_affected_rows($link)>0){
		$response['status']=200;
		$response['msg']="Your User data inserted Successfully!";
	}
	else{
		$response['status']=201;
		$response['msg']=mysqli_error($link);
	}	
	echo json_encode($response);
	
}
?>