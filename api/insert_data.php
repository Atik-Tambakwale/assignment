<?php
require "config/db_connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $product_name = mysqli_real_escape_string($link, $_POST['product_name']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
		$description="NULL";
    if($_POST['description'] != '')
         $description = mysqli_real_escape_string($link, $_POST['description']);
		$mrp_price= $_POST['mrp_price'];
		$qty = $_POST['QTY'];
		$total_amt= $mrp_price*$qty;
		$query2 = "INSERT INTO `product`(`product_name`,`brand_id`, `description`, `unit`, `weight`, `mrp_price`, `qty`, `total_amt`) VALUES ('".$product_name."',$name,'".$description."','".$_POST['unit']."','".$_POST['weight']."','".$mrp_price."','".$qty."','".$total_amt."')";
		mysqli_query($link, $query2);
    $response = [];
    if(mysqli_affected_rows($link) > 0){
        $response['msg'] = "Your Order completed successfully.";
    }else{
        $response['msg'] = mysqli_error($link);
    }

    echo json_encode($response);
}

?>
