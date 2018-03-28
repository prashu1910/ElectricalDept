
<section style="background: #fff;padding-bottom:10px ">
    <div class="panel-heading alert alert-info">Basic Details</div>
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Name:</label></div>
        <div class="col-md-10">
            <?php echo $user->salutation." ".$user->user_fname." ".$user->user_mname." ".$user->user_lname ?>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Email:</label></div>
        <div class="col-md-4">
            <?php echo $user->email ?>
        </div>
        <div class="col-md-2 text-right"><label class="control-label ">Secondary Email:</label></div>
        <div class="col-md-4">
            <?php echo $user->sec_email ?>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Father's Name:</label></div>
        <div class="col-md-4">
            <?php echo $user->father_name ?>
        </div>
        <div class="col-md-2 text-right"><label class="control-label ">Mother's Name:</label></div>
        <div class="col-md-4">
            <?php echo $user->mother_name ?>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Gender:</label></div>
        <div class="col-md-4">
            <?php echo $user->gender ?>
        </div>
        <div class="col-md-2 text-right"><label class="control-label ">Designation:</label></div>
        <div class="col-md-4">
            <?php echo $user->designation ?>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Date of birth:</label></div>
        <div class="col-md-4">
            <?php echo $user->dob > 0 ? $user->dob : "" ?>
        </div>
        <div class="col-md-2 text-right"><label class="control-label ">Date of Joining:</label></div>
        <div class="col-md-4">
            <?php echo explode(" ",$user->date_of_joining)[0] ?>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Marital Status:</label></div>
        <div class="col-md-4">
            <?php echo $user->marital_status ?>
        </div>
        <div class="col-md-2 text-right"><label class="control-label ">Nationality:</label></div>
        <div class="col-md-4">
            <?php echo $user->nationality ?>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Domicile:</label></div>
        <div class="col-md-4">
            <?php echo $user->domicile ?>
        </div>
        <div class="col-md-2 text-right"><label class="control-label ">Religion:</label></div>
        <div class="col-md-4">
            <?php echo $user->religion ?>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Office Phone:</label></div>
        <div class="col-md-4">
            <?php echo $user->phone_office ?>
        </div>
        <div class="col-md-2 text-right"><label class="control-label ">Residence Phone:</label></div>
        <div class="col-md-4">
            <?php echo $user->phone_residence ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Personal Phone:</label></div>
        <div class="col-md-4">
            <?php echo $user->phone_personal ?>
        </div>
        <div class="col-md-2 text-right"><label class="control-label ">Fax:</label></div>
        <div class="col-md-4">
            <?php echo $user->fax ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Area of Interest:</label></div>
        <div class="col-md-10">
            <?php echo $aoi ?>
        </div>
    </div>
    <?php if($user->resume_link != ""){?>
    <div class="row">
        <div class="col-md-2 text-right"><label class="control-label ">Resume:</label></div>
        <div class="col-md-10">
            <a target="_blank" href="<?php echo base_url(RESUME_UPLOAD_FOLDER.'/'.$user->resume_link)?>">View Resume</a>
        </div>
    </div>
    <?php }?>
    <?php if($can_edit){?>
    <div class="row">
        <div class="col-md-12 text-center">
            <a class="btn btn-success" href="<?php echo base_url('home/edit_profile/'.$user->user_id)?>">Edit</a>
        </div>
    </div>
    <?php }?>
</section>