//TODO::insert data in Property Type
$("#product-type-form").submit("click", function (e) {
	e.preventDefault();
	if ($("#product-type-form").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var pt_name = $("#pt_name").val();
		var pt_sname = $("#pt_sname").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: path + 'createPT',
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name, pt_name, pt_sname
			},
			success: function (json) {
				console.log(json);
				if (json.status == 200) {

					$.toast({
						text: 'data is inserted successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("product-type-form").reset();
					displayPTList("#pt-list");
					//alert(json.msg);
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});
//TODO::DISPLAY THE PROPERTY TYPE
function displayPTList(target) {

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayPT",
		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<table id='property-type-list' class='table table-bordered'>" +
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
				str += "<tr>" +
					"<td> " + (key + 1) + "</td > " +
					"<td>" + val.pt_name + "</td>" +
					"<td>" + val.pt_sname + "</td>" +
					"<td>" +
					"<button type=''button' class='btn btn-danger deletePT-btn' data-deletept_id='" + val.id + "'>Delete</button>" +
					"</td></tr>";

			})
			str += "</tbody></thead>";
			$(target).html(str);
			$("#property-type-list").DataTable();
		}

	});
}
//TODO::DELETE THE PROPERTY TYPE
$(document).on('click', '.deletePT-btn', function () {
	var id = $(this).data('deletept_id');
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
						url: path + "deletePT",
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
								displayPTList("#pt-list");
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
