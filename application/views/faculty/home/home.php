

<section style="paddging: 100px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div>
                    <div class="panel">
                        <div class="panel-heading "></div>
                        <div class="panel-body">
                            <p>
                                <img style="background-color: #ededed;-moz-box-shadow: 0px 0px 0px 5px #ededed;-webkit-box-shadow: 0px 0px 0px 5px #ededed;box-shadow: 0px 0px 0px 5px #ededed;margin: auto;width: 150px;height: 150px;" class="img-circle img-responsive" src="<?php echo base_url(IMG_UPLOAD_FOLDER.'/'.$user->image_link)?>"></img>
                            </p>
                            <p class="text-center"><?php echo $user->user_fname." ".$user->user_mname." ".$user->user_lname?></p>
                        </div>
                    </div>
                    <div class="list-group">            
                        <a class="<?php echo (strcmp($this->uri->segment(2),'profile')==0)?'list-group-item active':'list-group-item'; ?>"  name="profile" href="<?php echo base_url('home/profile/'.$user->user_id)?>">Profile</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'qualification')==0)?'list-group-item active':'list-group-item'; ?>"  name="profile" href="<?php echo base_url('home/qualification/'.$user->user_id)?>">Qualification</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'pub_journal')==0)?'list-group-item active':'list-group-item'; ?>"  name="profile" href="<?php echo base_url('home/pub_journal/'.$user->user_id)?>">Publication - Journal</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'pub_conf')==0)?'list-group-item active':'list-group-item'; ?>" name="profile" href="<?php echo base_url('home/pub_conf/'.$user->user_id)?>">Publication - Conference</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'admin_exp')==0)?'list-group-item active':'list-group-item';?>" id="midframe" href="<?php echo base_url('home/admin_exp/'.$user->user_id)?>">Adminstrative Experience</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'patent')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/patent/'.$user->user_id)?>">Patents</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'teaching_exp')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/teaching_exp/'.$user->user_id)?>">Teaching Experience</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'phd_thesis_supervised')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/phd_thesis_supervised/'.$user->user_id)?>">Ph.D. Thesis Supervised</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'mtech_thesis_supervised')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/mtech_thesis_supervised/'.$user->user_id)?>">M.Tech Thesis Supervised</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'btech_project_supervised')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/btech_project_supervised/'.$user->user_id)?>">B.Tech Project Supervised</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'project_investigated')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/project_investigated/'.$user->user_id)?>">Project Investigated</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'employement')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/employement/'.$user->user_id)?>">Employement</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'lecture')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/lecture/'.$user->user_id)?>">Guest Lecture</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'book')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/book/'.$user->user_id)?>">Book Published</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'chapter')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/chapter/'.$user->user_id)?>">Chapter Published</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'activty')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('home/activty/'.$user->user_id)?>">Activity Organised</a>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <?php 
                    if(isset($segment1) && $segment1 != ""){?>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-12">
                               <?php  include($segment1); ?>
                            </div>
                        </div>
                 <?php }?>
                <?php 
                    if(isset($segment2) && $segment2 != ""){?>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-12">
                               <?php  include($segment2); ?>
                            </div>
                        </div>
                 <?php }?>
                <?php 
                    if(isset($segment3) && $segment3 != ""){?>
                        <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
                            <div class="col-md-12">
                               <?php  include($segment3); ?>
                            </div>
                        </div>
                 <?php }?>
            </div>
        </div>
        </div>
    </div>
</section>


