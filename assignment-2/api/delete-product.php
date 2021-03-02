<?php 
require "config/db_connection.php";

$sql="DELETE from `product` where id=".$_GET['id'];
$resul=mysqli_query($link,$sql);

$respones=[];
if(mysqli_affected_rows($link))
{
	$respones['status']=200;
	$respones['msg']="deleted product successfully";
}
else{
	$respones['status']=201;
	$respones['mgs']= mysqli_error($link);
}
echo json_encode($respones);
?>