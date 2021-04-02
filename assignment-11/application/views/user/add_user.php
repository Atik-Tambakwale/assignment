<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('layout/header');
$this->load->view('layout/sidebar');

?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>DashBoard/Register</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">User</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>
<section class="content">

	<div class="card card-primary m-2">
		<div class="card-header">
			<h3 class="card-title"><h4>ADD Member Details</h4></h3>
			<div class="card-tools">
			</div>
		</div>
		<div class="card-body" style="padding:15px;margin:10px;">
			<?php echo form_open('',['id'=>'create_user_form','data-parsley-validate'=>'true'])?>
					<div class="row">
						<div class="col-xl-3">
							<div class="form-group">
								<label class="">MEMBER ID</label>
								<input type="number" class="form-control" id="u_MEMBER_ID" placeholder="Enter ID Number" data-parsley-required="true">
							</div>
						</div>
						<div class="col-xl-3">
							<div class="form-group">
								<label class="">MEMBER TYPE</label>
								<input type="text" class="form-control" id="u_MEMBER_TYPE" placeholder="Enter Number" data-parsley-required="true">
							</div>
						</div>
						<div class="col-xl-3">
							<div class="form-group">
								<label class="">TITLE</label>
								<select class="form-control select2bs4" id="u_TITLE" style="width: 100%;" data-parsley-required="true">
									<option value="">------</option>
									<option value="SHRI.">SHRI</option>
									<option value="MR.">MR</option>
									<option value="MRS.">MRS</option>
									<option value="MISS.">MISS</option>
									<option value="DR.">DR</option>
								</select>
								<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-xl-3">
							<div class="form-group">
								<label class="">NAME</label>
								<input type="text" class="form-control" id="u_NAME" placeholder="Name" data-parsley-required="true">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="">CITY</label>
										<input type="text" class="form-control" id="u_CITY" placeholder="CITY" data-parsley-required="true">
									</div>
									
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="">PIN</label>
										<input type="text" class="form-control" id="u_PIN" placeholder="PIN" data-parsley-required="true">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<label class="">ADDRESS 1</label>
									<textarea class="form-control" name="u_ADDRESS_1" id="u_ADDRESS_1" rows="5" placeholder="Address" data-parsley-required="true"></textarea>
								</div>
								<div class="col-sm-3">
									<label class="">ADDRESS 2</label>
									<textarea class="form-control" name="u_ADDRESS_2" id="u_ADDRESS_2" rows="5" placeholder="Address" data-parsley-required="true"></textarea></div>
								<div class="col-sm-3">
									<label class="">ADDRESS 3</label>
									<textarea class="form-control" name="u_ADDRESS_3" id="u_ADDRESS_3" rows="5" placeholder="Address" data-parsley-required="true"></textarea>
								</div>
								<div class="col-sm-3">
									<label class="">ADDRESS 4</label>
									<textarea class="form-control" name="u_ADDRESS_4" id="u_ADDRESS_4" rows="5" placeholder="Address" data-parsley-required="true"></textarea>	
								</div>
							</div>
						</div>

						<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-8">
								<div class="form-group">
									<label class="">EMAIL</label>
									<input type="email" class="form-control"  id="u_EMAIL" placeholder="Email ID" data-parsley-required="true">
								</div>
							</div>
							<div class="col-xl-4">
								<div class="form-group">
									<label class="">MOBILE</label>
									<input type="NUMBER" class="form-control" id="u_MOBILE" placeholder="Mobile Number" data-parsley-required="true">
								</div>
							</div>
						</div>
							<div class="row">
								<div class="col-xl-4">
									<div class="form-group">
										<label class="">MONTH</label>
										<select class="form-control select2bs4" id="u_MONTH" data-parsley-required="true">
											<option value="">-----</option>
											<option value="JAN">JAN</option>
											<option value="FEB">FEB</option>
											<option value="MAR">MAR</option>
											<option value="APR">APR</option>
											<option value="MAY">MAY</option>
											<option value="JUN">JUN</option>
											<option value="JUL">JUL</option>
											<option value="AUG">AUG</option>
											<option value="SEP">SEP</option>
											<option value="OCT">OCT</option>
											<option value="NOV">NOV</option>
											<option value="DEC">DEC</option>
										</select>
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label class="">YEAR</label>
										<input type="number" class="form-control" id="u_YEAR" placeholder="Year" data-parsley-required="true">
									</div>
								</div>
								<div class="col-xl-4">
									<div class="form-group">
										<label class="">DESTFILE</label>
										<select class="form-control select2bs4 " id="u_DESTFILE" style="width: 100%;" data-parsley-required="true">
											<option value="">------</option>
											<option value="ABR">ABR</option>
											<option value="TMW">TMW</option>
										</select>
									</div>
									
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">MAGRETURN</label>
										<select class="form-control select2bs4 " id="u_MAGRETURN" style="width: 100%;" data-parsley-required="true">
											<option value="">------</option>
											<option value="TRUE">TRUE</option>
											<option value="FALSE">FALSE</option>
										</select>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">STOP MAIL</label>
										<select class="form-control select2bs4 " id="u_STOPMAIL" style="width: 100%;" data-parsley-required="true">
											<option value="">------</option>
											<option value="TRUE">TRUE</option>
											<option value="FALSE">FALSE</option>
										</select>
									</div>
								</div>	
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">EXPIRED</label>
										<select class="form-control select2bs4 " id="u_EXPIRED" style="width: 100%;" data-parsley-required="true">
											<option value="">------</option>
											<option value="1">TRUE</option>
											<option value="0">FALSE</option>
										</select>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">HANDELV</label>
										<select class="form-control select2bs4 " id="u_HANDELV" style="width: 100%;" data-parsley-required="true">
											<option value="">------</option>
											<option value="1">TRUE</option>
											<option value="0">FALSE</option>
										</select>
									</div>
								</div>
								
							</div>
					</div>
					<button type="submit" class="btn btn-primary" style="margin-left: 10px;">SAVE</button>
				<?php echo form_close()?> 
		</div>
		<!-- /.card-body -->
	

	</div>
</section>
<?php
	$this->load->view('layout/footer');
?>

	