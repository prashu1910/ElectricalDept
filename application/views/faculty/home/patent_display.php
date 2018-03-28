<?php $i =1;?>

<section style="background: #fff;padding-bottom:10px">
        <div class="panel-heading alert alert-info">Patents</div>
    <div class="row">
        <div class="col-md-12 ">
            <table class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>S. No.</td>
                        <td>Patent Reg No.</td>
                        <td>Name</td>
                        <td>Patent Date</td>
                        <td>Awarding Country</td>
                        <td>Other Coawardee</td>
                        <?php if($can_edit){?>
                        <td></td>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $row) {?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row->patent_reg_no?></td>
                        <td><?php echo $row->name?></td>
                        <td><?php echo $row->patent_date?></td>
                        <td><?php echo $row->awarding_country?></td>
                        <td><?php echo $row->other_coawardee?></td>
                        <?php if($can_edit){?>
                        <td><a href="<?php echo base_url('home/edit_patent/'.$user->user_id."/".$row->patent_id)?>"><i class="fa fa-pencil"></i></a></td>
                        <?php }?>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
