<section style="background: #fff;padding-bottom:10px">
    <div class="panel-heading alert alert-info">Address</div>
    <div class="row">
        <form class="form-horizontal" method="post" action="">
            <div class="col-md-5 ">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4>Office Address</h4>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Address Line 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="ad_1_1" value="<?php echo count($office) ? $office[0]->addr_line1 : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Address Line 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="ad_1_2" value="<?php echo count($office) ? $office[0]->addr_line2 : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="city_1" value="<?php echo count($office) ? $office[0]->city : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">State</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="state_1" value="<?php echo count($office) ? $office[0]->state : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="country_1" value="<?php echo count($office) ? $office[0]->country : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Pincode</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="pincode_1" value="<?php echo count($office) ? $office[0]->pin_code : ""?>"/>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4>Residence Address</h4>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Address Line 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="ad_2_1" value="<?php echo count($home) ? $home[0]->addr_line1 : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Address Line 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="ad_2_2" value="<?php echo count($home) ? $home[0]->addr_line2 : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="city_2" value="<?php echo count($home) ? $home[0]->city : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">State</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="state_2" value="<?php echo count($home) ? $home[0]->state : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="country_2" value="<?php echo count($home) ? $home[0]->country : ""?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Pincode</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="pincode_2" value="<?php echo count($home) ? $home[0]->pin_code : ""?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <input type="submit"  value="Save" class="btn btn-success"/>
                </div>
            </div>
        </form>
    </div>
</section>
