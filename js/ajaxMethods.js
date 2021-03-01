$("#orderForm").submit(function (e) {
	e.preventDefault();
	var name = document.getElementById("brand_name").value.trim();
	var product_name = document.getElementById("product_name").value.trim();
	var description = document.getElementById("description").value.trim();
	var unit = document.getElementById("unit").value.trim();
	var weight = document.getElementById("weight").value.trim();
	var price = document.getElementById("price").value.trim();
	var qty = document.getElementById("qty").value.trim();

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var response = JSON.parse(this.responseText);
			alert(response.msg);
			document.getElementById("orderForm").reset();
			fetch_users("#users-list");
		}
	};
	xhttp.open("POST", "api/insert_data.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("name=" + name + "&product_name=" + product_name + "&description=" + description + "&unit=" + unit + "&weight=" + weight + "&mrp_price=" + price + "&QTY=" + qty);

	return false;
});
function fetch_users(target) {
	$.ajax({
		type: "GET",
		dataType: "JSON",
		data: {},
		url: "api/getList.php",
		success: function (json) {
			if (json.status == 200) {

				var str = "<table class='table table-striped table-hover'>" +
					"<thead>" +
					"<tr><th></th><th>BRAND NAME</th><th>BRAND ID</th><th>Product NAME</th><th>DESCRIPTION</th><th>UNIT</th><th>WIEGHT</th><th>MRP PRICE</th><th>QUANTITY</th><th>TOTAL_AMOUNT</th></tr>" +
					"</thead><tbody>";
				// $.each(json.list, function (key, val) {

				// });
				var list = json.list;
				for (i = 0; i < list.length; i++) {
					// str += '<option value=' + list[i].id + '>' + list[i].nmae + '</option>';
					str += "<tr>" +
						"<td>" + (i + 1) + "</td>" +
						"<td>" + list[i].name + "</td>" +
						"<td>" + list[i].brand_id + "</td>" +
						"<td>" + list[i].product_name + "</td>" +
						"<td>" + list[i].description + "</td>" +
						"<td>" + list[i].unit + "</td>" +
						"<td>" + list[i].weight + "</td>" +
						"<td>" + list[i].mrp_price + "</td>" +
						"<td>" + list[i].qty + "</td>" +
						"<td>" + list[i].total_amt + "</td>" +
						"<td>" +
						"<button type='button' class='btn btn-primary edit-product-btn' data-toggle='modal' data-target='#form' data-edit_id=" + list[i].id + ">EDIT</button>" +
						"<a type='button' class='btn btn-danger delete-product-btn' href='#' data-product_id=" + list[i].id + "> DELETE</a > " +
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

$(document).on("click", ".delete-product-btn", function () {
	var id = $(this).data("product_id");

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: 'api/delete-product.php',
		data: { id: id },
		success: function (json) {
			if (json.status == 200) {
				fetch_users("#users-list");
				alert(json.msg)
			} else {
				alert(json.msg)
			}
		}
	})
});
$(document).on("click", ".edit-product-btn", function () {
	var id = $(this).data("edit_id");
	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: "api/getProductList.php",
		data: { id: id },
		success: function (json) {
			if (json.status == 200) {
				var list = json.list;

				$("#update_brand_id").val(list.id);
				$("#update_brand_name").val(list.brand_id);
				$("#update_product_name").val(list.product_name);
				$("#update_description").val(list.description);
				$("#update_unit").val(list.unit);
				$("#update_weight").val(list.weight);
				$("#update_price").val(list.mrp_price);
				$("#update_qty").val(list.qty);
			}
			else {
				alert(json.msg);
			}
		}
	})
});
$("#updateForm").submit(function (e) {
	e.preventDefault();
	var id = $("#update_brand_id").val();
	var brand_id = $("#update_brand_name").val();
	var product_name = $("#update_product_name").val();
	var description = $("#update_description").val();
	var unit = $("#update_unit").val();
	var weight = $("#update_weight").val();
	var mrp_price = $("#update_price").val();
	var QTY = $("#update_qty").val();

	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "api/updateData.php",
		data: {
			id: id,
			brand_id: brand_id,
			product_name: product_name,
			description: description,
			unit: unit,
			weight: weight,
			mrp_price: mrp_price,
			QTY: QTY,
			total_amt: mrp_price * QTY
		},
		success: function (json) {
			console.log(json);
			if (json.status == 200) {
				alert(json.msg);
				$("#form").modal('hide');
				fetch_users("#users-list");
			}
			else {
				alert(json.msg);
			}

		}
	});
});
function loadBrand(target) {

	$.ajax({
		type: "GET",
		dataType: "JSON",
		url: 'api/brandName.php',
		data: {},
		success: function (json) {
			if (json.status == 200) {


				var data_list = json.list;

				var str = "";
				for (var i = 0; i < data_list.length; i++) {
					str += "<option value=" + data_list[i].id + ">" + data_list[i].name + "</option>"

				}
				$(target).html(str);
			}
		}
	});
}
$("#brandForm").submit(function (e) {
	e.preventDefault();
	var name = $("#add_brand_name").val();
	$.ajax({
		type: "POST",
		dataType: "JSON",
		url: "api/add_brand_name.php",
		data: { name: name },
		success: function (json) {
			if (json.status == 200) {
				alert(json.msg);
				$("#barndModal").modal('hide');
				document.getElementById("brandForm").reset();
				loadBrand("#brand_name");
				loadBrand("#update_brand_name");
			}
			else {
				alert(json.msg);
			}

		}
	})

})
function editDetail(getid) {
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var json = JSON.parse(this.responseText);
			var data = json.data;

			document.getElementById("update_brand_id").value = data.id;
			document.getElementById("update_brand_name").value = data.name;
			document.getElementById("update_product_name").value = data.product_name;
			document.getElementById("update_description").value = data.description;
			document.getElementById("update_unit").value = data.unit;
			document.getElementById("update_weight").value = data.weight;
			document.getElementById("update_price").value = data.price;
		}
	}
	xhttp.open("GET", "api/getProductList.php?id=" + getid, true);
	xhttp.send();
};
