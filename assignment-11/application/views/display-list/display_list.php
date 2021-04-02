<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('layout/header');
$this->load->view('layout/sidebar');

?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DashBoard/Member Lists</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Member List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
<div class="card card-primary card-outline card-outline-tabs">
 	<div class="card-body">
        <div class="col-xl-12">
           <input type='hidden' id='sort' value='asc'>
					<div class="table-response" id="load-KSA-list">
            <table id="tableID" class="table table-bordered" style="font-size:9px;table-layout:fixed;width:100%;word-break:break-all;">

            </table>
          </div>
          <div class="row">
              <div class="col-xl-6 mt-3">
                  <div class="row" style="margin-left: -7px;">
                    <?php echo form_open_multipart('',['id'=>'excel_file_upload','data-parsley-validate'=>'true'])?>
                        <div class="col-sm-10 ">
                          <div class="form-group">
                            <label for="">Import Excel Sheet (Only .xlsx, .xls, .csv Extension File) </label><br>
                            <input type="file" name="excel_file" id="excel_file" placeholder="select xls,csv,xlsx extensions" data-parsley-required="true">
                          </div>
                        </div>
                        <div class="col-sm-2"style="margin-top: 19px;" >
                            <button type="submit" id="import_btn"class="btn btn-primary btn-sm">IMPORT</button>
                        </div> 
                    <?php echo form_close()?>
                  </div>
              </div>
            <!--   <div class="col-xl-6">
                    <div align="right" id="pagination_link"></div>
              </div> -->
          </div>
          <button type="button" class="btn btn-primary" id="export-pdf-btn" data-colounm_name="" data-orderby_colunm="">Export PDF</a>
          <?php echo form_close()?>
          
          <button type="button" class="btn btn-success" id="export-excel-btn" data-colounm_name="" data-orderby_colunm="">Export Excel</a>
          
        </div>
	</div>
  
			
</div>
<?php
	$this->load->view('layout/footer');
?>

	