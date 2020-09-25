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
                <img alt="Image placeholder" src="<?php echo assets('img/theme/user.png'); ?>">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
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
            <a class="nav-link" href="<?php echo navigate('account'); ?>">
              <i class="ni ni-single-02 text-yellow"></i>  My Account
            </a>
          </li>
          <li class="nav-item <?php echo activepage($pagename,'status'); ?>">
            <a class="nav-link" href="<?php echo navigate('appstat'); ?>">
              <i class="ni ni-check-bold text-blue"></i> Applications Status
            </a>
          </li>
          <li class="nav-item <?php echo activepage($pagename,'mechanical'); ?>">
            <a class="nav-link" href="<?php echo navigate('mechanical_permit'); ?>">
              <i class="ni ni-bullet-list-67 text-orange"></i> Apply for Mechanical Permit
            </a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>