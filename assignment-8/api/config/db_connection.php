<?php
require "database.php";

$link=mysqli_connect($db['host_name'],$db['user_name'],$db['password'],$db['db_name']);
if($link){
	echo mysqli_error($link);
}

?>