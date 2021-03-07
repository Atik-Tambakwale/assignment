<?php
session_start();
require "config/db_connection.php";

$response=[];
if($_SERVER["REQUEST_METHOD"]== "POST"){
	
	$email=$_POST['email'];
	$password =md5($_POST['password']);

	if($email!="" && $password!=""){
			
			$sqlQuery="SELECT * FROM `user_table` WHERE email='$email' AND password='$password'";
			$result=mysqli_query($link, $sqlQuery);

			if(mysqli_num_rows($result)>0){
					$row = mysqli_fetch_array($result);
						$_SESSION["fname"] = $row['fname'];
						$_SESSION["lname"] = $row['lname'];
						
						$response['status']=200;		
				
			}else{
					$response['status']=201;
					$response['msg']="your entered email and password wrong";
			}
	}
	echo json_encode($response);
}
?>