//TODO:create users in the database
$("#create-form").submit("click", function (e) {
	var path = $("#host").val();
	e.preventDefault();
	if ($("#create-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var name = $("#name").val();
		var email = $("#email").val();
		var password = $("#password").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'index.php/insertData',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, name, email, password
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
					displayList('#list')
					//alert(json.msg);
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//TODO:display the users records 
function displayList(target) {
	var path = $("#host").val();
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + 'displayData',
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "";
			$.each(json.data, function (key, val) {
				str += "<tr>" +
					"<td>" + val.name + "</td>" +
					"<td>" + val.email + "</td>" +

					"<td><div class='action-buttons'>" +

					"<a class='green editbtn ml-3 mr-3' href='#'  data-toggle='modal' data-target='#edit_modal' data-edit_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-pencil-alt bigger-130'></i>" +
					"</a>" +
					"<a class='red deletebtn ml-3 mr-3' href='#' data-delete_id='" + val.id + "'>" +
					"<i class='ace-icon fa fa-trash bigger-130'></i>" +
					"</a>" +

					"</div></td>" +
					"</tr>";
			})
			str += "";
			$(target).html(str);
		}
	});
}

//TODO:delete the user completely from database
$(document).on('click', '.deletebtn', function () {
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
								displayList('#list');
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

//TODO:display the single user database in the update form
$(document).on('click', '.editbtn', function () {
	var id = $(this).data('edit_id');

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "oneDisplayData",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			id
		},
		success: function (json) {
			if (json.status == 200) {
				var data = json.list;
				$.each(json.list, function (key, val) {
					$("#id").val(val.id);
					$("#updated_name").val(val.name);
					$("#updated_email").val(val.email);
					$("#updated_password").val(val.initial_password);
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

//update the userfrom database
$("#update_form").submit("click", function (e) {
	var path = $("#host").val();
	e.preventDefault();
	if ($("#update_form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var id = $("#id").val();
		var name = $("#updated_name").val();
		var email = $("#updated_email").val();
		var password = $("#updated_password").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'index.php/updateData',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, id, name, email, password
			},
			success: function (json) {
				if (json.status == 200) {

					$.toast({
						text: json.msg,
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("create-form").reset();
					$("#edit_modal").modal("hide");
					displayList('#list');
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});