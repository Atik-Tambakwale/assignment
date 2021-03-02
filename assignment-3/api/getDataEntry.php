<?php 
		require "./config/db_connection.php";
	$response=[];
		$sqlQuery="SELECT `diet`.*,`dmt`.`name`,`st`.`service_name` 
				FROM `daily_investigation_entry_tbl` as `diet` 
				JOIN `doctors_master_tbl` as `dmt` ON `diet`.`doctor_id`= `dmt`.`id` 
				JOIN `services_tbl` as `st` ON `diet`.`service_id` = `st`.`id`
				ORDER BY diet.id DESC";
		$result=mysqli_query($link,$sqlQuery) or die(mysqli_error($link));;
	
		$data = [];
while($row = mysqli_fetch_assoc($result)){
	array_push($data, $row);
}
if (count($data) > 0) {
		$response['status'] = 200;
		$response['list'] = $data;
}else{
		$response['status'] = 201;
		$response['msg'] = "No Records";
}
		echo json_encode($response);
?>