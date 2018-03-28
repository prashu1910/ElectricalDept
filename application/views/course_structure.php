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
                <h1 style="font-weight: bold;">Course Details</h1>
                <p style="font-weight: bold;"><?php echo $course?></p>
            </div>
        </div>
        <?php foreach ($c_structure as $key => $row) {?>
        <div class="row">
            <div class="col-md-3 col-sm-3 hidden-xs text-center">
                <div>
                    
                </div>
            </div>
            <div class="col-md-9 col-sm-9 ">
                <h3><?php echo $data[$key]?></h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Course Id</th>
                            <th>Course Name</th>
                            <th>Credits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row as $course) { ?>
                            <tr>
                                <td><a href="<?php echo base_url('course/details/'.$course->course_id."/".$key);?>"><?php echo $course->course_code?></a></td>
                                <td><?php echo $course->course_name?></td>
                                <td><?php echo $course->lecture."-".$course->tutorial."-".$course->practical?></td>
                            </tr>
                         <?php }?>
                    </tbody>
                </table>
                  
            </div>
        </div>
        <?php }?>
    </div>
</section>

