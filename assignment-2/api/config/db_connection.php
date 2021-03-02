<?php
require "database.php";

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['db_name']);
if(!$link)
    echo "Unable to connect to the database: <br>".mysqli_connect_error();
?>
