<section style="paddfing: 150px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div>
                    <div class="list-group"> 
                        <?php foreach($lab as $row){?>
                        <a class="<?php echo (strcmp($this->uri->segment(3),$row->lab_id)==0)?'list-group-item active':'list-group-item'; ?>"   href="<?php echo base_url('lab/lab_detail/'.$row->lab_id)?>"><?php echo $row->name?></a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <?php if($this->uri->segment(3))
                    include("lab_details.php");
                ?>
            </div>
        </div>
        </div>
    </div>
</section>


