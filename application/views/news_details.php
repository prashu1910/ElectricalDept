

<div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $type?></h3>
    </div>
    <div class="panel-body">
     <?php foreach($results as $row){?>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="media">
                    <div class="media-left">
                        <a class="news_img" href="#">
                            <img class="media-object" src="<?php echo base_url('bootstrap/img/project2.jpg');?>" alt="img">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="<?php echo $row->link?>"><b><?php echo $type == "News" ? $row->title : $row->title?></b></a>
                     <p><?php echo $row->content?></p>
                     <span class="feed_date"><?php echo $row->timestamp?></span>
                    </div>
                </div>
            </div>
        </div>
    <hr>
<?php }?>
    </div>
</div>



<div class="text-center">
    <?php echo $links?>
</div>