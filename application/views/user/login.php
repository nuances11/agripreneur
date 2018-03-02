

            <div class="login-bg-color bg-gray">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel login-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                <img src="<?php echo base_url(); ?>assets/images/agrilogo-2.png" alt="Agripreneur" />
                                </div>
                            </div>
                            <div class="panel-body p-20">
                                <div id="err"></div>
                                <form class="form-horizontal" id="user_login">
                                <input type="hidden" name="action_url" id="action_url" value="<?php echo base_url();?>user/user_login">
						        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
                                    <div class="form-group left-icon">
                                		<label for="email" class="col-sm-3 control-label">Email Id</label>
                                		<div class="col-sm-9">
                                            <span class="glyphicon glyphicon-envelope form-left-icon"></span>
                                			<input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                		</div>
                                	</div>
                                    <div class="form-group left-icon">
                                		<label for="password" class="col-sm-3 control-label">Password</label>
                                		<div class="col-sm-9">
                                            <span class="glyphicon glyphicon-tags form-left-icon"></span>
                                			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                		</div>
                                	</div>
                                    <div class="form-group mt-20">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                                <hr>

                                <div class="text-center">
                                    Not registered yet?<br/><a href="<?php echo base_url(); ?>shop/register" class="form-link"><strong>REGISTER NOW</strong></a>
                                </div>
                                <!-- /.text-center -->

                            </div>
                        </div>
                        <!-- /.panel -->
                        <p class="text-muted text-center"><small>Copyright © AGRIPRENEUR 2018</small></p>
                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->
