function displayData(target) {
	$(target).on('onchange', function () {
		var data = $(this).val();
		if (data == "bike") {
			var qty = $("#qty").val();
			var unit = $("#units").val();
			$("#code_id").val(1324);
			$("#unit").val(250);
			$("#taxable").val(0);
			$("#tax_percentage").val(0);
			$("#tax_amount").val(0);
			$("#tax_total_amount").val(0);
		}
		else if (data == "mobile") {
			var qty = $("#qty").val();
			var unit = $("#units").val();
			$("#code_id").val(1324);
			$("#unit").val(10000);
			$("#taxable").val(0);
			$("#tax_percentage").val(0);
			$("#tax_amount").val(0);
			$("#tax_total_amount").val(0);
		}
		else if (data == "laptop") {
			var qty = $("#qty").val();
			var unit = $("#units").val();
			$("#code_id").val(1324);
			$("#unit").val(15000);
			$("#taxable").val(0);
			$("#tax_percentage").val(0);
			$("#tax_amount").val(0);
			$("#tax_total_amount").val(0);
		}
		else if (data == "cars") {
			var qty = $("#qty").val();
			var unit = $("#units").val();
			$("#code_id").val(1324);
			$("#unit").val(250000);
			$("#taxable").val(0);
			$("#tax_percentage").val(0);
			$("#tax_amount").val(0);
			$("#tax_total_amount").val(0);
		}
		else {
			alert("please select option");
		}
	})
}