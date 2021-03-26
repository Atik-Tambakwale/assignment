function loadPropertyUsername(target) {
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
				str += "<option value='" + val.id + "'>" + val.p_name + "</option>";
			})
			$(target).html(str);
		}
	});
}

function loadDocumentType(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayDT",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},
		success: function (json) {

			var data = json.data;
			//console.log(data);
			var str = "<option value='' selected=''></option>";
			$.each(data, function (key, val) {
				str += "<option value='" + val.id + "'>" + val.d_name + "</option>";
			})
			$(target).html(str);
		}
	});
}

//TODO::upload a file

$("#document_upload").submit("click", function (e) {
	e.preventDefault();
	if ($("#document_upload").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var p_name = $("#du_name").val();
		var p_document = $("#du_document").val();
		var p_doc_no = $("#du_doc_no").val();
		var p_desc = $("#du_desc").val();
		var pdf_file = $("#pdf_file").val();
		$("#document_upload").ajaxSubmit({
			type: "POST",
			dataType: "JSON",
			url: path + "insertDU",
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name,
				p_name,
				p_document,
				p_doc_no,
				p_desc,
				pdf_file
			},
			success: function (json) {
				console.log(json);
				if (json.status == 200) {

					$.toast({
						text: 'data is inserted successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("document_upload").reset();
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});


function DisplayDocumentUpload(fp_name, fd_name) {
	var csrf_test_name = $.cookie('csrf_cookie_name');

	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: path + "displayDU",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			fp_name,
			fd_name,
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
				"<td>DOCUMENT ID</td>" +
				"<td>DESCRIPTION</td>" +
				"<td>ACTIONS</td>" +
				"</tr>" +
				"</thead>" +
				"<tbody class='tbody'>";
			$.each(json.data, function (key, val) {
				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.p_name + "</td>" +
					"<td>" + val.d_name + "</td>" +
					"<td>" + val.du_doc_no + "</td>" +
					"<td>" + val.du_description + "</td>" +
					"<td><div class='action-buttons'>" +
					"<a class='green ml-3 mr-3' href='http://localhost/assignment-10/uploads/" + val.pdf_file + "')'>" +
					"<i class='fas fa-download'></i>" +
					"</a>" +
					"<a class='red delete-du-btn ml-3 mr-3' href='#' data-delete_du_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-trash bigger-130'></i>" +
					"</a>" +
					"</div></td>";

			})
			str += "</tbody>" +
				"</table>" +
				"</div>";
			$("#doc-list").html(str);
			$("#doc_table").DataTable();
		}

	});
}
$(document).ready(function () {
	

	$("#document_search_text").on("keyup", function () {
		var search = $(this).val();
		alert(search);
		if (search != '') {
			load_data(search);
		}
		else {
			load_data();
		}

	});
	$("#fp_name").change(function () {
		var fp_id = $(this).val();
		var fd_id = $("#fp_document").val();
		if (fp_id != '' || fd_id != '') {
			DisplayDocumentUpload(fp_id, fd_id);
		}
		else {
			DisplayDocumentUpload();
		}
	});
	$("#fp_document").change(function () {
		var fd_id = $(this).val();
		var fp_id = $("#fp_name").val();
		if (fp_id != '' || fd_id != '') {
			DisplayDocumentUpload(fp_id, fd_id);
		}
		else {
			DisplayDocumentUpload();
		}
	});
})
$(document).on('click', '.delete-du-btn', function () {
	var id = $(this).data('delete_du_id');
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
						url: path + "deleteDU",
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
								DisplayDocumentUpload("#doc-list");
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
