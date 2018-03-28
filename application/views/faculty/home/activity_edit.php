<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Activity Details</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" value="<?php echo $activity != NULL ? $activity->title: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">In Capacity Of</label>
                            <div class="col-sm-3">
                                <select class="form-control"  name="in_capacity_of">
                                    <option value="">-Select-</option>
                                    <option value="Coordinator" <?php echo $activity != NULL && $activity->in_capacity_of == "Coordinator"? "selected": ""?>>Coordinator</option>
                                    <option value="Convener" <?php echo $activity != NULL && $activity->in_capacity_of == "Convener"? "selected": ""?>>Convener</option>
                                    <option value="Organising Secretary" <?php echo $activity != NULL && $activity->in_capacity_of == "Organising Secretary"? "selected": ""?>>Organising Secretary</option>
                                    <option value="General Chair" <?php echo $activity != NULL && $activity->in_capacity_of == "General Chair"? "selected": ""?>>General Chair</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Duration</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="duration" value="<?php echo $activity != NULL ? $activity->duration: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Organized At</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="organized_at" value="<?php echo $activity != NULL ? $activity->organized_at: ""?>"/>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Sponsor</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="sponsor" value="<?php echo $activity != NULL ? $activity->sponsor: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Amount</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="amount" value="<?php echo $activity != NULL ? $activity->amount: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Activity Type</label>
                            <div class="col-sm-4">
                                <select class="form-control"  name="type">
                                    <option value="">-Select-</option>
                                    <option value="1" <?php echo $activity != NULL && $activity->type == "1"? "selected": ""?>>Short-term course</option>
                                    <option value="2" <?php echo $activity != NULL && $activity->type == "2"? "selected": ""?>>Conference</option>
                                    <option value="3" <?php echo $activity != NULL && $activity->type == "3"? "selected": ""?>>Seminar</option>
                                    <option value="4" <?php echo $activity != NULL && $activity->type == "4"? "selected": ""?>>Workshop</option>
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