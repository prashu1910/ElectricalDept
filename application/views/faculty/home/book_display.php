<?php $i = 1;?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Book Details</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <td>S.No.</td>
                                  <td>Book Title</td>
                                  <td>Year</td>
                                   <td>ISBN</td>
                                   <td>ISSN</td>
                                   <td>Publisher</td>
                                   <?php if($can_edit){?>
                                   <td></td>
                                   <?php }?>
                              </tr>
                          </thead>
                        <tbody>
                          <?php foreach($results as $row){?>
                          <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $row->book_title?></td>
                            <td><?php echo $row->year?></td>
                            <td><?php echo $row->isbn ?></td>
                            <td><?php echo $row->issn?></td>
                            <td><?php echo $row->publisher?></td>
                            <?php if($can_edit){?>
                            <td><a href="<?php echo base_url('home/edit_book/'.$user->user_id."/".$row->book_id)?>"><i class="fa fa-pencil"></i></a></td>
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

