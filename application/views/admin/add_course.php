<?php $i = 1;?>
<section style="padding: 100px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="background: #fff">
                <h3>Add Course</h3>
            </div>
        </div>
        <?php if(isset($msg) && $msg != ""){?>
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center alert alert-danger alert-dismissible" >
                    <?php echo $msg;?>
                </div>
            </div>
        <?php }?>
        <div class="row">
            <div class="col-md-12 col-sm-12" style="background: #fff">
                <form class="form-horizontal" style="padding:5px" method="post" action="">
                    <input type="hidden" id="tab_rows" name="rows" value="1"/>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                          <h3 class="panel-title">Course Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Course Code</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="course_code" placeholder="Course Code" name="course_code">
                                </div>
                                <label  class="col-sm-2 control-label">Course Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="course_name" placeholder="Course Name" name="course_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Category</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="category" name="category">
                                        <option value="">-Select-</option>
                                        <?php foreach($category as $row){?>
                                        <option value="<?php echo $row->category_id?>"><?php echo $row->name?></option>
                                        <?php }?>
                                    </select>
                                </div>
<!--                                <label  class="col-sm-2 control-label">Branch</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="branch" name="branch" >
                                        <option value="">-Select-</option>
                                        <?php foreach($branch as $row){?>
                                        <option value="<?php echo $row->branch_id?>"><?php echo $row->name?></option>
                                        <?php }?>
                                    </select>
                                </div>-->
                                <label  class="col-sm-2 control-label">Credit</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="credit" placeholder="Credit" name="credit"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Lecture</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="lecture" placeholder="lecture" name="lecture"></input>
                                </div>
                                <label  class="col-sm-2 control-label">Tutorial</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="tutorial" placeholder="Tutorial" name="tutorial"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Practical</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="practical" placeholder="Practical" name="practical"></input>
                                </div>
                                 <label  class="col-sm-2 control-label">Is Elective</label>
                                <div class="col-sm-4">
                                    <input type="checkbox"  id="elective" value="1" name="elective"><p style="font-size:12px"><i>(check if group of other courses are given as an elective for this course)</i></p></input>
                                </div>
                                 <script type="text/javascript">
                                     $(function(){
                                        $("#elective").on('change',function(){
                                            if($("#elective_div").css('display') == 'block')
                                                $("#elective_div").css('display','none');
                                            else
                                                $("#elective_div").css('display','block');
                                        }); 
                                     });
                                </script>
                            </div>
                            <div class="form-group" id="elective_div" style="display:none">
                                <label  class="col-sm-2 control-label">Add Elective Courses</label>
                                <div class="col-sm-10 ">
                                    <select name="elective_course[]" multiple id="elec_course" style="width:100%">
                                        <option></option>
                                        <?php foreach($courses as $row){?>
                                        <option value="<?php echo $row->course_id?>"><?php echo $row->course_code." (".$row->course_name.")"?></option>
                                        <?php }?>
                                    </select>
                                    <script type="text/javascript">
                                    $(function () {
                                        $("#elec_course").select2({
                                            tags: true,
                                            placeholder:'-Select-'
                                        });
                                    });
                                </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Content</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" row="10" name="content" id="content"></textarea>
                                    <script type="text/javascript">
                                        $(function () {
                                            $( '#content' ).ckeditor();
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Reference</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" row="10" name="reference" id="reference"></textarea>
                                    <script type="text/javascript">
                                        $(function () {
                                            $( '#reference' ).ckeditor();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        Branch Details
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary" id="add_branch" >Add</button>
                                        <script type="text/javascript">
                                            $(function () {
                                                $('#add_branch').on('click',function(e){
                                                    e.preventDefault();
                                                    var rowCount = $('#branch_table tr').length;
                                                    var tr = $("#c_1").clone();
                                                    $(tr).attr('id','c_'+rowCount);
                                                    var d = $(tr).find("td select");
                                                    $(d[0]).attr('id','branch_'+rowCount);
                                                    $(d[0]).attr('name','branch_'+rowCount);
                                                    $(d[1]).attr('id','semester_'+rowCount);
                                                    $(d[1]).attr('name','semester_'+rowCount);
                                                    $('#branch_table tr:last').after(tr);
                                                    $("#tab_rows").val(rowCount);
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <table id="branch_table" class="table table-bordered table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>Branch</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="c_1">
                                        <td class="col-sm-3">
                                            <select id="<?php echo 'branch_'.$i?>" name="<?php echo 'branch_'.$i?>" class="form-control">
                                                <option value="">-Select-</option>
                                                <?php foreach($branch as $row){?>
                                                    <option value="<?php echo $row->branch_id?>"><?php echo $row->name?></option>
                                                <?php }?>
                                            </select>
                                        </td>
                                        <td class="col-sm-3">
                                            <select id="<?php echo 'semester_'.$i?>" name="<?php echo 'branch_'.$i?>" class="form-control">
                                                <option value="">-Select-</option>
                                                <?php for($k = 1; $k<=8; $k++){?>
                                                    <option value="<?php echo $k?>"><?php echo $k?></option>
                                                <?php }?>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-5">
                            <input type="submit" class="form-control btn btn-primary" id="submit" name="submit" value="Submit"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




