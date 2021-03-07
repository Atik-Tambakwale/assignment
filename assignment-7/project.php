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
				<form id="projectForm" data-parsley-validate="true">
					<!-- <legend>Form</legend> -->
					<fieldset>
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="role">Supervisor Name</label>
							<select class=" col-xs-10 col-sm-5" id="role" data-parsley-required="true">
							</select>
						</div>
						<!-- 
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="project_name"> Project Name </label>
							<input type="text" name="project_name" id="project_name" placeholder="Project Name"
								class="col-xs-10 col-sm-5" data-parsley-required="true">
						</div> -->
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="project_name"> Project Name </label>
							<input type="text" class="col-xs-10 col-sm-5" name="project_name" id="project_name"
								placeholder="Project Name" data-parsley-required="true">
						</div>
						<div class="form-group row">
							<label class="col-sm-3 control-label no-padding-right" for="address"> Address</label>
							<textarea class="col-xs-10 col-sm-5" name="address" id="address" placeholder="Address"
								data-parsley-required="true"></textarea>
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
			<div class="widget-main" id="projects_list">

			</div>
		</div>
	</div>
</div>
<?php
require "./includes/footer.php"
?>
<script>
loadSupervisor("#role");
listProjectDetail("#projects_list");
</script>