<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Teaching Experience</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        
                         <div class="form-group">
                            <label  class="col-sm-2 control-label">Course Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="course_name" value="<?php echo $exp != NULL ? $exp->course_name: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Semester</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="semester" value="<?php echo $exp != NULL ? $exp->semester: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="year" value="<?php echo $exp != NULL ? $exp->year: ""?>"/>
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