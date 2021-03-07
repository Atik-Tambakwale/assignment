//TODO:insert data into database 
$("#insertForm").submit("click", function (e) {
	e.preventDefault();
	if ($("#insertForm").parsley().isValid()) {
		var password = $("#password").val();
		var rep_password = $("#rep_password").val();
		if (rep_password != password) {
			alert("passwoord does not match! ");
		}
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "api/insert_data.php",
			data: {
				fname: $("#fname").val(),
				lname: $("#lname").val(),
				email: $("#email").val(),
				user_name: $("#user_name").val(),
				mobile: $("#mobile").val(),
				password: password
			},
			success: function (json) {
				if (json.status == 200) {
					alert(json.msg);
					$("#insertForm").reset();
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//TODO:login ajax call
$("#loginForm").submit('click', function (e) {
	e.preventDefault();
	if ($(this).parsley().isValid()) {
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "api/login.php",
			data: {
				email: $("#login_email").val(),
				password: $("#login_password").val()
			},
			success: function (json) {

				if (json.status == 200) {
					window.location.replace("dashboard.php");

				}
				else {
					alert(json.msg);
				}
				;
			}
		})
	}
});

//TODO:DISPLAY USER PROFILE
function userProfile(target_id, target_name) {
	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "api/displayProfile.php",
		data: {
			name: target_name
		},
		success: function (json) {

		}
	})
}

//TODO:display doctor name and id 
	function loadDoctor(target) {
		$.ajax({
			type: "GET",
			dataType: "JSON",
			url: "api/loadDoctors.php",
			data: {},
			success: function (json) {
				console.log(json);
				var data = json.data;
				//console.log(data);
				$str = "<option value=''></option>";
				$.each(data, function (key, val) {
					$str += "<option value='" + val.id + "'>" + val.doc_name + "</option>";
				})
				$(target).html($str);
			}
		});
	};

//TODO:display department id and name
function loadDepartment(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/loadDepartment.php",
		data: {},
		success: function (json) {
			var data = json.data;
			console.log(data);
			$str = "<option value=''></option>";
			$.each(data, function (key, val) {
				$str += "<option value='" + val.id + "'>" + val.depart_name + "</option>";
			})
			$(target).html($str);
		}

	})
}
$("#patientForm").submit(function (e) {
	e.preventDefault();
	/* 	var form = $('#image')[0];
		var data = new FormData(form);
		console.log(data);
	 */
	if ($(this).parsley().isValid()) {
		var doc_name = $("#doctor_name").val();
		var depart_name = $("#department_name").val();
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var mobile = $("#mobile").val();
		var email = $("#email").val();
		var date = $("#dob").val();
		var age = $("#age").val();
		var gender = $("#gender").val();
		var address = $("#address").val();
		var post_code = $("#post_code").val();
		var city = $("#city").val();
		var state = $("#state").val();
		var country = $("#country").val();
		var aadhar = $("#aadhar").val();
		var image = $("#image").val();

		$("#patientForm").ajaxSubmit({
			type: "POST",
			dataType: "JSON",
			url: "api/insert_patient.php",
			data: {
				doc_name: doc_name,
				depart_name: depart_name,
				fname: fname,
				lname: lname,
				mobile: mobile,
				email: email,
				date: date,
				age: age,
				gender: gender,
				address: address,
				post_code: post_code,
				city: city,
				state: state,
				country: country,
				aadhar: aadhar,
				image: image
			},
			success: function (json) {
				if (json.status == 200) {
					alert(json.msg);
					$("#patientForm")[0].reset();


				}
			}
		})
	}
})

//display patient list
function fetch_list(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		data: {},
		url: "api/getDataList.php",
		success: function (json) {
	
			if (json.status == 200) {

				var str = "<table class='table table-striped table-hover'>" +
					"<thead>" +
					"<tr><th>DOCTOR NAME</th><th>DEPARTMENT NAME</th><th>NAME</th><th>AGE</th><th>MOBILE</th><th>GENDER</th><th>ADDRESS</th></tr > " +
					"</thead><tbody>";
				// $.each(json.list, function (key, val) {

				// });

				$.each(json.list, function (key, val) {

					str += "<tr>" +
						"<td>" + val.doc_name + "</td>" +
						"<td>" + val.depart_name + "</td>" +
						"<td>" + val.fname + " " + val.lname + "</td>" +
						"<td>" + val.age + "</td>" +
						"<td>" + val.mobile + "</td>" +
						"<td>" + val.gender + "</td>" +
						"<td data-toggle='tooltip' title='" + val.address + "'>" + val.address + "</td>" +

						"<td>" +
						"<div class='dropdown'>" +
						"<button type='button' data-toggle='dropdown' class='btn btn-primary dropdown-toggle' data-edit_id=" + val.id + ">ACTION</button>" +
						"<ul class='dropdown-menu dropdown-default'>" +
						"<li><a href='#' class='dropdown-item view-btn' data-toggle='modal' data-target='#view' data-view_id=" + val.id + ">VIEW</a></li>" +
						"<li><a href='#' class='dropdown-item edit-btn' data-toggle='modal' data-target='#edit' data-edit_id=" + val.id + ">EDIT</a></li>" +
						"<li><a href='#' class='dropdown-item' data-toggle='modal' data-target='#delete' data-delete_id=" + val.id + ">DELETE</a><li>" +
						"</ul>" +
						"</div>" +
						"</td>" +

						"</tr>";
				})
				str += "</tbody>" +
					"</table>";
				$(target).html(str);
			} else {
				$(target).html("<b>" + json.msg + "</b>");
			}
		}
	});
}

$(document).on('click', '.view-btn', function () {
	var id = $(this).data("view_id");
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/getOneList.php",
		data: {
			id: id
		},
		success: function (json) {
			//console.log(json);
			var list = json.list;
			var str = "<div class='row'>" +
				"<div class='col-md-8' >" +
				"<table class='table table-bordered'>" +
				"<tbody>" +
				"<h3>PERSON DETAILS</h3>" +
				"<tr><td>FULL NAME</td><td>" + list.fname + "  " + list.lname + "</td></tr>" +
				"<tr><td>MOBILE</td><td>" + list.mobile + "</td></tr>" +
				"<tr><td>EMAIL</td><td>" + list.email + "</td></tr>" +
				"<tr><td>AGE</td><td>" + list.age + "</td></tr>" +
				"<tr><td>DATE OF BIRTH</td><td>	" + list.dob + "</td></tr>" +

				"</tbody></table>" +
				"</div>" +
				"<div class='col-md-4'><br><br><br>" +
				"<table class='table table-bordered'>" +
				"<tbody>" +
				"<tr><td><img src='" + list.image.slice(3) + "' width='100%' height='200' class='img-fluid img-responsive img-thumbnail rounded'></td></tr>" +
				"</tbody>" +
				"</table></div></div> " +

				"<div='row'><div class='col-md-12'>" +
				"<h3>OTHER DETAILS</h3>" +
				"<table class='table table-bordered'>" +

				"<thead><th>Address</th><th>City</th><th>STATE</th><th>COUNTRY</th><th>POSTAL CODE</th></thead>" +
				"<tbody><tr><td> " + list.address + "</td > " +
				"<td>" + list.city + "</td>" +
				"<td>" + list.state + "</td>" +
				"<td>" + list.country + "</td>" +
				"<td>" + list.post_code + "</td></tr>" +
				"</div></div> " +


				"</tbody></table></div></div>";
			$("#single-user").html(str);
		}
	});
})