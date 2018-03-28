
<section style="padding: 100px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="background: #fff">
                <h3>Add Faculty</h3>
            </div>
        </div>
        <?php if(isset($msg) && $msg != ""){?>
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center alert alert-danger alert-dismissible" >
                    <?php echo $msg;?>
                </div>
            </div>
        <?php }?>
        <div class="row">
            <div class="col-md-12 col-sm-12" style="background: #fff">
                <form class="form-horizontal" style="padding:5px" method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $result->user_id?>"/>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="saluataion" name="salutation">
                                <option value="">-Select-</option>
                                <option value="Mr." <?php echo ($result->salutation == 'Mr.')?"selected":"" ?>>Mr.</option>
                                <option value="Mrs." <?php echo ($result->salutation == 'Mrs.')?"selected":"" ?>>Mrs.</option>
                                <option value="Miss." <?php echo ($result->salutation == 'Miss.')?"selected":"" ?>>Miss.</option>
                                <option value="Dr." <?php echo ($result->salutation == 'Dr.')?"selected":"" ?>>Dr.</option>
                                <option value="Proff." <?php echo ($result->salutation == 'Proff.')?"selected":"" ?>>Proff.</option>
                              </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="fname" value="<?php echo $result->user_fname?>" placeholder="First Name" name="fname">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="mname" value="<?php echo $result->user_mname ? $result->user_mname : ""?>" placeholder="Middle Name" name="mname">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="lname" value="<?php echo $result->user_lname ? $result->user_lname : ""?>" placeholder="Last Name" name="lname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Designation</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="designation" value="<?php echo $result->designation ? $result->designation : ""?>" placeholder="Designation" name="designation">
                        </div>
                        <label  class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="gender" name="gender">
                                <option value="">-Select-</option>
                                <option value="Male" <?php echo ($result->gender == 'Male')?"selected":"" ?>>Male</option>
                                <option value="Female" <?php echo ($result->gender == 'Female')?"selected":"" ?>>Female</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" value="<?php echo $result->email ? $result->email : ""?>" placeholder="Email" name="email"></input>
                        </div>
                        <label  class="col-sm-2 control-label">Date of Joining</label>
                        <div class="col-sm-3">
                            <div class="">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" name="doj" value="<?php echo $result->date_of_joining?>" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#datetimepicker1').datetimepicker({
                                        'format':'YYYY-MM-DD',
                                        'useCurrent': false,
                                        'defaultDate':$(this).val()
                                    });
                                });
                            </script>
<!--                            <input type="date" class="form-control" id="doj" value="<?php echo $result->date_of_joining ? $result->date_of_joining : ""?>" placeholder="Date" name="doj"></input>-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">User Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $result->username ? $result->username : ""?>" name="username"></input>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="role" name="role">
                                <option value="">-Select-</option>
                                <option value="2" <?php echo ($result->role == 2)?"selected":"" ?>>faculty</option>
                                <option value="3" <?php echo ($result->role == 3)?"selected":"" ?>>HOD</option>
                            </select>
                        </div>
                        <label  class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="type" name="type">
                                <option value="">-Select-</option>
                                <option value="1" <?php echo ($result->type == 1)?"selected":"" ?>>Permanent</option>
                                <option value="2" <?php echo ($result->type == 2)?"selected":"" ?>>Guest</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-5">
                            <input type="submit" class="form-control btn btn-primary" id="submit" name="submit" value="Submit"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


