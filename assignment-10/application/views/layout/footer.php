</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.js" integrity="sha512-9yoLVdmrMyzsX6TyGOawljEm8rPoM5oNmdUiQvhJuJPTk1qoycCK7HdRWZ10vRRlDlUVhCA/ytqCy78+UujHng==" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/js/parsley.min.js"></script>
<script src="<?=base_url()?>assets/select2/js/select2.full.min.js"></script>
<script src="<?=base_url()?>assets/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
<script src="<?=base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/userAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/AppUserAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/PropertyTypeAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/PropertyUnitAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/DocumentTypeAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/PropertyAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/DocumentUploadAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/NotificationAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/MissingDocumentAjaxMethods.js"></script>

<script>
$(function() {
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });
});
</script>

<script>
  $(document).ready(function(){
    loadUserType("#user_type");
    loadUserType("#app_type");
    loadUserType("#updated_type");
    displayUserList("#user-list");
    displayAUList("#app-list");
    displayPTList("#pt-list");
    displayPUList("#pu-list");
    displayDTList("#dt-list");
    loadPropertyType("#pt_type");
    loadPropertyUnit("#pu_unit");
    displayProperty("#load-property-list");
    loadUserType("#updated_app_type");
    loadPropertyType("#updated_pt_type");
    loadPropertyUnit("#updated_pu_unit");
    DeleteProperties("#delete-property-lists");
    loadPropertyUsername("#du_name");
    loadDocumentType("#du_document");
    loadPropertyUsername("#fp_name");
    loadDocumentType("#fp_document");
    displayNotificationList("#notification-list");
    displayUpcomingNotificationList("#upcoming-list");
    loadPropertyUAS("#nfn_name");
    loadPropertyRMD("#nfn_type");
    loadPropertyUAS("#md_name");
    loadDocumentType("#md_document");
    loadPropertyUAS("#mdf_name");
    loadPropertyUAS("#update_md_name");
    loadDocumentType("#update_md_document");
  });
</script>
 
</body>
</html>
