<?php $i = 1;



?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Query</h3>
                </div>
                <div class="panel-body">
                    <?php echo $query?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($status == 400){?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Error</h3>
                </div>
                <div class="panel-body">
                    <?php foreach ($error as $value) {
                            echo $value."  ";
                        }?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php if($status == 200){
    
$header = array();
if(count($result) > 0)
{
    $row = $result[0];
    foreach ($row as $key => $value) {
        $header[$key] = $key;
    }
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="panel-title">Query Result</h3>
                        </div>
                        <div class="col-md-4 text-right" >
                            <form action="<?php echo base_url("hod/create_excel")?>" method="post">
                                <input type="hidden" name="query" value="<?php echo $query?>"/>
                                <input type="submit" class="btn btn-success" value="Download"></input
                            </form>
                        </div>
                    </div>
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
<?php }?>

