<?php
require "./api/config/db_connection.php";
require "./includes/header.php";
?>
<div class="row">
<div class="col-md-4">
<form method="post" id="orderForm">
  <div class="form-group">
    <label for="Band Name">Brand name</label>
    <select class="form-control" id="brand_name" name="brand_name" >
		<option value="">Select Brand</option>
		<option></option>
    </select>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#barndModal">ADD Product Brand</button>
  </div>
  <div class="form-group ">
    <label for="Product_Name">Product Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" required>
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
  </div>
	<div class="form-group">
    <label for="numberOfUnit">Units</label>
    <select class="form-control" id="unit" name="unit">
		<option value="">Please Select Your Unit</option>
		<option value="kilogram">KG(1000 gram)</option>
		<option value="hectogram">HG(100 grams)</option>
		<option value="decagram">DG(10 gram)</option>
		<option value="gram">G(1 gram)</option>
		</select>
  </div>
	<div class="form-group">
    <label for="exampleFormControlInput1">Product of Weight</label>
    <input type="number" class="form-control" id="weight" name="weight" placeholder="" required>
  </div>
	<div class="form-group">
    <label for="exampleFormControlInput1">MRP Price</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="" required>
  </div>
	<div class="form-group">
    <label for="exampleFormControlInput1">Quatity of Product</label>
    <input type="number" class="form-control" id="qty" name="qty" placeholder="" required>
  </div>
	 <button type="submit" class="btn btn-primary" >Submit</button>
	 
</form>
</div>
<div class="col-md-8" id="users-list"></div>
</div>
<div class="modal fade" id="barndModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form method="post" id="brandForm">
      <div class="modal-body">
			
        <div class="form-group">
    				<label for="exampleFormControlInput1">ADD YOUR BRAND NAME</label>
    				<input type="text" class="form-control" id="add_brand_name" name="brandName" placeholder="" required>
 				</div>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="addBrandName">ADD</button>
      </div>
			</form>
    </div>
  </div>
</div>
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<form method="post" name="updateForm" id="updateForm" >
						<div class="form-group ">
							<input type="hidden" class="form-control" id="update_brand_id" name="brand_id" required>
						</div>				
						<div class="form-group">
							<label for="Band Name">Brand name</label>
							<select class="form-control" id="update_brand_name" name="brand_name" >
							
							</select>
						</div>
						<div class="form-group ">
							<label for="Product_Name">Product Name</label>
							<input type="text" class="form-control" id="update_product_name" name="product_name" required>
						</div>
						<div class="form-group">
							<label for="description">Description:</label>
							<textarea class="form-control" id="update_description" name="description" rows="3" ></textarea>
						</div>
						<div class="form-group">
							<label for="numberOfUnit">Units</label>
							<select class="form-control" id="update_unit" name="unit">
							<option value="">Please Select Your Unit</option>
							<option value="kilogram">KG(1000 gram)</option>
							<option value="hectogram">HG(100 grams)</option>
							<option value="decagram">DG(10 gram)</option>
							<option value="gram">G(1 gram)</option>
							</select>
						<div class="form-group">
							<label for="exampleFormControlInput1">Product of Weight</label>
							<input type="number" class="form-control" id="update_weight" name="weight" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">MRP Price</label>
							<input type="number" class="form-control" id="update_price" name="price" placeholder="" required>
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Quatity of Product</label>
							<input type="number" class="form-control" id="update_qty" name="qty" placeholder="" required>
						</div>
						 <button type="submit" name="submit" class="btn btn-primary"S>Update</button>
					</form>

      </div>

    </div>
  </div>
</div>

<?php require "./includes/footer.php"?>
<script>
	$(document).ready(function(){
		fetch_users("#users-list");
		loadBrand("#brand_name");
		loadBrand("#update_brand_name");
	});
</script>