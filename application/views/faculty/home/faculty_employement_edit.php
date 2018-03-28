<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Employement Detail</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Position</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="position" value="<?php echo $emp != NULL ? $emp->position: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Organisation</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="organisation" value="<?php echo $emp != NULL ? $emp->organisation: ""?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Start Date</label>
                            <div class="col-sm-4">
                                <div class="">
                                    <div class='input-group date' id='start_date'>
                                        <input type='text' class="form-control" name="start_date"  value="<?php echo $emp != NULL ? $emp->start_date: ""?>"/>
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
                            <label  class="col-sm-2 control-label">End Date</label>
                            <div class="col-sm-3">
                                <div class="">
                                    <div class='input-group date' id='end_date'>
                                        <input type='text' class="form-control" name="end_date"  value="<?php echo $emp != NULL ? $emp->end_date: ""?>"/>
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
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Work</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" row="10" name="work_nature" ><?php echo set_value('details',$emp != NULL ? $emp->work_nature: ""); ?></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input type="submit"  value="Save" class="btn btn-success"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>