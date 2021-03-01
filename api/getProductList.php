<?php
require "config/db_connection.php";

$response = [];
$sql = "SELECT `p`.*
FROM `product`as `p`
where `p`.`id`='".$_GET['id']."'" ;
$result=mysqli_query($link,$sql) or die(mysqli_error($link));

// $data = [];
// while($row = mysqli_fetch_assoc($result)){
//     array_push($data, $row);
// }
if (mysqli_num_rows($result) > 0) {
		$response['status'] = 200;
		$response['list'] =  mysqli_fetch_assoc($result);
}else{
		$response['status'] = 201;
		$response['msg'] = "No Records";
}
echo json_encode($response);
?>
