
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/parsley.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" />
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="dashboard.php"><b>Admin</b>LTE</a>
		</div>

		<input type="hidden" name="host" id="host" value="<?=base_url()?>index.php/">

		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<?php echo form_open('', ["id" => "login-form", "data-parsley-validate" => true])?>

					<div class="form-group">
					<label>Email</label>
					<input type="text" name="login_email" id="login_email" class="form-control" placeholder="Username" data-parsley-required="true">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="login_password" id="login_password" class="form-control" placeholder="Password" data-parsley-required="true">
				</div>
				<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
							<!-- 	<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label> -->
							</div>
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				<?php echo form_close()?>

				<!-- /.social-auth-links -->

				<p class="mb-1">
					<a href="<?php echo base_url()?>forgot">I forgot my password</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Register a new membership</a>
				</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/js/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/js/adminlte.min.js"></script>
	<!-- <script src="assets/js/parsley.min.js"></script> -->
	<!-- <script src="js/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/4.0.2/bootstrap-material-design.umd.min.js" integrity="sha512-dG5ZzvFUfkBdjYdJbsKdGGh8tOa9fv9wHmiChCFJYHRIW1XgfxN2cGzt2HaEPeunXqbAQXBOJvSBQpGOl0qikw==" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>

	<script src="<?=base_url()?>js/parsley.min.js"></script>
	<script src="<?=base_url()?>js/path.js"></script>
	<script src="<?=base_url()?>js/authentication.js"></script>


</body>

</html>
