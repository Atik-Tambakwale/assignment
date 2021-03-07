<?php
require "./includes/header.php";
require "./includes/sidebar.php";
?>
<div class="col-sm-4">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title">USER DETAILS</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main no-padding">
				<form id="userForm" data-parsley-validate="true">
					<!-- <legend>Form</legend> -->
					<fieldset>
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="fname"> First Name </label>
							<input type="text" name="fname" id="fname" placeholder="First Name" class="col-xs-10 col-sm-5"
								data-parsley-required="true">
						</div>
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="lname"> Last Name </label>
							<input type="text" class="col-xs-10 col-sm-5" name="lname" id="lname" placeholder="Last Name"
								data-parsley-required="true">
						</div>
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="mobile"> Mobile</label>
							<input type="number" name="mobile" id="mobile" placeholder="Mobile" class="col-xs-10 col-sm-5"
								data-parsley-maxlength="10" data-parsley-required="true">
						</div>
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email ID </label>
							<input type="email" name="email" id="email" placeholder="Username" class="col-xs-10 col-sm-5"
								data-parsley-required="true">
						</div>
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="role">Project Role</label>
							<select class=" col-xs-10 col-sm-5" name="role" id="role" data-parsley-required="true">

							</select>
						</div>

					</fieldset>

					<div class="form-actions center">
						<button type="submit" class="btn btn-sm btn-success">
							Submit
							<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-8">
	<div class="widget-box">
		<div class="widget-header">
			<h4 class="widget-title">USER LISTS</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main" id="user_lists">

			</div>
		</div>
	</div>
</div>
<div class="modal" id="editForm" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id='editForm' data-parsley-validate='true'>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>

	</div>
</div>
<?php
require "./includes/footer.php"
?>
<script>
loadRole("#role");
loadRole("#updated_role");
displayUserList("#user_lists");
</script>