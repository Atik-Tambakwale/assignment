<?php
	require "./config/db_connection_1.php";
 	$response=[];
/*	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES[$_POST["image"]]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	 */if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$upload_path = "../uploads/";
				$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
				$file_name = uniqid().".".$extension;
				$upload_path .= $file_name;
				move_uploaded_file($_FILES['image']['tmp_name'], $upload_path);
			 $sql="INSERT INTO `patient_details`( `doctor_id`, `depart_id`, `fname`, `lname`, `mobile`, `image`, `email`, `dob`, `age`, `gender`, `address`, `post_code`, `city`, `state`, `country`, `aadhar`) 
				VALUES (".$_POST['doc_name'].",".$_POST['depart_name'].",'".$_POST['fname']."','".$_POST['lname']."',".$_POST['mobile'].",'".$upload_path."','".$_POST['email']."','".date('Y-m-d',strtotime($_POST['date']))."',".$_POST['age'].",'".$_POST['gender']."','".$_POST['address']."',".$_POST['post_code'].",'".$_POST['city']."','".$_POST['state']."','".$_POST['country']."',".$_POST['aadhar'].")";
	
	$result =mysqli_query($link,$sql);
	if(mysqli_affected_rows($link)>0)
	{
		$response["status"]=200;
		$response["msg"]="Data enter successfully";	
	 }
	else{
		$response["status"]=201;
		$response["msg"]= mysqli_error($link);
	} 
	 echo json_encode($response);
}
			
?>