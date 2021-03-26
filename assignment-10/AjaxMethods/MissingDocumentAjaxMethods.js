
$("#missing_document").submit("click", function (e) {
	e.preventDefault();
	if ($("#missing_document").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var md_name = $("#md_name").val();
		var md_document = $("#md_document").val();
		var md_remark = $("#md_remark").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + "insertMDP",
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name,
				md_name,
				md_document,
				md_remark
			},
			success: function (json) {
				console.log(json);
				if (json.status == 200) {

					$.toast({
						text: 'data is inserted successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("missing_document").reset();
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});




function DisplayAllDocument(mdf_name) {
	var csrf_test_name = $.cookie('csrf_cookie_name');

	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: path + "displayMDA",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			mdf_name,
			csrf_test_name
		},

		success: function (json) {
			var str =
				"<table id='doc_table' class='table table-datatable__root table-bordered small-font-table'>" +
				"<thead>" +
				"<tr>" +
				"<td>#</td>" +
				"<td>OWNER NAME</td>" +
				"<td>DOCUMENT TYPE </td>" +
				"<td>SITE ID</td>" +
				"<td>REMARK</td>" +
				"<td>ACTIONS</td>" +
				"</tr>" +
				"</thead>" +
				"<tbody class='tbody'>";
			$.each(json.data, function (key, val) {
				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.p_name + "</td>" +
					"<td>" + val.d_name + "</td>" +
					"<td>" + val.p_site_no + "</td>" +
					"<td>" + val.remark + "</td>" +
					"<td><div class='action-buttons'>" +
					"<a class='green edit-md-btn ml-3 mr-3' href='#'  data-toggle='modal' data-target='#edit_md_modal' data-edit_md_id='" + val.mdid + "'>" +
					"<i class='ace-icon fa fa-pencil-alt bigger-130'></i>" +
					"</a>" +
					"<a class='red delete-md-btn ml-3 mr-3' href='#' data-delete_md_id='" + val.mdid + "'>" +
					"<i class='ace-icon fa fa-trash bigger-130'></i>" +
					"</a>" +
					"</div></td>";

			})
			str += "</tbody>" +
				"</table>" +
				"</div>";
			$("#mdoc-list").html(str);
			$("#doc_table").DataTable();
		}

	});
}


$(document).on('click', '.edit-md-btn', function () {
	var id = $(this).data('edit_md_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "OneDplyMD",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			id
		},
		success: function (json) {
			if (json.status == 200) {
				console.log(json);
				$.each(json.data, function (key, val) {
					$("#updated_id").val(val.id);
					$("#update_md_name").val(val.md_p_id);
					$("#update_md_document").val(val.md_dt_id);
					$("#update_md_remark").val(val.remark);
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
$("#update_md_form").submit("click", function (e) {
	e.preventDefault();
	if ($("#update_md_form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var id = $("#updated_id").val();
		var dt_name = $("#updated_dt_name").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'updateDT',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, id, dt_name
			},
			success: function (json) {
				if (json.status == 200) {

					$.toast({
						text: json.msg,
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("update_md_form").reset();
					$("#edit_md_modal").modal("hide");
					displayDTList("#dt-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

$(document).on('click', '.delete-md-btn', function () {
	var id = $(this).data('delete_md_id');
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
						url: path + "deleteMD",
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


$(document).ready(function () {
	$("#mdf_name").change(function () {
		var mdf_name = $(this).val();
		if (mdf_name != '') {
			DisplayAllDocument(mdf_name)
		}
		else {
			DisplayDocumentUpload();
		}
	});
})