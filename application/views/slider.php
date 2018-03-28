<?php $i = 0;?>
<section>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-8">
            <div id="slider" style="height: 400px;margin-top: 10px;margin-left:10px ">
                <div class="slider_area">
            <!-- Start super slider -->
            <div id="slides">
              <ul class="slides-container">                          
                <li>
                    <img src="<?php echo base_url('bootstrap/img/gallery1.jpg'); ?>" alt="img">
                   <div class="slider_caption">
<!--                    <h2>Largest & Beautiful University</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    <a class="slider_btn" href="#">Know More</a>-->
                  </div>
                  </li>
                <!-- Start single slider-->
                <li>
                  <img src="<?php echo base_url('bootstrap/img/gallery2.jpg'); ?>" alt="img">
                   <div class="slider_caption slider_right_caption">
<!--                    <h2>Better Education Environment</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search</p>
                    <a class="slider_btn" href="#">Know More</a>-->
                  </div>
                </li>
                <!-- Start single slider-->
                <li>
                  <img src="<?php echo base_url('bootstrap/img/gallery3.jpg'); ?>" alt="img">
                   <div class="slider_caption">
<!--                    <h2>Find out you in better way</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search</p>
                    <a class="slider_btn" href="#">Know More</a>-->
                  </div>
                </li>
              </ul>
              <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
              </nav>
            </div>
          </div>
            </div>
        </div>
          <div class="col-lg-4 col-md-4 col-sm-4" style="margin-top:10px">
          <div class="newsfeed_area wow fadeInRight">
            <ul class="nav nav-tabs feed_tabs" id="myTab2">
              <li class="active"><a href="#news" data-toggle="tab">News</a></li>
              <li><a href="#events" data-toggle="tab">Events</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Start news tab content -->
              <div class="tab-pane fade in active" id="news">
                <ul class="news_tab">
                    
                    <?php foreach($news as $row) {
                        if($i > 3) break;
                        $i++;?>
                            <li>
                              <div class="media">
                                <div class="media-left">
                                  <a class="news_img" href="#">
                                      <img class="media-object" src="<?php echo base_url('bootstrap/img/project2.jpg');?>" alt="img">
                                  </a>
                                </div>
                                <div class="media-body">
                                 <a href="<?php echo $row->link?>"><?php echo  $row->title?></a>
                                 <span class="feed_date"><?php echo $row->timestamp?></span>
                                </div>
                              </div>
                            </li>
                    <?php } $i = 0?>
                </ul>
                  <a class="see_all" href="<?php echo base_url('news')?>">See All</a>
              </div>
              <!-- Start notice tab content -->
<!--              <div class="tab-pane fade " id="notice">
                <div class="single_notice_pane">
                  <ul class="news_tab">
                    <?php foreach($events as $row) {
                        if($i > 3) break;
                        $i++;?>
                            <li>
                              <div class="media">
                                <div class="media-left">
                                  <a class="news_img" href="#">
                                      <img class="media-object" src="<?php echo base_url('bootstrap/img/project2.jpg');?>" alt="img">
                                  </a>
                                </div>
                                <div class="media-body">
                                 <a href="<?php echo $row->link?>"><?php echo  $row->title?></a>
                                 <span class="feed_date"><?php echo $row->timestamp?></span>
                                </div>
                              </div>
                            </li>
                    <?php }?>
                  </ul>
                  <ul class="news_tab">
                    <li>
                      <div class="media">
                        <div class="media-left">
                          <a class="news_img" href="#">
                            <img class="media-object" src="<?php echo base_url('bootstrap/img/project2.jpg');?>" alt="img">
                          </a>
                        </div>
                        <div class="media-body">
                         <a href="http://www.renaissance.mnnit.ac.in/">Renaissance '17 - the annual entrepreneurship summit of MNNIT Allahabad is on March 4 & 5, 2017.</a>
                       <span class="feed_date">27.03.17</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media">
                        <div class="media-left">
                          <a class="news_img" href="#">
                            <img class="media-object" src="<?php echo base_url('bootstrap/img/project2.jpg');?>" alt="img">
                          </a>
                        </div>
                        <div class="media-body">
                         <a href="https://academics.mnnit.ac.in/fresh_mba/">Application to M.B.A programme for session 2017-18</a>
                       <span class="feed_date">29.03.17</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media">
                        <div class="media-left">
                          <a class="news_img" href="#">
                            <img class="media-object" src="<?php echo base_url('bootstrap/img/project2.jpg');?>" alt="img">
                          </a>
                        </div>
                        <div class="media-body">
                         <a href="http://www.renaissance.mnnit.ac.in/">Renaissance '17 - the annual entrepreneurship summit of MNNIT Allahabad is on March 4 & 5, 2017.</a>
                       <span class="feed_date">27.03.17</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>-->
              <!-- Start events tab content -->
              <div class="tab-pane fade " id="events">
                <ul class="news_tab">
                  <?php foreach($events as $row) {
                        if($i > 3) break;
                        $i++;?>
                            <li>
                              <div class="media">
                                <div class="media-left">
                                  <a class="news_img" href="#">
                                      <img class="media-object" src="<?php echo base_url('bootstrap/img/project2.jpg');?>" alt="img">
                                  </a>
                                </div>
                                <div class="media-body">
                                 <a href="<?php echo $row->link?>"><?php echo  $row->title?></a>
                                 <span class="feed_date"><?php echo $row->timestamp?></span>
                                </div>
                              </div>
                            </li>
                    <?php }?>
                </ul>
                  <a class="see_all" href="<?php echo base_url('news/events')?>">See All</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
</section>