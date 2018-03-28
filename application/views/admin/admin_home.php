<section style="padhding: 100px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div>
                    <div class="list-group">            
                        <a class="<?php echo (strcmp($this->uri->segment(2),'faculty')==0)?'list-group-item active':'list-group-item'; ?>"  name="profile" href="<?php echo base_url('admin/faculty')?>">Faculty</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'assign_hod')==0)?'list-group-item active':'list-group-item'; ?>"  name="profile" href="<?php echo base_url('admin/assign_hod')?>">Assign HOD</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'add_timetable')==0)?'list-group-item active':'list-group-item'; ?>" name="profile" href="<?php echo base_url('admin/add_timetable')?>">Add Timetable</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'course')==0)?'list-group-item active':'list-group-item';?>" id="midframe" href="<?php echo base_url('admin/course')?>">Add Course</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'add_curriculam')==0)?'list-group-item active':'list-group-item';?>" id="midframe" href="<?php echo base_url('admin/add_curriculam')?>">Add Curriculum</a>
<!--                        <a class="<?php echo (strcmp($this->uri->segment(2),'add_course_faculty')==0)?'list-group-item active':'list-group-item';?>" id="midframe" href="<?php echo base_url('admin/add_course_faculty')?>">Assign Faculty to Course</a>-->
                        <a class="<?php echo (strcmp($this->uri->segment(2),'add_gallery')==0)?'list-group-item active':'list-group-item';?>" id="midframe" href="<?php echo base_url('admin/add_gallery')?>">Add Gallery</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'add_news')==0)?'list-group-item active':'list-group-item';?>" id="midframe" href="<?php echo base_url('admin/add_news')?>">Add News</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'add_events')==0)?'list-group-item active':'list-group-item';?>" id="midframe" href="<?php echo base_url('admin/add_events')?>">Add Events</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'add_lab')==0)?'list-group-item active':'list-group-item';?>" id="midframe" href="<?php echo base_url('admin/add_lab')?>">Add Lab</a>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-sm-10">
<!--                <div class="row" style="margin-top: 10px;margin-bottom: 10px;">-->
                    <div class="row" >
                    <div class="col-md-12">
                        <?php 
                            if(isset($segment1) && $segment1 != "")
                                include($segment1);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px;">
                        <?php 
                            if(isset($segment2) && $segment2 != "")
                                include($segment2);
                            
                        ?>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                    <div class="col-md-12">
                        <?php 
                            if(isset($segment3) && $segment3 != "")
                                include($segment3);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>


