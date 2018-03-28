<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Conference</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="title" value="<?php echo $conf != NULL ? $conf->title: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Conference Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="conference" value="<?php echo $conf != NULL ? $conf->conference_name: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">City</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="city" value="<?php echo $conf != NULL ? $conf->city: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="country" value="<?php echo $conf != NULL ? $conf->country: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Start Date</label>
                            <div class="col-sm-4">
                                <div class="">
                                    <div class='input-group date' id='start_date'>
                                        <input type='text' class="form-control" name="start_date"  value="<?php echo $conf != NULL ? $conf->start_date: ""?>"/>
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
                                        <input type='text' class="form-control" name="end_date"  value="<?php echo $conf != NULL ? $conf->end_date: ""?>"/>
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
                            <label  class="col-sm-2 control-label">Volume</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="volume" value="<?php echo $conf != NULL ? $conf->volume: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Volume No.</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="volume_no" value="<?php echo $conf != NULL ? $conf->volume_no: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Page from</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="page_from" value="<?php echo $conf != NULL ? $conf->page_from: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Page to</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="page_to" value="<?php echo $conf != NULL ? $conf->page_to: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ISBN</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="isbn" value="<?php echo $conf != NULL ? $conf->isbn: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">ISSN</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="issn" value="<?php echo $conf != NULL ? $conf->issn: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Citation</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="citation" value="<?php echo $conf != NULL ? $conf->citation: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">DOI</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="doi" value="<?php echo $conf != NULL ? $conf->digital_object_identifier: ""?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Conference Type</label>
                            <div class="col-sm-4">
                                <select class="form-control"  name="type">
                                    <option value="">-Select-</option>
                                    <option value="1" <?php echo $conf != NULL && $conf->conference_type == "1" ? "selected": ""?>>International</option>
                                    <option value="2" <?php echo $conf != NULL && $conf->conference_type == "2d" ? "selected": ""?>>National</option>
                                </select>
                            </div>
                            <label  class="col-sm-2 control-label">Nature of Presentation </label>
                            <div class="col-sm-3">
                                <select class="form-control"  name="nature">
                                    <option value="">-Select-</option>
                                    <option value="1" <?php echo $conf != NULL && $conf->presentation_nature == "1" ? "selected": ""?>>Poster</option>
                                    <option value="2" <?php echo $conf != NULL && $conf->presentation_nature == "2" ? "selected": ""?>>Oral</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Other Authors</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="other_author" value="<?php echo $conf != NULL ? $conf->other_authors: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Link</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="link" value="<?php echo $conf != NULL ? $conf->link: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Organisor</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="organisor" value="<?php echo $conf != NULL ? $conf->organisor: ""?>"/>
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