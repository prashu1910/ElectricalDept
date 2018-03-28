
<section style="paddfing: 150px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="map" style="width:100%;height: 300px;background-color: grey"></div>
            </div>
        </div>
        <div class="row" style="    margin-top: 30px;">
            <div class="col-md-4 col-md-offset-1">
                <h3>Address</h3>
                <p>Electrical Engineering Department,</p>
                <p>Motilal Nehru National Institute of Technology,</p>
                 <p>Allahabad-211004</p>
            </div>
            <div class="col-md-7">
                <div style="background: #f9f9f9;border: 1px solid #f3f3f3;padding: 30px;position: relative;">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Feedback Form</h3>
                        </div>
                    </div>
                    <form class="form-horizontal" method="post" action="">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name_first" name="first_name" placeholder="First Name">
                                        <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="name_last" name="last_name" placeholder="Last Name">
                                        <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number">
                                        <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control " id="email" name="Email" placeholder="Email">
                                        <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <textarea class="form-control" rows="6" name="message"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                   <input class="btn btn-primary" type="submit" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
echo '<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtGwuGgtPkKbMoYjeH8KP7eCaZN27WYaA&callback=initMap">
    </script>';
?>

