<div class="row page-title-div">
	<div class="col-md-6">
		<h2 class="title">Registratin Forms</h2>
	</div>
	<!-- /.col-md-6 -->
    <div class="col-sm-6 right-side">

    </div>
</div>
<div class="row breadcrumb-div">
	<div class="col-md-6">
		<ul class="breadcrumb">
			<li>
				<a href="<?php echo base_url();?>/admin">
					<i class="fa fa-home"></i> Home</a>
			</li>
			<li class="active">Registration Forms</li>
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
						<table id="forms" class="display table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Name</th>
		                            <th>Contact Number</th>
                                    <th>Date Uploaded</th>
									<th>Vew File</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
                                    <th>Name</th>
		                            <th>Contact Number</th>
                                    <th>Date Uploaded</th>
									<th>Vew File</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
									foreach ($forms as $form) {
										?>
									 		<tr>
												<td><?php echo $form->fname . ' ' . $form->lname;?></td>
                                                <td><?php echo $form->contact ;?></td>
                                                <td><?php echo $form->timestamp_created ;?></td>
                                                <td> <a href="<?php echo base_url();?>uploads/registration/<?php echo $form->file ;?>"  target="_blank"> <img src="https://cdn3.iconfinder.com/data/icons/line-icons-set/128/1-02-512.png" height="40" width="40" alt="<?php echo $form->fname . ' ' . $form->lname;?>">View File</a> </td>
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
