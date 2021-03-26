
//TODO::insert document name in document type
$("#Document-type-form").submit("click", function (e) {
	e.preventDefault();
	if ($("#Document-type-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var dt_name = $("#dt_name").val();

		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'createDT',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, dt_name
			},
			success: function (json) {
				console.log(json);
				if (json.status == 200) {

					$.toast({
						text: 'data is inserted successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("Document-type-form").reset();
					displayDTList("#dt-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});


$(document).on('click', '.edit-dt-btn', function () {
	var id = $(this).data('editdt_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "OneDplyDT",
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
					$("#updated_dt_name").val(val.d_name);
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

$("#update_dt_form").submit("click", function (e) {
	e.preventDefault();
	if ($("#update_dt_form").parsley().isValid()) {
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
					document.getElementById("update_dt_form").reset();
					$("#editdt_modal").modal("hide");
					displayDTList("#dt-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});
$(document).on('click', '.delete-dt-btn', function () {
	var id = $(this).data('delete_dt_id');
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
						url: path + "deleteDT",
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
								displayDTList("#dt-list");
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


//TODO::DISPLAY THE DOCUMENT TYPE
function displayDTList(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayDT",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<table id='document-type-list' class='table table-bordered'>" +
				"<thead>" +
				"<tr>" +
				"<th>#</th>" +
				"<th>NAME</th>" +
				"<th>ACTIONS</th>" +
				"</tr>" +
				"</thead>" +
				"<tbody>";
			$.each(json.data, function (key, val) {
				str += "<tr><td>" + (key + 1) + "</td>" +
					"<td>" + val.d_name + "</td>" +
					"<td><div class='action-buttons'>" +
					"<a class='green edit-dt-btn ml-3 mr-3' href='#'  data-toggle='modal' data-target='#editdt_modal' data-editdt_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-pencil-alt bigger-130'></i>" +
					"</a>" +
					"<a class='red delete-dt-btn ml-3 mr-3' href='#' data-delete_dt_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-trash bigger-130'></i>" +
					"</a>" +
					"</div></td>";

			})
			str += "";
			$(target).html(str);
			$("#document-type-list").DataTable();
		}
	})
}
