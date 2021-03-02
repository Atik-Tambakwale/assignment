<?php
//TODO:WRITING A SELECT QUERY FOR DOCTOR ID, DOCTOR NAME, AND COMMISSION PERCENTAGES
		require	"./config/db_connection.php";
		$response=[];
		
		$sqlQuery="SELECT `id`, `name`, `cut_percent`
							 from `doctors_master_tbl`";
		$result=mysqli_query($link,$sqlQuery);
		
		$dataList=[];
		
		while($row=MYSQLI_FETCH_ARRAY($result)){
			array_push($dataList,$row);
 		}
		
		 if(count($dataList)>0){
				$response['status'] = 200;
				$response['list'] = $dataList;
		}
		
		echo json_encode($response);
		
?>