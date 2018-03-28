<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Investigated Project</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" value="<?php echo $project != NULL ? $project->title: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Sponsor Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="sponsor_name" value="<?php echo $project != NULL ? $project->sponsor_name: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Amount</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="amount" value="<?php echo $project != NULL ? $project->amount: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Project Type</label>
                            <div class="col-sm-3">
                                <select class="form-control"  name="type">
                                    <option value="">-Select-</option>
                                    <option value="1" <?php echo $project != NULL && $project->type == "1" ? "selected": "" ?>>Sponsored Research Project</option>
                                    <option value="2" <?php echo $project != NULL && $project->type == "2" ? "selected": "" ?>>Consultancy Project</option>
                                    <option value="3" <?php echo $project != NULL && $project->type == 3 ?  "selected": "" ?>>Testing Project</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Start Date</label>
                            <div class="col-sm-4">
                                <div class="">
                                    <div class='input-group date' id='start_date'>
                                        <input type='text' class="form-control" name="start_date"  value="<?php echo $project != NULL ? $project->start_date: ""?>"/>
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
                                        <input type='text' class="form-control" name="end_date" value="<?php echo $project != NULL ? $project->end_date: ""?>"/>
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
                            <label  class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" row="10" name="details"  ><?php echo set_value('details',$project != NULL ? $project->details: ""); ?></textarea>
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