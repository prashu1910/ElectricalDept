<?php $i = 1;?>
<section style="padding-top:150px">
    <div class="row">
    <div class="col-md-10 col-sm-10 col-md-offset-1">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Research Project</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <td>S.No.</td>
                                  <td>Title</td>
                                  <td>Details</td>
                                   <td>Start Date</td>
                                   <td>End Date</td>
                                   <td>Sponsor Name</td>
                                   <td>Amount</td>
                              </tr>
                          </thead>
                        <tbody>
                          <?php foreach($results as $row){?>
                          <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $row->title?></td>
                            <td><?php echo $row->details?></td>
                            <td><?php echo $row->start_date?></td>
                            <td><?php echo $row->end_date?></td>
                            <td><?php echo $row->sponsor_name?></td>
                            <td><?php echo $row->amount?></td>
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



</section>