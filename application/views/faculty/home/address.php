<section style="background: #fff;padding-bottom:10px">
        <div class="panel-heading alert alert-info">Address</div>
    <div class="row">
        <div class="col-md-6 ">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Office Address</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                    <?php if(count($office))
                    {
                     echo $office[0]->addr_line1 != "" ? $office[0]->addr_line1."<br>" :"";
                     echo $office[0]->addr_line2 != "" ? $office[0]->addr_line2."<br>" :"";
                     echo $office[0]->city != "" ? $office[0]->city."<br>" :"";
                     echo $office[0]->state != "" ? $office[0]->state."<br>" :"";
                     echo $office[0]->country != "" ? $office[0]->country."<br>" :"";
                     echo $office[0]->pin_code != "" ? $office[0]->pin_code."<br>" :"";
                    }?>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>Residence Address</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-1">
                    <?php 
                    if(count($home))
                    {
                     echo $home[0]->addr_line1 != "" ? $home[0]->addr_line1."<br>" :"";
                     echo $home[0]->addr_line2 != "" ? $home[0]->addr_line2."<br>" :"";
                     echo $home[0]->city != "" ? $home[0]->city."<br>" :"";
                     echo $home[0]->state != "" ? $home[0]->state."<br>" :"";
                     echo $home[0]->country != "" ? $home[0]->country."<br>" :"";
                     echo $home[0]->pin_code != "" ? $home[0]->pin_code."<br>" :"";
                    }?>
                </div>
            </div>
        </div>
        
    </div>
    <?php if($can_edit) {?>
    <div class="row">
        <div class="col-md-12 text-center">
            <a class="btn btn-success" href="<?php echo base_url('home/edit_address/'.$user->user_id)?>">Edit</a>
        </div>
    </div>
    <?php }?>
</section>
