<?php
require "config/db_connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $email = 'NULL';
    if($_POST['email'] != '')
        $email = $_POST['email'];
    $mobile = $_POST['mobile'];
$sql=" UPDATE `user_details` SET `fname`='".$fname."',`lname`='".$lname."',`email`='".$email."',`mobile`='".$mobile."',`address`='".$address."'where `id`='".$_POST['id']."'";
$query=mysqli_query($link,$sql) or die(mysqli_error($link));
$query = str_replace("'NULL'", "NULL", $query);
$response_data=[];
if(mysqli_affected_rows($link) > 0){
    $response_data['msg'] = "User is Updated successfully.";
}else{
    $response_data['msg'] = mysqli_error($link);
}

}
echo json_encode($response_data);
?>
