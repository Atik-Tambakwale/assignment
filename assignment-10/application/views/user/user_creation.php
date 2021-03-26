<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('layout/header');
$this->load->view('layout/sidebar');

?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DashBoard/User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
	  <div class="row">
		  <div class="col-sm-4">
			  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Creation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open('',['id'=>'create-form','data-parsley-validate'=>'true'])?>
                <div class="card-body">
				          <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter email" data-parsley-required="true">
                  </div>
				          <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="number" class="form-control" name="user_mobile" id="user_mobile" placeholder="Enter Mobile" parsley-maxlength="10"  data-parsley-required="true">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="user_email" placeholder="Enter email" data-parsley-required="true">
                  </div>
                  <div class="form-group">
					          <label for="">User Type</label>
                    <select class="form-control" name="user_type" id="user_type" data-parsley-required="true"></select>
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
                <div id="user-list">
                </div>
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
                           </div>
            </div>
          </div>
		  </div>
	  </div>
      
    </section>
    <div class="modal fade" id="edit_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update User Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <?php echo form_open('',["id"=>"update_form","data-parsley-validate"=>"true"]) ?>
            <div class="modal-body">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control"  id="updated_name" placeholder="Enter email" data-parsley-required="true">
              </div>
              <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="number" class="form-control" id="updated_mobile" placeholder="Enter Mobile" parsley-maxlength="10"  data-parsley-required="true">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="updated_email" placeholder="Enter email" data-parsley-required="true">
              </div>
              <div class="form-group">
                <label for="">User Type</label>
                <select class="form-control" id="updated_type" data-parsley-required="true"></select>
              </div>
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

	<?php
	$this->load->view('layout/footer');
	?>
	