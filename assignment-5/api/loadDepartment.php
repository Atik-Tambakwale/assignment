<?php 
		require "config/db_connection_1.php";
		$response=[];
		
		$sql="SELECT * FROM department_detail";
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
		}
		echo json_encode($response);
?>