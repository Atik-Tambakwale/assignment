<?php
	require "includes/header.php";
	require "includes/sidebar.php"
?>
<div class="card card-primary col-md-6">
	<div class="card-header">
		<h3 class="card-title">Create Task Assign</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form">
		<div class="card-body">
			<form>
				<div class="form-group ">
					<label>Student Name</label>
					<select class="form-control select2bs4 select2-hidden-accessible" id="student_name" style="width: 100%;"
						data-select2-id="17" tabindex="-1" aria-hidden="true">

					</select>
				</div>
				<div class="form-group ">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" placeholder="Enter Title" data-parsley-required=" true">
				</div>


				<div class="form-group ">
					<label>Start Date:</label>
					<div class="input-group date" id="reservationdate" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
						<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
							<div class="input-group-text">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label>End Date:</label>
					<div class="input-group date" id="reservationdate1" data-target-input="nearest">
						<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1">
						<div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
							<div class="input-group-text">
								<i class="fa fa-calendar"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group ">
					<label for="description">Task Description</label>
					<textarea type="text" class="form-control" id="description" placeholder="Enter Description"
						data-parsley-required=" true"></textarea>
				</div>
				<div class="form-group col-sm-6">

				</div>
			</form>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-default">Reset</button>
		</div>
	</form>
</div>
<div class="mx-auto">

</div>
<?php
require "includes/footer.php";
?>
<script>
$(function() {
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	})

	//Date range picker
	$('#reservationdate').datetimepicker({
		format: 'MM/DD/YYYY'
	});
	$('#reservationdate1').datetimepicker({
		format: 'MM/DD/YYYY'
	});
});
</script>
<script src="js/ajaxMethods/ajaxUserMethod.js"></script>
<script>
$(document).ready(function() {
	loadStudent("#student_name");
});
</script>