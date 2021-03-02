<?php 
	require "./config/db_connection.php";
 
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	$brand_id = $_POST['brand_id'];
	$product_name = mysqli_real_escape_string($link,$_POST['product_name']);
	$description = $_POST['description'];
	$unit = $_POST['unit'];
	$weight = $_POST['weight'];
	$mrp_price = $_POST['mrp_price'];
	$QTY = $_POST['QTY'];
	$total_amt=$_POST['total_amt'];

	$response=[];
	$sql="UPDATE `product` 
	SET `brand_id`='$brand_id',`product_name`='$product_name',`description`='$description',`unit`='$unit',`weight`='$weight',`mrp_price`='$mrp_price',`qty`='$QTY',`total_amt`='$total_amt' 
	WHERE id=".$_POST['id'];
	// echo $sql;
	$result=mysqli_query($link,$sql);

	if(mysqli_affected_rows($link)>0){
		$response['status']=200;
		$response['msg']= "Product Updated Successfully";
	}
	else{
		$response['status']=201;
		$response['msg'] = mysqli_error($link);
	}
	echo json_encode($response);
	}
?>