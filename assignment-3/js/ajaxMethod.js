//TODO::LOADING A DOCTOR ID ,DOCTOR NAME AND COMMISSSION PERCENTAGES PASSING INTO DATA ATTRIBUTE AND OPTION VALUE FOR HTML SELECT TAG
function loadDoctors(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/load_doctors.php",
		data: {},
		success: function (json) {
			if (json.status == 200) {
				var data = json.list;
				var str = "";
				for (var i = 0; i < data.length; i++) {
					str += "<option value='" + data[i].id + "' data-cut_percent='" + data[i].cut_percent + "'>" + data[i].name + "</option>";
				}
				$(target).html(str);
			}
		}
	})
}

//TODO::LOADING A SERVICE ID ,SERVICE NAME  PASSING INTO  OPTION VALUE FOR HTML SELECT TAG
function loadServices(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/load_services.php",
		data: {},
		success: function (json) {
			if (json.status == 200) {
				var data = json.list;
				var str = "";
				for (var i = 0; i < data.length; i++) {
					str += "<option value=" + data[i].id + ">" + data[i].service_name + "</option>";
				}
				$(target).html(str);
			}
		}
	})
}

//TODO::FUNCTION TO GET A COUNT VALUE DYNAMICALLY 
/* $(document).onchange(function () {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/load_count.php",
		data: {},
		success: function (json) {
			var data = json.list;
		}
	})
}) */
//TODO::DAILY DATA ENRTY FORM
$("#dailyInvForm").submit(function (e) {
	e.preventDefault();
	if ($(this).parsley().isValid()) {
		var service_id = $("#doctor_services").val();
		var doctor_id = $("#doctor_name").val();
		var calculation = $("#calculation").val();
		var investigation_count = $("#count").val();
		var total_amt = parseFloat($("#total_amt").val());
		var date = $("#date").val();
		var commission_percent = parseFloat($("#doctor_name option:selected").data("cut_percent"));
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "api/insert_data.php",
			data: {
				service_id: service_id,
				doctor_id: doctor_id,
				calculation: calculation,
				investigation_count: investigation_count,
				total_amount_collection: total_amt,
				date: date,
				commission_percent: commission_percent,
				commission_amount: (commission_percent * total_amt) / 100,
			},
			success: function (json) {
				if (json.status == 200) {
					alert(json.msg);
					fetch_entries("#users-list");
				}
				else {
					alert(json.msg);
				}
			}

		});
	}
});

//TODO::DISPLAY THE DALITY DATA ENTRY IN HTML
function fetch_entries(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		data: {},
		url: "api/getDataEntry.php",
		success: function (json) {
			if (json.status == 200) {

				var str = "<table class='table table-striped table-hover'>" +
					"<thead>" +
					"<tr><th></th><th>BRAND NAME</th><th>BRAND ID</th><th>Product NAME</th><th>DESCRIPTION</th><th>UNIT</th><th>WIEGHT</th><th>MRP PRICE</th><th>QUANTITY</th><th>TOTAL_AMOUNT</th></tr>" +
					"</thead><tbody>";
				// $.each(json.list, function (key, val) {

				// });
				var str = "<table class='table table-striped table-hover'>" +
					"<thead>" +
					"<tr><th></th><th>DATE</th><th>SERVICE</th><th>DOCTOR</th><th>COUNT</th><th>COMMISSION AMT</th><th>TOTAL AMOUUNT</th><th>ACTIONS</th></tr > " +
					"</thead><tbody>";
				// $.each(json.list, function (key, val) {

				// });
				var list = json.list;
				for (i = 0; i < list.length; i++) {
					str += "<tr>" +
						"<td>" + (i + 1) + "</td>" +
						"<td>" + list[i].date + "</td>" +
						"<td>" + list[i].service_name + "</td>" +
						"<td>" + list[i].name + "</td>" +
						"<td>" + list[i].investigation_count + "</td>" +
						"<td>" + list[i].commission_amount + "</td>" +
						"<td>" + list[i].total_amount_collection + "</td>" +
						"<td>" +
						"<button type='button' class='btn btn-primary edit-product-btn' data-toggle='modal' data-target='#form' data-edit_id=" + list[i].id + ">EDIT</button>" +
						"</td>" +

						"</tr>";
				}
				str += "</tbody>" +
					"</table>";
				$(target).html(str);
			} else {
				$(target).html("<b>" + json.msg + "</b>");
			}
		}
	});
}

//TODO:: ONCHANGE FUNCTION GET COUNT VALUE IN DYNAMICALLY