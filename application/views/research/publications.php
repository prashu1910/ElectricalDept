<section style="padsding: 150px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div>
                    <div class="list-group">            
                        <a class="<?php echo (strcmp($this->uri->segment(3),'journal')==0)?'list-group-item active':'list-group-item'; ?>"  name="profile" href="<?php echo base_url('research/publication/journal')?>">Journals</a>
                        <a class="<?php echo (strcmp($this->uri->segment(3),'conference')==0)?'list-group-item active':'list-group-item'; ?>" name="profile" href="<?php echo base_url('research/publication/conference')?>">Conferences</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <?php 
                    if(isset($page) && $page != "")
                        include($page);
                ?>
            </div>
        </div>
        </div>
    </div>
</section>
