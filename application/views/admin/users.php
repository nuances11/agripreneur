<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Users</h2>
	</div>
	<!-- /.col-md-6 -->
    <div class="col-sm-6 right-side">
        <a href="<?php echo base_url();?>admin/user/add" class="btn bg-black" role="button">Add User</a>
    </div>
</div>
<div class="row breadcrumb-div">
	<div class="col-md-6">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>/admin">
					<i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Users</li>
		</ul>
	</div>
	<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<section class="section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title">
						</div>
					</div>
					<div class="panel-body p-20">
						<?php if($this->session->flashdata('success')){
                            echo $this->session->flashdata('success');
                        } ?>
						<table id="users" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
								<tr>
									<th>Name</th>
		                            <th>Email</th>
                                    <th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
                                <tr>
									<th>Name</th>
		                            <th>Email</th>
                                    <th>Status</th>
									<th>Action</th>
								</tr>
							</tfoot>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user->fname . ' ' . $user->lname ;?></td>
                                        <td><?php echo $user->email ;?></td>
                                        <td>
                                            <?php
                                                if ($user->status == 1) {
                                                    echo '<span style="color:green;">Active</span>';
                                                }else{
                                                    echo '<span style="color:red;">Inactive</span>';
                                                }
                                            ?>
                                        </td>
                                        <td> <a href="<?php echo base_url();?>admin/user/edit/<?php echo $user->id ;?>" class="btn btn-default">Edit User</a> </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
						</table>
						<!-- /.col-md-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
