<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Add New Journal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" />
                            </div>
                            <label  class="col-sm-2 control-label">Journal Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="journal" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Volume</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="volume" />
                            </div>
                            <label  class="col-sm-2 control-label">Volume No.</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="volume_no" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Page from</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="page_from" />
                            </div>
                            <label  class="col-sm-2 control-label">Page to</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="page_to" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="year" />
                            </div>
                            <label  class="col-sm-2 control-label">Impact factor</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="impact_factor" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Citation</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="citation" />
                            </div>
                            <label  class="col-sm-2 control-label">DOI</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="doi" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Journal Type</label>
                            <div class="col-sm-4">
                                <select class="form-control"  name="type">
                                    <option value="">-Select-</option>
                                    <option value="1" >International</option>
                                    <option value="2">National</option>
                                </select>
                            </div>
                            <label  class="col-sm-2 control-label">status</label>
                            <div class="col-sm-3">
                                <select class="form-control"  name="type">
                                    <option value="">-Select-</option>
                                    <option value="1" >Accepted</option>
                                    <option value="2">Under Review</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Other Authors</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="other_author" />
                            </div>
                            <label  class="col-sm-2 control-label">Link</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="link" />
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