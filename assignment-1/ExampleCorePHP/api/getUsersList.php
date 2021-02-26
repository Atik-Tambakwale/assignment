<?php
require "config/db_connection.php";

$sql = "SELECT * FROM `user_details` WHERE `is_delete` = 0";
$result=mysqli_query($link,$sql) or die(mysqli_error($link));

$data = [];
while($row = mysqli_fetch_assoc($result))
    array_push($data, $row);

echo json_encode($data);
?>
