<?php
require "config/db_connection.php";
$response = [];

$sql = "SELECT `p`.*,`b`.name
				FROM `product` as p
				JOIN `brand` as b ON b.id = p.brand_id";
$result=mysqli_query($link,$sql) or die(mysqli_error($link));

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