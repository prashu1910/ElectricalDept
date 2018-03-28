
<section style="">
     
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div style="background: #fff;padding: 30px;">
                <h3 style="    margin-bottom: 25px;text-align: center;">Assign Head of Department</h3>
                <form class="form-horizontal" method="post" action="" >
                    <?php if(isset($hod)) {?>
                    <div class="form-group">
                        <label  class="col-sm-4 control-label">Current HOD</label>
                        <label  class="col-sm-6 "><?php echo $hod->user_fname." ".$hod->user_mname." ".$hod->user_lname?></label>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-4 control-label">End Date</label>
                        <div class="col-sm-6">
                            <div class="">
                                <div class='input-group date' id='end_date'>
                                    <input type='text' class="form-control" id="end_date"  name="end_date"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#end_date').datetimepicker({
                                        'format':'YYYY-MM-DD',
                                        'useCurrent': false,
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <label  class="col-sm-4 control-label">Faculty</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="faculty" name="user_id">
                                <option value="">-Select-</option>
                                <?php foreach ($result as $row) { ?>
                                    <option value="<?php echo $row->user_id?>"><?php echo $row->user_fname." ".$row->user_mname." ".$row->user_lname?></option>
                                 <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-4 control-label">Start Date</label>
                        <div class="col-sm-6">
                            <div class="">
                                <div class='input-group date' id='start_date'>
                                    <input type='text' class="form-control"  name="start_date"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#start_date').datetimepicker({
                                        'format':'YYYY-MM-DD',
                                        'useCurrent': false,
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" class="form-control btn btn-primary" id="submit" name="submit" value="Submit"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>