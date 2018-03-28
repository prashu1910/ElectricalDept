<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $user->salutation. " ".$user->user_fname." ".$user->user_mname." ".$user->user_lname?></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td>Designation</td>
                            <td><?php echo $user->designation?></td>
                          </tr>
                          <?php if(count($phd_qualification) > 0){?>
                          <tr>
                            <td>Qualification</td>
                            <td><?php echo "Ph.D."?></td>
                          </tr>
                          <?php }?>
                          <tr>
                            <td>Area of Interest</td>
                            <td><?php echo $aoi?></td>
                          </tr>
                          <tr>
                            <td>Phone No.</td>
                            <td><?php
                                if($user->phone_office != "")
                                    echo $user->phone_office."(O)<br>";
                                if($user->phone_residence != "")
                                    echo $user->phone_residence."(R)";
                            ?></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td><?php echo $user->email;?></td>
                          </tr>
                          <?php if($user->resume_link != ""){?>
                          <tr>
                            <td>Resume</td>
                            <td>
                                <a target="_blank" href="<?php echo base_url(RESUME_UPLOAD_FOLDER.'/'.$user->resume_link)?>">View Resume</a>
                            </td>
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Academics Qualifications</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Degree</th>
                                  <th>Institute</th>
                                  <th>Year</th>
                              </tr>
                          </thead>
                        <tbody>
                            <?php if(count($phd_qualification) > 0){?>
                            <tr>
                              <td>Ph.D.</td>
                              <td><?php echo $phd_qualification[0]->university?></td>
                              <td><?php echo $phd_qualification[0]->date_of_award?></td>
                            </tr>
                            <?php }?> 
                            <?php foreach($qualification as $qual){?>
                                <tr>
                                  <td><?php echo $qual->degree?></td>
                                  <td><?php echo $qual->board?></td>
                                  <td><?php echo $qual->year_of_passing?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

