<section>
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="background: #fff">
                <h3>Add News</h3>
            </div>
        </div>
    <?php if(isset($error)){?>
    <div class="row">
        <div class="col-md-12 col-sm-12 alert alert-danger alert-dismissible">
           <?php echo $error?> 
        </div>
        </div>
    <?php }?>
    <?php if(isset($sucess)){?>
    <div class="row">
        <div class="col-md-12 col-sm-12 alert alert-success alert-dismissible">
           <?php echo $sucess?> 
        </div>
        </div>
    <?php }?>
        <div class="row">
            <div class="col-md-12 col-sm-12" style="background: #fff">
                <form class="form-horizontal" style="padding:5px" method="post" action="">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control" id="title" placeholder="Title" name="title"></input>
                        </div>
                        <label  class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control" id="link" placeholder="link" name="link"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" row="10" name="content" id="content"></textarea>
                            <script type="text/javascript">
                                $(function () {
                                    $( '#content' ).ckeditor();
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">News Date</label>
                        <div class="col-sm-3">
                            <div class="">
                                <div class='input-group date' id='news_date'>
                                    <input type='text' class="form-control" readonly="" name="date"  />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#news_date').datetimepicker({
                                        'format':'DD-MM-YYYY hh:mm:ss',
                                        'useCurrent': false,
                                        'ignoreReadonly':true
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-5">
                            <input type="submit" class="form-control btn btn-primary" id="submit" name="submit" value="Submit"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>

