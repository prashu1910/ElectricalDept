<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $title?></h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <input type="hidden" name="type" value="<?php echo $type?>"/>
                         <div class="form-group">
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" value="<?php echo $project != NULL ? $project->title: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Institute</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="institute" value="<?php echo $project != NULL ? $project->institute: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="year" value="<?php echo $project != NULL ? $project->year: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-3">
                                <select class="form-control"  name="status">
                                    <option value="">-Select-</option>
                                    <option value="Completed" <?php echo $project != NULL && $project->status == "Completed"?'selected': ""?>>Completed</option>
                                    <option value="Ongoing"  <?php echo $project != NULL && $project->status =="Ongoing" ? "selected": ""?>>Ongoing</option>
                                </select>
                            </div>
                        </div>
                        
                       <div class="form-group">
                            <label  class="col-sm-2 control-label">Student</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="student" value="<?php echo $project != NULL ? $project->student: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Other Supervisor</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="other_supervisor" value="<?php echo $project != NULL ? $project->other_supervisors: ""?>"/>
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