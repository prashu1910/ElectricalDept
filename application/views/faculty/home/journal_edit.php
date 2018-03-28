<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Journal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" value="<?php echo $journal != NULL ? $journal->title: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Journal Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="journal" value="<?php echo $journal != NULL ? $journal->journal: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Volume</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="volume" value="<?php echo $journal != NULL ? $journal->volume: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Volume No.</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="volume_no" value="<?php echo $journal != NULL ? $journal->volume_no: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Page from</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="page_from" value="<?php echo $journal != NULL ? $journal->page_from: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Page to</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="page_to" value="<?php echo $journal != NULL ? $journal->page_to: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="year" value="<?php echo $journal != NULL ? $journal->year: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Impact factor</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="impact_factor" value="<?php echo $journal != NULL ? $journal->impact_factor: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Citation</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="citation" value="<?php echo $journal != NULL ? $journal->citation: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">DOI</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="doi" value="<?php echo $journal != NULL ? $journal->digital_object_identifier: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Journal Type</label>
                            <div class="col-sm-4">
                                <select class="form-control"  name="type">
                                    <option value="">-Select-</option>
                                    <option value="1" <?php echo $journal != NULL && $journal->journal_type == "1" ? "selected": ""?>>International</option>
                                    <option value="2" <?php echo $journal != NULL && $journal->journal_type == "2" ? "selected" : ""?>>National</option>
                                </select>
                            </div>
                            <label  class="col-sm-2 control-label">status</label>
                            <div class="col-sm-3">
                                <select class="form-control"  name="status">
                                    <option value="">-Select-</option>
                                    <option value="1" <?php echo $journal != NULL && $journal->status == "1" ? "selected": ""?>>Accepted</option>
                                    <option value="2" <?php echo $journal != NULL && $journal->status == "2" ? "selected": ""?>>Under Review</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Other Authors</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="other_author" value="<?php echo $journal != NULL ? $journal->other_authors: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Link</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="link" value="<?php echo $journal != NULL ? $journal->link: ""?>"/>
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