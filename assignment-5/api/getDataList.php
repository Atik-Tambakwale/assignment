<?php 
	require "./config/db_connection_1.php";

	$sql="SELECT `pd`.*,`dd`.`doc_name`,`dpd`.`depart_name` 
		FROM `patient_details` as `pd`
		JOIN `doctor_details` as `dd` ON `dd`.id=`pd`.doctor_id 
		JOIN `department_detail` as `dpd` ON `dpd`.id=`pd`.depart_id
	";
	$result=mysqli_query($link,$sql) or die(mysqli_error($link));;
	
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