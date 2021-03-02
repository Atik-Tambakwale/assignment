<?php 
	require "./include/header.php"
?>
<div class="row">
	<div class="col-md-4">
		<div class=" bs-callout bs-callout-warning hidden">
			<p>Please Enter all Field in the Form</p>
		</div>
		<div class="bs-callout bs-callout-info hidden">
			<p>Please Enter all Field in the Form</p>
		</div>
		<form method="post" id="dailyInvForm" data-parsley-validate="true">
			<div class="form-group">
				<label for="Band Name">Services:</label>
				<select class="form-control" id="doctor_services" name="doctor_services" data-parsley-required="true">
				</select>
			</div>
			<div class="form-group ">
				<label for="Product_Name">Doctors:</label>
				<select class="form-control" id="doctor_name" name="doctor_name" data-parsley-required="true">
				</select>
			</div>
			<div class="form-group">
				<label for="description">Calculation</label>
				<input type="text" class="form-control" id="calculation" name="calculation" rows="3"
					data-parsley-required="true"></textarea>
			</div>
			<div class="form-group">
				<label for="numberOfUnit">Count</label>
				<input type="text" class="form-control" id="count" name="count" placeholder="" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">Total Amount</label>
				<input type="number" class="form-control" id="total_amt" name="total_amt" placeholder="" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput1">Date</label>
				<input type="date" class="form-control" id="date" name="date" placeholder="" required>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<div class="col-md-8" id="users-list"></div>
</div>

<?php 
	require "./include/footer.php";
?>