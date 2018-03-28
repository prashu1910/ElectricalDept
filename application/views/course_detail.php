<?php
$data = array(1=>"First Semester",
    2=>"Second Semester",
    3=>"Third Semester",
    4=>"Fourth Semester",
    5=>"Fifth Semester",
    6=>"Sixth Semester",
    7=>"Seventh Semester",
    8=>"Eighth Semester"
    );
//$row = 8;
//if($programme == "mtech")
//    $row = 4;
?>

<section style="paddfing: 150px 0px">
    <div class="container">
       <div class="row">
            <div class="col-md-12 col-sm-12 text-center ">
                <h1 style="font-weight: bold;"><?php echo $detail[0]->course_code." - ".$detail[0]->course_name?></h1>
            </div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="col-md-12 col-sm-12 ">
                <table class="table table-striped table-bordered">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td>Semester</td>
                            <td><?php echo $data[$semester]?></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><?php echo $detail[0]->name?></td>
                        </tr>
                        <tr>
                            <td>Credits (L-T-P)</td>
                            <td><?php echo $detail[0]->credit." (".$detail[0]->lecture."-".$detail[0]->tutorial."-".$detail[0]->practical.")"?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Content</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 text-justify">
                    <?php echo $detail[0]->content?>
                </div>
              </div>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">References</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12 text-justify">
                   <?php echo $detail[0]->reference?>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>