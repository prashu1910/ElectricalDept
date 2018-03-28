<?php $i = 1;?>
<section style="">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="text-right alert alert-info">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="text-left">
                            <span >Course</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a class="btn btn-success" href="<?php echo base_url('admin/add_course/')?>">Add New Course </a>
                        
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
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>L-T-P</th>
                        <th>Credits</th>
<!--                        <th>Action</th>-->
                    </tr>
                </thead>
               <tbody>
                    <?php foreach($results as $row){?>
                    <tr>
                        <td><?php echo $row->course_code?></td>
                        <td><?php echo $row->course_name;?></td>
                        <td><?php echo $row->lecture."-".$row->tutorial."-".$row->practical;?></td>
                        <td><?php echo $row->credit;?></td>
<!--                        <td>
                            <a class="btn btn-success" href="<?php echo base_url('admin/edit_course/'.$row->course_id)?>">Edit</a>
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