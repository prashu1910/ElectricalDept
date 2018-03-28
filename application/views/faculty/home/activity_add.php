<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Add New Activity Details</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" />
                            </div>
                            <label  class="col-sm-2 control-label">In Capacity Of</label>
                            <div class="col-sm-3">
                                <select class="form-control"  name="in_capacity_of">
                                    <option value="">-Select-</option>
                                    <option value="Coordinator" >Coordinator</option>
                                    <option value="Convener">Convener</option>
                                    <option value="Organising Secretary">Organising Secretary</option>
                                    <option value="General Chair">General Chair</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Duration</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="duration" />
                            </div>
                            <label  class="col-sm-2 control-label">Organized At</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="organized_at" />
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Sponsor</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="sponsor" />
                            </div>
                            <label  class="col-sm-2 control-label">Amount</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="amount" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Activity Type</label>
                            <div class="col-sm-4">
                                <select class="form-control"  name="type">
                                    <option value="">-Select-</option>
                                    <option value="1" >Short-term course</option>
                                    <option value="2">Conference</option>
                                    <option value="3 Secretary">Seminar</option>
                                    <option value="4 Chair">Workshop</option>
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