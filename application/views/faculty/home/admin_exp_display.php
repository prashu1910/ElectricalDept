<?php $i =1;?>

<section style="background: #fff;padding-bottom:10px">
        <div class="panel-heading alert alert-info">Administrative Experience</div>
    <div class="row">
        <div class="col-md-12 ">
            <table class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>S. No.</td>
                        <td>Designation</td>
                        <td>From</td>
                        <td>To</td>
                        <td>Organisation</td>
                        <td>Responsibility</td>
                        <?php if($can_edit){?>
                        <td></td>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $row) {?>
                    <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row->designation?></td>
                        <td><?php echo $row->from_date > 0 ? $row->from_date : ""?></td>
                        <td><?php echo $row->to_date > 0 ? $row->to_date : ""?></td>
                        <td><?php echo $row->organisation?></td>
                        <td><?php echo $row->responsibility?></td>
                        <?php if($can_edit){?>
                        <td><a href="<?php echo base_url('home/edit_admin_exp/'.$user->user_id."/".$row->experience_id)?>"><i class="fa fa-pencil"></i></a></td>
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
</section>
