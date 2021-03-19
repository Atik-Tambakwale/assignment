<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('admin/header');
  $this->load->view('admin/sidebar');

?>
<div class="row">
  <div class="col-sm-3 ml-4">
      <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title">User Creation</h3>
        </div>
        <input type="hidden" name="host" id="host" value="<?=base_url()?>">
        <?php echo form_open('', ["id" => "create-form", "data-parsley-validate" => true])?>  
        <div class="card-body">  
            <div class="form-group">
              <label for="exampleInputEmail1">Full Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter User Name" data-parsley-required =" true">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" data-parsley-required =" true">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" data-parsley-required =" true">
            </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        <?php echo form_close()?>
  </div>
  </div>
  
  <div class="col-md-6">
    <div class="card card-primary">
					<div class="card-header ">
						<h3 class="card-title">User List Table</h3>
					</div>
					<!-- /.card-header -->
          <div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px"> User Name</th>
									<th>Email Address</th>
									<th>ACTIONS</th>
								</tr>
							</thead>
							<tbody id="list">

              </tbody>
						</table>
					</div>
		</div>
  </div>
</div>
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
            <label for="exampleInputEmail1">Full Name:</label>
            <input type="text" class="form-control" id="updated_name" placeholder="Enter User Name" data-parsley-required =" true">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="updated_email" placeholder="Enter email" data-parsley-required =" true">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" id="updated_password" placeholder="Password" data-parsley-required =" true">
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
    $this->load->view('admin/footer');
    echo "<script>$(document).ready(function(){
      displayList('#list');
      
    });</script>";
?>