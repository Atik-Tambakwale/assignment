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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/
r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,
b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/
datatables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.js" integrity="sha512-9yoLVdmrMyzsX6TyGOawljEm8rPoM5oNmdUiQvhJuJPTk1qoycCK7HdRWZ10vRRlDlUVhCA/ytqCy78+UujHng==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js" integrity="sha512-qzgd5cYSZcosqpzpn7zF2ZId8f/8CHmFKZ8j7mU4OUXTNRd5g+ZHBPsgKEwoqxCtdQvExE5LprwwPAgoicguNg==" crossorigin="anonymous"></script>

<script src="<?=base_url()?>assets/js/parsley.min.js"></script>
<script src="<?=base_url()?>assets/select2/js/select2.full.min.js"></script>
<script src="<?=base_url()?>assets/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.widgets.min.js" integrity="sha512-dj/9K5GRIEZu+Igm9tC16XPOTz0RdPk9FGxfZxShWf65JJNU2TjbElGjuOo3EhwAJRPhJxwEJ5b+/Ouo+VqZdQ==" crossorigin="anonymous"></script>
<!-- <script src="assets/datatables/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/filtering/type-based/accent-neutralise.js"></script>

<script src="<?=base_url()?>assets/daterangepicker/daterangepicker.js"></script>

<script src="<?=base_url()?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/loginAjaxMethods.js"></script>
<script src="<?php echo base_url()?>AjaxMethods/userAjaxMethods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<script>
  $(document).ready(function(){
   
  function load_KSA_list(/* page, *//* search *//* ,filter_coloumnName,order_type */) {
  
    //var search = $("#searchBox").val();
    /* var list_limit=$("#table-show-list").val();
    var filter_coloumnName=$("#filter-coloumnName-list").val();*/
  /*   var search = ""; */
    /*var order_type=$("#order_by").val(); */
    //var filter_coloumnName=$("#filter-coloumnName-list").val();
    $.ajax({
      url: path + "displayPList" /* +page */,
      type: "GET",
      dataType: "JSON",
      headers: {
        "Authorization": $.cookie("jwt")
      },
      data:{

      },
      success: function (data) {
        $("#tableID").html(data.list_table);
        //$("#tableID").tablesorter();
        $("#tableID").DataTable();
      }
    })
  
  }
  load_KSA_list(1);
  /*   $(document).on("click",".pagination li a",function(event){
      event.preventDefault();
      var page=$(this).data("ci-pagination-page");
      load_KSA_list(page);
    })
    $("#searchBox").on("keyup", function() {
      var search = $("#searchBox").val();
     load_KSA_list(1);
     //$("#tableID").tablesorter();
    })
    $("#table-show-list").change(function(){
      var list_limit=$("#table-show-list").val();
     load_KSA_list(1);
     //$("#tableID").tablesorter();
    }) */
     /* $(document).on("keyup",".dataTables_wrapper  .dataTables_filter input[type='search']",function(event){
      var search=$(this).val();
       //load_KSA_list(1,search);
      //alert(search);
    })/* 
     $(document).on("change",".dataTables_wrapper .dataTables_length select[name='tableID_length']",function(event){
      var list_limit =$(this).val();
      //a(list_limit);
       load_KSA_list(1,search,list_limit);
      //alert(search);
    }) */

     /* $("#filter-coloumnName-list").change(function(){
      var filter_coloumnName=$("#filter-coloumnName-list").val();
     load_KSA_list(1);
    })
    $("#order_by").change(function(){
      var order_type=$("#order_by").val();
     load_KSA_list(1);
    }) */
     
  /* $('#tableID').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
    url:path+"Ajax_pagination/pagination",
    type:"POST"
   },
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'pdf', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  }); */
/* */
   /*  function get_columnName(name){
      var res = name.split(":");
      var n = res[0].length;
      return res[0].slice(0, n);
    }
    function order_columnName(order_type){
      var str = order_type.slice(16, 22);
      return str.toLocaleUpperCase();
    }*/
    /* $(document).on("click",".dataTables_wrapper .dataTable thead tr[role='row'] td",function(){   
      var data1=$(this).attr("aria-label");
      var colunm_name=get_columnName(data1);
      var data2 = $(this).attr("class");
      var orderBY_name=order_columnName(data2);
      alert(colunm_name);
      alert(orderBY_name);
    //sortTable(column_name)
    });  */
 

  });
</script>
 
</body>
</html>
