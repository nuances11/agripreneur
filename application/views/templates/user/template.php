<!DOCTYPE html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title ?></title>

        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/lobipanel/lobipanel.min.css" media="screen" >

        <!-- ========== PAGE STYLES ========== -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/icheck/skins/line/green.css" >

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/main.css" media="screen" >

        <!-- ========== MODERNIZR ========== -->
        <script src="<?php echo base_url(); ?>assets/user/js/modernizr/modernizr.min.js"></script>

        <?php if(isset($additional_css)){
			foreach($additional_css as $css){
			  echo link_tag($css);
			}
		} ?>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <div class="navbar-header no-padding">
                			<a class="navbar-brand" href="user">
                			    <img src="<?php echo base_url(); ?>assets/images/agrilogo-2.png" alt="AGRIPRENEUR" class="logo">
                			</a>
                            <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                				<span class="sr-only">Toggle navigation</span>
                				<i class="fa fa-ellipsis-v"></i>
                			</button>
                            <button type="button" class="navbar-toggle mobile-nav-toggle" >
                				<i class="fa fa-bars"></i>
                			</button>
                		</div>
                        <!-- /.navbar-header -->

                		<div class="collapse navbar-collapse" id="navbar-collapse-1">
                			<ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
                                <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
                                
                			</ul>
                            <!-- /.nav navbar-nav -->

                			<ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                <li class="dropdown">
                					<a href="#" class="dropdown-toggle bg-primary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-circle"></i> Add New <span class="caret"></span></a>
                					<ul class="dropdown-menu" >
                						<li><a href="#"><i class="fa fa-plus-square-o"></i> Customer</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square-o"></i> Employee</a></li>
                						<li><a href="#"><i class="fa fa-plus-square-o"></i> Estimate</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square-o"></i> Task</a></li>
                						<li><a href="#"><i class="fa fa-plus-square-o"></i> Team Member</a></li>
                						<li role="separator" class="divider"></li>
                						<li><a href="#">Create Order</a></li>
                						<li role="separator" class="divider"></li>
                						<li><a href="#">Generate Report</a></li>
                					</ul>
                				</li>
                                <!-- /.dropdown -->
                                <!-- <li><a href="#" class=""><i class="fa fa-bell"></i><span class="badge badge-danger">6</span></a></li>
                				<li><a href="#" class=""><i class="fa fa-comments"></i><span class="badge badge-warning">2</span></a></li> -->
                				<li class="dropdown">
                					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">John Doe <span class="caret"></span></a>
                					<ul class="dropdown-menu profile-dropdown">
                						<li class="profile-menu bg-gray">
                						    <div class="">
                						        <img src="http://placehold.it/60/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                                <div class="profile-name">
                                                    <h6>John Doe</h6>
                                                    <a href="pages-profile.html">View Profile</a>
                                                </div>
                                                <div class="clearfix"></div>
                						    </div>
                						</li>
                						<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                						<li><a href="#"><i class="fa fa-sliders"></i> Account Details</a></li>
                						<li role="separator" class="divider"></li>
                						<li><a href="#" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>
                					</ul>
                				</li>
                                <!-- /.dropdown -->
                                <!-- <li><a href="#" class="hidden-xs hidden-sm open-right-sidebar"><i class="fa fa-ellipsis-v"></i></a></li> -->
                			</ul>
                            <!-- /.nav navbar-nav navbar-right -->
                		</div>
                		<!-- /.navbar-collapse -->
                    </div>
                    <!-- /.row -->
            	</div>
            	<!-- /.container-fluid -->
            </nav>

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <div class="left-sidebar bg-black-300 box-shadow">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                <h6 class="title">John Doe</h6>
                                <small class="info">PHP Developer</small>
                            </div>
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Main</span>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo base_url(); ?>user"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Product</span>
                                    </li>
                                    <li class=""><a href="<?php echo base_url(); ?>product/add"><i class="fa fa-bars"></i> <span>Add Product</span></a></li>
                                    <li class=""><a href="<?php echo base_url(); ?>product/list"><i class="fa fa-bars"></i> <span>Product List</span></a></li>
                                </ul>
                                <!-- /.side-nav -->
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <?php echo $content ?>
                        </div>
                    </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->
                    <!-- ========== COMMON JS FILES ========== -->
        <script src="<?php echo base_url(); ?>assets/user/js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/lobipanel/lobipanel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="<?php echo base_url(); ?>assets/user/js/prism/prism.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/waypoint/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/counterUp/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/amcharts/amcharts.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/amcharts/serial.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="<?php echo base_url(); ?>assets/user/js/amcharts/themes/light.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/toastr/toastr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="<?php echo base_url(); ?>assets/user/js/main.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/production-chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/traffic-chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/task-list.js"></script>
        <script src="<?php echo base_url(); ?>assets/user/js/DataTables/datatables.min.js"></script>

        <?php if(isset($add_js)){
			foreach($add_js as $js){ ?>
				<script src="<?php echo base_url() . $js; ?>"></script>
			<?php }
		} 
		if(isset($extra_js)){
			?><script><?php
			echo $extra_js;
			?></script><?php
		}
		
		?>
        <script>