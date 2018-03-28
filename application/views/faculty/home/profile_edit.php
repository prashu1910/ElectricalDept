<??>
<section style="background: #fff;padding-bottom:10px ">
    <div class="panel-heading alert alert-info">Basic Details</div>
    <?php if(validation_errors() != null){?>
    <div class="alert alert-danger alert-dismissable">
            <?php echo validation_errors();
            ?>
     </div>
    <?php } ?>
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data"  accept-charset="utf-8">
        <div class="form-group">
            <label  class="col-sm-2 control-label">Name</label>
            <div class="col-sm-2">
                <select class="form-control" id="saluataion" name="salutation">
                    <option value="">-Select-</option>
                    <option value="Mr." <?php echo $user->salutation == 'Mr.' ? 'selected' : '';?>>Mr.</option>
                    <option value="Mrs." <?php echo $user->salutation == 'Mrs.' ? 'selected' : '';?>>Mrs.</option>
                    <option value="Miss." <?php echo $user->salutation == 'Miss.' ? 'selected' : '';?>>Miss.</option>
                    <option value="Dr." <?php echo $user->salutation == 'Dr.' ? 'selected' : '';?>>Dr.</option>
                    <option value="Proff." <?php echo $user->salutation == 'Prof.' ? 'selected' : '';?>>Prof.</option>
                </select>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?php echo $user->user_fname?>">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="mname" placeholder="Middle Name" name="mname" value="<?php echo $user->user_mname?>">
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?php echo $user->user_lname?>">
            </div>
        </div>
    
    <div class="form-group">
        <label  class="col-sm-2 control-label">Email</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="email" value="<?php echo $user->email?>"/>
        </div>
        <label  class="col-sm-2 control-label">Secondary Email</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="sec_email" value="<?php echo $user->sec_email?>"/>
        </div>
    </div>
    
    <div class="form-group">
        <label  class="col-sm-2 control-label">Father's Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="father_name" value="<?php echo $user->father_name?>"/>
        </div>
        <label  class="col-sm-2 control-label">Mother's Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="mother_name" value="<?php echo $user->mother_name?>"/>
        </div>
    </div>
    
    <div class="form-group">
        <label  class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-4">
            <select class="form-control" id="gender" name="gender">
                <option value="">-Select-</option>
                <option value="Male" <?php echo $user->gender == 'Male' ? 'selected' : '';?>>Male</option>
                <option value="Female" <?php echo $user->gender == 'Female' ? 'selected' : '';?>>Female</option>
            </select>
        </div>
        <label  class="col-sm-2 control-label">Designation</label>
        <div class="col-sm-3">
            <input type="hidden" value="<?php echo $user->designation ?>" name="designation"/>
            <?php echo $user->designation ?>
        </div>
    </div>
    
    <div class="form-group">
        <label  class="col-sm-2 control-label">Date of birth</label>
        <div class="col-sm-4">
            <div class="">
                <div class='input-group date' id='dob'>
                    <input type='text' class="form-control" name="dob" value="<?php echo $user->dob==0 ? "" :date_format(date_create_from_format('Y-m-d', $user->dob), 'd-m-y')?>" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#dob').datetimepicker({
                        'format':'DD-MM-YYYY',
                        'useCurrent': false
                    });
                });
            </script>
        </div>
        <label  class="col-sm-2 control-label">Date of Joining</label>
        <div class="col-sm-3">
            <input type="hidden" value="<?php echo $user->date_of_joining ?>" name="doj"/>
            <?php echo date("d-m-Y", strtotime($user->date_of_joining))  ?>
        </div>
    </div>
    

    <div class="form-group">
        <label  class="col-sm-2 control-label">Marital Status</label>
        <div class="col-sm-4">
            <select class="form-control" id="marital_status" name="marital_status">
                <option value="">-Select-</option>
                <option value="Married" <?php echo $user->marital_status == 'Married' ? 'selected' : '';?>>Married</option>
                <option value="Single" <?php echo $user->marital_status == 'Single' ? 'selected' : '';?>>Single</option>
                <option value="Divorced" <?php echo $user->marital_status == 'Divorced' ? 'selected' : '';?>>Divorced</option>
                <option value="Widowed" <?php echo $user->marital_status == 'Widowed' ? 'selected' : '';?>>Widowed</option>
            </select>
        </div>
        <label  class="col-sm-2 control-label">Nationality</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="nationality" value="<?php echo $user->nationality?>"/>
        </div>
    </div>
        
    <div class="form-group">
        <label  class="col-sm-2 control-label">Domicile</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="domicile" value="<?php echo $user->domicile?>"/>
        </div>
        <label  class="col-sm-2 control-label">Religion</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="religion" value="<?php echo $user->religion?>"/>
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">Office Phone</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="office_phone" value="<?php echo $user->phone_office?>"/>
        </div>
        <label  class="col-sm-2 control-label">Residence Phone</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="residence_phone" value="<?php echo $user->phone_residence?>"/>
        </div>
    </div>
        
    <div class="form-group">
        <label  class="col-sm-2 control-label">Personal Phone</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="personal_phone" value="<?php echo $user->phone_personal?>"/>
        </div>
        <label  class="col-sm-2 control-label">Fax</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="fax" value="<?php echo $user->fax?>"/>
        </div>
    </div>    
    
    
    <div class="form-group">
        <div class="col-md-2 text-right"><label class="control-label ">Resume</label></div>
        <div class="col-md-4">
            <input class="form-control" name="resume" type="file"/>
        </div>
        <?php if($user->resume_link != ""){?>
        <div class="col-md-5">
            <a target="_blank" href="<?php echo base_url(RESUME_UPLOAD_FOLDER.'/'.$user->resume_link)?>">View Resume</a>
        </div>
    <?php }?>
    </div>
        
    <div class="form-group">
        <div class="col-md-2 text-right"><label class="control-label ">Area of Interest</label></div>
        <div class="col-md-9">
            <input class="form-control" name="aoi" type="text" s value="<?php echo $aoi?>"/>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-12 text-center">
            <input type="submit"  value="Save" class="btn btn-success"/>
        </div>
    </div>
    </form>
</section>


