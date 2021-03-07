//display project role
function loadRole(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/loadRole.php",
		data: {},
		success: function (json) {
			console.log(json);
			var data = json.data;
			//console.log(data);
			$str = "<option value=''></option>";
			$.each(data, function (key, val) {
				$str += "<option value='" + val.id + "'>" + val.project_roles + "</option>";
			})
			$(target).html($str);
		}
	});
}

//insert user data form
$("#userForm").submit(function (e) {
	e.preventDefault();
	if ($(this).parsley().isValid()) {
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var mobile = $("#mobile").val();
		var email = $("#email").val();
		var role = $("#role").val();
		console.log(lname);
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "api/add-user.php",
			data: {
				fname: fname,
				lname: lname,
				mobile: mobile,
				email: email,
				role: role,
			},
			success: function (json) {
				console.log(json);
				$("#userForm").reset();
				displayUserList("#user_lists");

			}
		})
	}

});

//display user list
function displayUserList(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/listUser.php",
		data: {},

		success: function (json) {
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>User Name</th>" +
				"<th>email</th>" +
				"<th>mobile</th>" +
				"<th>Project Role</th>" +
				"<th>Status</th>" +
				"<th>Actions</th>" +
				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr><td>" + val.fname + " " + val.lname + "</td>" +
					"<td>" + val.email + "</td>" +
					"<td>" + val.mobile + "</td>" +
					"<td>" + val.project_roles + "</td>" +
					"<td><span class='label label-sm label-info'>ACTIVE</span></td>" +
					"<td><div class='hidden-sm hidden-xs action-buttons'>" +

					"<a class='green editbtn visible' href='#'  data-toggle='modal' data-target='#editForm' data-edit_id='" + val.uid + "'>" +
					"<i class='ace-icon fa fa-pencil bigger-130'></i>" +
					"</a>" +
					"<a class='red deletebtn visible' href='#'  data-delete_id='" + val.uid + "'>" +
					"<i class='ace-icon fa fa-trash-o bigger-130'></i>" +
					"</a>" +
					"<a class='yellow undobtn visible' href='#' data-undo_id='" + val.uid + "'><i class='ace-icon fa fa-undo bigger-130'></i></a>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$(target).html(str);
		}

	});
}

//display modal single user detail
$(document).on('click', '.editbtn', function () {
	var id = $(this).data("edit_id");
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/getOneUser.php",
		data: {
			id: id
		},
		success: function (json) {
			var str =
				"<fieldset>" +
				"<input type='hidden' name='updated_id' id='updated_id' value='" + json.data.id + "'>" +
				"<div class='form-group row'>" +
				"<label class='col-sm-3 control-label no-padding-right' for='fname'> First Name </label>" +
				"<input type='text' name='updated_fname' id='updated_fname' placeholder='First Name' class='col-xs-10 col-sm-5' value='" + json.data.fname + "' data-parsley-required='true'>" +
				"</div>" +

				"<div class='form-group row'>" +
				"<label class='col-sm-3 control-label no-padding-right' for='lname'> Last Name </label>" +
				"<input type='text' class='col-xs-10 col-sm-5' name='updated_lname' id='updated_lname' placeholder='Last Name' value='" + json.data.lname + "' data-parsley-required='true'>" +
				"</div>" +

				"<div class='form-group row'>" +
				"<label class='col-sm-3 control-label no-padding-right' for='mobile'>Mobile</label>" +
				"<input type='number' name='updated_mobile' id='updated_mobile' placeholder='Mobile' class='col-xs-10 col-sm-5' value='" + json.data.mobile + "' data-parsley-maxlength='10' data-parsley-required='true'>" +
				"</div>" +

				"<div class='form-group row'>" +
				"<label class='col-sm-3 control-label no-padding-right' for='form-field-1'> Email ID </label>" +
				"<input type='email' name='updated_email' id='updated_email' placeholder='Username' class='col-xs-10 col-sm-5' value='" + json.data.email + "' data-parsley-required='true'>" +
				"</div>" +
				"<div class='form-group row'>" +
				"<label class='col-sm-3 control-label no-padding-right' for='lname'> Password </label>" +
				"<input type='text' class='col-xs-10 col-sm-5' name='updated_password' id='updated_password' placeholder='Last Name' value='" + json.data.initial_password + "' data-parsley-required='true'>" +
				"</div>" +
				"<div class='form-group row'>" +
				"<label class='col-sm-3 control-label no-padding-right' for='role'>Project Role</label>" +
				"<select class='col-xs-10 col-sm-5' name='updated_role' id='updated_role' data-parsley-required='true'>" +
				"<option value='" + json.data.role_id + "'>" + json.data.project_role + "</option>" +
				"</select>" +
				"</div>" +

				"</fieldset>";
			$(".modal-body").html(str);
		}
	});
});

//delete the user details by update query
$(document).on('click', '.deletebtn', function () {
	var id = $(this).data("delete_id");

	alert(id);
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/deleteUserDetails.php",
		data: { id: id },
		success: function (json) {
			alert(json.msg);
		}
	});

});

//UNDO the user details by update query
$(document).on('click', '.undobtn', function () {
	var id = $(this).data("undo_id");
	alert(id);
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/undoUserDetails.php",
		data: { id: id },
		success: function (json) {
			alert(json.msg);
		}
	});

});

