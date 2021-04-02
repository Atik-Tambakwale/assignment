<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link" style="margin-bottom:2px;padding: 20px;">
      <img src="<?php echo base_url()?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="overflow-y: initial;">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" style="margin-left:10px;">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php
					echo $this->session->userdata('name');
					?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item has-treeview">
            <a href="<?php base_url()?>add_user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Add Member
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="<?php base_url()?>list" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                KSA Members List
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper" style="min-height: 1592.4px;">