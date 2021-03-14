<?php
	require "includes/header.php";
	require "includes/sidebar.php";
?>
<section class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<h3 class="card-title">ASSIGNED TASKS</h3>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<form class="form-inline" id="filterData1">
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
								<input type="text" placeholder="Search" class="nav-search-input" id="search_input1" autocomplete="off">
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
						</form>
					</div>
				</div>
			</div>

			<div class="card-body">
				<div id="assignedTask-lists"></div>
			</div>
		</div>
	</div>
</section>
</div>
<?php
	require "includes/footer.php";
?>
<script>
$(document).ready(function() {
	displayAssignedTaskList("#assignedTask-lists");
})
</script>