<?php
session_start();
require "config/db_connection.php";
require "lib/email_check.php";

$ec=new email_check();
$response=[];
if($_SERVER["REQUEST_METHOD"]== "POST"){
	
	$email=$_POST['email'];
	$password =md5($_POST['password']);

	$check_email =$ec->Is_email($email);
	$where="";
/* 	if($check_email)
		{
			$where .= " WHERE `email`='$email' AND `password`='$password'";
		}
	else{
			$where .=" WHERE `email`='$email' AND `mobile`='$password";	
	} */
	
			$where .= " WHERE `email` LIKE '".$email."' OR `mobile` LIKE '".$email."' AND `password`='".$password."' ";
			$sqlQuery="SELECT * FROM `user_details` ".$where;

			$result=mysqli_query($link, $sqlQuery);

			if(mysqli_num_rows($result)>0){
					$row = mysqli_fetch_array($result);
						$_SESSION['id'] = $row['id'];
						$_SESSION['fname']=$row['fname'];
						$_SESSION['lname']=$row['lname'];
						$_SESSION['email']=$row['email'];
						$response['status']=200;		
				
			}else{
					$response['status']=201;
					$response['msg']="your entered email and password wrong";
			}
	
	echo json_encode($response);
}
?>