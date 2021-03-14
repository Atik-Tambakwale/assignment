
function displayAssignList(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/assignTaskDisplayList.php",
		data: {},

		success: function (json) {
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>User Name</th>" +

				"<th>Project Title</th>" +
				"<th>Project Description</th>" +
				"<th>START DATE</th>" +
				"<th>END DATE</th>" +
				"<th>ACTIONS</th>" +
				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr><td>" + val.fname + " " + val.lname + "</td>" +

					"<td>" + val.title + "</td>" +
					"<td>" + val.description + "</td>" +
					"<td>" + val.start_date + "</td>" +
					"<td>" + val.end_date + "</td>" +
					"<td>" +
					"<div class='dropdown'>" +
					"<button type='button' data-toggle='dropdown' class='btn btn-primary dropdown-toggle' data-edit_id=" + val.id + ">ACTION</button>" +
					"<ul class='dropdown-menu dropdown-default'>" +
					"<li><a href='#' class='dropdown-item view-btn' data-toggle='modal' data-target='#view' data-view_id=" + val.id + ">VIEW</a></li>" +
					"<li><a href='#' class='dropdown-item edit-btn' data-toggle='modal' data-target='#edit' data-edit_id=" + val.id + ">EDIT</a></li>" +
					"<li><a href='#' class='dropdown-item' data-toggle='modal' data-target='#delete' data-delete_id=" + val.id + ">DELETE</a><li>" +
					"</ul>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$(target).html(str);
		}

	});
}
function displayAssignedTaskList(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/assignedTaskDisplayList.php",
		data: {},

		success: function (json) {
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>Student Name</th>" +
				"<th>Project Title</th>" +
				"<th>Project Description</th>" +
				"<th>START DATE</th>" +
				"<th>END DATE</th>" +

				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr>" +
					"<td>" + val.fname + " " + val.lname + "</td>" +
					"<td>" + val.title + "</td>" +
					"<td>" + val.description + "</td>" +
					"<td>" + val.start_date + "</td>" +
					"<td>" + val.end_date + "</td>"

					;

			})
			str += "</tbody></table>";
			$(target).html(str);
		}

	});
}

//view user_details
$(document).on('click', '.view-btn', function () {
	var id = $(this).data("view_id");
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/getOneList.php",
		data: {
			id: id
		},
		success: function (json) {
			//console.log(json);
			var list = json.list;
			var str = "<div class='row'>" +
				"<div class=''>" +
				"<table class='table table-bordered'>" +
				"<thead><th>FULL NAME</th><th>MOBILE</th><th>EMAIL</th></thead>" +
				"<tbody>" +
				"<h3>PERSON DETAILS</h3>" +
				"<tr><td>" + list.fname + "  " + list.lname + "</td>" +
				"<td>" + list.mobile + "</td>" +
				"<td>" + list.email + "</td></tr>" +
				"</tbody></table>" +
				"</div>" +

				"<div='row'><div class=''>" +
				"<h3>PROJECT DETAILS</h3>" +
				"<table class='table table-bordered'>" +
				"<thead><th>Project Title</th><th>Project Description</th><th>Start Date</th><th>End Date</th></thead>" +
				"<tbody>" +
				"<tr><td>'" + list.title + "'</td> " +
				"<td>'" + list.description + "'</td>" +
				"<td>'" + list.start_date + "'</td>" +
				"<td>'" + list.end_date + "'</td></tr>" +
				"</div></div> " +
				"</tbody></table></div></div>";
			$("#single-user").html(str);
		}
	});
})


//single assign task assign task
$(document).on('click', '.edit-btn', function () {
	var id = $(this).data("edit_id");
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/getOnetask.php",
		data: {
			id: id
		},
		success: function (json) {
			//console.log(json);
			var list = json.list;
			$("#user_id").val(list.id);
			$("#updated_title").val(list.title);
			$("#updated_description").val(list.description);
			$("#updated_startDate").val(list.start_date);
			$("#updated_endDate").val(list.end_date);
		}
	});
});

//update created task assignment
$("#updateAssignForm").submit(function () {
	var user_id = $("#user_id").val();
	var updated_title = $("#updated_title").val();
	var updated_description = $("#updated_description").val();
	var updated_startDate = $("#updated_startDate").val();
	var updated_endDate = $("#updated_endDate").val();

	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "api/updateAssignedTask.php",
		data: {
			user_id, updated_title, updated_description, updated_startDate, updated_endDate
		},
		success: function (json) {
			if (json.msg == 200) {
				alert(json.msg);
			}
			else {
				alert(json.msg);
			}
		}
	});
})

//search fisrt name to display for created task assignment
$("#search_input").keyup(function () {
	var search_input = $("#search_input").val();

	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "api/searchfilter.php",
		data: {
			'search_input': search_input,
			'search_type': 'created'
		},
		success: function (json) {
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>User Name</th>" +

				"<th>Project Title</th>" +
				"<th>Project Description</th>" +
				"<th>START DATE</th>" +
				"<th>END DATE</th>" +
				"<th>ACTIONS</th>" +
				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr><td>" + val.fname + " " + val.lname + "</td>" +

					"<td>" + val.title + "</td>" +
					"<td>" + val.description + "</td>" +
					"<td>" + val.start_date + "</td>" +
					"<td>" + val.end_date + "</td>" +
					"<td>" +
					"<div class='dropdown'>" +
					"<button type='button' data-toggle='dropdown' class='btn btn-primary dropdown-toggle' data-edit_id=" + val.id + ">ACTION</button>" +
					"<ul class='dropdown-menu dropdown-default'>" +
					"<li><a href='#' class='dropdown-item view-btn' data-toggle='modal' data-target='#view' data-view_id=" + val.id + ">VIEW</a></li>" +
					"<li><a href='#' class='dropdown-item edit-btn' data-toggle='modal' data-target='#edit' data-edit_id=" + val.id + ">EDIT</a></li>" +
					"<li><a href='#' class='dropdown-item' data-toggle='modal' data-target='#delete' data-delete_id=" + val.id + ">DELETE</a><li>" +
					"</ul>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$("#assigntask-lists").html(str);
		}
	})
})

//FILTER ACCORDING TO START DATE AND END DATE IN CREATED TASK ASSIGNMENT
$("#filterData").submit(function (e) {

	e.preventDefault();

	var start_date = $("#filter_start_date").val();
	var end_date = $("#fileter_end_date").val();

	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "api/filterTask.php",
		data: {
			start_date, end_date
		},
		success: function (json) {
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>User Name</th>" +

				"<th>Project Title</th>" +
				"<th>Project Description</th>" +
				"<th>START DATE</th>" +
				"<th>END DATE</th>" +
				"<th>ACTIONS</th>" +
				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr><td>" + val.fname + " " + val.lname + "</td>" +

					"<td>" + val.title + "</td>" +
					"<td>" + val.description + "</td>" +
					"<td>" + val.start_date + "</td>" +
					"<td>" + val.end_date + "</td>" +
					"<td>" +
					"<div class='dropdown'>" +
					"<button type='button' data-toggle='dropdown' class='btn btn-primary dropdown-toggle' data-edit_id=" + val.id + ">ACTION</button>" +
					"<ul class='dropdown-menu dropdown-default'>" +
					"<li><a href='#' class='dropdown-item view-btn' data-toggle='modal' data-target='#view' data-view_id=" + val.id + ">VIEW</a></li>" +
					"<li><a href='#' class='dropdown-item edit-btn' data-toggle='modal' data-target='#edit' data-edit_id=" + val.id + ">EDIT</a></li>" +
					"<li><a href='#' class='dropdown-item' data-toggle='modal' data-target='#delete' data-delete_id=" + val.id + ">DELETE</a><li>" +
					"</ul>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$("#assigntask-lists").html(str);
		}
	});

})

//FILTER ACCORDING TO START DATE AND END DATE IN CREATED TASK ASSIGNMENT
$("#filterData1").submit(function (e) {

	e.preventDefault();

	var start_date = $("#filter_start_date").val();
	var end_date = $("#fileter_end_date").val();

	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "api/filterTask.php",
		data: {
			start_date, end_date
		},
		success: function (json) {
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>Student Name</th>" +
				"<th>Project Title</th>" +
				"<th>Project Description</th>" +
				"<th>START DATE</th>" +
				"<th>END DATE</th>" +

				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr>" +
					"<td>" + val.fname + " " + val.lname + "</td>" +
					"<td>" + val.title + "</td>" +
					"<td>" + val.description + "</td>" +
					"<td>" + val.start_date + "</td>" +
					"<td>" + val.end_date + "</td>"

					;

			})
			str += "</tbody></table>";
			$("#assignedTask-lists").html(str);
			//displayAssignedTaskList("#assignedTask-lists");
		}
	});

})


//search fisrt name to display for user assign Task
$("#search_input1").keyup(function () {
	var search_input = $("#search_input1").val();

	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "api/searchfilter.php",
		data: {
			'search_input': search_input,
			'search_type': 'assigned'
		},
		success: function (json) {
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>Student Name</th>" +
				"<th>Project Title</th>" +
				"<th>Project Description</th>" +
				"<th>START DATE</th>" +
				"<th>END DATE</th>" +

				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr>" +
					"<td>" + val.fname + " " + val.lname + "</td>" +
					"<td>" + val.title + "</td>" +
					"<td>" + val.description + "</td>" +
					"<td>" + val.start_date + "</td>" +
					"<td>" + val.end_date + "</td>"

					;

			})
			str += "</tbody></table>";
			$("#assignedTask-lists").html(str);
			//	displayAssignedTaskList("#assignedTask-lists");
		}
	})
})