<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Welcome User this website family</h5>
	</div>
	<div class="card-body">
		<h6 class="card-title">Special title treatment</h6>
		<p class="card-text">hello <?php echo $data['name']?>, </p>
		<p class="card-text"> Your Account was created in this website application </p>
		<p class="card-text">these are your creaditail to login our system maintain your property tax,inspection</p>
		<p class="card-text">Email:<?php echo $data['email'] ?></p>
		<p class="card-text">password:<?php echo $data['initial_password'] ?></p>
		<a href="<?php echo base_url()?>/setPassword?email=<?php echo $data['email'] ?>" class="btn btn-primary">Change Your Password</a>
	</div>
</div>