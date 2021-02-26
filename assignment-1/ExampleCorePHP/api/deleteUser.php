<?php
require "config/db_connection.php";

$sql = "UPDATE user_details SET is_delete = 1 WHERE id=".$_GET['id'];
mysqli_query($link,$sql) or die(mysqli_error($link));
$responeData=[];//we are create array empaty
if(mysqli_affected_rows($link) > 0){//check the row
    $responseData['msg'] = "User Deleted successfully.";
}else{
    $responseData['msg'] = mysqli_error($link);
}

echo json_encode($responseData);//Returns the JSON representation of a value

?>
