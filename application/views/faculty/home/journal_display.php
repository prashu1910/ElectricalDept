<?php $i = 1;?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Journals</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                          <table class="table table-striped table-bordered">
                            <tbody>
                                <?php foreach ($results as $journals) {?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td>
                                        <?php echo $user->user_fname." ".$user->user_mname." ".$user->user_lname.",".$journals->other_authors?>
                                        <?php echo "\"".$journals->title."\""?>
                                        <?php echo $journals->journal != "" ? ", ".$journals->journal : ""?>
                                        <?php echo ($journals->volume != "" && $journals->volume > 0? (", vol. ".$journals->volume) : "")?>
                                        <?php echo ($journals->page_from != "" && $journals->page_from > 0? (", pp. ".$journals->page_from."-".$journals->page_to) : "")?>
                                        <?php echo ($journals->year != "" && $journals->year > 0? ", ".$journals->year : "")?>
                                    </td>
                                    <?php if($can_edit){?>
                                    <td><a href="<?php echo base_url('home/edit_pub_journal/'.$user->user_id."/".$journals->paper_id)?>"><i class="fa fa-pencil"></i></a></td>
                                    <?php }?>
                                </tr>
                                <?php }?>
                            </tbody>
                          </table>
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