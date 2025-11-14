<?php $this->load->view('header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Admin</h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url() . 'admin/' ?>">Dashboard</a>
			</li>

			<li class="active">
				<strong>Admin</strong>
			</li>
		</ol>
	</div>

	<div class="col-sm-8">
		<div class="title-action">
		</div>
	</div>
</div>

<!--  EO :heading -->
<div class="row">
	<div class="col-lg-12 row wrapper ">
		<div class="ibox ">
			<div class="ibox-title">
				<h5>View <small></small></h5>

				<div class="ibox-tools">
				</div>
			</div>

			<!-- ............................................................. -->

			<!-- BO : content  -->
			<div class="col-sm-12 white-bg ">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title"> </h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->

					<form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">
						<div class="box-body">
							<?php if ($this->session->flashdata('message')) : ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-close="alert"></button>
									<?php echo $this->session->flashdata('message'); ?>
								</div>
							<?php endif; ?>
							<table class='table table-bordered' style='width:70%;' align='center'>

								<tr>

									<td>

										<label for="id" class="col-sm-3 control-label"> Id </label>

									</td>

									<td>

										<?php echo set_value("id", html_entity_decode($admin->id)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="username" class="col-sm-3 control-label"> Username </label>

									</td>

									<td>

										<?php echo set_value("username", html_entity_decode($admin->username)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="password" class="col-sm-3 control-label"> Password </label>

									</td>

									<td>

										<?php echo set_value("password", html_entity_decode($admin->password)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="email" class="col-sm-3 control-label"> Email </label>

									</td>

									<td>

										<?php echo set_value("email", html_entity_decode($admin->email)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="active" class="col-sm-3 control-label"> Active </label>

									</td>

									<td>

										<?php echo set_value("active", html_entity_decode($admin->active)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="first_name" class="col-sm-3 control-label"> First_name </label>

									</td>

									<td>

										<?php echo set_value("first_name", html_entity_decode($admin->first_name)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="last_name" class="col-sm-3 control-label"> Last_name </label>

									</td>

									<td>

										<?php echo set_value("last_name", html_entity_decode($admin->last_name)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="company" class="col-sm-3 control-label"> Company </label>

									</td>

									<td>

										<?php echo set_value("company", html_entity_decode($admin->company)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="company_id" class="col-sm-3 control-label"> Company_id </label>

									</td>

									<td>

										<?php echo set_value("company_id", html_entity_decode($admin->company_id)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="type_user" class="col-sm-3 control-label"> Type_user </label>

									</td>

									<td>

										<?php echo set_value("type_user", html_entity_decode($admin->type_user)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="role_id" class="col-sm-3 control-label"> Role_id </label>

									</td>

									<td>

										<?php echo set_value("role_id", html_entity_decode($admin->role_id)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="store_id" class="col-sm-3 control-label"> Store_id </label>

									</td>

									<td>

										<?php echo set_value("store_id", html_entity_decode($admin->store_id)); ?>

									</td>

								</tr>

								<tr>
									<td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a></td>
								</tr>
							</table>

							<div class="form-group">
								<div class="col-sm-3">
								</div>

								<div class="col-sm-6">
								</div>

								<div class="col-sm-3">
								</div>
							</div>
						</div>

						<!-- /.box-body -->

						<div class="box-footer">
						</div>

						<!-- /.box-footer -->
					</form>
				</div>

				<!-- /.box -->
				<br><br><br><br>
			</div>

			<!-- EO : content  -->
			<!-- ...................................................................... -->
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>