<?php $i = 1;?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Employement Details</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <td>S.No.</td>
                                  <td>Position</td>
                                  <td>Organisation</td>
                                   <td>Start Date</td>
                                   <td>End Date</td>
                                   <td>Work</td>
                                   <?php if($can_edit){?>
                                   <td></td>
                                   <?php }?>
                              </tr>
                          </thead>
                        <tbody>
                          <?php foreach($results as $row){?>
                          <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $row->position?></td>
                            <td><?php echo $row->organisation?></td>
                            <td><?php echo $row->start_date ?></td>
                            <td><?php echo $row->end_date > 0 ? $row->end_date : ""?></td>
                            <td><?php echo $row->work_nature?></td>
                            <?php if($can_edit){?>
                            <td><a href="<?php echo base_url('home/edit_employement/'.$user->user_id."/".$row->emp_id)?>"><i class="fa fa-pencil"></i></a></td>
                            <?php }?>
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
<!--                        <div class="text-center">
                            <?php echo $links; ?>
                        </div>-->
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

