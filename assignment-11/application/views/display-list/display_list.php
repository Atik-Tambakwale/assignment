<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('layout/header');
$this->load->view('layout/sidebar');

?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DashBoard/LISTS</h1>
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
<div class="card-header m-4">
                <h3 class="card-title ">
                  <div class="input-group" style="display:flex;">
                    <span style="font-size: 16px;margin-top:7px;"> Show list &nbsp</span>
                    <select name="" class="form-control float-left" id="table-show-list" style="width: 100px;">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select> 
                    <span style="font-size: 16px;margin-top:7px;">&nbspEntries</span>
                  </div>
                </h3>
                <div class="card-tools" style="display:inherit;">
                  <div class="input-group" style="width: 350px;display:flex;">
                    <input type="text" name="table_search" id="searchBox" class="form-control float-right" placeholder="Search">
                   <!--  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                  </div>
                </div>
 </div>
	<div class="card-body">
        <div class="col-xl-12">
					<div class="table-response" id="load-KSA-list"></div>
          <div align="right" id="pagination_link"></div>
         
         
          <button type="button" class="btn btn-primary" id="export-pdf-btn">Export PDF</a>
          <?php echo form_close()?>
          
          <button type="button" class="btn btn-success" id="export-excel-btn">Export Excel</a>
          
        </div>
	</div>
  
			
</div>
<?php
	$this->load->view('layout/footer');
?>

	