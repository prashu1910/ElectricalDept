<?php $i = 1;?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Lab Details</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td>Name</td>
                            <td><?php echo $lab_details['lab'][0]->name ?></td>
                          </tr>
                          <tr>
                            <td>Official Incharge </td>
                            <td>
                                <?php if(isset($lab_details['supervisor']) && count($lab_details['supervisor']) > 0){?>
                                <a target="_blank" href = "<?php echo base_url('faculty/details/'.$lab_details['supervisor'][0]->user_id)?>"><?php echo $lab_details['supervisor'][0]->user_fname." ".$lab_details['supervisor'][0]->user_mname." ".$lab_details['supervisor'][0]->user_lname ?></a>
                                <?php }?>
                            </td>
                          </tr>
                          <tr>
                            <td>Lab Type</td>
                            <td><?php echo $lab_details['lab'][0]->lab_type == 1 ? "UG" : "PG"?></td>
                          </tr>
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
                  <h3 class="panel-title">Lab Equipments</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>S. No.</th>
                                  <th>Name</th>
                                  <th>Quantity</th>
                                  <th>Description</th>
                              </tr>
                          </thead>
                        <tbody>
                            <?php foreach($lab_euipment as $row){?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $row->name?></td>
                                <td><?php echo $row->quantity?></td>
                                <td><?php echo $row->description?></td>
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
