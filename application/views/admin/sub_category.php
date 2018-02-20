<div class="row page-title-div">
    <div class="col-sm-6">
        <h2 class="title">Sub Category</h2>
    </div>
    <!-- /.col-sm-6 -->
    <div class="col-sm-6 right-side">
        <a href="<?php echo base_url(); ?>admin/subcategory/add" class="btn bg-black" role="button">Add Sub Category</a>
    </div>
</div>
<div class="row breadcrumb-div">
    <div class="col-sm-6">
        <ul class="breadcrumb">
			<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Sub Category</li>
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
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h5>Sub Category List</h5>
                        </div>
                    </div>
                    <div class="panel-body p-20">
                        <?php if($this->session->flashdata('success')){
                            echo $this->session->flashdata('success');
                        } ?>
                        <table id="sub_category" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Identifier</th>
                                    <th>Stauts</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Identifier</th>
                                    <th>Stauts</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                    foreach ($sub_categories as $sub_category) {
                                        ?>
                                        <tr>
                                            <td><?php echo $sub_category->category_name;?></td>
                                            <td><?php echo $sub_category->subcategory_name;?></td>
                                            <td><?php echo $sub_category->subcategory_identifier;?></td>
                                            <td>
                                                <?php 
                                                    if ($sub_category->subcategory_status == '1') {
                                                        ?>
                                                            <span class="label label-success label-rounded">Active</span>
                                                        <?php
                                                    }else {
                                                        ?>
                                                            <span class="label label-warning label-rounded">Inactive</span>
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                    <a href="<?php echo base_url(); ?>admin/subcategory/edit/<?php echo $sub_category->subcategory_id;?>" class="btn btn-default btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
