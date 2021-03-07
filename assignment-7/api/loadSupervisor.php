<?php
	require "config/db_connection.php";

	$sqlQuery="SELECT `role_id`,`fname`,`lname` FROM `user_details` WHERE role_id=2";
	$result=mysqli_query($link,$sqlQuery);
		$dataList=[];
		while($row=mysqli_fetch_assoc($result)){
			array_push($dataList,$row);
		}
		if(count($dataList)>0){
			$response["status"]=200;
			$response["data"]=$dataList;
		}
		else{
			$response["status"]=201;
		}
		echo json_encode($response);

?>