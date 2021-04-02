<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('layout/header');
$this->load->view('layout/sidebar');

?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DashBoard</h1>
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
     
      <div class="card">
      
      
        <div class="card-body">
        <h3>WELCOME , <?php echo $this->session->userdata('name');?> user to Our System </h3>
        <table class="table table-bordered table-striped">
            <thead>
              <th colspan="2"><h4>USER DETAILS</h4></th>
            </thead>
            <tbody>
              <tr>
                <td> NAME</td>
                <td><?php echo $this->session->userdata('name'); ?></td>                
              </tr>
              <tr>
                 <td>EMAIL</td>
                <td><?php echo $this->session->userdata('email'); ?></td>
              </tr>
            </tbody>
          </table>
          <!-- <?php
          /* echo "<pre>"; 
          echo print_r($_SESSION);
          echo "</pre>" */
          ?> -->
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
	<?php
	
	$this->load->view('layout/footer');
	
	?>