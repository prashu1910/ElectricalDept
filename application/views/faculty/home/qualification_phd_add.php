<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Add Ph.D. Qualification</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url('home/add_phd_qualification')?>">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Date of Registration</label>
                            <div class="col-sm-4">
                               <div class="">
                                    <div class='input-group date' id='registration_date'>
                                        <input type='text' class="form-control" readonly name="registration_date"  />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                    $(function () {
                                        $('#registration_date').datetimepicker({
                                            'format':'DD-MM-YYYY',
                                            'useCurrent': false,
                                            'ignoreReadonly':true
                                        });
                                    });
                                </script>
                            <label  class="col-sm-2 control-label">Date of Award</label>
                            <div class="col-sm-3">
                               <div class="">
                                    <div class='input-group date' id='award_date'>
                                        <input type='text' class="form-control" readonly name="award_date"  />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                    $(function () {
                                        $('#award_date').datetimepicker({
                                            'format':'DD-MM-YYYY',
                                            'useCurrent': false,
                                            'ignoreReadonly':true
                                        });
                                    });
                                </script>
                            
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Institute / University</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="institute" />
                            </div>
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="title" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Area</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="area" />
                            </div>
                            <label  class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-3">
                                <select name="status" class="form-control">
                                    <option value="">-Select-</option>
                                    <option value="1">Awarded</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input type="submit"  value="Add" class="btn btn-success"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>