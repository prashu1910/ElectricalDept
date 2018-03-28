<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Guest Lecture Details</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Lecture Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="lecture_title" value="<?php echo $lecture != NULL ? $lecture->lecture_title: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Organisation</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="organisation" value="<?php echo $lecture != NULL ? $lecture->organisation: ""?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-4">
                                <div class="">
                                    <div class='input-group date' id='date'>
                                        <input type='text' class="form-control" name="date"  value="<?php echo $lecture != NULL ? $lecture->date: ""?>"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#date').datetimepicker({
                                            'format':'YYYY-MM-DD',
                                            'useCurrent': false,
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-9">
                                <select class="form-control"  name="type">
                                    <option value="">-Select-</option>
                                    <option value="1" <?php echo $lecture != NULL && $lecture->type == "1"?"selected": ""?>>Short Term Course</option>
                                    <option value="2" <?php echo $lecture != NULL && $lecture->type == "2"?"selected": ""?>>Conference</option>
                                    <option value="3" <?php echo $lecture != NULL && $lecture->type == "3"?"selected": ""?>>Organisation</option>
                                </select>
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