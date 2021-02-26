<?php
require "config/db_connection.php";
require "lib/Password.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $email = 'NULL';
    if($_POST['email'] != '')
        $email = $_POST['email'];
    $pwd = new Password();

    $password = $pwd->generatePassword();

    // Insert
    $query = "INSERT INTO `user_details` (`fname`, `lname`, `email`, `mobile`, `address`, `password`, `initial_password`, `created_at`, `updated_at`)
        VALUES ('".$fname."', '".$lname."', '".$email."', '".$_POST['mobile']."', '".$address."', '".md5($password)."', '".$password."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
    $query = str_replace("'NULL'", "NULL", $query);

    mysqli_query($link, $query);
    $response = [];
    if(mysqli_affected_rows($link) > 0){
        $response['msg'] = "User added successfully.";
    }else{
        $response['msg'] = mysqli_error($link);
    }

    echo json_encode($response);
}

?>
