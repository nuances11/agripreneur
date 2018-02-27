<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Unit</h2>
	</div>
	<!-- /.col-md-6 -->
    <div class="col-sm-6 right-side">
        <a href="<?php echo base_url(); ?>admin/unit/add" class="btn bg-black" role="button">Add Unit</a>
    </div>
</div>
<div class="row breadcrumb-div">
	<div class="col-md-6">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>/admin">
					<i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Unit</li>
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
						<table id="units" class="display table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Name</th>
		                            <th>Identifier</th>
                                    <th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
                                    <th>Identifier</th>
                                    <th>Status</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
									foreach ($units as $unit) {
										?>
									 		<tr>
												<td><?php echo $unit->unit_name ;?></td>
                                                <td><?php echo $unit->unit_identifier ;?></td>
                                                <td>
                                                <?php 
                                                    if ($unit->status == '1') {
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
                                                    <a href="<?php echo base_url(); ?>admin/unit/edit/<?php echo $unit->unit_id;?>" class="btn btn-default btn-sm">Edit</a>
                                            </td>
											</tr>
										<?php
									}
								?>
							</tbody>
						</table>
						<!-- /.col-md-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
