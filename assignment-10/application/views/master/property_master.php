<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('layout/header');
$this->load->view('layout/sidebar');

?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DashBoard/Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Properties</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<div class="card card-primary card-outline card-outline-tabs bg-light">
	<div class="card-header p-0 pt-1 border-bottom-0">
		<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">App Users</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Properties Type</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Property Units</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Document Type</a>
			</li>
		</ul>
	</div>
	<div class="card-body">
		<div class="tab-content" id="custom-tabs-three-tabContent">
			<div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
				<div class="row">
					<div class="col-sm-4">
						<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">App Users</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?php echo form_open('',['id'=>'app-form','data-parsley-validate'=>'true'])?>
							<div class="card-body">
									<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="app_name" id="app_name" placeholder="Enter email" data-parsley-required="true">
							</div>
									<div class="form-group">
								<label for="mobile">Mobile</label>
								<input type="number" class="form-control" name="app_mobile" id="app_mobile" placeholder="Enter Mobile" parsley-maxlength="10"  data-parsley-required="true">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="app_email" placeholder="Enter email" data-parsley-required="true">
							</div>
							<div class="form-group">
										<label for="">User Type</label>
								<select class="form-control" name="app_type" id="app_type" data-parsley-required="true"></select>
							</div>
							</div>
							
							<!-- /.card-body -->

							<div class="card-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						<?php 
						echo form_close()
						?>
						</div><!-- /.card -->

					</div>
					<div class="col-sm-8">
						<div class="card card-primary card-outline">
							<div class="card-body p-0">
								<div class="card-body">
									<div id="app-list"></div>
								</div>
							</div>
					
						</div>
						<!-- /.card-body -->
						<div class="card-footer p-0">
						</div>
					</div>
				</div>
	  		</div> 

			<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
				<div class="row">
		    		<div class="col-sm-4">
			  			<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Properties Type</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
              				<?php echo form_open('',['id'=>'product-type-form','data-parsley-validate'=>'true'])?>
                			<div class="card-body">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" id="pt_name" placeholder="Enter Name" data-parsley-required="true">
								</div>
				            	<div class="form-group">
									<label for="name"> Short Name</label>
									<input type="text" class="form-control" id="pt_sname" placeholder="Enter Short Name" data-parsley-required="true">
								</div>
				            	
                			</div>	
                			<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
             				<?php echo form_close() ?>
            			</div><!-- /.card -->
					</div>
		  			<div class="col-sm-8">
			  			<div class="card card-primary card-outline">
							<div class="card-body p-0">
								<div class="card-body">
								<div id="pt-list"></div>
									
											
										</tbody>
									</table>
								</div>
							</div>

            			</div>
         
						<div class="card-footer p-0">
						</div>
            		</div>
          		</div>
		    </div>

	<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
		<div class="row">
			<div class="col-sm-4">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Property Units</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<?php echo form_open('',['id'=>'property-unit-form','data-parsley-validate'=>'true'])?>
					<div class="card-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="pu_name" placeholder="Enter Property" data-parsley-required="true">
						</div>
						<div class="form-group">
							<label for="name">Short Name</label>
							<input type="text" class="form-control" id="pu_sname" placeholder="Enter Unit" data-parsley-required="true">
						</div>
					</div>	
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					<?php echo form_close() ?>
				</div><!-- /.card -->
			</div>
			<div class="col-sm-8">
				<div class="card card-primary card-outline">
					<div class="card-body p-0">
						<div class="card-body">
							<div id="pu-list"></div>
						</div>
					</div>
				</div>

				<div class="card-footer p-0">
				</div>
			</div>
          		</div> 
	</div>
	<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
		<div class="row">
			<div class="col-sm-4">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Document Type</h3>
					</div>
					<?php echo form_open('',['id'=>'Document-type-form','data-parsley-validate'=>'true'])?>
					<div class="card-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="dt_name" placeholder="Enter Name" data-parsley-required="true">
						</div>
					</div>	
					<!-- /.card-body -->
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					<?php echo form_close() ?>
				</div><!-- /.card -->
			</div>
			<div class="col-sm-8">
				<div class="card card-primary card-outline">
					<div class="card-body p-0">
						<div class="card-body">
							<div id="dt-list"></div>
						</div>
					</div>
              <!-- /.table -->
					</div>
				</div>

				<div class="card-footer p-0">
				</div>
			</div>
          		</div> 
	</div>
</div>
</div>
</div>
<div class="modal fade" id="editpu_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update User Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open('',["id"=>"update_pu_form","data-parsley-validate"=>"true"]) ?>
            
			<div class="modal-body">
              <input type="hidden" name="id" id="id">
            <div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="upadted_pu_name" placeholder="Enter Name" data-parsley-required="true">
			</div>
			<div class="form-group">
				<label for="name"> Short Name</label>
				<input type="text" class="form-control" id="upadted_pu_sname" placeholder="Enter Short Name" data-parsley-required="true">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <?php form_close()?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
	  <div class="modal fade" id="editap_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update User Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open('',['id'=>'update-app-form','data-parsley-validate'=>'true'])?>
				<div class="card-body">
					<input type="hidden" name="id" id="updated_id">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" name="app_name" id="updated_app_name" placeholder="Enter email" data-parsley-required="true">
					</div>
							<div class="form-group">
						<label for="mobile">Mobile</label>
						<input type="number" class="form-control" name="app_mobile" id="updated_app_mobile" placeholder="Enter Mobile" parsley-maxlength="10"  data-parsley-required="true">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="updated_app_email" placeholder="Enter email" data-parsley-required="true">
					</div>
					<div class="form-group">
						<label for="">User Type</label>
						<select class="form-control" name="app_type" id="updated_app_type" data-parsley-required="true"></select>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			<?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>

	
<?php	$this->load->view('layout/footer')	?>