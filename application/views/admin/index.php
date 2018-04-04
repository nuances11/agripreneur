<div class="row page-title-div">
    <div class="col-sm-6">
        <h2 class="title">Dashboard</h2>
    </div>
    <!-- /.col-sm-6 -->
    <div class="col-sm-6 right-side">
    </div>
    <!-- /.col-sm-6 text-right -->
</div>
<div class="row breadcrumb-div">
    <div class="col-sm-6">
        <ul class="breadcrumb">
			<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ul>
    </div>
    <!-- /.col-sm-6 -->
    <div class="col-sm-6 text-right hidden-xs">
    </div>
    <!-- /.col-sm-6 -->
</div>
<section class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat bg-primary" href="#">
                    <span class="number counter"><?php echo $product_count;?></span>
                    <span class="name">Products</span>
                    <span class="bg-icon"><i class="fa fa-comments"></i></span>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat bg-danger" href="#">
                    <span class="number counter"><?php echo $order_count;?></span>
                    <span class="name">Orders</span>
                    <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat bg-warning" href="#">
                    <span class="number counter"><?php echo $user_count;?></span>
                    <span class="name">Users</span>
                    <span class="bg-icon"><i class="fa fa-bank"></i></span>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat bg-success" href="#">
                    <span class="number counter"><?php echo $sales_count;?></span>
                    <span class="name">Sales</span>
                    <span class="bg-icon"><i class="fa fa-thumbs-o-up"></i></span>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- <section class="section pt-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel border-primary no-border border-3-top" data-panel-control>
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h5>Products<small>per month</small></h5>
                        </div>
                    </div>
                    <div class="panel-body">
                        <!-- <div id="production-chart" class="op-chart"></div> -->
                        <!--<canvas id="myChart" width="300" height="300"></canvas>
                    </div>
                </div>
                <!-- /.panel -->
            <!--</div>
        </div>
    </div>
</section> -->
