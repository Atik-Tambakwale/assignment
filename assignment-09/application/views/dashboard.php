  <?php
	defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view('admin/header');
  $this->load->view('admin/sidebar');
	?>
  <a href=""></a>
  <a href=""></a>
  <section class="content">
  	<div class="container-fluid">
 <?php
        echo "<pre>";
            print_r($_SESSION);
        echo "</pre>";
        
    ?>
  	</div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
$this->load->view('admin/footer');
if(isset($_GET['state'])){
  echo "<script>$.toast({
						heading: 'Log in inforamtion',
						text: 'user is logged in successfully',
						icon: 'success',
						position: 'top-right',
					});</script>";
}
?>