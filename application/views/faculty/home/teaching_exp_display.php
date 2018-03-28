<?php $i = 1;?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Course Taught</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <td>S.No.</td>
                                  <td>Course</td>
                                  <td>Semester</td>
                                   <td>Year</td>
                                   <?php if($can_edit){?>
                                   <td></td>
                                   <?php }?>
                              </tr>
                          </thead>
                        <tbody>
                          <?php foreach($results as $row){?>
                          <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $row->course_name?></td>
                            <td><?php echo $row->semester?></td>
                            <td><?php echo $row->year?></td>
                            <?php if($can_edit){?>
                            <td><a href="<?php echo base_url('home/edit_teaching_exp/'.$user->user_id."/".$row->fac_exp_id)?>"><i class="fa fa-pencil"></i></a></td>
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

