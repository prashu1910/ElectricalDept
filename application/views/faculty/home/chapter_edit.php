<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Chapter Details</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Book Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="book_title" value="<?php echo $chapter != NULL ? $chapter->book_title: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Chapter Title</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="chapter_title" value="<?php echo $chapter != NULL ? $chapter->chapter_title: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="year" value="<?php echo $chapter != NULL ? $chapter->year: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">ISBN</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="isbn" value="<?php echo $chapter != NULL ? $chapter->isbn: ""?>"/>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Page From</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="page_from" value="<?php echo $chapter != NULL ? $chapter->page_from: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Page To</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="page_to" value="<?php echo $chapter != NULL ? $chapter->page_to: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Publisher</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="publisher" value="<?php echo $chapter != NULL ? $chapter->publisher: ""?>"/>
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