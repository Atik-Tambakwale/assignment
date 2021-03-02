<?php
		require "includes/header.php";
?>
<div class="col-md-6">
	<form action="" id="generatedFom">
		<div class="form-group">
			<label for="Product">Select Product</label>
			<select name="product_name" class="form-control" id="product_name">
				<option value="">select</option>
				<option value="bike" data-hsn="1024" data-tax="10" data-mrp="50">Bike</option>
				<option value="mobile" data-hsn="1025" data-tax="12" data-mrp="60">Mobile</option>
				<option value="laptop" data-hsn="1026" data-tax="18" data-mrp="70">Laptop</option>
				<option value="cars" data-hsn="1027" data-tax="18" data-mrp="80">Cars</option>
			</select>
		</div>
		<div class="form-group">
			<label for="HSN/SAC">HSN/SAC</label>
			<input type="text" name="code_id" class="form-control" id="code_id" disabled>
		</div>
		<div class="form-group">
			<label for="tax_percentage">Tax(%)</label>
			<input type="number" class="form-control" name="tax_percentage" id="tax_percentage" disabled>
		</div>
		<div class="form-group">
			<label for="QTY">QTY</label>
			<input type="number" name="qty" class="form-control" id="qty" value="1">
		</div>
		<div class="form-group">
			<label for="unitPrice">Unit Prices</label>
			<input type="number" class="form-control" name="mrp" id="mrp">
		</div>
		<div class="form-group">
			<label for="unitPrice">Discount %</label>
			<input type="number" class="form-control" name="discount" id="discount" value="0">
		</div>
		<div class="form-group">
			<label for="taxable">Discount Amount</label>
			<input type="number" class="form-control" name="discount_amt" id="discount_amt" disabled>
		</div>
		<div class="form-group">
			<label for="taxable">Taxable</label>
			<input type="number" class="form-control" name="taxable" id="taxable" disabled>
		</div>

		<div class="form-group">
			<label for="tax_amount">Tax Amount</label>
			<input type="number" class="form-control" name="tax_amount" id="tax_amount" disabled>
		</div>
		<div class="form-group">
			<label for="tax_amount">Total Amount</label>
			<input type="number" class="form-control" name="total_amount" id="total_amount" disabled>
		</div>
		<input type="submit" value="ADD ITEMS">
	</form>
</div>
<?php
	require "includes/footer.php";
?>

<script>
	function calculate()
	{
		var mrp = parseFloat($("#mrp").val());
		var tax = parseFloat($("#tax_percentage").val());
 		var qty = parseFloat($("#qty").val());
		var disc = parseFloat($("#discount").val());

		var taxable = qty * mrp;

		var discount = (taxable * disc) / 100;

		taxable = taxable - discount;
		var tax_amount = (taxable * tax) / 100;
		var grand_total = taxable + tax_amount;

		$("#taxable").val(taxable);
		$("#discount_amt").val(discount);
		$("#tax_amount").val(tax_amount);
		$("#total_amount").val(grand_total);
	}

	// On product Selection change
	$("#product_name").change(function(){
		$("#code_id").val($("#product_name option:selected").data("hsn"));
		$("#tax_percentage").val($("#product_name option:selected").data("tax"));
		$("#mrp").val($("#product_name option:selected").data("mrp"));
		calculate();
	});

	// On Qty change
	$("#qty").change(function(){
		calculate();
	});

	// On MRP change
	$("#mrp").change(function(){
		calculate();
	});

	// On Discount percent change
	$("#discount").change(function(){
		calculate();
	});

	// Reference
	// https://demo.hisaabwaale.in
	// Username: admin
	// Password: admin123
</script>
