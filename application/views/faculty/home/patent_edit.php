<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Patent</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        
                         <div class="form-group">
                            <label  class="col-sm-2 control-label">Patent Reg. No.</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="patent_reg_no" value="<?php echo $patent != NULL ? $patent->patent_reg_no: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="name" value="<?php echo $patent != NULL ? $patent->name: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Patent Date</label>
                            <div class="col-sm-4">
                                <div class="">
                                    <div class='input-group date' id='patent_date'>
                                        <input type='text' class="form-control" name="patent_date"  value="<?php echo $patent != NULL ? $patent->patent_date: ""?>"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#patent_date').datetimepicker({
                                            'format':'YYYY-MM-DD',
                                            'useCurrent': false,
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Awarding Country</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="awarding_country" value="<?php echo $patent != NULL ? $patent->awarding_country: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Other Coawardee</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="other_coawardee" value="<?php echo $patent != NULL ? $patent->other_coawardee: ""?>"/>
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