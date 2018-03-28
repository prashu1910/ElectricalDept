<section style="paddihng: 100px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <div>
                    <div class="list-group">            
                        <?php if($this->session->userdata['logged_in']['role'] == 3){?>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'faculty')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('hod/faculty')?>">View Faculty Profiles</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'adv_query')==0)? 'list-group-item active' : 'list-group-item';?>" id="midframe" href="<?php echo base_url('hod/adv_query')?>">Advance Query</a>
                        <?php }?>
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