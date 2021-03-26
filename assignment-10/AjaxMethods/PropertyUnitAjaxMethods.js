
//TODO:: insert the property units
$("#property-unit-form").submit("click", function (e) {
	e.preventDefault();
	if ($("#property-unit-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var pu_name = $("#pu_name").val();
		var pu_sname = $("#pu_sname").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'createPU',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, pu_name, pu_sname
			},
			success: function (json) {
				console.log(json);
				if (json.status == 200) {

					$.toast({
						text: 'data is inserted successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("property-unit-form").reset();
					displayPUList("#pu-list");
					//alert(json.msg);
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});


//TODO::DISPLAY THE PROPERTY UNITS
function displayPUList(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayPU",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<table id='property-unit-list' class='table table-bordered'>" +
				"<thead>" +
				"<tr>" +
				"<th>#</th>" +
				"<th>NAME</th>" +
				"<th>SHORT NAME</th>" +
				"<th>ACTIONS</th>" +
				"</tr>" +
				"</thead>" +
				"<tbody>";
			var i = 0;
			$.each(json.data, function (key, val) {
				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.pu_name + "</td>" +
					"<td>" + val.pu_sname + "</td>" +
					"<td><div class='action-buttons'>" +
					"<a class='green edit-pu-btn ml-3 mr-3' href='#'  data-toggle='modal' data-target='#editpu_modal' data-editpu_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-pencil-alt bigger-130'></i>" +
					"</a>" +
					"<a class='red delete-pu-btn ml-3 mr-3' href='#' data-deletepu_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-trash bigger-130'></i>" +
					"</a>" +
					"</div></td>";

			})
			str += "";
			$(target).html(str);
			$("#property-unit-list").DataTable();
		}

	});
}

$(document).on('click', '.edit-pu-btn', function () {
	var id = $(this).data('editpu_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "OneDplyPU",
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
					$("#upadted_pu_name").val(val.pu_name);
					$("#upadted_pu_sname").val(val.pu_sname);
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

$("#update_pu_form").submit("click", function (e) {
	e.preventDefault();
	if ($("#update_pu_form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var id = $("#id").val();
		var pu_name = $("#upadted_pu_name").val();
		var pu_sname = $("#upadted_pu_sname").val();

		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'updatePU',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, id, pu_name, pu_sname
			},
			success: function (json) {
				if (json.status == 200) {

					$.toast({
						text: json.msg,
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("update_pu_form").reset();
					$("#editpu_modal").modal("hide");
					displayPUList("#pu-list");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

$(document).on('click', '.delete-pu-btn', function () {
	var id = $(this).data('deletepu_id');
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
						url: path + "deletePU",
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
								displayPUList("#pu-list");
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
