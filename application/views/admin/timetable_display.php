<?php $i = 1;?>
<section style="padding-bottom:10px">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="background: #fff;">
            <div class="text-center" ><h3>Time Table</h3></div>
        </div>
    </div>
    <div class="row" style="background: #fff;">
        <div class="col-md-12 col-sm-12">
            <table class="table table-bordered table-condensed table-striped row-even">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Programme</th>
                        <th>Branch</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($timetable as $row){?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row->p_name?></td>
                        <td><?php echo $row->b_name?></td>
                        <td><a target="_blank" href="<?php echo base_url(TIMETABLE_UPLOAD_FOLDER.'/'.$row->link)?>"><?php echo $row->link?></a></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>



