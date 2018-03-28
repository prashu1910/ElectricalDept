<?php $i = 1;?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Activity Organised</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <td>S.No.</td>
                                  <td>Title</td>
                                  <td>Duration</td>
                                  <td>Organized At</td>
                                  <td>In Capacity of</td>
                                   <td>sponsor</td>
                                   <td>Amount</td>
                                   <?php if($can_edit){?>
                                   <td></td>
                                   <?php }?>
                              </tr>
                          </thead>
                        <tbody>
                          <?php foreach($results as $row){?>
                          <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $row->title?></td>
                            <td><?php echo $row->duration?></td>
                            <td><?php echo $row->organized_at ?></td>
                            <td><?php echo $row->in_capacity_of?></td>
                            <td><?php echo $row->sponsor?></td>
                            <td><?php echo $row->amount?></td>
                            <?php if($can_edit){?>
                            <td><a href="<?php echo base_url('home/edit_activity/'.$user->user_id."/".$row->activity_id)?>"><i class="fa fa-pencil"></i></a></td>
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

