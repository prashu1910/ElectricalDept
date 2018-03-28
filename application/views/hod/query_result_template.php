<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Query Result</h3>
                  <form action="<?php echo base_url("hod/create_pdf")?>" method="post">
                      <input type="submit" class="btn btn-success" value="Download"></input
                  </form>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 table-responsive">
                      <table class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <?php foreach ($header as $value) {?>
                                  <th><?php echo $value?></th>
                                  <?php }?>
                              </tr>
                          </thead>
                          <tbody>
                              <?php foreach ($result as $key => $value) {
                                  echo "<tr>";
                                  foreach($value as $row){
                                  ?>
                                    <td><?php echo $row?></td>
                                  <?php } echo "</tr>"; }?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
