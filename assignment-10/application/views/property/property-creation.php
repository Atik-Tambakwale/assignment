<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('layout/header');
$this->load->view('layout/sidebar');

?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DashBoard/Properties</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Property</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="card card-primary card-outline card-outline-tabs">
	<div class="card-header p-0 border-bottom-0">
		<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Register Property</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Properties List</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Document Upload</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Deleted Properties</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="custom-tabs-four-missing-tab" data-toggle="pill" href="#custom-tabs-four-missing" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Missing Document</a>
			</li>
		</ul>
	</div>
	<div class="card-body">
		<div class="tab-content" id="custom-tabs-four-tabContent">
			<div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
				<?php echo form_open('',['id'=>'create-property-form','data-parsley-validate'=>'true'])?>
					<div class="row">
						<div class="col-xl-3">
							<div class="form-group">
								<label class="property_type">Property Type</label>
								<select class="form-control select2bs4" id="pt_type" style="width: 100%;">
								</select>
								<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-xl-3">
							<div class="form-group">
								<label class="">Name</label>
								<input type="text" class="form-control" name="name" id="pt_name" placeholder="Name" data-parsley-required="true">
							</div>
						</div>
						<div class="col-xl-2">
							<div class="form-group">
								<label class="">Property Id </label>
								<input class="form-control" type="text" id="pt_id" placeholder="Property Id" data-parsley-required="true">
							</div>
						</div>
						<div class="col-xl-2">
							<div class="form-group">
								<label class="">Site / Serve No</label>
								<input type="text" class="form-control" id="pt_site_no" placeholder="Site No" data-parsley-required="true">
							</div>
						</div>
						<div class="col-xl-2">
							<div class="form-group">
								<label class="">Sas No </label>
								<input type="text" class="form-control" id="sas_no" placeholder="Sas No">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4">
							<label class="">Address</label>
							<textarea class="form-control" id="address" rows="5" placeholder="Address"></textarea>
						</div>
						<div class="col-xl-8">
							<div class="row">
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Size</label>
										<input type="text" class="form-control" id="pt_size" placeholder="Size" >
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Unit</label>
										<select class="form-control select2bs4 " id="pu_unit" style="width: 100%;" >
										</select>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Latitude</label>
										<input type="text" class="form-control" id="p_lat" placeholder="Latitude">
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Longitude</label>
										<input type="text" class="form-control" id="p_long" placeholder="Longitude">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Status</label>
										<select class="form-control" name="status" id="status">
											<option value="">Select Status</option>
											<option value="RENTED">RENTED</option>
											<option value="SOLD">SOLD</option>
											<option value="LEASED">LEASED</option>
											<option value="OWNED">OWNED</option>
										</select>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Purchase Year</label>
										<input type="text" class="form-control" id="p_year"   placeholder="Purchase Year">
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Owner Name</label>
										<input type="text" class="form-control" id="p_oname"  placeholder="Owner Name">
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Owner Mobile </label>
										<input type="text" class="form-control"  id="p_omobile"  placeholder="Owner Mobile">
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">SAVE</button>
				<?php echo form_close()?> 
			</div>
			<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
				<div class="col-md-12 col-12">
				<div id="load-property-list"></div>
				</div>
			</div>
			<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
				<div class="row">
					<div class="col-xl-4">
					<?php echo form_open_multipart('',['id'=>'document_upload','data-parsley-validate'=>'true'])?>
						<div class="form-group">
							<label for="">Property</label>
							<select class="form-control select2bs4" name="" id="du_name" style="width: 100%;"></select>
						</div>
						<div class="form-group">
							<label for="">Document</label>
							<select class="form-control select2bs4" name="" id="du_document" style="width: 100%;"></select>
						</div>
						<div class="form-group">
							<label for="">Document No.</label>
							<input type="text" id="du_doc_no" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Description</label>
							<input type="text" id="du_desc" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Document Upload</label><br>
							<input type="file" name="pdf_file" id="pdf_file">
						</div>
						<button type="submit" class="btn btn-primary">UPLOAD</button>
					<?php echo form_close()?>
					</div>
					<div class="col-xl-8">
						
							<?php echo form_open('',['id'=>'filter-form','data-parsley-validate'=>'true'])?>
									<div class="row">
										<div class="col-xl-6">
										<div class="form-group ">
											<label for="">Property</label>
											<select class="form-control select2bs4" id="fp_name" style="width: 100%;"></select>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="form-group ">
											<label for="">Document</label>
											<select class="form-control select2bs4" id="fp_document" style="width: 100%;"></select>
										</div>
										</div>
									</div>
								 
							<?php echo form_close()?>
						
						<div class="row">
							<div class="col-12">
								<div class="card-body" id="doc-list">

								</div>
							</div>
						</div>
					</div>
				</div> 
			</div>
			<div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
				<div id="delete-property-lists">
				</div>
			</div>
			<div class="tab-pane fade" id="custom-tabs-four-missing" role="tabpanel" aria-labelledby="custom-tabs-four-missing-tab">
				<div class="row">
					<div class="col-xl-4">
					<?php echo form_open_multipart('',['id'=>'missing_document','data-parsley-validate'=>'true'])?>
						<div class="form-group">
							<label for="">Property</label>
							<select class="form-control select2bs4" name="" id="md_name" style="width: 100%;"></select>
						</div>
						<div class="form-group">
							<label for="">Document</label>
							<select class="form-control select2bs4" name="" id="md_document" style="width: 100%;"></select>
						</div>
						<div class="form-group">
							<label for="">Remark</label>
							<input type="text" id="md_remark" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary">ADD</button>
					<?php echo form_close()?>
					</div>
					<div class="col-xl-8">
							<?php echo form_open('',['id'=>'filter-form','data-parsley-validate'=>'true'])?>
									<div class="row">
										<div class="col-xl-6">
										<div class="form-group ">
											<label for="">Property</label>
											<select class="form-control select2bs4" id="mdf_name" style="width: 100%;"></select>
										</div>
									</div>
								 
							<?php echo form_close()?>
						
						<div class="row">
							<div class="col-12">
								<div class="card-body" id="mdoc-list">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="edit-property-modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Property Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php echo form_open('',['id'=>'updated-property-form','data-parsley-validate'=>'true'])?>
					<div class="row">
						<div class="col-xl-3">
						<input type="hidden" name="id" id="updated_id">
							<div class="form-group">
								<label class="property_type">Property Type</label>
								<select class="form-control " id="updated_pt_type" >
								</select>
								<span class="text-danger"></span>
							</div>
						</div>
						<div class="col-xl-3">
							<div class="form-group">
								<label class="">Name</label>
								<input type="text" class="form-control" name="name" id="updated_pt_name" placeholder="Name" data-parsley-required="true">
							</div>
						</div>
						<div class="col-xl-2">
							<div class="form-group">
								<label class="">Property Id </label>
								<input class="form-control" type="text" id="updated_pt_id" placeholder="Property Id" data-parsley-required="true">
							</div>
						</div>
						<div class="col-xl-2">
							<div class="form-group">
								<label class="">Site / Serve No</label>
								<input type="text" class="form-control" id="updated_pt_site_no" placeholder="Site No" data-parsley-required="true">
							</div>
						</div>
						<div class="col-xl-2">
							<div class="form-group">
								<label class="">Sas No </label>
								<input type="text" class="form-control" id="updated_sas_no" placeholder="Sas No">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4">
							<label class="">Address</label>
							<textarea class="form-control" id="updated_address" rows="5" placeholder="Address"></textarea>
						</div>
						<div class="col-xl-8">
							<div class="row">
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Size</label>
										<input type="text" class="form-control" id="updated_pt_size" placeholder="Size" >
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Unit</label>
										<select class="form-control " id="updated_pu_unit"  >
										</select>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Latitude</label>
										<input type="text" class="form-control" id="updated_p_lat" placeholder="Latitude">
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Longitude</label>
										<input type="text" class="form-control" id="updated_p_long" placeholder="Longitude">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Status</label>
										<select class="form-control" name="status" id="updated_status">
											<option value="">Select Status</option>
											<option value="RENTED">RENTED</option>
											<option value="SOLD">SOLD</option>
											<option value="LEASED">LEASED</option>
											<option value="OWNED">OWNED</option>
										</select>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Purchase Year</label>
										<input type="text" class="form-control" id="updated_p_year"   placeholder="Purchase Year">
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Owner Name</label>
										<input type="text" class="form-control" id="updated_p_oname"  placeholder="Owner Name">
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-group">
										<label class="">Owner Mobile </label>
										<input type="text" class="form-control"  id="updated_p_omobile"  placeholder="Owner Mobile">
									</div>
								</div>
							</div>
						</div>
					</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">EDIT</button>
            </div>
		<?php echo form_close()?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  <div class="modal fade" id="editdt_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Document</h4>
             
            </div>
			<?php echo form_open('',["id"=>"update_dt_form","data-parsley-validate"=>"true"]) ?>
            <div class="modal-body">
			<input type="hidden" name="id" id="updated_id">
              	<div class="form-group">
					<label for="name">Document Name</label>
					<input type="text" class="form-control" id="updated_dt_name" placeholder="Enter Name" data-parsley-required="true">
				</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
			<?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  <div class="modal fade" id="edit-owner-modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Document</h4>
             
            </div>
			<?php echo form_open('',["id"=>"update_o_form","data-parsley-validate"=>"true"]) ?>
            <div class="modal-body">
			<input type="hidden" name="id" id="updated_o_id">
              <div class="form-group">
				<label class="">Owner Name</label>
				<input type="text" class="form-control" id="updated_o_oname"  placeholder="Owner Name" data-parsley-required="true">
			  </div>
			  <div class="form-group">
				<label class="">Owner Mobile </label>
				<input type="text" class="form-control"  id="updated_o_omobile"  placeholder="Owner Mobile" data-parsley-required="true">
			  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
			<?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  <div class="modal fade" id="edit_md_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Missing Document</h4>
             
            </div>
			<?php echo form_open('',["id"=>"update_md_form","data-parsley-validate"=>"true"]) ?>
            <div class="modal-body">
			<input type="hidden" name="id" id="updated_id">
             	<div class="form-group">
					<label for="">Property</label>
					<select class="form-control" name="" id="update_md_name"></select>
				</div>
				<div class="form-group">
					<label for="">Document</label>
					<select class="form-control" name="" id="update_md_document"></select>
				</div>
				<div class="form-group">
					<label for="">Remark</label>
					<input type="text" id="update_md_remark" class="form-control">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
            </div>
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<?php
	$this->load->view('layout/footer');
?>

	