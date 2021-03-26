function loadPropertyUAS(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayPUR",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},
		success: function (json) {

			var data = json.data;
			//console.log(data);
			var str = "<option val='' selected=''></option>";
			$.each(data, function (key, val) {
				str += "<option value='" + val.id + "'>" + val.p_name + "(" + val.p_site_no + ")" + "</option>";
			})
			$(target).html(str);
		}
	});
}
function loadPropertyRMD(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayNRMD",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},
		success: function (json) {

			var data = json.data;
			//console.log(data);
			var str = "<option val='' selected=''></option>";
			$.each(data, function (key, val) {
				str += "<option value='" + val.id + "'>" + val.nt_name + "</option>";
			})
			$(target).html(str);
		}
	});
}


$("#create-notification-form").submit("click", function (e) {
	e.preventDefault();
	if ($("#create-notification-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var nfn_name = $("#nfn_name").val();
		var nfn_type = $("#nfn_type").val();
		var next_date = $("#next_date").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'insertNP',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, nfn_name, nfn_type, next_date
			},
			success: function (json) {
				console.log(json);
				if (json.status == 200) {

					$.toast({
						text: 'data is inserted successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("create-notification-form").reset();
					displayNotificationList("#notification-list");
					//alert(json.msg);
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

$(document).on('click', '.edit-nt-btn', function () {
	var id = $(this).data('edit_nt_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "OneDplyNt",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			id
		},
		success: function (json) {
			if (json.status == 200) {

				$.each(json.data, function (key, val) {
					$("#update_id").val(val.id);
					$("#update_next_date").val(val.next_date);
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
$("#update-notification-form").submit("click", function (e) {

	e.preventDefault();
	if ($("#update-notification-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var id = $("#id").val();
		var update_next_date = $("#update_next_date").val();

		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'updateNFN',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, id, update_next_date
			},
			success: function (json) {
				if (json.status == 200) {

					$.toast({
						text: json.msg,
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("update-notification-form").reset();
					$("#edit_nt_modal").modal("hide");
					displayNotificationList("#notification-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});
$(document).on('click', '.delete-nt-btn', function () {
	var id = $(this).data('delete_nt_id');
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
						url: path + "deleteNFN",
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
								displayNotificationList("#notification-list");
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



function displayNotificationList(target) {

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayNP",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<table id='notification_table' class='table table-bordered'>" +
				"<thead>" +
				"<tr>" +
				"<th style='width: 10px'>#</th>" +
				"<th>Property Owner</th>" +
				"<th>SITE NO</th>" +

				"<th>NOTIFY TYPE</th>" +
				"<th>NEXT DATE</th>" +
				"<th>ACTIONS</th>" +
				"</tr>" +
				"</thead>" +
				"<tbody>";
			var i = 0;
			$.each(json.data, function (key, val) {
				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.p_name + "</td>" +
					"<td>" + val.p_site_no + "</td>" +


					"<td>" + val.nt_sname + "</td>" +
					"<td>" + val.next_date + "</td>" +
					"<td><div class='action-buttons'>" +
					"<a class='green edit-nt-btn ml-3 mr-3' href='#'  data-toggle='modal' data-target='#edit_nt_modal' data-edit_nt_id='" + val.nid + "'>" +
					"<i class='ace-icon fa fa-pencil-alt bigger-130'></i>" +
					"</a>" +
					"<a class='red delete-nt-btn ml-3 mr-3' href='#' data-delete_nt_id='" + val.nid + "'>" +
					"<i class='ace-icon fa fa-trash bigger-130'></i>" +
					"</a>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$(target).html(str);
			$("#notification_table").DataTable();
		}

	});
}
function displayUpcomingNotificationList(target) {

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "upcomingNP",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<table id='notification_table' class='table table-bordered'>" +
				"<thead>" +
				"<tr>" +
				"<th style='width: 10px'>#</th>" +
				"<th>Property Owner</th>" +
				"<th>SITE NO</th>" +
				"<th>NOTIFY TYPE</th>" +
				"<th>NEXT DATE</th>" +
				"<th>ACTIONS</th>" +
				"</tr>" +
				"</thead>" +
				"<tbody>";
			var i = 0;
			$.each(json.data, function (key, val) {
				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.p_name + "</td>" +
					"<td>" + val.p_site_no + "</td>" +


					"<td>" + val.nt_sname + "</td>" +
					"<td>" + val.next_date + "</td>" +
					"<td><div class='action-buttons'>" +
					"<a class='green edit-nt-btn ml-3 mr-3' href='#'  data-toggle='modal' data-target='#edit_nt_modal' data-edit_nt_id='" + val.nid + "'>" +
					"<i class='ace-icon fa fa-pencil-alt bigger-130'></i>" +
					"</a>" +
					"<a class='red delete-nt-btn ml-3 mr-3' href='#' data-delete_nt_id='" + val.nid + "'>" +
					"<i class='ace-icon fa fa-trash bigger-130'></i>" +
					"</a>" +
					"</div></td>";

			})
			str += "</tbody></table>";
			$(target).html(str);
			$("#notification_table").DataTable();
		}

	});
}
$(document).ready(function () {

})