<?php
	require "includes/header.php";
	require "includes/sidebar.php";
?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">

				<div class="row">
					<h3 class="card-title">CREATED ASSIGNED TASKS</h3>

				</div>
				<div class="row">
					<div class="col-sm-6">
						<form class="form-inline" id="filterData">
							<span class="form-group ">
								<labe>Start Date</labe>
								<input type="date" class="form-control" name="filter_start_date" id="filter_start_date">
							</span>
							<span class="form-group">
								<label>End Start</label>
								<input type="date" class="form-control" name="fileter_end_date" id="fileter_end_date">
							</span>
							<button type="submit" class="btn btn-primary">Show</button>
						</form>
					</div>
					<div class="col-sm-6">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search" class="nav-search-input" id="search_input" autocomplete="off">
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div>
				</div>
			</div>

			<div class="card-body">
				<div id="assigntask-lists"></div>
			</div>
			<!-- /.card-body -->

		</div>
	</div>
</section>
</div>
<div class="modal" id="view">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<span>
					<h4 class="modal-title inline">STUDENT VIEWS</h4>
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

<div class="modal" id="edit">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">ASSIGN TASK DETAILS </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="updateAssignForm">

				<div class="modal-body">
					<div class="row">
						<input type="hidden" name="user_id" id="user_id">
						<div class="form-group col-sm-6">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="updated_title" placeholder="Enter Title"
								data-parsley-required=" true">
						</div>
						<div class="form-group col-sm-6">
							<label for="description">Task Description</label>
							<textarea type="text" class="form-control" id="updated_description"
								placeholder="Enter Description"></textarea>
						</div>
						<div class="form-group col-sm-6">
							<label>Start Date:</label>
							<input type="date" class="form-control" id="updated_startDate">
						</div>
						<div class="form-group col-sm-6">
							<label>End Date:</label>
							<input type="date" class="form-control " id="updated_endDate">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update Task</button>
				</div>
			</form>
		</div>
	</div>


</div>

<?php
	require "includes/footer.php";
?>
<script>
$(document).ready(function() {
	displayAssignList("#assigntask-lists");

})
</script>