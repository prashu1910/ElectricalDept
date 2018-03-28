<section style="background: #fff;padding-bottom:10px">
        <div class="panel-heading alert alert-info">Qualification</div>
    <div class="row">
        <div class="col-md-12 ">
            <table class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <td>Degree</td>
                        <td>Institute</td>
                        <td>Board/University</td>
                        <td>Specialization</td>
                        <td>Percentage/CGPA</td>
                        <td>Year</td>
                        <?php if($can_edit){?>
                        <td>Action</td>
                        <?php }?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($phd) > 0 ) {?>
                        <tr>
                            <td>Ph.D.</td>
                            <td></td>
                            <td><?php echo $phd[0]->university?></td>
                            <td><?php echo $phd[0]->area?></td>
                            <td></td>
                            <td><?php echo $phd[0]->date_of_award?></td>
                            <?php if($can_edit){?>
                            <td><a href="<?php echo base_url('home/edit_qualification/'.$user->user_id."/".$phd[0]->faculty_id."/1")?>"><i class="fa fa-pencil"></i></a></td>
                            <?php }?>
                        </tr>
                    <?php }?>
                    <?php foreach($qualification as $row) {?>
                    <tr>
                        <td><?php echo $row->degree?></td>
                        <td><?php echo $row->institute?></td>
                        <td><?php echo $row->board?></td>
                        <td><?php echo $row->specialization?></td>
                        <td><?php echo $row->percentage != "" && $row->percentage > 0 ? $row->percentage : $row->cgpa?></td>
                        <td><?php echo $row->year_of_passing?></td>
                        <?php if($can_edit){?>
                        <td><a href="<?php echo base_url('home/edit_qualification/'.$user->user_id."/".$row->qual_id."/0")?>"><i class="fa fa-pencil"></i></a></td>
                        <?php }?>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        
    </div>
    
</section>
