<?php 
	session_start();
	require "includes/header.php";
	require "includes/sidebar.php";
?>
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li class="active">Dashboard</li>
			</ul><!-- /.breadcrumb -->

		</div>
		<div class="page-content">
			<div class="page-header">
				<h1>
					OPD Patient Register
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						information &amp;details
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="tabbable">
						<ul class="nav nav-tabs" id="myTab">
							<li class="active">
								<a data-toggle="tab" href="#home">
									<i class="green ace-icon fa fa-home bigger-120"></i>
									Patient Registers
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#messages" id="showList"> Patient Details </a>
							</li>
						</ul>

						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">
								<form id="patientForm" data-parsley-validate="true">
									<div class="row">
										<div class="form-group col-sm-6">
											<label for="doctor_name">Doctor</label>
											<select class="form-control" name="doctor_name" id="doctor_name"
												data-parsley-required=" true"></select>
										</div>
										<div class="form-group col-sm-6">
											<label for="doctor_name">Department</label>
											<select class="form-control" name="department_name" id="department_name"
												data-parsley-required=" true"></select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-4">
											<label for="doctor_name">First Name</label>
											<input type="text" name="fname" id="fname" class="form-control" data-parsley-required=" true">
										</div>
										<div class="form-group col-sm-4">
											<label for="doctor_name ">Last Name</label>
											<input type="text" name="lname" id="lname" class="form-control" data-parsley-required=" true">
										</div>
										<div class="form-group col-sm-4">
											<label for="doctor_name">Mobile</label>
											<input type="number" name="mobile" id="mobile" class="form-control" data-parsley-required=" true">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-3">
											<label for="">email</label>
											<input type="email" name="email" id="email" class="form-control">
										</div>
										<div class="form-group col-sm-3">
											<label for="">Date of Birth</label>
											<input type="date" name="date" id="date" class="form-control">
										</div>
										<div class="form-group col-sm-3">
											<label for="">age</label>
											<input type="number" name="age" id="age" class="form-control" data-parsley-required=" true">
										</div>
										<div class="form-group col-sm-3">
											<label for="">Gender</label>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender" value="male"
													data-parsley-required=" true">
												<label class="form-check-label" for="inlineRadio1">Male</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender"
													value="female" data-parsley-required=" true">
												<label class="form-check-label" for="inlineRadio2">Female</label>
											</div>
										</div>
									</div>
									<div class="row">

										<div class="col-md-4">
											<div class="form-group">
												<label for="">Address</label>
												<textarea name="address" id="address" rows="5" class="form-control"
													data-parsley-required=" true"></textarea>
											</div>
										</div>

										<div class="col-md-8">
											<div class="row">
												<div class="form-group col-sm-6">
													<label for="">Postal Code</label>
													<input type="number" name="post_code" id="post_code" class="form-control"
														data-parsley-required=" true">
												</div>
												<div class="form-group col-sm-6">
													<label for="">City</label>
													<input type="text" name="city" id="city" class="form-control" data-parsley-required=" true">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-sm-6">
													<label for="">State</label>
													<input type="text" name="state" id="state" class="form-control" data-parsley-required=" true">
												</div>

												<div class="form-group col-sm-6">
													<label for="">Country</label>
													<input type="text" name="country" id="country" class="form-control"
														data-parsley-required=" true">
												</div>
											</div>
										</div>





									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label for="">Aadhar No.</label>
											<input type="number" name="aadhar" id="aadhar" class="form-control">
										</div>
										<div class="form-group col-sm-6">
											<label>ADD Photo</label>
											<input type="file" name="image" id="image" class="form-control">
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>


							<div id="messages" class="tab-pane fade">
								<div id="patient-list"></div>

							</div>
						</div>
					</div>



					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<!-- view modal start here -->
<div class="modal" id="view">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<span>
					<h4 class="modal-title inline">PATIENT VIEWS</h4>
				</span>
				<span><button type="button" class="close inline" data-dismiss="modal">&times;</button></span>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div class="row" id="single-user"></div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>
<!-- view modal end here -->
<?php 
		require "./includes/footer.php";
?>

<!-- inline scripts related to this page -->
<script type="text/javascript">
loadDoctor("#doctor_name");
loadDepartment("#department_name");
$(document).ready(function() {
	$("#showList").click(function() {
		fetch_list("#patient-list");
	})
	$("#date").change(function() {
		var today = new Date();
		var birthDate = new Date($('#date').val());
		var age = today.getFullYear() - birthDate.getFullYear();
		var m = today.getMonth() - birthDate.getMonth();
		if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
			age--;
		}
		return $('#age').val(age);
	});
});
</script>