

<section id="gallery" style="paddding: 150px 0px">
    <div class="container">
        <?php foreach($gallery as $row){?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div id="gallerySLide" class="gallery_area">
                        <?php foreach($row as $img){?>
                            <a href="<?php echo base_url(GALLERY_UPLOAD_FOLDER)."/".$img->pic_link?>" title="<?php echo $img->title?>">
                              <img class="gallery_img" src="<?php echo base_url(GALLERY_UPLOAD_FOLDER)."/".$img->pic_link?>" alt="img" />
                            <span class="view_btn">View</span>
                            </a>
                        <?php }?>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</section>
