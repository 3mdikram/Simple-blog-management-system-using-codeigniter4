<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?php echo base_url(); ?>/profile/blank_profile/blank_profiles.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Entity</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>/profile/blank_profile/blank_profiles.jpg" class="img-circle elevation-2">
      </div>
      <div class="info">
        <a href="<?php echo base_url() ;?>Auth/Profile" class="d-block"><?php 
        $session = \Config\Services::session();
        echo $session->isLoginUserAdmin; ?></a>
      </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo base_url('Auth/Dashboard');?>" class="nav-link homeactive">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="New_Users" class="newUsers nav-link">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              Show/Add Users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="ToDoList" class="todolistActive nav-link">
          <i class='fas fa-plus-circle'></i>
            <p>
              To Do List
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Auth/Show_Users');?>" class="stusers nav-link">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>
              Show Total Users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Auth/Bank');?>" class="bankactive nav-link">
            <i class="nav-icon fas fa-landmark"></i>
            <p>
              Show Bank Account
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Auth/Salary');?>" class="salaryactive nav-link">
            <i class="nav-icon far fa-money-bill-alt"></i>
            <p>
              Show Total Salary
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Auth/Search');?>" class="searchactive nav-link">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>
              Search Users
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Auth/User_Attendence');?>" class="attendActive nav-link">
            <i class="nav-icon 	fas fa-calendar-minus"></i>
            <p>
              Show Attendence
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Auth/Post_News');?>" class="postNewsActive nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Post News
            </p>
          </a>
        </li>
        <?php if(!LoggedIn()) : ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clock"></i>
            <p>
              Show Daily Work Report
            </p>
          </a>
        </li>
        <?php else: ?>
          <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-clock"></i>
            <p>
              You LoggedIn
            </p>
          </a>
        </li>
        <?php endif ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>