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
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-2">
                            <select class="form-control" id="saluataion" name="salutation">
                                <option value="">-Select-</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss.">Miss.</option>
                                <option value="Dr.">Dr.</option>
                                <option value="Proff.">Proff.</option>
                              </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="mname" placeholder="Middle Name" name="mname">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Designation</label>
                        <div class="col-sm-5">
<!--                            <input type="text" class="form-control" id="designation" placeholder="Designation" name="designation">-->
                            <select class="form-control" id="saluataion" name="designation">
                                <option value="">-Select-</option>
                                <option value="Professor">Professor</option>
                                <option value="Associate Professor">Associate Professor</option>
                                <option value="Assistant Professor">Assistant Professor</option>
                              </select>
                        </div>
                        <label  class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="gender" name="gender">
                                <option value="">-Select-</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email"></input>
                        </div>
                        <label  class="col-sm-2 control-label">Date of Joining</label>
                        <div class="col-sm-3">
                            <div class="">
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" name="doj"  />
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
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">User Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username"></input>
                        </div>
                        <label  class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="password" placeholder="Password" name="password"></input>
                        </div>
                    </div>
                    <div class="form-group">
<!--                        <label  class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-5">
                            <select class="form-control" id="role" name="role">
                                <option value="">-Select-</option>
                                <option value="2">faculty</option>
                                <option value="3">HOD</option>
                            </select>
                        </div>-->
                        <label  class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-3">
                            <select class="form-control" id="type" name="type">
                                <option value="">-Select-</option>
                                <option value="1">Permanent</option>
                                <option value="2">Guest</option>
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




