<?php
  include_once 'addins/user-addins.php';
  include_once 'addins.php';
  if(!isset($_GET['id']))
    redirect('appstat','Invalid Parameter');
  $app=$db->row('select * from m_applications as m inner join user as u on m.user=u.username where m.app_no=:appno',['appno'=>$_GET['id']]);
  $ispending=$app->status=='pending';
  $isapproved=$app->status=='approved';
  $payed=$app->status=='payment done';
  $pagename='Application by  '.$app->name;
  $_SESSION['app_no']=$_GET['id'];
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
                  <div class="form-group col text-right">
                    <button class="btn btn-lg btn-sm btn-warning" type="button" onclick="window.location.href='<?php echo navigate('appstat') ?>'"><i class="ni ni-bold-left"></i> Back</button>
                  </div>
              </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Application No. <span class="text-primary"><?php echo numstringify($app->app_no); ?></span></h6>
                <h6 class="heading-small text-muted mb-4">Status: <span class="text-<?php echo $ispending?'warning':($isapproved?'success':'danger');  ?>"><?php echo $app->status; ?></span></h6>
                <h6 class="heading-small text-muted mb-4">Owner/Applicant information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-5">
                      <div class="form-group">
                        <label class="form-control-label">Last name</label>
                        <input type="text" class="form-control form-control-alternative"   disabled value="<?php echo $app->lname ?>">
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="form-group">
                        <label class="form-control-label">First name</label>
                        <input type="text" class="form-control form-control-alternative"   disabled value="<?php echo $app->fname ?>">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label">Middle Initial</label>
                        <input type="text" class="form-control form-control-alternative" maxlength="1"   disabled value="<?php echo $app->mi ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-around">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Building Permit No.</label>
                        <input type="text" class="form-control form-control-alternative" placeholder="3333-333-3" data-mask="____-___-_" name="building_permit_no" disabled value="<?php echo $app->building_permit_no ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">TIN No.</label>
                        <input type="text" class="form-control form-control-alternative"   disabled value="<?php echo $app->tin_no ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Telephone</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->tel_no ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">For Construction Owned by an Enterprise</label>
                        <input type="text" class="form-control form-control-alternative"   disabled value="<?php echo $app->fco ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Form of Ownership</label>
                        <input type="text" class="form-control form-control-alternative"   disabled value="<?php echo $app->form_ownership ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Use or Character of Occupancy</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->lis_char_occup ?>">
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
                        <input type="text" class="form-control form-control-alternative"   disabled value="<?php echo $app->add_house_no ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Street</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->add_street ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Barangay</label>
                        <input type="number" class="form-control form-control-alternative"  disabled value="<?php echo $app->add_brgy ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row  justify-content-around">
                    <div class="col-lg-5">
                      <div class="form-group">
                        <label class="form-control-label">City/Municipality</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->add_city ?>">
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="form-group">
                        <label class="form-control-label">Zipcode</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->add_zip ?>">
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
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->loc_lot_no ?>">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Block No.</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->loc_block_no ?>">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">TCT No.</label>
                        <input type="number" class="form-control form-control-alternative"  disabled value="<?php echo $app->loc_tct_no ?>">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label">Tax Dec. No.</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->loc_taxdec_no ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Street</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->loc_street ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">Barangay</label>
                        <input type="text" class="form-control form-control-alternative"   disabled value="<?php echo $app->loc_brgy ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label">City/Municipality</label>
                        <input type="text" class="form-control form-control-alternative"  disabled value="<?php echo $app->loc_city ?>">
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
                          <input class="custom-control-input" id="newcons" type="radio"  disabled  <?php checkiftrue($app->scope=='newcons') ?>>
                          <label class="custom-control-label" for="newcons">
                            <span>New Construction</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="erection" type="radio"disabled <?php checkiftrue($app->scope=='erection') ?>>
                          <label class="custom-control-label" for="erection">
                            <span>Erection</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="addition" type="radio"  disabled  <?php checkiftrue($app->scope=='addition') ?>>
                          <label class="custom-control-label" for="addition">
                            <span>Addition</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="alteration" type="radio"  disabled  <?php checkiftrue($app->scope=='alteration') ?>>
                          <label class="custom-control-label" for="alteration">
                            <span>Alteration</span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="renovation" type="radio"  disabled  <?php checkiftrue($app->scope=='renovation') ?>>
                          <label class="custom-control-label" for="renovation">
                            <span>Renovation</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="conversion" type="radio"  disabled  <?php checkiftrue($app->scope=='conversion') ?>>
                          <label class="custom-control-label" for="conversion">
                            <span>Conversion</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="repair" type="radio"  disabled  <?php checkiftrue($app->scope=='repair') ?>>
                          <label class="custom-control-label" for="repair">
                            <span>Repair</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="moving" type="radio"  disabled  <?php checkiftrue($app->scope=='moving') ?>>
                          <label class="custom-control-label" for="moving">
                            <span>Moving</span>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="raising" type="radio"  disabled  <?php checkiftrue($app->scope=='raising') ?>>
                          <label class="custom-control-label" for="raising">
                            <span>Raising</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="demolition" type="radio"  disabled  <?php checkiftrue($app->scope=='demolition') ?>>
                          <label class="custom-control-label" for="demolition">
                            <span>Demolition</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="accessory" type="radio"  disabled  <?php checkiftrue($app->scope=='accessory') ?>>
                          <label class="custom-control-label" for="accessory">
                            <span>Accessory Building/Stucture</span>
                          </label>
                        </div>
                        <div class="custom-control custom-control-alternative custom-radio pb-3">
                          <input class="custom-control-input" id="other" type="radio"  disabled  <?php checkiftrue($app->scope=='other') ?>>
                          <label class="custom-control-label pr-3" for="other">
                            <span>others</span>
                          </label>
                          <input type="text" class="form-control-alternative text-primary" placeholder="please specify.."   disabled  value="<?php echo $app->scope=='other'?$app->others:'' ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                

            </div>
          </div>
        </div>
        <?php
            if($isapproved||$payed)
            {
        ?>
        <div class="col-xl-12 order-xl-1 mt-4">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Inspection Form</h3>
                </div>
                <div class="col-4 text-right">
                  
                </div>
              </div>
            </div>
            <div class="card-body">
                <!-- Installation and Operation of: -->
                <h6 class="heading-small text-muted mb-4">Installation and Operation of:</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <input type="hidden" name="inspect" value="<?php echo $app->app_no; ?>">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="boiler" type="radio" name="iao[]" value="boiler"  <?php checkiftrue($app->iao=='boiler'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="boiler">
                              <span>Boiler</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="pressure_vessel" type="radio" name="iao[]" value="pressure_vessel"<?php checkiftrue($app->iao=='pressure_vessel'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="pressure_vessel">
                              <span>Pressure Vessel</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="in_com_en" type="radio" name="iao[]" value="in_com_en"<?php checkiftrue($app->iao=='in_com_en'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="in_com_en">
                              <span>Internal Combustion Engine</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="ice" type="radio" name="iao[]" value="ice"<?php checkiftrue($app->iao=='ice'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="ice">
                              <span>Refrigerator and Ice Making</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="win_type_aircon" type="radio" name="iao[]" value="win_type_aircon"<?php checkiftrue($app->iao=='win_type_aircon'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="win_type_aircon">
                              <span>Window Type Airconditioning</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="split_type" type="radio" name="iao[]" value="split_type"<?php checkiftrue($app->iao=='split_type'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="split_type">
                              <span>Package/Split Type Airconditioning</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="other_iao" type="radio" name="iao[]" value="other"<?php checkiftrue($app->iao=='other'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label pr-3" for="other_iao">
                              <span>others</span>
                            </label>
                            <input type="text" name="other" class="form-control-alternative text-primary" placeholder="please specify.." <?php  disableifdone(!$ispending); ?> value="<?php echo $app->iao=='other'?$app->other_iao:''; ?>">
                          </div>
                        </div>
                        
                        <div class="col-lg-4">
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="cen_aircon" type="radio" name="iao[]" value="cen_aircon"<?php checkiftrue($app->iao=='cen_aircon'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="cen_aircon">
                              <span>Central Airconditioning</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="mecha_vent" type="radio" name="iao[]" value="mecha_vent"<?php checkiftrue($app->iao=='mecha_vent'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="mecha_vent">
                              <span>Mechanical Ventillation</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="escalator" type="radio" name="iao[]" value="escalator"<?php checkiftrue($app->iao=='escalator'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="escalator">
                              <span>Escalator</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="moving_sidewalk" type="radio" name="iao[]" value="moving_sidewalk"<?php checkiftrue($app->iao=='moving_sidewalk'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="moving_sidewalk">
                              <span>Moving Sidewalk</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="freight_elevator" type="radio" name="iao[]" value="freight_elevator"<?php checkiftrue($app->iao=='freight_elevator'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="freight_elevator">
                              <span>Freight Elevator</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="passenger_elevator" type="radio" name="iao[]" value="passenger_elevator"<?php checkiftrue($app->iao=='passenger_elevator'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="passenger_elevator">
                              <span>Passenger Elevator</span>
                            </label>
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="cable_car" type="radio" name="iao[]" value="cable_car"<?php checkiftrue($app->iao=='cable_car'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="cable_car">
                              <span>Cable Car</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="dumb_waiter" type="radio" name="iao[]" value="dumb_waiter"<?php checkiftrue($app->iao=='dumb_waiter'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="dumb_waiter">
                              <span>Dumbwaiter</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="pumps" type="radio" name="iao[]" value="pumps"<?php checkiftrue($app->iao=='pumps'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="pumps">
                              <span>Pumps</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="gas" type="radio" name="iao[]" value="gas"<?php checkiftrue($app->iao=='gas'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="gas">
                              <span>Compress Air, Vacuum, Institutional and/or Industrial Gas</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="pneu" type="radio" name="iao[]" value="pneu"<?php checkiftrue($app->iao=='pneu'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="pneu">
                              <span>Pneumatic Tubes, Conveyors and/or Monorails</span>
                            </label>
                          </div>
                          <div class="custom-control custom-control-alternative custom-radio pb-3">
                            <input class="custom-control-input" id="funicular" type="radio" name="iao[]" value="funicular"<?php checkiftrue($app->iao=='funicular'); disableifdone(!$ispending); ?>>
                            <label class="custom-control-label" for="funicular">
                              <span>Funicular</span>
                            </label>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>

                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Costing</h6>
                <!-- EStimated Cost -->
                <div class="row justify-content-center">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Estimated Costs</label>
                      <input type="text" class="form-control form-control-alternative" name="cost"
                      oninput="document.getElementById('cost').value=50+((Math.trunc(this.value/1000))*5);"
                       <?php disableifdone(!$ispending); ?> value="<?php echo $app->cost??''; ?>">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Permit Charge</label>
                      <input type="text" class="form-control form-control-alternative" id="cost" disabled  value="<?php echo $app->cost?50+(((int)$app->cost/1000)*5):''; ?>">
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-lg-8  ">
                    <code><strong>Note:</strong> Formula used is $50 base amount + $5 per thousand of estimated cost</code>
                  </div>
                </div>
                  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="payment">
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="sweetchild00008@gmail.com">
					
                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">
					
                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="Mechanical Permit">
                    <!-- <input type="hidden" name="item_number" value="12"> -->
                    <input type="hidden" name="amount" value="<?php echo $app->cost?50+(((int)$app->cost/1000)*5):''; ?>">
                    <input type="hidden" name="currency_code" value="PHP">
					
                    <!-- Specify URLs -->
                    <input type="hidden" name="return" value="http://<?php echo BASE_URL.'/success' ?>">
                    <input type="hidden" name="cancel_return" value="http://<?php echo BASE_URL.'/cancel' ?>">
					
                    <!-- Display the payment button. -->
                    <input type="hidden" name="submit">
              
                <hr class="my-4" />
                <!-- Submit -->

                <?php if($isapproved){ ?>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="form-group col text-right">
                      <button class="btn btn-lg btn-sm btn-primary" type="submit" onclick="document.getElementById('payment').submit();" <?php echo !$isapproved?'disabled':''; ?>><i class="ni ni-money-coins"></i> Pay</button>
                    </div>
                    
                  </div>
                </div>
                <?php }?>

                <?php if($payed){ ?>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="form-group col text-right">
                      <button class="btn btn-lg btn-sm btn-primary" type="button" onclick="window.location.href='makeacopy?id=<?php echo $app->app_no; ?>'"><i class="ni ni-cloud-download-95"></i> Print/Download a copy of Document</button>
                    </div>
                  </div>
                </div>
                <?php }?>

                </form>
            </div>
          </div>
        </div>
            <?php } ?>
      </div>
      <?php include 'components/footer.php'; ?>
    </div>
  </div>
      <?php include 'components/myscripts.php'; ?>
</body>

</html>