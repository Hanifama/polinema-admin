<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Vouchers</h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url() . 'admin/' ?>">Dashboard</a>
			</li>

			<li class="active">
				<strong>Vouchers</strong>
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
		<div class="ibox card ">
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
							<?php if ($this->session->flashdata('message')): ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-close="alert"></button>
									<?php echo $this->session->flashdata('message'); ?>
								</div>
							<?php endif; ?>
							<table class='table table-bordered' style='width:70%;' align='center'>

								<tr>

									<td>

										<label for="voucher_id" class="col-sm-3 form-label"> ID </label>

									</td>

									<td>

										<?php echo set_value("voucher_id", html_entity_decode($vouchers->voucher_id)); ?>

									</td>

								</tr>								<!-- Tenant_id Start -->

								<tr>

									<td>

										<label class="form-label col-md-3"> Tenant_id </label>

									</td>

									<td>

										<?php

										if (isset($tenants) && !empty($tenants)):
											foreach ($tenants as $key => $value):

												if ($value->tenant_id == $vouchers->tenant_id)

													echo $value->name;
											endforeach;

										endif; ?>

									</td>

								</tr>

								<!-- Tenant_id End -->								<tr>

									<td>

										<label for="title" class="col-sm-3 form-label"> Title </label>

									</td>

									<td>

										<?php echo set_value("title", html_entity_decode($vouchers->title)); ?>

									</td>

								</tr>								<!-- Description Start -->

								<tr>

									<td>

										<label for="description" class="col-sm-3 form-label"> Description </label>

									</td>

									<td>

										<?php echo set_value("description",  html_entity_decode($vouchers->description)); ?>

									</td>

								</tr>

								<!-- Description End -->

								<!-- Banner_1 Start -->

								<tr>

									<td>

										<label for="address" class="col-sm-3 form-label"> Banner_1 </label>

									</td>

									<td>

										<?php if (isset($vouchers->banner_1) && $vouchers->banner_1 != "") { ?>

											<br>

											<img src="<?php echo $this->config->item("photo_url"); ?><?php echo $vouchers->banner_1; ?>" alt="pic" width="50" height="50" />

										<?php } ?>

									</td>

								</tr>

								<!-- Banner_1 End -->

								<!-- Banner_2 Start -->

								<tr>

									<td>

										<label for="address" class="col-sm-3 form-label"> Banner_2 </label>

									</td>

									<td>

										<?php if (isset($vouchers->banner_2) && $vouchers->banner_2 != "") { ?>

											<br>

											<img src="<?php echo $this->config->item("photo_url"); ?><?php echo $vouchers->banner_2; ?>" alt="pic" width="50" height="50" />

										<?php } ?>

									</td>

								</tr>

								<!-- Banner_2 End -->

								<!-- Banner_3 Start -->

								<tr>

									<td>

										<label for="address" class="col-sm-3 form-label"> Banner_3 </label>

									</td>

									<td>

										<?php if (isset($vouchers->banner_3) && $vouchers->banner_3 != "") { ?>

											<br>

											<img src="<?php echo $this->config->item("photo_url"); ?><?php echo $vouchers->banner_3; ?>" alt="pic" width="50" height="50" />

										<?php } ?>

									</td>

								</tr>

								<!-- Banner_3 End -->

								<!-- Banner_4 Start -->

								<tr>

									<td>

										<label for="address" class="col-sm-3 form-label"> Banner_4 </label>

									</td>

									<td>

										<?php if (isset($vouchers->banner_4) && $vouchers->banner_4 != "") { ?>

											<br>

											<img src="<?php echo $this->config->item("photo_url"); ?><?php echo $vouchers->banner_4; ?>" alt="pic" width="50" height="50" />

										<?php } ?>

									</td>

								</tr>

								<!-- Banner_4 End -->

								<!-- Discount_type Start -->

								<tr>

									<td>

										<label class="col-sm-3 form-label">Select Discount_type</label>

									</td>

									<td>
										<?php echo $vouchers->discount_type == "percentage" ? 'percentage' : ""; ?>

										<?php echo $vouchers->discount_type == "fixed" ? 'fixed' : ""; ?>

									</td>

								</tr>

								<!-- Discount_type End -->								<tr>

									<td>

										<label for="discount_value" class="col-sm-3 form-label"> Discount_value </label>

									</td>

									<td>

										<?php echo set_value("discount_value", html_entity_decode($vouchers->discount_value)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="minimum_amount" class="col-sm-3 form-label"> Minimum_amount </label>

									</td>

									<td>

										<?php echo set_value("minimum_amount", html_entity_decode($vouchers->minimum_amount)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="maximum_discount" class="col-sm-3 form-label"> Maximum_discount </label>

									</td>

									<td>

										<?php echo set_value("maximum_discount", html_entity_decode($vouchers->maximum_discount)); ?>

									</td>

								</tr>								<!-- Start_dt Start -->

								<tr>

									<td>

										<label for="start_dt" class="col-sm-3 form-label"> Start_dt </label>

									</td>

									<td>

										<?php echo set_value("start_dt", html_entity_decode($vouchers->start_dt)); ?>

									</td>

								</tr>

								<!-- Start_dt End -->

								<!-- End_dt Start -->

								<tr>

									<td>

										<label for="end_dt" class="col-sm-3 form-label"> End_dt </label>

									</td>

									<td>

										<?php echo set_value("end_dt", html_entity_decode($vouchers->end_dt)); ?>

									</td>

								</tr>

								<!-- End_dt End -->								<tr>

									<td>

										<label for="is_claimed" class="col-sm-3 form-label"> Is_claimed </label>

									</td>

									<td>

										<?php echo set_value("is_claimed", html_entity_decode($vouchers->is_claimed)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="quota" class="col-sm-3 form-label"> Quota </label>

									</td>

									<td>

										<?php echo set_value("quota", html_entity_decode($vouchers->quota)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="used" class="col-sm-3 form-label"> Used </label>

									</td>

									<td>

										<?php echo set_value("used", html_entity_decode($vouchers->used)); ?>

									</td>

								</tr>								<!-- Created Start -->

								<tr>

									<td>

										<label for="created_dt" class="col-sm-3 form-label"> Created </label>

									</td>

									<td>

										<?php echo set_value("created_dt", html_entity_decode($vouchers->created_dt)); ?>

									</td>

								</tr>

								<!-- Created End -->

								<!-- Status Start -->

								<tr>

									<td>

										<label class="col-sm-3 form-label">Select Status</label>

									</td>

									<td>
										<?php echo $vouchers->status == "active" ? 'active' : ""; ?>

										<?php echo $vouchers->status == "inactive" ? 'inactive' : ""; ?>

										<?php echo $vouchers->status == "expired" ? 'expired' : ""; ?>

									</td>

								</tr>

								<!-- Status End -->

								<!-- Vocat_id Start -->

								<tr>

									<td>

										<label class="form-label col-md-3"> Vocat_id </label>

									</td>

									<td>

										<?php

										if (isset($voucher_categories) && !empty($voucher_categories)):
											foreach ($voucher_categories as $key => $value):

												if ($value->vocat_id == $vouchers->vocat_id)

													echo $value->name;
											endforeach;

										endif; ?>

									</td>

								</tr>

								<!-- Vocat_id End -->
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

<?php $this->load->view('admin/template/footer'); ?>