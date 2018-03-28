<?php $i = 1;?>

<section>
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center" style="background: #fff">
                <h3>Add Lab</h3>
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
                <form class="form-horizontal" style="padding:5px" method="post" action="">
                    <input type="hidden" id="tab_rows" name="rows" value="1"/>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                          <h3 class="panel-title">Lab Details</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-4">
                                   <input type="text" class="form-control" id="name" placeholder="Name" name="name"></input>
                                </div>
                                <label  class="col-sm-2 control-label">Official Incharge</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="faculty" name="user_id">
                                        <option value="">-Select-</option>
                                        <?php foreach ($faculty as $row) { ?>
                                            <option value="<?php echo $row->user_id?>"><?php echo $row->user_fname." ".$row->user_mname." ".$row->user_lname?></option>
                                         <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Lab Type</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="faculty" name="lab_type">
                                        <option value="">-Select-</option>
                                            <option value="1">UG</option>
                                            <option value="2">PG</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        Lab Equipments
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button class="btn btn-primary" id="add_equipment" >Add</button>
                                        <script type="text/javascript">
                                            $(function () {
                                                $('#add_equipment').on('click',function(e){
                                                    e.preventDefault();
                                                    var rowCount = $('#equip_table tr').length;
                                                    var str = "";
                                                    str+= '<tr>';
                                                    str+= '<td>';
                                                    str+= "<input type='text' name='name_"+rowCount+"' class='form-control'/>";
                                                    str+= '</td>';
                                                    str+= '<td>';
                                                    str+= "<input type='text' name='qty_"+rowCount+"' class='form-control'/>";
                                                    str+= '</td>';
                                                    str+= '<td>';
                                                    str+= "<input type='text' name='desc_"+rowCount+"' class='form-control'/>";
                                                    str+= '</td>';
                                                    str+= '</tr>';
                                                    $('#equip_table tr:last').after(str);
                                                    $("#tab_rows").val(rowCount);
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <table id="equip_table" class="table table-bordered table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>Equipment Name</th>
                                        <th>Quantity</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="<?php echo 'name_'.$i?>" class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name="<?php echo 'qty_'.$i?>" class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name="<?php echo 'desc_'.$i?>" class="form-control"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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


<?php 
    function add_equip_row()
    {
        $i++;
        echo '<tr>';
        echo '<td>';
        echo "<input type='text' name='name_".$i." class='form-control'/>";
        echo '</td>';
        echo '<td>';
        echo "<input type='text' name='qty_".$i." class='form-control'/>";
        echo '</td>';
        echo '<td>';
        echo "<input type='text' name='desc_".$i." class='form-control'/>";
        echo '</td>';
        echo '</tr>';               
    }    
?>