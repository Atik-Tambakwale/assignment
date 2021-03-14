<?php
	require "./config/db_connection.php";
	
	$response=[];
	
	$sql="SELECT `id`,CONCAT(`fname`,' ',`lname`) as name  FROM user_details";
	$result=mysqli_query($link,$sql);
	
	$dataList=[];
	while($row=mysqli_fetch_array($result)){
		array_push($dataList,$row);
	}
	if(count($dataList)>0){
		$response["status"]=200;
		$response["data"]=$dataList;
	}
	else{
		$response["status"]=201;
		$response["msg"]="no Record";
	}
	echo json_encode($response); 
?>