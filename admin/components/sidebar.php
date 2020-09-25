 <!-- Sidenav -->
 <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="<?php echo navigate(landingpage($usertype)); ?>">
        <img src="<?php echo assets('logo.jpg') ?>" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle bg-transparent">
                <img alt="Image placeholder" src="<?php echo navigate('assets/img/theme/user.png'); ?>">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="<?php echo navigate('cont/logout'); ?>" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="<?php echo navigate(landingpage($usertype)); ?>">
                <img src="<?php echo assets('logo.jpg'); ?>">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        
        <ul class="navbar-nav">
          <li class="nav-item <?php echo activepage($pagename,'acc'); ?>">
            <a class="nav-link" href="<?php echo navigate('admin/accounts'); ?>">
              <i class="ni ni-single-02 text-yellow"></i> Accounts
            </a>
          </li>
          <li class="nav-item <?php echo activepage($pagename,'eng'); ?>">
            <a class="nav-link" href="<?php echo navigate('admin/engineers'); ?>">
              <i class="ni ni-paper-diploma text-success"></i> Engineers
            </a>
          </li>
          <li class="nav-item <?php echo activepage($pagename,'app'); ?>">
            <a class="nav-link" href="<?php echo navigate('admin/applist'); ?>">
              <i class="ni ni-check-bold text-blue"></i> Applications List
            </a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>