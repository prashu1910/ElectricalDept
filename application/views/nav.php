
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default " role="navigation">  
            <div class="container_fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-lg-2 text-center">
                        <img style="height:150px" class="img-resdponsive" src="<?php echo base_url(IMG_UPLOAD_FOLDER."/logo5.png")?>"/>
                    </div>
                    <div class="col-md-10 col-sm-10 col-lg-10">
                         <div class="navbar-header" style="float:none">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
<!--              <div class="container">
                   <div class="row">
                       <div class="col-md-10 col-sm-10 text-center" style="color: #fff;font-size: 2.2em">
                            Department of Electrical Engineering, MNNIT Allahabad
                        </div>
                    </div> 
              </div>            -->
               
<div  style="color: #fff;font-size: 2.2em;    margin-left: 75px;margin-top: 25px" >
                    Department of Electrical Engineering, MNNIT Allahabad
                </div>
                
              <!-- IMG BASED LOGO  -->
               <!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a>  -->                     
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-left main-nav">
                  <li class=""><a href="http://172.31.131.198">MNNIT</a></li>
                <li class="<?php echo (strcmp($this->uri->segment(1),'')==0)?'active':''; ?>"><a href="<?php echo base_url();?>">Home</a></li>
                <li class="<?php echo (strcmp($this->uri->segment(1),'about')==0)?'active':''; ?>"><a href="<?php echo base_url('about');?>">About</a></li>
                <li class="<?php echo (strcmp($this->uri->segment(1),'course')==0)?' dropdown active':'dropdown'; ?>">
                  <a href="#" class="dropdown-toggle" datfa-toggle="dropdown" role="button" aria-expanded="false">Programs<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      <?php foreach($prog as $row) {?>
                          <li class="<?php echo (strcmp($this->uri->segment(4),$row->branch_id)==0)?'active':''; ?>"><a href="<?php echo base_url('course/course_structure/'.$row->programme_id."/".$row->branch_id);?>"><?php echo $row->p_name."-".$row->b_name?></a></li>
                      <?php }?>
                    
<!--                    <li class="<?php echo (strcmp($this->uri->segment(2),'btech')==0)?'active':''; ?>"><a href="<?php echo base_url('course/mtech');?>">M.Tech</a></li>-->
                    <li class="<?php echo (strcmp($this->uri->segment(2),'phd')==0)?'active':''; ?>"><a href="<?php echo base_url('course/phd');?>">Ph.D.</a></li>               
                  </ul>
                </li>  
                <li class="<?php echo (strcmp($this->uri->segment(1),'faculty')==0 || strcmp($this->uri->segment(1),'student')==0 )?' dropdown active':'dropdown'; ?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">People<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="<?php echo (strcmp($this->uri->segment(1),'faculty')==0)?'active':''; ?>"><a href="<?php echo base_url('faculty');?>">Faculty</a></li>
                   <li class="<?php echo (strcmp($this->uri->segment(1),'student')==0)?'active':''; ?>"><a href="<?php echo base_url('student');?>">Student</a></li>              
                  </ul>
                </li>  
                <li class="<?php echo (strcmp($this->uri->segment(1),'research')==0 )?' dropdown active':'dropdown'; ?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Research<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="<?php echo (strcmp($this->uri->segment(2),'publication')==0)?'active':''; ?>"><a href="<?php echo base_url('research/publication/journal');?>">Publications</a></li>
                    <li class="<?php echo (strcmp($this->uri->segment(2),'project')==0)?'active':''; ?>"><a href="<?php echo base_url('research/project');?>">Projects</a></li>              
                  </ul>
                </li>
                <li class="<?php echo (strcmp($this->uri->segment(1),'gallery')==0)?'active':''; ?>"><a href="<?php echo base_url('gallery');?>">Gallery</a></li>
                <li class="<?php echo (strcmp($this->uri->segment(1),'lab')==0)?'active':''; ?>"><a href="<?php echo base_url('lab');?>">Laboratory</a></li>
                <li class="<?php echo (strcmp($this->uri->segment(1),'news')==0)?'active':''; ?>"><a href="<?php echo base_url('news');?>">News &amp; Events</a></li>
                <li class="<?php echo (strcmp($this->uri->segment(1),'contact')==0)?'active':''; ?>"><a href="<?php echo base_url('contact');?>">Contact Us</a></li>
                <li class="<?php echo (strcmp($this->uri->segment(1),'login')==0)?'active':''; ?>"><a href="<?php echo base_url('login');?>">Login</a></li>
              </ul>           
            </div><!--/.nav-collapse -->
                    </div>
                </div>
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->    
    </header>
    <!--=========== END HEADER SECTION ================--> 
