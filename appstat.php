<?php
  $pagename='Application Status';
  include_once 'addins/user-addins.php';
  include_once 'addins.php';
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
                        <?php echo $db->run('select * from m_applications where user=:user and status=:status',['user'=>$_SESSION['user'],'status'=>'payment done'])->rowCount(); ?>
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
                        <?php echo $db->run('select * from m_applications where user=:user and status=:status',['user'=>$_SESSION['user'],'status'=>'approved'])->rowCount(); ?>
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
                        <?php echo $db->run('select * from m_applications where user=:user and status=:status',['user'=>$_SESSION['user'],'status'=>'pending'])->rowCount(); ?>
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
                        <?php echo $db->run('select * from m_applications where user=:user and status=:status',['user'=>$_SESSION['user'],'status'=>'declined'])->rowCount(); ?>
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
              <h3 class="text-white mb-0">Application List</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Application No.</th>
                    <th scope="col">Permit type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $rows=$db->rows('select * from m_applications where user=:user  order by app_no desc',['user'=>$_SESSION['user']]);
                    foreach($rows as $row)
                    {
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
                          <td>
                            <button class="btn btn-primary btn-sm" onclick="window.location.href='<?php echo navigate('application-view?id='.$row->app_no); ?>'">View</button>
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
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd3PjUqq81lIOfBPYXrQGWwK5T4ystZjA"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.0.0"></script>
</body>

</html>