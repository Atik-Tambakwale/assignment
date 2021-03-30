var path = $("#host").val();
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

function displayListKSAMEMBER(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayKSAL",

		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {},

		success: function (json) {
			var str = "<table id='property-list' class='table table-bordered' style='font-size: 9px;table-layout: fixed; width: 100 %; word -break: break-all;'>" +
				"<thead>" +
				"<tr>" +
				"<td>#<span class='pull-right'></span></td>" +
				"<td>NUMBER</td>" +
				"<td>MEMBER ID</td>" +
				"<td>TITLE</td>" +
				"<td>NAME</td>" +
				"<td>ADDRESS 1</td>" +
				"<td>ADDRESS 2</td>" +
				"<td>ADDRESS 3</td>" +
				"<td>ADDRESS 4</td>" +
				"<td>CITY</td>" +
				"<td>PIN</td>" +

				"<td>MAGRETURN</td>" +
				"<td>STOPMAIL</td>" +
				"<td>DESTFILE</td>" +
				"<td>EXPIRED</td>" +
				"<td>LASTUPDT</td>" +
				"<td>TOMON</td>" +
				"<td>TOYR</td>" +
				"<td>HANDDELVHANDDELV</td>";
			"</tr>" +
				"</thead>" +
				"<tbody class='tbody'>";

			$.each(json.data, function (key, val) {

				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.NUMB + "</td>" +
					"<td>" + val.t_member + "</td>" +
					"<td>" + val.TITLE + "</td>" +
					"<td>" + val.NAME + "</td>" +
					"<td>" + val.ADDR1 + "</td>" +
					"<td>" + val.ADDR2 + "</td>" +
					"<td>" + val.ADDR3 + "</td>" +
					"<td>" + val.ADDR4 + "</td>" +
					"<td>" + val.CITY + "</td>" +
					"<td>" + val.PIN + "</td>" +

					"<td>" + val.MAGRETURN + "</td>" +
					"<td>" + val.STOPMAIL + "</td>" +
					"<td>" + val.DESTFILE + "</td>" +
					"<td>" + val.EXPIRED + "</td>" +
					"<td>" + val.LASTUPDT + "</td>" +
					"<td>" + val.TOMON + "</td>" +
					"<td>" + val.TOYR + "</td>" +
					"<td>" + val.HANDDELVHANDDELV + "</td></tr>";

			})
			str += "</tbody>" +
				"</table>" +
				"</div>";
			$(target).html(str);
			$("#property-list").DataTable();
		}

	});

}

$("#export-pdf-btn").click(function () {

	var search = $("#searchBox").val();

	var csrf_test_name = $.cookie('csrf_cookie_name');
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: path + "displayKSAL",

		headers: {
			"Authorization": $.cookie("jwt")
		},
		data: {
			search, csrf_test_name
		},
		success: function (json) {
			var str = "<h1>KSA Member list pdf document" +
				"<table border='1px' style='border-color:#dfdfdf;font-size:10px' cellpadding='0' cellSpacing='0'>" +
				"<thead>" +
				"<tr>" +
				"<td>#<span class='pull-right'></span></td>" +
				"<td>NUMBER</td>" +
				"<td>MEMBER ID</td>" +
				"<td>TITLE</td>" +
				"<td>NAME</td>" +
				"<td>ADDRESS 1</td>" +
				"<td>ADDRESS 2</td>" +
				"<td>ADDRESS 3</td>" +
				"<td>ADDRESS 4</td>" +
				"<td>CITY</td>" +
				"<td>PIN</td>" +

				"<td>MAGRETURN</td>" +
				"<td>STOPMAIL</td>" +
				"<td>DESTFILE</td>" +
				"<td>EXPIRED</td>" +
				"</tr>" +
				"</thead>" +
				"<tbody>";

			$.each(json.data, function (key, val) {

				str += "<tr><td>" + (key + 1) + "</td>" +

					"<td>" + val.NUMB + "</td>" +
					"<td>" + val.t_member + "</td>" +
					"<td>" + val.TITLE + "</td>" +
					"<td>" + val.NAME + "</td>" +
					"<td>" + val.ADDR1 + "</td>" +
					"<td>" + val.ADDR2 + "</td>" +
					"<td>" + val.ADDR3 + "</td>" +
					"<td>" + val.ADDR4 + "</td>" +
					"<td>" + val.CITY + "</td>" +
					"<td>" + val.PIN + "</td>" +

					"<td>" + val.MAGRETURN + "</td>" +
					"<td>" + val.STOPMAIL + "</td>" +
					"<td>" + val.DESTFILE + "</td>" +
					"<td>" + val.EXPIRED + "</td>";

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
$("#export-excel-btn").click(function () {
	var search = $("#searchBox").val();
	location.href = path + "exportExcel?search=" + search;
});
// });

/* var doc = new jsPDF();

$("#pdf_report").on("click", function () {

	var table = $("#property-list").DataTable();
	doc.fromHTML(`<html><head><title>KSA MEMBER List</title></head><body>` + $("#property-list").html + `</body></html>`);
	doc.save('pdf_report.pdf');
})
 */

/* function load_KSA_list(page) {
	$.ajax({
		url: path + "displayPList" + page,
		type: "GET",
		dataType: "JSON",
		success: function (data) {
			$("#load-KSA-list").html(data.list_table);
			$("#pagination_link").html(data.pagiantion_link);
		}
	})
} */