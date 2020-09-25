<?php
  include_once '../addins.php';
  include_once 'addins/admin-addins.php';
  if(!isset($_GET['username']))
    redirect('admin/engineers');
  $eng=$db->row('select * from engineers as e inner join user as u on e.username=u.username where e.username=:username',['username'=>$_GET['username']]);
  $ispending=$eng->status=='pending'?true:false;
  $isapproved=$eng->status=='approved'?true:false;
  $pagename='Engineer '.$eng->name;
?>
<!DOCTYPE html>
<html>
<?php include 'components/headtag.php' ?>

<body>
  <?php include 'components/sidebar.php'; ?>
  <!-- Main content -->
  <div class="main-content">
  <?php include 'components/topbar.php'; ?>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="max-height: 600px; background-image: url(<?php echo assets('img/theme/profile-cover.jpg'); ?>); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
     
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      
    <?php include 'components/msg.php'; ?>
      <div class="row">
        
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Engineer Application Form</h3>
                </div>
                
                    <div class="form-group col text-right">
                      <button class="btn btn-lg btn-sm btn-warning" type="button" onclick="window.location.href='<?php echo navigate('admin/engineers') ?>'"><i class="ni ni-bold-left"></i> Back</button>
                    </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Licence No. <span class="text-primary"><?php echo $eng->PRC_no; ?></span></h6>
                <h6 class="heading-small text-muted mb-4">Status: <span class="text-<?php echo $ispending?'warning':($isapproved?'success':'danger');  ?>"><?php echo $eng->status; ?></span></h6>
                <h6 class="heading-small text-muted mb-4">Owner/Applicant information</h6>
                <div class="pl-lg-4">
                  <div class="row justify-content-around">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label">Name</label>
                        <input type="text" class="form-control form-control-alternative"  value="<?php echo $eng->name; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-around">
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label">Address</label>
                        <input type="text" class="form-control form-control-alternative"  value="<?php echo $eng->name; ?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">PRC Number</label>
                        <input type="text" class="form-control form-control-alternative"   disabled>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Validity</label>
                        <input type="text" class="form-control form-control-alternative"  disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">PTR Number</label>
                        <input type="text" class="form-control form-control-alternative"  disabled>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Date Issued</label>
                        <input type="text" class="form-control form-control-alternative" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Issued At</label>
                        <input type="text" class="form-control form-control-alternative"  disabled>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">TIN Number</label>
                        <input type="text" class="form-control form-control-alternative" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Attachments -->
                <h6 class="heading-small text-muted mb-4">Attachments</h6>
                <div class="pl-lg-4">
                  <div class="row justify-content-around">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">PRC License</label>
                        <img src="<?php echo navigate($eng->attach_license); ?>" alt="" width="100%">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">TIN</label>
                        <img src="<?php echo navigate($eng->attach_tin); ?>" alt="" width="100%">
                      </div>
                    </div>
                  </div>
                </div>
                
                <hr class="my-4" />
                <!-- Submit -->
                <div class="pl-lg-4">
                  <div class="row justify-content-center">
                    <div class="form-group col-8 text-right">
                      <?php addform('approve','cont/engineer',$eng->username);  ?>
                      <?php addform('decline','cont/engineer',$eng->username);  ?>
                      <button class="btn btn-lg btn-sm btn-success" type="button" onclick="document.getElementById('approve').submit();" <?php echo !$ispending?'disabled':''; ?>><i class="ni ni-check-bold"></i> Approve</button>
                      <button class="btn btn-lg btn-sm btn-danger" type="button" onclick="document.getElementById('decline').submit();" <?php echo !$ispending?'disabled':''; ?>><i class="ni ni-fat-remove"></i> Decline</button>
                    </div>
                    
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'components/footer.php'; ?>
    </div>
  </div>
      <?php include 'components/myscripts.php'; ?>
</body>

</html>