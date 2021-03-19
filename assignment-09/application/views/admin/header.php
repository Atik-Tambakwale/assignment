<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 3 | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ionicons.min.css">
	<!-- daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/daterangepicker/daterangepicker.css">
	<!-- pace-progress -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/pace-progress/themes/black/pace-theme-flat-top.css">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Bootstrap4 Duallistbox -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
	<!-- jsGrid -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jsgrid/jsgrid.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jsgrid/jsgrid-theme.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- flag-icon-css -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/flag-icon.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" integrity="sha512-0V10q+b1Iumz67sVDL8LPFZEEavo6H/nBSyghr7mm9JEQkOAm91HNoZQRvQdjennBb/oEuW+8oZHVpIKq+d25g==" crossorigin="anonymous" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			
			<!-- Left navbar links -->
			<ul class="navbar-nav">
			 	<li class="nav-item">
        			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      			</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link">Contact</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item ">	
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item ">
					<a href="<?=base_url()?>index.php/logout">Logout</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
						<i class="fas fa-th-large"></i>
					</a>
				</li>
			</ul>
		</nav>