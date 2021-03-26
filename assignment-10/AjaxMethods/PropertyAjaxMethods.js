function loadPropertyType(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayPT",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},
		success: function (json) {

			var data = json.data;
			//console.log(data);
			var str = "<option selected=''>----</option>";
			$.each(data, function (key, val) {
				str += "<option value='" + val.id + "'>" + val.pt_name + "</option>";
			})
			$(target).html(str);
		}
	});
}
function loadPropertyUnit(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayPU",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},
		success: function (json) {

			var data = json.data;
			//console.log(data);
			var str = "<option selected=''>---</option>";
			$.each(data, function (key, val) {
				str += "<option value='" + val.id + "'>" + val.pu_name + "</option>";
			})
			$(target).html(str);
		}
	});
}



$("#create-property-form").submit("click", function (e) {
	e.preventDefault();
	if ($("#create-property-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var pt_type = $("#pt_type").val();
		var pt_name = $("#pt_name").val();
		var pt_id = $("#pt_id").val();
		var pt_site_no = $("#pt_site_no").val();
		var sas_no = $("#sas_no").val();
		var address = $("#address").val();
		var pt_size = $("#pt_size").val();
		var pu_unit = $("#pu_unit").val();
		var p_lat = $("#p_lat").val();
		var p_long = $("#p_long").val();
		var status = $("#status").val();
		var p_year = $("#p_year").val();
		var p_oname = $("#p_oname").val();
		var p_omobile = $("#p_omobile").val();

		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'insertP',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name,
				pt_type,
				pt_name,
				pt_id,
				pt_site_no,
				sas_no,
				address,
				pt_size,
				pu_unit,
				p_lat,
				p_long,
				status,
				p_year,
				p_oname,
				p_omobile
			},
			success: function (json) {

				if (json.status == 200) {

					$.toast({
						text: 'data is inserted successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("create-property-form").reset();
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//TODO::DISPLAY PROPERTIES LIST
function displayProperty(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayP",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<table id='property-list' class='table table-datatable__root table-bordered small-font-table'>" +
				"<thead>" +
				"<tr>" +
				"<td>#<span class='pull-right'></span></td>" +
				"<td>NAME</td>" +
				"<td>SITE NO</td>" +
				"<td>PTY ID</td>" +
				"<td>SIZE</td>" +
				"<td>LAT</td>" +
				"<td>LONG</td>" +
				"<td>STATUS</td>" +
				"<td>OWNER</td>" +
				"<td>PUR YEAR</td>" +
				"<td>ACTIONS</td>" +
				"</tr>" +
				"</thead>" +
				"<tbody class='tbody'>";

			$.each(json.data, function (key, val) {

				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.p_name + "</td>" +
					"<td>" + val.p_site_no + "</td>" +

					"<td>" + val.prt_id + "</td>" +
					"<td>" + val.p_size + "<br>" + val.pu_sname + "</td>" +
					"<td>" + val.p_Latitude + "</td>" +
					"<td>" + val.p_longitude + "</td>" +
					"<td>" + val.p_status + "</td>" +
					"<td>Name: " + val.p_oname + " mobile:" + val.p_omobile + "</td>" +
					"<td>" + val.p_purchase_year + "</td>" +
					"<td>" +
					"<div class='dropdown'>" +
					"<button type='button' data-toggle='dropdown' class='btn btn-primary dropdown-toggle' data-edit_id=" + val.pid + ">ACTION</button>" +
					"<ul class='dropdown-menu dropdown-default'>" +
					"<li><a href='#' class='dropdown-item view_map-btn' data-toggle='modal' data-target='#view_map_modal' data-view_map_id=" + val.pid + ">VIEW MAP</a></li>" +
					"<li><a href='#' class='dropdown-item edit-property-btn' data-toggle='modal' data-target='#edit-property-modal' data-edit_property_id=" + val.pid + ">EDIT</a></li>" +
					"<li><a href='#' class='dropdown-item delete-property-btn' data-delete_property_id=" + val.pid + ">DELETE</a><li>" +
					"<li><a href='#' class='dropdown-item owner-info-btn' data-toggle='modal' data-target='#edit-owner-modal' data-owner_info_id=" + val.pid + ">OWNER INFO</a><li>" +
					"<li><a href='#' class='dropdown-item court-log-btn' data-court_log_id=" + val.pid + ">Court Hearing Log</a><li>" +
					"</ul>" +
					"</div></td>";

			})
			str += "</tbody>" +
				"</table>" +
				"</div>";
			$(target).html(str);
			$("#property-list").DataTable();
		}

	});
}

$(document).on('click', '.edit-property-btn', function () {
	var id = $(this).data('edit_property_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "OneDplyP",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			id
		},
		success: function (json) {
			if (json.status == 200) {

				$.each(json.data, function (key, val) {
					$("#updated_id").val(val.id);
					$("#updated_pt_type").val(val.pt_id)
					$("#updated_pt_name").val(val.p_name);
					$("#updated_pt_id").val(val.prt_id);
					$("#updated_pt_site_no").val(val.p_site_no);
					$("#updated_sas_no").val(val.p_sas_no);
					$("#updated_address").val(val.address);
					$("#updated_pt_size").val(val.p_size);
					$("#updated_pu_unit").val(val.pu_id);
					$("#updated_p_lat").val(val.p_Latitude);
					$("#updated_p_long").val(val.p_longitude);
					$("#updated_status").val(val.p_status);
					$("#updated_p_year").val(val.p_purchase_year);
					$("#updated_p_oname").val(val.p_oname);
					$("#updated_p_omobile").val(val.p_omobile);
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

$("#updated-property-form").submit("click", function (e) {
	e.preventDefault();
	if ($("#updated-property-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var id = $("#updated_id").val();
		var pt_type = $("#updated_pt_type").val();
		var pt_name = $("#updated_pt_name").val();
		var pt_id = $("#updated_pt_id").val();
		var pt_site_no = $("#updated_pt_site_no").val();
		var sas_no = $("#updated_sas_no").val();
		var address = $("#updated_address").val();
		var pt_size = $("#updated_pt_size").val();
		var pu_unit = $("#updated_pu_unit").val();
		var p_lat = $("#updated_p_lat").val();
		var p_long = $("#updated_p_long").val();
		var status = $("#updated_status").val();
		var p_year = $("#updated_p_year").val();
		var p_oname = $("#updated_p_oname").val();
		var p_omobile = $("#updated_p_omobile").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'updateP',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name,
				id,
				pt_type,
				pt_name,
				pt_id,
				pt_site_no,
				sas_no,
				address,
				pt_size,
				pu_unit,
				p_lat,
				p_long,
				status,
				p_year,
				p_oname,
				p_omobile
			},
			success: function (json) {
				if (json.status == 200) {

					$.toast({
						text: json.msg,
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("updated-property-form").reset();
					$("#edit-property-modal").modal("hide");
					displayProperty("#property-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

$(document).on('click', '.delete-property-btn', function () {
	var id = $(this).data('delete_property_id');
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
						url: path + "deleteP",
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
								displayProperty("#property-list");
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

$(document).on('click', '.owner-info-btn', function () {
	var id = $(this).data('owner_info_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "OOneDplyP",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			id
		},
		success: function (json) {
			if (json.status == 200) {

				$.each(json.data, function (key, val) {
					$("#updated_o_id").val(val.id);
					$("#updated_o_oname").val(val.p_oname);
					$("#updated_o_omobile").val(val.p_omobile);
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

$("#update_o_form").submit("click", function (e) {
	e.preventDefault();
	if ($("#update-o-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var id = $("#updated_o_id").val();
		var p_oname = $("#updated_o_oname").val();
		var p_omobile = $("#updated_o_omobile").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + "OupdateP",
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name,
				id,
				p_oname,
				p_omobile
			},
			success: function (json) {
				if (json.status == 200) {

					$.toast({
						text: json.msg,
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("update-o-form").reset();
					$("#edit-owner-modal").modal("hide");
					displayProperty("#property-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

function DeleteProperties(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "deletedisplayP",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str =
				"<table id='delete-property-list' class='table table-datatable__root table-bordered small-font-table'>" +
				"<thead>" +
				"<tr>" +
				"<td>#</td>" +
				"<td>NAME</td>" +
				"<td>SITE NO</td>" +
				"<td>PTY ID</td>" +
				"<td>SIZE</td>" +
				"<td>LAT</td>" +
				"<td>LONG</td>" +
				"<td>STATUS</td>" +
				"<td>OWNER</td>" +
				"<td>PUR YEAR</td>" +
				"<td>ACTIONS</td>" +
				"</tr>" +
				"</thead>" +
				"<tbody class='tbody'>";
			$.each(json.data, function (key, val) {

				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.p_name + "</td>" +
					"<td>" + val.p_site_no + "</td>" +

					"<td>" + val.prt_id + "</td>" +
					"<td>" + val.p_size + "<br>" + val.pu_sname + "</td>" +
					"<td>" + val.p_Latitude + "</td>" +
					"<td>" + val.p_longitude + "</td>" +
					"<td>" + val.p_status + "</td>" +
					"<td>Name: " + val.p_oname + " mobile:" + val.p_omobile + "</td>" +
					"<td>" + val.p_purchase_year + "</td>" +
					"<td>" +
					"<div class='dropdown'>" +
					"<button type='button' data-toggle='dropdown' class='btn btn-primary dropdown-toggle' data-edit_id=" + val.pid + ">ACTION</button>" +
					"<ul class='dropdown-menu dropdown-default'>" +
					"<li><a href='#' class='dropdown-item view_map-btn' data-toggle='modal' data-target='#view_map_modal' data-view_map_id=" + val.pid + ">VIEW MAP</a></li>" +
					"<li><a href='#' class='dropdown-item edit-property-btn' data-toggle='modal' data-target='#edit-property-modal' data-edit_property_id=" + val.pid + ">EDIT</a></li>" +
					"<li><a href='#' class='dropdown-item recover-property-btn' data-recover_property_id=" + val.pid + ">UNDO PROPERTY</a><li>" +
					"<li><a href='#' class='dropdown-item owner-info-btn' data-toggle='modal' data-target='#edit-owner-modal' data-owner_info_id=" + val.pid + ">OWNER INFO</a><li>" +
					"<li><a href='#' class='dropdown-item court-log-btn' data-court_log_id=" + val.pid + ">Court Hearing Log</a><li>" +
					"</ul>" +
					"</div></td>";

			})
			str += "</tbody>" +
				"</table>" +
				"</div>";
			$(target).html(str);
			$("#delete-property-list").DataTable();
		}

	});
}

$(document).on('click', '.recover-property-btn', function () {
	var id = $(this).data('recover_property_id');
	$.confirm({
		title: 'UNDO action',
		content: 'Are you sure? Recover your property',
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
						url: path + "UndoP",
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
								displayProperty("#property-list");
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
