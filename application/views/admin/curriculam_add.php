<section>
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="background: #fff">
                <h3>Add Curriculam</h3>
            </div>
        </div>
    <?php if(isset($error)){?>
    <div class="row">
        <div class="col-md-12 col-sm-12 alert alert-danger alert-dismissible">
           <?php echo $error?> 
        </div>
        </div>
    <?php }?>
    <?php if(isset($sucess)){?>
    <div class="row">
        <div class="col-md-12 col-sm-12 alert alert-success alert-dismissible">
           <?php echo $sucess?> 
        </div>
        </div>
    <?php }?>
        <div class="row">
            <div class="col-md-12 col-sm-12" style="background: #fff">
                <form class="form-horizontal" style="padding:5px" method="post" action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Programme</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="programme" name="programme" >
                                <option value="">-Select-</option>
                                <?php foreach($programme as $row){?>
                                <option value="<?php echo $row->programme_id?>"><?php echo $row->name?></option>
                                <?php }?>
                            </select>
                        </div>
                        <label  class="col-sm-2 control-label">Branch</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="branch" name="branch" >
                                <option value="">-Select-</option>
                            </select>
                            <script type="text/javascript">
                                $(function () {
                                    $('#programme').on('change',function() {
                                        $url = $(this).attr('data-url');
                                       $.ajax({
                                              url:'<?php echo base_url('department/get_branch');?>',
                                              type:'post',
                                              data:{'p_id':$('#programme').val()},    
                                              datatype:'json',
                                              success:function(data){
                                                  htmlString = "<option value=''>-Select-</option>";
                                                  $.each(data,function(i){
                                                                 htmlString +="<option value='"+data[i]['branch_id']+"'>"+data[i]['name']+"</option>"
                                                  });
                                                  $("#branch").html(htmlString);
                                              }
                                       });
                                });
                            });
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Semester</label>
                        <div class="col-sm-4">
<!--                            <input type="text" class="form-control" id="semester" placeholder="Semester" name="semester"></input>-->
                            <select name="semester" class="form-control" >
                                <option value="">-Select-</option>
                                <?php for($i = 1; $i<= 8;$i++) {?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Courses</label>
                        <div class="col-sm-10 ">
                            <select name="course[]" multiple id="course" style="width:100%">
                                <option></option>
                                <?php foreach($courses as $row){?>
                                <option value="<?php echo $row->course_id?>"><?php echo $row->course_code." (".$row->course_name.")"?></option>
                                <?php }?>
                            </select>
                            <script type="text/javascript">
                            $(function () {
                                $("#course").select2({
                                    //tags: true,
                                    placeholder:'-Select-'
                                });
                            });
                        </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 col-sm-offset-5">
                            <input type="submit" class="form-control btn btn-primary" id="submit" name="submit" value="Submit"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>




