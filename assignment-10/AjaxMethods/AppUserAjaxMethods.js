var path = $("#host").val();

//TODO:create App users in the database
$("#app-form").submit("click", function (e) {
	e.preventDefault();
	if ($("#app-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var name = $("#app_name").val();
		var mobile = $("#app_mobile").val();
		var email = $("#app_email").val();
		var user_type = $("#app_type").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'createAU',
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
					document.getElementById("app-form").reset();
					displayAUList("#app-list");
					//alert(json.msg);
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//TODO::display app user list
function displayAUList(target) {

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayAU",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str =
				"<table id='appuser_table' class='table table-bordered'>" +
				"<thead>" +
				"<tr>" +
				"<th style='width: 10px'>#</th>" +
				"<th>name</th>" +
				"<th>email Address</th>" +
				"<th>mobile</th>" +
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
					"<li><a href='#' class='dropdown-item editap-btn' data-toggle='modal' data-target='#editap_modal' data-editap_id=" + val.uid + ">EDIT</a></li>" +
					"<li><a href='#' class='dropdown-item delete-ap-btn' data-delete_ap_id=" + val.uid + ">DELETE</a><li>" +
					((val.status == 0) ? "<li><a href='#' class='dropdown-item status_checks' data-status_value=" + val.status + " data-status_user_id=" + val.uid + ">ACTIVE</a><li>" : "<li><a href='#' class='text-danger dropdown-item status_checks' data-status_value=" + val.status + " data-status_user_id=" + val.uid + ">DEACTIVE</a><li>") +
					"<li><a href='#' class='dropdown-item re-passwordap-btn' data-regenarateap_id=" + val.uid + ">PASSWORD</a><li>" +
					"</ul>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$(target).html(str);
			$("#appuser_table").DataTable();
		}

	});
}

//TODO::deactive the account
$(document).on('click', '.status_checks', function () {
	var csrf_test_name = $.cookie('csrf_cookie_name');
	var id = $(this).data('status_user_id');
	var status = ($(this).data('status_value')) ? '0' : '1';
	var msg = (status == '0') ? 'Deactive' : 'Active';

	$.confirm({
		title: 'status Change action',
		content: 'Are you sure?' + msg,
		type: 'red',
		buttons: {
			ok: {
				text: "ok!",
				btnClass: 'btn-primary',
				keys: ['enter'],
				action: function () {

					$.ajax({
						type: "POST",
						dataType: "JSON",
						url: path + 'updateStatusAU',
						headers: {
							"Authorization": $.cookie("jwt")
						},
						data: { csrf_test_name, "id": id, "status": status },
						success: function (data) {
							location.reload();
						}
					});
				}
			},
			cancel: function () {
				console.log('the user clicked cancel');
			}
		}
	});

	//TODO::delete the user
	$(document).on('click', '.delete-ap-btn', function () {
		var id = $(this).data('delete_ap_id');
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
							url: path + "deleteAU",
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
									displayAUList("#app-list");
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
});
$(document).on('click', '.editap-btn', function () {
	var id = $(this).data('editap_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "oneDplyAU",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			id
		},
		success: function (json) {
			console.log(json);
			if (json.status == 200) {

				$.each(json.data, function (key, val) {
					$("#updated_id").val(val.uid);
					$("#updated_app_name").val(val.name);
					$("#updated_app_mobile").val(val.mobile);
					$("#updated_app_email").val(val.email);
					$("#updated_app_type").val(val.user_type_id);
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

$("#update-app-form").submit("click", function (e) {

	e.preventDefault();
	if ($("#update-app-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var id = $("#updated_id").val();
		var name = $("#updated_app_name").val();
		var mobile = $("#updated_app_mobile").val();
		var email = $("#updated_app_email").val();
		var user_type = $("#updated_app_type").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'oneUpdateAU',
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
					document.getElementById("update-app-form").reset();
					$("#editap_modal").modal("hide");
					displayAUList("#app-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//TODO::change app-user account
$(document).on('click', '.change-account-btn', function () {
	var csrf_test_name = $.cookie('csrf_cookie_name');
	var id = $(this).data('ChngAcct_id');
	var user_type = ($(this).data('user_type') == '2') ? '1' : '2';

	var msg = (user_type == '2') ? 'ADMIN' : 'USER';
	var msg1 = (user_type == '1') ? 'ADMIN' : 'USER';

	$.confirm({
		title: 'delete action',
		content: 'Are you sure to change the app user ' + msg + ' account to ' + msg1,
		type: 'red',
		buttons: {
			ok: {
				text: "ok!",
				btnClass: 'btn-primary',
				keys: ['enter'],
				action: function () {
					$.ajax({
						type: "POST",
						dataType: "JSON",
						url: path + 'updateUTAU',
						headers: {
							"Authorization": $.cookie("jwt")
						},
						data: { csrf_test_name, id, user_type },
						success: function (json) {
							if (json.status == 200) {
								location.reload();
							}
							else {
								alert('database got error');
							}
						}
					});
				}
			},
			cancel: function () {
				console.log('the user clicked cancel');
			}
		}
	});
});

$(document).on('click', '.re-passwordap-btn', function () {
	var id = $(this).data('regenarateap_id');

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
						url: path + "regeneratePAU",
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
								displayAUList("#app-list");
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

