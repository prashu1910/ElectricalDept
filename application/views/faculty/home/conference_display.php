<?php $i = 1;?>

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
                                <?php foreach ($results as $conf) {?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td>
                                        <?php echo $user->user_fname." ".$user->user_mname." ".$user->user_lname.",".$conf->other_authors?>
                                        <?php echo ",\"".$conf->title?>
                                        <?php echo "\",".$conf->conference_name?>
                                        <?php echo ($conf->volume_no != "" && $conf->volume_no > 0? (",vol.".$conf->volume_no) : "")?>
                                        <?php echo ($conf->city != "" ? ",".$conf->city : "")?>
                                        <?php echo ($conf->country != "" ? ",".$conf->country : "")?>
                                    </td>
                                    <?php if($can_edit){?>
                                    <td><a href="<?php echo base_url('home/edit_pub_conference/'.$user->user_id."/".$conf->conference_id)?>"><i class="fa fa-pencil"></i></a></td>
                                    <?php }?>
                                </tr>
                                <?php }?>
                            </tbody>
                          </table>
                            <div class="text-center">
                                <?php echo $links; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3" style="margin:20px 0">
                            <?php echo "Total Publications : ".$total_rows?>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <?php echo $links; ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>