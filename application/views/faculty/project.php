<?php $i = 1;?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $title?></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <td>S.No.</td>
                                  <td>Project Title</td>
                                  <td>Students</td>
                                  <td>Year</td>
                              </tr>
                          </thead>
                        <tbody>
                          <?php foreach($results as $row){?>
                          <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $row->title?></td>
                            <td><?php echo $row->student?></td>
                            <td><?php echo $row->year?></td>
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                        <div class="text-center">
                            <?php echo $links; ?>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

