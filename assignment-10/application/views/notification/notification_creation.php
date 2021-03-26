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
      <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Notification</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">UpComing Notifications</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Notification Creation</h3>
                            </div>
                            
                            <?php echo form_open('',['id'=>'create-notification-form','data-parsley-validate'=>'true'])?>
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="">Property</label>
                                  <select class="form-control select2bs4" name="" id="nfn_name" style="width: 100%;"></select>
                                </div>
                                <div class="form-group">
                                  <label for="">Type</label>
                                  <select class="form-control select2bs4" name="" id="nfn_type" style="width: 100%;"></select>
                                </div>
                                <div class="form-group ">
                                  <label>Next Date:</label>					
                                    <input type="date" class="form-control datetimepicker-input" id="next_date" data-target="#reservationdate"
                                      data-parsley-required=" true">
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
                             <div id="notification-list">
                             </div>
                          </div>
                       </div>
                          <!-- /.card-body -->
                       <div class="card-footer p-0">
                       </div>
                    </div>
                 </div>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                <div id="upcoming-list">
                
                </div>
            </div>
          </div>
        </div>
              <!-- /.card -->
      </div>
      <!-- Default box -->
	    
  </section>
    <div class="modal fade" id="edit_nt_modal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog small-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">RE-SCHEDULE DATE</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('',['id'=>'update-notification-form','data-parsley-validate'=>'true'])?>
            <input type="hidden" name="" id="update_id">
                <div class=" ">
                  <div class="form-group">
                    <label>Next Date:</label>					
                      <input type="date" class="form-control datetimepicker-input" id="update_next_date" data-target="#reservationdate"
                        data-parsley-required=" true">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">CHANGE</button>
              </div>
                    <?php 
              echo form_close()
              ?>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>

<?php	$this->load->view('layout/footer')	?>