<?php

$upload_path = "../uploads/";
$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$file_name = uniqid().".".$extension;
$upload_path .= $file_name;

if({
	echo "File uploaded";
}else{
	echo "Unbale to upload the file";
}
?>