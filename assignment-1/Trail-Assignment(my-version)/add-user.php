<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Register</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
</head>
	<body>
	<?php include 'include/header.php'?>
<div class="container col-6"> 
	<h1>Create your account</h1>
		<form method="post" action="">		
		<div class="form-group col-6">
    <label for="first name">First Name: </label>
    <input type="text" class="form-control" id="fName" placeholder="Enter first Name" name="fname">
  </div>
	<div class="form-group col-6">
    <label for="last name">Last Name: </label>
    <input type="text" class="form-control" id="lName" placeholder="Enter Last Name" name="lname">
  </div>
	<div class="form-group col-6">
    <label for="email">Email :</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="form-group col-6">
    <label for="Mobile">Mobile Number : </label>
    <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile">
  </div>
	<div class="form-group col-6">
    <label for="Address">Address : </label>
    <input type="text" class="form-control" id="address"  placeholder="Enter Address" name="address">
  </div>
  <div class="form-group col-6">
    <input type="hidden" class="form-control" id="password" name="password" >
  </div>
	 <div class="form-group col-6">
    <input type="hidden" class="form-control" id="in_pass" name="initial_password" >
  </div>
	 <div class="form-group col-6">
    <input type="hidden" class="form-control" id="delete" name="is_delete" value="0">
  </div>
	<div class="form-group col-6">

    <input type="hidden" class="form-control" id="created" name="created" value="23-2-2020">
  </div>
	<div class="form-group col-6">

    <input type="hidden" class="form-control" id="updated" name="updated" value="24-3-2020">
  </div>
  <input type="submit" class="btn btn-primary" name="submit" value="Submit">
</form>
</div>
<?php include 'include/footer.php'?>
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
	<script>
			function generatePassword() {
    var length = 8,
        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
        retVal = "";
    for (var i = 0, n = charset.length; i < length; ++i) {
        retVal += charset.charAt(Math.floor(Math.random() * n));
    }
    return retVal;
}
var varData=generatePassword();
document.getElementById("password").value=CryptoJS.MD5(varData);
document.getElementById("in_pass").value= generatePassword();
		</script>
	</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"assignment");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/* echo "Connected successfully"; */
if(isset($_POST['submit']))//check variable set or not
{
// variables for input data

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address=$_POST['address'];
$password =$_POST['password'];
$in_pass = $_POST['initial_password'];
$is_delete = $_POST['is_delete'];
$created=$_POST['created'];
$updated=$_POST['updated'];

// echo $fname." ".$lname." ".$email." ".$mobile." ".$address." ".$password." ".$in_pass." ".$is_delete." ".$created." ".$updated;
$query="INSERT INTO assignment.user_details (`fname`, `lname`, `email`, `mobile`, `address`, `password`, `initial_password`, `is_delete`, `created_at`, `updated_at`) 
VALUES ('".$fname."','".$lname."','".$email."','".$mobile."','".$address."','".$password."','".$in_pass."',$is_delete,'".$created."','".$updated."')";
//echo $query;
mysqli_query($conn,$query) or die(mysqli_error($conn));
echo "<p align=center>Data Added Successfully.</p>";
}
mysqli_close($conn);
?>