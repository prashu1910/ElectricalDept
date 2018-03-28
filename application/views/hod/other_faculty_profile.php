<?php $i = 1;?>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">All Faculty</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($faculty as $row){?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $row->user_fname." ".$row->user_mname." ".$row->user_lname?></td>
                                <td><?php echo $row->email?></td>
                                <td><?php echo $row->designation?></td>
                                <td>
                                    <a class="btn btn-success" target="_blank" href="<?php echo base_url('home/profile/'.$row->user_id)?>">View</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

