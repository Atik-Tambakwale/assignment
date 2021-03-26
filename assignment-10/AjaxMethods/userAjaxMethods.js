var path = $("#host").val();
function loadUserType(target) {

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + 'usertype',
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<option value=''>Select Option</option>";
			$.each(json.list, function (key, val) {
				str += "<option value='" + val.id + "'>" + val.user_type + "</option>";
			})
			str += "";
			$(target).html(str);
		}
	});
}

//TODO:create users in the database
$("#create-form").submit("click", function (e) {

	e.preventDefault();
	if ($("#create-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var name = $("#user_name").val();
		var mobile = $("#user_mobile").val();
		var email = $("#user_email").val();
		var user_type = $("#user_type").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'create',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, name, mobile, email, user_type
			},
			success: function (json) {
				console.log(json);
				if (json.status == 200) {

					$.toast({
						text: 'data is inserted successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("create-form").reset();
					displayUserList("#user-list");
					//alert(json.msg);
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});


//TODO::display user list
function displayUserList(target) {

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayData",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<table id='user_table' class='table table-bordered'>" +
				"<thead>" +
				"<tr>" +
				"<th style='width: 10px'>#</th>" +
				"<th>Name</th>" +
				"<th>Email Address</th>" +
				"<th>Mobile</th>" +
				"<th>User Type</th>" +
				"<th>ACTIONS</th>" +
				"</tr>" +
				"</thead>" +
				"<tbody>";
			var i = 0;
			$.each(json.data, function (key, val) {
				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.name + "</td>" +
					"<td>" + val.mobile + "</td>" +

					"<td>" + val.email + "</td>" +
					"<td>" + val.user_type + "</td>" +
					"<td>" +
					"<div class='dropdown'>" +
					"<button type='button' data-toggle='dropdown' class='btn btn-primary dropdown-toggle' data-edit_id=" + val.uid + ">ACTION</button>" +
					"<ul class='dropdown-menu dropdown-default'>" +
					"<li><a href='#' class='dropdown-item edit-btn' data-toggle='modal' data-target='#edit_modal' data-edit_id=" + val.uid + ">EDIT</a></li>" +
					"<li><a href='#' class='dropdown-item delete-btn' data-delete_id=" + val.uid + ">DELETE</a><li>" +
					"<li><a href='#' class='dropdown-item re-password-btn' data-Regenarate_id=" + val.uid + ">PASSWORD</a><li>" +
					"</ul>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$(target).html(str);
			$("#user_table").DataTable();
		}

	});
}

//TODO::FETCH SINGLE USER DATA BY ID
$(document).on('click', '.edit-btn', function () {
	var id = $(this).data('edit_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "OneDplyDt",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			id
		},
		success: function (json) {
			if (json.status == 200) {

				$.each(json.data, function (key, val) {
					$("#id").val(val.id);
					$("#updated_name").val(val.name);
					$("#updated_mobile").val(val.mobile);
					$("#updated_email").val(val.email);
					$("#updated_type").val(val.user_type_id);
				})

				$.toast({
					heading: "Your data fetch by id",
					text: json.msg,
					position: "top-right"
				});
			}
			else {
				$.toast({
					text: json.msg,
					position: "top-right"
				})
			}
		}
	})
});

//TODO::update user detail in modal
$("#update_form").submit("click", function (e) {

	e.preventDefault();
	if ($("#update_form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var id = $("#id").val();
		var name = $("#updated_name").val();
		var mobile = $("#updated_mobile").val();
		var email = $("#updated_email").val();
		var user_type = $("#updated_type").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'updateData',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, id, name, mobile, email, user_type
			},
			success: function (json) {
				if (json.status == 200) {

					$.toast({
						text: json.msg,
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("update_form").reset();
					$("#edit_modal").modal("hide");
					displayUserList("#user-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//TODO::delete user data completely
$(document).on('click', '.delete-btn', function () {
	var id = $(this).data('delete_id');
	$.confirm({
		title: 'delete action',
		content: 'Are you sure? Delete',
		type: 'red',
		buttons: {
			ok: {
				text: "ok!",
				btnClass: 'btn-primary',
				keys: ['enter'],
				action: function () {

					$.ajax({
						type: "GET",
						dataType: "JSON",
						url: path + "deleteData",
						headers: {
							"Authorization": $.cookie("jwt")
						},
						data: {
							id
						},
						success: function (json) {
							if (json.status == 200) {
								$.toast({
									text: json.msg,
									icon: 'success',
									position: "top-right",
								});
								displayUserList("#user-list");
							}
						}
					})
				}
			},
			cancel: function () {
				console.log('the user clicked cancel');
			}
		}
	});
});

$(document).on('click', '.re-password-btn', function () {
	var id = $(this).data('Regenarate_id');
	$.confirm({

		content: 'Are sure to regenerate your password ? ',
		type: 'red',
		buttons: {
			ok: {
				text: "ok!",
				btnClass: 'btn-primary',
				keys: ['enter'],
				action: function () {

					$.ajax({
						type: "GET",
						dataType: "JSON",
						url: path + "regenerate",
						headers: {
							"Authorization": $.cookie("jwt")
						},
						data: {
							id
						},
						success: function (json) {
							if (json.status == 200) {
								$.toast({
									text: json.msg,
									icon: 'success',
									position: "top-right",
								});
								displayUserList("#user-list");
							}
						}
					})
				}
			},
			cancel: function () {
				console.log('the user clicked cancel');
			}
		}
	});
});
