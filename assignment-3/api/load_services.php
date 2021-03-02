<?php
	require "./config/db_connection.php";

	$sqlQuery=" SELECT `id`,`service_name` FROM `services_tbl`";
	$result=mysqli_query($link,$sqlQuery);
	$dataList=[];
	while($rows=mysqli_fetch_assoc($result)){
		array_push($dataList,$rows);
	}
	$response=[];
	if(count($dataList)>0)
	{
		$response['status']=200;
		$response['list']=$dataList;
	}
	echo json_encode($response);
?>