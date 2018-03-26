<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>
			<?php echo $title ?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<!--Less styles -->
		<!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
		<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

		<!-- Bootstrap style -->
		<link id="callCss" rel="stylesheet" href="<?php echo base_url(); ?>assets/bootshop/bootstrap.min.css" media="screen" />
		<link href="<?php echo base_url(); ?>assets/css/base.css" rel="stylesheet" media="screen" />
		<!-- Bootstrap style responsive -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">
		<!-- Google-code-prettify -->
		<link href="<?php echo base_url(); ?>assets/js/google-code-prettify/prettify.css" rel="stylesheet" />
		<!-- fav and touch icons -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/ico/logo.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/images/ico/apple-touch-icon-57-precomposed.png">
		<style type="text/css" id="enject"></style>
		<?php if(isset($additional_css)){
			foreach($additional_css as $css){
			  echo link_tag($css);
			}
		} ?>
	</head>

	<body>
		<div id="header">
			<div class="container">
				<!-- Navbar ================================================== -->
				<div id="logoArea" class="navbar">
					<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="navbar-inner">
						<a class="brand" href="<?php echo base_url(); ?>">
							<img src="<?php echo base_url(); ?>assets/images/agrilogo-2.png" alt="Agripreneur" />
						</a>
						<form class="form-inline navbar-search" method="post" action="products.html">
							<input id="srchFld" class="srchTxt" type="text" />
							<button type="submit" id="submitButton" class="btn btn-primary">Go</button>
						</form>
						<ul id="topMenu" class="nav pull-right">
							<li class="">
									<a href="<?php echo base_url();?>upload/registration-form"><strong>Upload</strong> Registration Form</a>
							</li>
							<li class="">
								<a href="<?php echo base_url();?>downloads/PERSONAL-DATA-SHEET-Final.pdf" download="PERSONAL-DATA-SHEET-Final.pdf"> <strong>Download</strong> Registration Form </a>
							</li>
							<li class="">
								<?php
								if (isset($_SESSION['id'])) {
									?>
									<a href="<?php echo base_url(); ?>logout" role="button" style="padding-right:0">Logout</a>
									<?php
								}else{
									?>
										<a href="<?php echo base_url(); ?>login" role="button" style="padding-right:0">Login</a>
									<?php
								}
								 ?>

							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Header End====================================================================== -->
		<?php echo $content ?>
		<!-- Footer ================================================================== -->
		<!-- <div id="footerSection">
			<div class="container">
				<div class="row">
					<div class="span3">
						<h5>ACCOUNT</h5>
						<a href="login.html">YOUR ACCOUNT</a>
						<a href="login.html">PERSONAL INFORMATION</a>
						<a href="login.html">ADDRESSES</a>
						<a href="login.html">DISCOUNT</a>
						<a href="login.html">ORDER HISTORY</a>
					</div>
					<div class="span3">
						<h5>INFORMATION</h5>
						<a href="contact.html">CONTACT</a>
						<a href="register.html">REGISTRATION</a>
						<a href="legal_notice.html">LEGAL NOTICE</a>
						<a href="tac.html">TERMS AND CONDITIONS</a>
						<a href="faq.html">FAQ</a>
					</div>
					<div class="span3">
						<h5>OUR OFFERS</h5>
						<a href="#">NEW PRODUCTS</a>
						<a href="#">TOP SELLERS</a>
						<a href="special_offer.html">SPECIAL OFFERS</a>
						<a href="#">MANUFACTURERS</a>
						<a href="#">SUPPLIERS</a>
					</div>
					<div class="span3 pull-right">
						<img src="<?php echo base_url(); ?>assets/images/agrilogo-1.png" alt="AGRIPRENEUR" class="img-responsive">
					</div>
				</div>
			</div>
			<!-- Container End -->
		<!--</div> -->
		<!-- Placed at the end of the document so the pages load faster ============================================= -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/google-code-prettify/prettify.js"></script>

		<?php if(isset($add_js)){
			foreach($add_js as $js){ ?>
				<script src="<?php echo base_url() . $js; ?>"></script>
			<?php }
		} ?>
		<script src="<?php echo base_url(); ?>assets/js/bootshop.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.lightbox-0.5.js"></script>

		<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

		<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAPS_API_KEY ?>&libraries=places"></script> -->
		<?php
		if(isset($extra_js)){
			?><script><?php
			echo $extra_js;
			?></script><?php
		}

		?>


	</body>

	</html>
