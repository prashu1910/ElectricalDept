<section style="padsding: 150px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div>
                    <div class="list-group">            
                        <a class="<?php echo (strcmp($this->uri->segment(2),'timetable')==0)?'list-group-item active':'list-group-item'; ?>"  name="profile" href="<?php echo base_url('student/timetable/btech')?>">TimeTable</a>
    <!--                    <a class="<?php echo (strcmp($this->uri->segment(3),'mtech')==0)?'list-group-item active':'list-group-item'; ?>" name="profile" href="<?php echo base_url('student/timetable/mtech')?>">TimeTable - M.Tech</a>
                        <a class="<?php print($page == 'journals.php' ? 'list-group-item active' : 'list-group-item')?>" id="midframe" href="<?php echo base_url('faculty/journals')?>">Publication - Journals</a>
                        <a class="<?php print($page == 'conferences.php' ? 'list-group-item active' : 'list-group-item')?>" id="midframe" href="<?php echo base_url('faculty/conferences')?>">Publication - Conferences</a>
                        <a class="<?php print($page == 'course_tought.php' ? 'list-group-item active' : 'list-group-item')?>" id="midframe" href="<?php echo base_url('faculty/courses')?>">Courses Tought</a>
                        <a class="<?php print($page == 'phd_thesis.php' ? 'list-group-item active' : 'list-group-item')?>" id="midframe" href="<?php echo base_url('faculty/courses')?>">Thesis-Ph.D</a>
                        <a class="<?php print($page == 'mtech_thesis.php' ? 'list-group-item active' : 'list-group-item')?>" id="midframe" href="<?php echo base_url('faculty/courses')?>">Thesis-M.Tech</a>
                        <a class="<?php print($page == 'btech_project.php' ? 'list-group-item active' : 'list-group-item')?>" id="midframe" href="<?php echo base_url('faculty/courses')?>">Project-B.Tech</a>-->
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <?php 
                            if(isset($page) && $page != "")
                                include($page);
                        ?>
                    </div>
                </div>
            </div>
        </div >
        </div>
    </div>
</section>
