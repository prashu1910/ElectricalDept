<?php $i = 1;?>
<section style="padding-bottom:10px">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="background: #fff;">
            <div class="text-center" ><h3>Curriculam</h3></div>
        </div>
    </div>
    <div class="row" style="background: #fff;">
        <div class="col-md-12 col-sm-12">
            <table class="table table-bordered table-condensed table-striped row-even">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Programme</th>
                        <th>Branch</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($curriculam as $row){?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row->p_name?></td>
                        <td><a href="<?php echo base_url('course/course_structure/'.$row->programme_id."/".$row->branch_id);?>" target="_blank"><?php echo $row->b_name?></a></td>
                        <td><?php echo $row->semester?></td>
                        <td>
                            <a><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>



