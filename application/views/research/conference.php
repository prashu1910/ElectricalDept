<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Conferences</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <table class="table table-striped table-bordered">
                        <tbody>
                            <?php foreach ($results as $journals) {?>
                            <tr>
                                <td>
                                    <?php echo $journals->other_authors?>
                                    <?php echo ",\"".$journals->title?>
                                    <?php echo "\",".$journals->conference_name?>
                                    <?php echo ($journals->volume_no != "" && $journals->volume_no > 0? (",vol.".$journals->volume_no) : "")?>
                                    <?php echo ($journals->city != "" ? ",".$journals->city : "")?>
                                    <?php echo ($journals->country != "" ? ",".$journals->country : "")?>
                                </td>
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