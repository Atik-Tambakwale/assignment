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
<script type="text/javascript" src="https://cdn.datatables.net/
r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,
b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/
datatables.min.js"></script>
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
<script src="<?php echo base_url()?>AjaxMethods/loginAjaxMethods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
  
  function load_KSA_list(page) {
    var search = $("#searchBox").val();
    var list_limit=$("#table-show-list").val();
	$.ajax({
		url: path + "Ajax_pagination/pagination/" +page,
		type: "GET",
		dataType: "JSON",
    headers: {
	 		"Authorization": $.cookie("jwt")
	 	},
     data:{
       search,list_limit
     },
		success: function (data) {
			$("#load-KSA-list").html(data.list_table);
			$("#pagination_link").html(data.pagiantion_link);
		}
	})
}
  load_KSA_list(1);
      //displayListKSAMEMBER("#load-KSA-list");
    $(document).on("click",".pagination li a",function(event){
      event.preventDefault();
      var page=$(this).data("ci-pagination-page");
      load_KSA_list(page);
    })
    $("#searchBox").on("keyup", function() {
      //var search = $("#searchBox").val();
      load_KSA_list(1);
    })
    $("#table-show-list").change(function(){
     // var list_limit=$("#table-show-list").val();
      load_KSA_list(1);
    })
    //load_KSA_list(page);
  });
</script>
 
</body>
</html>
