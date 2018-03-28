<?php $i = 1;?>
<section style="padding-bottom:10px">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="background: #fff;">
            <div class="text-center" ><h3>Lab List</h3></div>
        </div>
    </div>
    <div class="row" style="background: #fff;">
        <div class="col-md-12 col-sm-12">
            <table class="table table-bordered table-condensed table-striped row-even">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Name</th>
                        <th>Lab Type</th>
<!--                        <th>Action</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lab_details as $row){?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row->name?></td>
                        <td><?php echo $row->lab_type == 1 ? "UG" : "PG"?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>
