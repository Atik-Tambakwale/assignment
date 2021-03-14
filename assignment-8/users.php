 <?php
 session_start();
	require "includes/header.php";
	require "includes/sidebar.php";
	?>
 <section class="content">
 	<div class="container-fluid">
 		<div class="card">
 			<div class="card-header">
 				<div class="row">
 					<h3 class="card-title">USER DETAILS</h3>
 				</div>

 			</div>

 			<div class="card-body">
 				<div class="user-lists" id="user-lists"></div>
 			</div>
 			<!-- /.card-body -->

 		</div>
 	</div>
 </section>
 </div>

 <div class="modal" id="assignTask">
 	<div class="modal-dialog modal-lg">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h4 class="modal-title">ASSIGN TASK DETAILS </h4>
 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 					<span aria-hidden="true">×</span>
 				</button>
 			</div>
 			<form id="assignForm" data-parsley-validate="true">

 				<div class="modal-body">
 					<div class="row">
 						<input type="hidden" name="user_id" id="user_id">
 						<div class="form-group">
 							<label>Minimal</label>
 							<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
 								tabindex="-1" aria-hidden="true">
 								<option selected="selected" data-select2-id="3">Alabama</option>
 								<option>Alaska</option>
 								<option>California</option>
 								<option>Delaware</option>
 								<option>Tennessee</option>
 								<option>Texas</option>
 								<option>Washington</option>
 							</select>
 							<span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2"
 								style="width: 100%;">
 								<span class="selection">
 									<span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
 										aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-s13v-container">
 										<span class="select2-selection__rendered" id="select2-s13v-container" role="textbox"
 											aria-readonly="true" title="Alabama">Alabama</span>
 										<span class="select2-selection__arrow" role="presentation">
 											<b role="presentation"></b>
 										</span>
 									</span>
 								</span>
 								<span class="dropdown-wrapper" aria-hidden="true"></span>
 							</span>
 						</div>
 						<div class="form-group col-sm-6">
 							<label for="title">Title</label>
 							<input type="text" class="form-control" id="title" placeholder="Enter Title"
 								data-parsley-required=" true">
 						</div>
 						<div class="form-group col-sm-6">
 							<label for="description">Task Description</label>
 							<textarea type="text" class="form-control" id="description" placeholder="Enter Description"
 								data-parsley-required=" true"></textarea>
 						</div>
 						<div class="form-group col-sm-6">

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
 						<div class="form-group col-sm-6">
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
 					</div>

 				</div>
 				<div class="modal-footer justify-content-between">
 					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 					<button type="submit" class="btn btn-primary">Save changes</button>
 				</div>

 		</div>
 	</div>

 	</form>
 </div>
 </div>
 </div>

 <?php
	require "includes/footer.php";
	?>
 <script>
$(function() {
	//Initialize Select2 Elements
	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	})

	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', {
		'placeholder': 'dd/mm/yyyy'
	})
	//Datemask2 mm/dd/yyyy
	$('#datemask2').inputmask('mm/dd/yyyy', {
		'placeholder': 'mm/dd/yyyy'
	})
	//Money Euro
	$('[data-mask]').inputmask()


	//Date range picker with time picker
	$('#reservationtime').daterangepicker({
		timePicker: true,
		timePickerIncrement: 30,
		locale: {
			format: 'MM/DD/YYYY hh:mm A'
		}
	})

	//Timepicker
	$('#timepicker').datetimepicker({
		format: 'LT'
	})

	//Bootstrap Duallistbox
	$('.duallistbox').bootstrapDualListbox()

	//Colorpicker
	$('.my-colorpicker1').colorpicker()
	//color picker with addon
	$('.my-colorpicker2').colorpicker()

	$('.my-colorpicker2').on('colorpickerChange', function(event) {
		$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
	});

	$("input[data-bootstrap-switch]").each(function() {
		$(this).bootstrapSwitch('state', $(this).prop('checked'));
	});

})
 </script>
 <script>
$(document).ready(function() {
	displayUserList("#user-lists");
})
 </script>