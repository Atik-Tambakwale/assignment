<?php
		require 'database_1.php';
		
		$link = mysqli_connect($db['serverName'], $db['user'], $db['password'], $db['db_name']);
		if(!$link)
    		echo "Unable to connect to the database: <br>".mysqli_connect_error();
?>