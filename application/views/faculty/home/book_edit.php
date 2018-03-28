<div class="row">
    <div class="col-md-12 col-sm-12">
        <div id="profile">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Edit Book Details</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Book Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="book_title" value="<?php echo $book != NULL ? $book->book_title: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">Publisher</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="publisher" value="<?php echo $book != NULL ? $book->publisher: ""?>"/>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ISBN</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="isbn" value="<?php echo $book != NULL ? $book->isbn: ""?>"/>
                            </div>
                            <label  class="col-sm-2 control-label">ISSN</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="issn" value="<?php echo $book != NULL ? $book->issn: ""?>"/>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Year</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="year" value="<?php echo $book != NULL ? $book->year: ""?>"/>
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