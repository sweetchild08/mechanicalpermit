<?php
  $pagename='Application For Mechanical Permit';
  include_once 'addins/user-addins.php';
  include_once 'addins.php';
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="max-height: 600px; background-image: url(assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
     
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      
    <?php include 'addins/msg.php'; ?>
      <div class="row">
        
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Application Form</h3>
                </div>
                <div class="col-4 text-right">
                  
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="<?php echo navigate('cont/application'); ?>" method="post">
                <h6 class="heading-small text-muted mb-4">Application No. <span class="text-primary"><?php echo numstringify($db->nextId('m_applications')); ?></span></h6>
                <h6 class="heading-small text-muted mb-4">Owner/Applicant information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-5">
                      <div class="form-group">
                        <label class="form-control-label">Last name</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Last name" name="lname">
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="form-group">
                        <label class="form-control-label">First name</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="First name" name="fname">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label">Middle Initial</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Middle Initial" maxlength="1" name="mi">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-around">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Building Permit No.</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="3333-333-3" data-mask="____-___-_" name="building_permit_no">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">TIN No.</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="3333-333-3" data-mask="____-___-_" name="tin_no">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Telephone</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="Telephone number" name="tel_no">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">For Construction Owned by an Enterprise</label>
                        <input type="text" class="form-control form-control-alternative" name="fco">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Form of Ownership</label>
                        <input type="text" class="form-control form-control-alternative" name="form_ownership">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Use or Character of Occupancy</label>
                        <input type="text" class="form-control form-control-alternative" name="lis_char_occup">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Address</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">House No.</label>
                        <input type="text" class="form-control form-control-alternative" name="add_house_no">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Street</label>
                        <input type="text" class="form-control form-control-alternative" name="add_street">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Barangay</label>
                        <input type="number" class="form-control form-control-alternative" name="add_brgy">
                      </div>
                    </div>
                  </div>
                  <div class="row  justify-content-around">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">City/Municipality</label>
                        <input type="text" class="form-control form-control-alternative" name="add_city">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Zipcode</label>
                        <input type="text" class="form-control form-control-alternative" name="add_zip">
                      </div>
                    </div>
                    
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Location of Construction -->
                <h6 class="heading-small text-muted mb-4">Location of Construction</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Lot No.</label>
                        <input type="text" class="form-control form-control-alternative" name="loc_lot_no">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Block No.</label>
                        <input type="text" class="form-control form-control-alternative" name="loc_block_no">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">TCT No.</label>
                        <input type="number" class="form-control form-control-alternative" name="loc_tct_no">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Tax Dec. No.</label>
                        <input type="text" class="form-control form-control-alternative" name="loc_taxdec_no">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Street</label>
                        <input type="text" class="form-control form-control-alternative" name="loc_street">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Barangay</label>
                        <input type="text" class="form-control form-control-alternative" name="loc_brgy">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">City/Municipality</label>
                        <input type="text" class="form-control form-control-alternative" name="loc_city">
                      </div>
                    </div>
                  </div>
                </div>
                
                <hr class="my-4" />
                <!-- Scope of work -->
                <h6 class="heading-small text-muted mb-4">Scope of work</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="newcons" type="radio" name="scope[]" value="newcons">
                          <label class="custom-control-label" for="newcons">
                            <span>New Construction</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="erection" type="radio" name="scope[]" value="erection">
                          <label class="custom-control-label" for="erection">
                            <span>Erection</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="addition" type="radio" name="scope[]" value="addition">
                          <label class="custom-control-label" for="addition">
                            <span>Addition</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="alteration" type="radio" name="scope[]" value="alteration">
                          <label class="custom-control-label" for="alteration">
                            <span>Alteration</span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="renovation" type="radio" name="scope[]" value="renovation">
                          <label class="custom-control-label" for="renovation">
                            <span>Renovation</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="conversion" type="radio" name="scope[]" value="conversion">
                          <label class="custom-control-label" for="conversion">
                            <span>Conversion</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="repair" type="radio" name="scope[]" value="repair">
                          <label class="custom-control-label" for="repair">
                            <span>Repair</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="moving" type="radio" name="scope[]" value="moving">
                          <label class="custom-control-label" for="moving">
                            <span>Moving</span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="raising" type="radio" name="scope[]" value="raising">
                          <label class="custom-control-label" for="raising">
                            <span>Raising</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="demolition" type="radio" name="scope[]" value="demolition">
                          <label class="custom-control-label" for="demolition">
                            <span>Demolition</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="accessory" type="radio" name="scope[]" value="accessory">
                          <label class="custom-control-label" for="accessory">
                            <span>Accessory Building/Stucture</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="other" type="radio" name="scope[]" value="other">
                          <label class="custom-control-label pr-3" for="other">
                            <span>others</span>
                          </label>
                          <input type="text" class="form-control-alternative text-primary" name="others" placeholder="please specify..">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr class="my-4" />
                <!-- Submit -->
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="form-group col text-right">
                      <button class="btn btn-sm btn-primary" type="submit" name="apply_m">Submit Application</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php include 'components/footer.php'; ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.0.0"></script>
</body>

</html>