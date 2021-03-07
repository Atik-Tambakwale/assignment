//display supervisor by select query
function loadSupervisor(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/loadSupervisor.php",
		data: {},
		success: function (json) {
			var str = "<option class='optionData'  data_sname='' value=''></option>";
			$.each(json.data, function (key, val) {
				str += "<option  class='optionData' value='" + val.fname + " " + val.lname + "' data_sname='" + val.role_id + "'>" + val.fname + " " + val.lname + "</option>";
			});
			str += "";
			$(target).html(str);
		}
	});
}

//insert project Details
$("#projectForm").submit(function (e) {
	e.preventDefault();
	if ($(this).parsley().isValid()) {

		var role_id = $(".optionData").data("sname");
		alert(role_id);
		var project_name = $("#project_name").val();
		var address = $("#address").val();
		var supervisor_name = $("#role").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "api/insert-project.php",
			data: {
				supervisor_name: supervisor_name,
				project_name: project_name,
				address: address
			},
			success: function (json) {
				alert(json.msg);
			}
		});
	}
})

//TODO::Display THE PROJECT DETAILS
function listProjectDetail(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/listProjects.php",
		data: {},
		success: function (json) {
			console.log(json);
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>SUPERVISOR NAME</th>" +
				"<th>PROJECT NAME</th>" +
				"<th>ADDRESS</th>" +
				"<th>Status</th>" +
				"<th>Actions</th>" +
				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr><td>" + val.supervisor_name + "</td>" +
					"<td>" + val.project_name + "</td>" +
					"<td>" + val.address + "</td>" +

					"<td><span class='label label-sm label-info'>ACTIVE</span></td>" +
					"<td><div class='hidden-sm hidden-xs action-buttons'>" +

					"<a class='green editbtn visible' href='#'  data-toggle='modal' data-target='#editForm' data-edit_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-pencil bigger-130'></i>" +
					"</a>" +
					"<a class='red deletebtn visible' href='#'  data-delete_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-trash-o bigger-130'></i>" +
					"</a>" +
					"<a class='yellow undobtn invisible' href='#' data-undo_id='" + val.id + "'><i class='ace-icon fa fa-undo bigger-130'></i></a>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$(target).html(str);
		}
	});
}

//edit user detals for update query
$("#editForm").submit(function (e) {
	e.preventDefault();
	var updated_id = $("#updated_id").val();
	var updated_fname = $("#updated_fname").val();
	var updated_lname = $("#updated_lname").val();
	var updated_mobile = $("#updated_mobile").val();
	var updated_email = $("#updated_email").val();
	var updated_password = $("#updated_password").val();
	var updated_role = $("#updated_role").val();

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/editUserDetails.php",
		data: {
			updated_id: updated_id,
			updated_fname: updated_fname,
			updated_lname: updated_lname,
			updated_mobile: updated_mobile,
			updated_email: updated_email,
			updated_password: updated_password,
			updated_role: updated_role
		},
		success: function (json) {
			console.log(json);
		}
	});
});