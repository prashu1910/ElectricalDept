<?php $i = 1;?>
<section style="padding-bottom:10px">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="background: #fff;">
            <div class="text-center" ><h3>News</h3></div>
        </div>
    </div>
    <div class="row" style="background: #fff;">
        <div class="col-md-12 col-sm-12">
            <table class="table table-bordered table-condensed table-striped row-even">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($news as $row){?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row->title?></td>
                        <td><?php echo date_format(date_create_from_format('Y-m-d H:i:s', $row->timestamp), 'd-m-y H:i:s')?></td>
                        <td>
                            <?php if($row->show_in_news == 0){?>
                            <a class="btn btn-success" href="<?php echo base_url('admin/show_news/'.$row->news_id)?>">Show in News</a>
                            <?php } else {?>
                            <a class="btn btn-success" href="<?php echo base_url('admin/hide_news/'.$row->news_id)?>">Hide in News</a>
                            <?php }?>
                            
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</section>



