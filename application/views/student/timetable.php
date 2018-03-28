<section>
    <div class="well-lg well-sm" style="background: #fff;">
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
                    <select name="semester" class="form-control" >
                        <option value="">-Select-</option>
                        <?php for($i = 1; $i<= 8;$i++) {?>
                        <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="form-group ">
                <div class="col-sm-2 col-sm-offset-5">
                    <input type="submit" class="form-control btn btn-primary" id="submit" name="submit" value="Submit"></input>
                </div>
            </div>
        </form>
    </div>
    <?php if(isset($tt)){ ?>
    <div class="panel panel-info" style="margin-top:15px">
        <div class="panel-heading">
          <h3 class="panel-title text-center"><?php echo $pname[0]->name." - ".$bname[0]->name?></h3>
          <h2 class="panel-title text-center"><?php echo "Semester - ".$semester?></h2>
        </div>
        <div class="panel-body">
            <div class="table-responsive" >
                <?php echo $tt;?>
            </div>
        </div>
    </div>
    <?php 
    }
    else if(isset($pname) && count($pname) > 0)
    {?>
    <div class="panel panel-info" style="margin-top:15px">
        <div class="panel-heading">
          <h3 class="panel-title text-center"><?php echo $pname[0]->name." - ".$bname[0]->name?></h3>
          <h2 class="panel-title text-center"><?php echo "Semester - ".$semester?></h2>
        </div>
        <div class="panel-body">
            <div class="table-responsive text-center" >
                <h4>No time table added yet.</h4>
            </div>
        </div>
    </div>
    <?php   
    }
    ?>
</section>


