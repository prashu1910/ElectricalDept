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
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <h3 class="text-center">Elective Courses</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Course Id</th>
                            <th>Course Name</th>
                            <th>Credits (L-T-P)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($elective as $course) { ?>
                            <tr>
                                <td><a href="<?php echo base_url('course/details/'.$course->course_id."/".$semester);?>"><?php echo $course->course_code?></a></td>
                                <td><?php echo $course->course_name?></td>
                                <td><?php echo $course->credit." (".$course->lecture."-".$course->tutorial."-".$course->practical.")"?></td>
                            </tr>
                         <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</section>