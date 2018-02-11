<!DOCTYPE html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title ?></title>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/ico/logo.ico">

        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/animate-css/animate.min.css" media="screen" >

        <!-- ========== PAGE STYLES ========== -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/icheck/skins/flat/blue.css" >

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/main.css" media="screen" >

        <!-- ========== MODERNIZR ========== -->
        <script src="<?php echo base_url(); ?>assets/user/js/modernizr/modernizr.min.js"></script>

        <!-- ========== ADDITIONAL CSS ========= -->
        <?php if(isset($additional_css)){
			foreach($additional_css as $css){
			  echo link_tag($css);
			}
		} ?>
    </head>
    <body class="">
        <div class="main-wrapper">
            <?php echo $content ?>
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
        <script src="<?php echo base_url(); ?>assets/user/js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="<?php echo base_url(); ?>assets/user/js/main.js"></script>
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
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>