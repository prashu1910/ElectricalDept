<section style="padsding: 150px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div>
                    <div class="list-group">            
                        <a class="<?php echo (strcmp($this->uri->segment(2),'')==0)?'list-group-item active':'list-group-item'; ?>"  name="profile" href="<?php echo base_url('news')?>">News</a>
                        <a class="<?php echo (strcmp($this->uri->segment(2),'events')==0)?'list-group-item active':'list-group-item'; ?>" name="profile" href="<?php echo base_url('news/events')?>">Events</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <?php 
                    include("news_details.php");
                ?>
            </div>
        </div>
        </div>
    </div>
</section>


