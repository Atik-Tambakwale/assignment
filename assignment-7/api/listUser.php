<?php
require "./config/db_connection.php";

	$sql="SELECT `user_details`.`fname`,`user_details`.`lname`,`user_details`.`email`,`user_details`.`mobile`,`user_details`.`id` AS `uid`,`project_role`.`project_roles` FROM `user_details` JOIN `project_role` ON `project_role`.`id` =`user_details`.`role_id` WHERE `is_delete`=0 order by `user_details`.`id`";
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