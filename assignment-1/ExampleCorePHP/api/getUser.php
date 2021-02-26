<?php
require "config/db_connection.php";

$sql = "SELECT * FROM `user_details` WHERE id=".$_GET['id'];
$result=mysqli_query($link,$sql) or die(mysqli_error($link));

$row = mysqli_fetch_assoc($result);

$response['data'] = $row;
echo json_encode($response);
?>
