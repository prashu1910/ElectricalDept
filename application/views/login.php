
<section style="paddding: 150px 0px">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-md-offset-4">
                <div style="background: #f9f9f9;border: 1px solid #f3f3f3;padding: 30px;position: relative;    border-radius: 15px;">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Login to Your Account</h3>
                        </div>
                    </div>
                    <?php if(isset($message_display) && $message_display != ""){?>
                    <div class="alert alert-success alert-dismissable">
                            <?php
                                echo $message_display;
                            ?>
                     </div>
                    <?php } ?>
                    <?php if(validation_errors() != null){?>
                    <div class="alert alert-danger alert-dismissable">
                            <?php echo validation_errors();
                            ?>
                     </div>
                    <?php } ?>
                    <?php if(isset($error_message) && $error_message != ""){?>
                    <div class="alert alert-danger alert-dismissable">
                            <?php
                                echo $error_message;
                                echo validation_errors();
                            ?>
                     </div>
                    <?php } ?>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('login/auth')?>">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <input style="width: 100%" type="text" class="form-control" id="username" name="username" placeholder="Username"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <input style="width: 100%" type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-sm-4 col-md-offset-4">
                                   <input class="btn btn-primary" type="submit" value="Login">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
