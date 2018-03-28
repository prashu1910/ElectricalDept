<section>
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="background: #fff">
                <h3>Add Gallery</h3>
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
                <form class="form-horizontal" style="padding:5px" method="post" action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
                        <label  class="col-sm-2 control-label">Images</label>
                        <div class="col-sm-4">
                            <input type="file" id="gallery_pics" name="gallery_pics" >
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

