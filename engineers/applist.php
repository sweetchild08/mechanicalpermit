<?php
  $pagename='Application Lists';
  include_once 'addins/eng-addins.php';
  include_once '../addins.php';
?>
<!DOCTYPE html>
<html>
  <?php include 'components/headtag.php' ?>
<body>
 <!-- Sidebar -->
<?php include 'components/sidebar.php'; ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Topbar -->
    <?php include 'components/topbar.php'; ?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
        <?php include 'components/msg.php' ?>
          <!-- Card stats -->
          <div class="row">
            
          <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Payment Done</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <?php echo $db->run('select * from m_applications where status=:status',['status'=>'payment done'])->rowCount(); ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Approved</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <?php echo $db->run('select * from m_applications where status=:status',['status'=>'approved'])->rowCount(); ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                        <i class="ni ni-check-bold"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <?php echo $db->run('select * from m_applications where status=:status',['status'=>'pending'])->rowCount(); ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="ni ni-user-run"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Declined</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <?php echo $db->run('select * from m_applications where status=:status',['status'=>'declined'])->rowCount(); ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="ni ni-fat-remove"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
     <!-- Dark table -->
     <div class="row mt-5">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <div class="container-fluid row align-items-center">
                <div class="col-md-6 col-sm-12"><h3 class="text-white mb-0">Permit Applications List</h3></div>
                <!-- Form -->
                <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="form-group mb-0" >
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                      </div>
                      <input class="form-control" placeholder="Search" type="text" name="keyword">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Application No.</th>
                    <th scope="col">Applicant</th>
                    <th scope="col">Permit type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($_GET['keyword']))
                  {
                    $key=$_GET['keyword'];
                    $col=is_numeric($key)?"m.app_no=$key":"u.name like '%$key%'";
                    $where= " where $col";
                  }
                    $rows=$db->rows('select * from m_applications as m inner join user as u on m.user=u.username order by m.app_no desc'.($where??''));
                    foreach($rows as $row)
                    {
                      $ispending=$row->status=='pending';
                  ?>
                        <tr>
                          <th scope="row">
                            <div class="media align-items-center">
                              <div class="media-body">
                                <span class="mb-0 text-sm"><?php echo numstringify($row->app_no); ?></span>
                              </div>
                            </div>
                          </th>
                          <td class="text-uppercase">
                            <?php echo $row->name; ?>
                          </td>
                          <td class="text-uppercase">
                            <?php echo $row->permit_type; ?>
                          </td>
                          <td>
                            <span class="badge badge-dot mr-4 text-uppercase">
                              <?php 
                                $stat=$row->status;
                                if($stat=='pending')
                                  $stat='bg-warning';
                                else if($stat=='declined')
                                  $stat='bg-danger';
                                else if($stat=='approved')
                                  $stat='bg-success';
                                else if($stat=='payment done')
                                  $stat='bg-primary';
                                echo '<i class="'.$stat.'"></i>'.$row->status; 
                              ?>
                              
                            </span>
                          </td>
                          <td class="text-center">
                            <button class="btn btn-<?php echo $ispending?'info':'primary' ?> btn-sm" onclick="window.location.href='<?php echo navigate('engineers/application-view?id='.$row->app_no); ?>'"><?php echo $ispending?'Assess':'View' ?></button>
                          </td>
                        </tr>
                    <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include 'components/footer.php' ?>
    </div>
  </div>
  <?php include 'components/myscripts.php' ?>
</body>

</html>