<section style="padding-bottom:10px">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="background: #fff;">
            <div class="text-center" ><h3>Gallery</h3></div>
        </div>
    </div>
        <?php foreach($gallery as $row){?>
            <div class="row" style="background: #fff;">
                <?php foreach($row as $img){?>
                    <div class="col-md-3 col-sm-3">
                        <div style="position: relative;margin: 0 0 2em 0;text-align: center;padding: 30px 30px 10px 30px;border: 1px solid #ededed;<?php echo $img->show_in_gallery == 0 ? 'background:#e7e7e7':'background:#ffffff'?>">
                            <a>
                                <p>
                                    <img style="background-color: #ededed;-moz-box-shadow: 0px 0px 0px 5px #ededed;-webkit-box-shadow: 0px 0px 0px 5px #ededed;box-shadow: 0px 0px 0px 5px #ededed;margin: auto;width: 150px;height: 150px;" class="img-circle img-responsive" src="<?php echo base_url(GALLERY_UPLOAD_FOLDER)."/".$img->pic_link?>"></img>
                                </p>
                            </a>
                            <a href="<?php echo $img->link?>">
                                <h3><?php echo $img->title?></h3>
                            </a>
                            <h4>
                                <small><?php echo date_format(date_create_from_format('Y-m-d', $img->upload_date), 'd-m-Y');?></small>
                            </h4>
                            <hr></hr>
                            <?php if($img->show_in_gallery > 0){?>
                                <a  class="btn btn-primary" href="<?php echo base_url('admin/disable_pic/'.$img->gallery_id)?>">Hide from gallery</a>
                            <?php } else {?>
                                <a  class="btn btn-primary" href="<?php echo base_url('admin/enable_pic/'.$img->gallery_id)?>">Show in gallery</a>
                            <?php }?>
                        </div>
                    </div>
                <?php  }?>
        </div>
                <?php  }?>
</section>



