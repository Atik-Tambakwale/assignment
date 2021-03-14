function displayUserList(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/userDisplayList.php",
		data: {},

		success: function (json) {
			var str = "<table id='simple-table' class='table table-bordered table-hover'>" +
				"<thead>" +
				"<tr>" +
				"<th>User Name</th>" +
				"<th>email</th>" +
				"<th>mobile</th>" +

				"<th>Actions</th>" +
				"	</tr>" +
				"</thead><tbody>";
			$.each(json.list, function (key, val) {
				str += "<tr><td>" + val.fname + " " + val.lname + "</td>" +
					"<td>" + val.email + "</td>" +
					"<td>" + val.mobile + "</td>" +
					"<td>" +
					"<button type='button' class='btn btn-primary assignbtn' data-toggle='modal' data-target='#assignTask' data-user_id=" + val.id + ">ASSIGN</button>" +
					"</td>";

			})
			str += "</tbody></table>";
			$(target).html(str);
		}

	});
}
$("#assignForm").submit("click", function (e) {
	e.preventDefault();
	if ($("#assignForm").parsley().isValid()) {
		var student_id = $("#user_id").val()

		var title = $("#title").val();
		var description = $("#description").val();
		var startDate = $("#startDate").val();
		var endDate = $("#endDate").val();
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "api/insert_tsk.php",
			data: {
				student_id, title, description, startDate, endDate
			},
			success: function (json) {
				if (json.status == 200) {
					alert(json.msg);
					$("#assignTask").modal('hide');
					displayUserList("#user-lists");
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//pass assignbtn 
$(document).on('click', '.assignbtn', function () {
	var id = $(this).data("user_id");
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/getuserId.php",
		data: {
			id: id
		},
		success: function (json) {

			var list = json.list;
			$.each(list, function (key, val) {
				$("#user_id").val(val.id);
			});
		}
	});
})

//load the user for Assign a Task
function loadStudent(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/loadStudent.php",
		data: {},
		success: function (json) {
			console.log(json);
			var data = json.data;
			//console.log(data);
			$str = "<option selected=''></option>";
			$.each(data, function (key, val) {
				$str += "<option data-select2-id='" + val.id + "'>" + val.name + "</option>";
			})
			$(target).html($str);
		}
	});
}