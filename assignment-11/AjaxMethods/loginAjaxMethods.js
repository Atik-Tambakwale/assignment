var path = $("#host").val();

function get_columnName(name) {
	var res = name.split(":");
	var n = res[0].length;
	return res[0].slice(0, n);
}
function order_columnName(order_type) {
	var str = order_type.slice(16, 22);
	return str.toLocaleUpperCase();
}
$(document).on("click", ".dataTables_wrapper .dataTable thead tr[role='row'] td", function () {
	var data1 = $(this).attr("aria-label");
	var colunm_name = get_columnName(data1);
	var data2 = $(this).attr("class");
	var orderby_name = order_columnName(data2);
	$("#export-pdf-btn").removeData('colounm_name');
	$("#export-pdf-btn").removeData('orderby_colunm');
	$("#export-pdf-btn").attr({ 'data-colounm_name': colunm_name, 'data-orderby_colunm': orderby_name });
	$("#export-excel-btn").removeData('colounm_name');
	$("#export-excel-btn").removeData('orderby_colunm');
	$("#export-excel-btn").attr({ 'data-colounm_name': colunm_name, 'data-orderby_colunm': orderby_name });
});

//TODO::user login
$("#login-form").submit('click', function (e) {

	e.preventDefault();
	if ($(this).parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var email = $.trim($("#email").val());
		var password = $.trim($("#password").val());
		$.ajax({
			url: path + 'auth',
			type: 'POST',
			dataType: 'JSON',
			data: { csrf_test_name, email, password },
			success: function (json) {
				if (json.status == 200) {
					location.href = path + 'dashboard?state=login';
				} else {
					$.toast({
						heading: 'Information',
						text: json.msg,
						ShowHideTransition: 'slide',
						icon: 'warning',
						position: "top-right"
					})
					//(json.msg);
				}
			}
		})
	}
});

//TODO:: import a file in database
$("#excel_file_upload").submit("click", function (e) {
	e.preventDefault();
	if ($("#excel_file_upload").parsley().isValid()) {
		var csrf_test_name = $.cookie('csrf_cookie_name');
		var excel_file = $("#excel_file").val();
		$("#excel_file_upload").ajaxSubmit({
			type: "POST",
			dataType: "JSON",
			url: path + "insert_excel_file",
			headers: {
				"Authorization": $.cookie("jwt")
			},
			data: {
				csrf_test_name,
				excel_file
			},
			beforeSend: function () {
				document.getElementById("import_btn").disabled = true;
			},
			success: function (json) {
				console.log(json);
				if (json.status == 200) {

					$.toast({
						text: 'excel file is imported successfully',
						icon: 'success',
						position: "top-right",
					});
					document.getElementById("import_btn").disabled = false;
					document.getElementById("excel_file_upload").reset();
					load_KSA_list(1);
				}
				else {
					alert(json.msg);
				}
			}
		})
	}
});

//TODO::export pdf file
$("#export-pdf-btn").click(function () {
	var csrf_test_name = $.cookie('csrf_cookie_name');
	var colounm_name = $(this).data("colounm_name");

	var orderby_colunm = $(this).data("orderby_colunm");
	//console.log(colounm_name, orderby_colunm);
	var search = $(".dataTables_wrapper  .dataTables_filter input[type='search']").val();
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayKSAL",

		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			search, csrf_test_name, orderby_colunm, colounm_name
		},
		success: function (json) {
			var str = "<h1>KSA Member list pdf document" +
				"<table border='1px' style='border-color:#dfdfdf;font-size:10px' cellpadding='0' cellSpacing='0'>" +
				"<thead>" +
				"<tr>" +
				"<td>#</td>" +
				"<td>MEMBER_ID</td>" +
				"<td>MEMBER_TYPE</td>" +
				"<td>TITLE</td>" +
				"<td>NAME</td>" +
				"<td>ADDRESS_1</td>" +
				"<td>ADDRESS_2</td>" +
				"<td>ADDRESS_3</td>" +
				"<td>ADDRESS_4</td>" +
				"<td>CITY</td>" +
				"<td>PIN</td>" +
				"<td>MOBILE</td>" +
				"<td>EMAIL</td>" +
				"<td>MONTH</td>" +
				"<td>YEAR</td>" +
				"<td>DESTFILE</td>" +
				"<td>MAGRETURN</td>" +
				"<td>STOPMAIL</td>" +
				"<td>EXPIRED</td>" +
				"<td>HANDDELV</td>" +
				"</tr>" +
				"</thead>" +
				"<tbody>";
			console.log(json);
			$.each(json.data, function (key, val) {

				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.MEMBER_ID + "</td>" +
					"<td>" + val.MEMBER_TYPE + "</td>" +
					"<td>" + val.TITLE + "</td>" +
					"<td>" + val.NAME + "</td>" +
					"<td>" + val.ADDRESS_1 + "</td>" +
					"<td>" + val.ADDRESS_2 + "</td>" +
					"<td>" + val.ADDRESS_3 + "</td>" +
					"<td>" + val.ADDRESS_4 + "</td>" +
					"<td>" + val.CITY + "</td>" +
					"<td>" + val.PIN + "</td>" +
					"<td>" + val.MOBILE + "</td>" +
					"<td>" + val.EMAIL + "</td>" +
					"<td>" + val.MONTH + "</td>" +
					"<td>" + val.YEAR + "</td>" +
					"<td>" + val.MAGRETURN + "</td>" +
					"<td>" + val.STOPMAIL + "</td>" +
					"<td>" + val.DESTFILE + "</td>" +
					"<td>" + val.EXPIRED + "</td>" +


					"<td>" + val.HANDDELV + "</td>";

			})
			str += "</tbody>" +
				"</table>" +
				"</div>";
			var win = window.open('', 'PRINT', 'height=600, width=1000');
			win.document.write("<html><head><title>KSA</title></head><body class='style'>");
			win.document.write(str);
			win.document.write("</body></html>");
			win.document.close();

			win.focus();
			win.print();
			win.close();
		}
	})
});

//TODO::export a excel file 
$("#export-excel-btn").click(function () {
	var search = $(".dataTables_wrapper  .dataTables_filter input[type='search']").val();
	var colounm_name = $(this).data("colounm_name");
	var orderby_colunm = $(this).data("orderby_colunm");
	location.href = path + "exportExcel?search=" + search + "&colounm_name=" + colounm_name + "&orderby_colunm=" + orderby_colunm;
});


