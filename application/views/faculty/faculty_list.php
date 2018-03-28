<section style="paddding: 150px 0px">
    <div class="container">
        <?php foreach($faculty as $row){?>
            <div class="row">
                <?php foreach($row as $fac){?>
                    <div class="col-md-3 col-sm-3 col-lg-3">
                        <div style="position: relative;margin: 0 0 2em 0;text-align: center;background: #fff;padding: 30px 30px 10px 30px;border: 1px solid #ededed;">
                            <a>
                                <p>
                                    <img style="background-color: #ededed;-moz-box-shadow: 0px 0px 0px 5px #ededed;-webkit-box-shadow: 0px 0px 0px 5px #ededed;box-shadow: 0px 0px 0px 5px #ededed;margin: auto;width: 150px;height: 150px;" class="img-circle img-responsive" src="<?php echo base_url(IMG_UPLOAD_FOLDER.'/'.$fac->image_link)?>"></img>
                                </p>
                            </a>
                            <h3 style="display: block;height: 40px;">
                                <a href="<?php echo base_url('faculty/details/'.$fac->user_id)?>"><?php echo $fac->salutation." ".$fac->user_fname." ".$fac->user_lname?></a>
                            </h3>
                            <h3>
                                <small><?php echo $fac->designation?></small>
                                <?php if($hod && $hod->user_id == $fac->user_id) {?>
                                <small>(HOD)</small>
                                <?php }?>
                            </h3>
                            <p style="height: 100px;margin-top: 20px;overflow: hidden;"><?php echo $fac->area_of_interest?></p>
                            <hr></hr>
                            <a  class="btn btn-primary" href="<?php echo base_url('faculty/details/'.$fac->user_id)?>">Profile</a>
                        </div>
                    </div>
                <?php  }?>
        </div>
                <?php  }?>
    </div>
</section>

