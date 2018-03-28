<?php $i = 1;?>
<section style="">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="text-right alert alert-info">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="text-left">
                            <span >Faculty</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a class="btn btn-success" href="<?php echo base_url('admin/add_faculty/')?>">Add New Faculty </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Designation</th>
<!--                        <th>Action</th>-->
                    </tr>
                </thead>
               <tbody>
                    <?php foreach($results as $row){?>
                    <tr>
                        <td><?php echo $row->user_fname." ".$row->user_mname." ".$row->user_lname;?></td>
                        <td><?php echo $row->email;?></td>
                        <td><?php echo $row->designation;?></td>
<!--                        <td>
                            <a class="btn btn-success" href="<?php echo base_url('admin/edit_faculty/'.$row->user_id)?>">Edit </a>
                        </td>-->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="text-center">
                <?php echo $links?>
            </div>
            
        </div>
    </div>
</section>