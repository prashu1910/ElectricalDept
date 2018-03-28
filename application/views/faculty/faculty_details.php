<section style="pfadding: 150px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="panel">
                    <div class="panel-heading "></div>
                    <div class="panel-body">
                        <p>
                            <img style="background-color: #ededed;-moz-box-shadow: 0px 0px 0px 5px #ededed;-webkit-box-shadow: 0px 0px 0px 5px #ededed;box-shadow: 0px 0px 0px 5px #ededed;margin: auto;width: 150px;height: 150px;" class="img-circle img-responsive" src="<?php echo base_url(IMG_UPLOAD_FOLDER.'/'.$user->image_link)?>"></img>
                        </p>
                        <p class="text-center"><?php echo $user->salutation. " ".$user->user_fname." ".$user->user_mname." ".$user->user_lname?></p>
                    </div>
                </div>
                <div>
                    <div class="list-group">            
                        <a class="<?php echo (strcmp($this->uri->segment(2),'profile')==0)?'list-group-item active':'list-group-item'; ?> " name="profile" href="<?php echo base_url('faculty/profile/'.$user->user_id)?>">Profile</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'journals')==0)?'list-group-item active':'list-group-item'; ?>" id="midframe" href="<?php echo base_url('faculty/journals/'.$user->user_id."/1")?>">Publication - Journals</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'conferences')==0)?'list-group-item active':'list-group-item'; ?>" id="midframe" href="<?php echo base_url('faculty/conferences/'.$user->user_id."/1")?>">Publication - Conferences</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'courses')==0)?'list-group-item active':'list-group-item'; ?>" id="midframe" href="<?php echo base_url('faculty/courses/'.$user->user_id."/1")?>">Courses Taught</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'project')==0 && strcmp($this->uri->segment(4),'3')==0 ) ?'list-group-item active':'list-group-item'; ?>" id="midframe" href="<?php echo base_url('faculty/project/'.$user->user_id."/3/1")?>">Thesis-Ph.D</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'project')==0 && strcmp($this->uri->segment(4),'2')==0)?'list-group-item active':'list-group-item'; ?>" id="midframe" href="<?php echo base_url('faculty/project/'.$user->user_id."/2/1")?>">Thesis-M.Tech</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'project')==0 && strcmp($this->uri->segment(4),'1')==0)?'list-group-item active':'list-group-item'; ?>" id="midframe" href="<?php echo base_url('faculty/project/'.$user->user_id."/1/1")?>">Project-B.Tech</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <?php include($page)?>
            </div>
        </div>
        </div>
    </div>
</section>

