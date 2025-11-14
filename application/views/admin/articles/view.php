<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Articles</h2>
		
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

										<label for="article_id" class="col-sms-3 form-label"> ID </label>

									</td>

									<td>

										<?php echo set_value("article_id", html_entity_decode($articles->article_id)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="title" class="col-sms-3 form-label"> Title </label>

									</td>

									<td>

										<?php echo set_value("title", html_entity_decode($articles->title)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="slug" class="col-sms-3 form-label"> Slug </label>

									</td>

									<td>

										<?php echo set_value("slug", html_entity_decode($articles->slug)); ?>

									</td>

								</tr>								<!-- Content Start -->

								<tr>

									<td>

										<label for="content" class="col-sms-3 form-label"> Content </label>

									</td>

									<td>

										<?php echo set_value("content",  html_entity_decode($articles->content)); ?>

									</td>

								</tr>

								<!-- Content End -->								<tr>

									<td>

										<label for="author" class="col-sms-3 form-label"> Author </label>

									</td>

									<td>

										<?php echo set_value("author", html_entity_decode($articles->author)); ?>

									</td>

								</tr>
								<tr>

									<td>

										<label for="published_by" class="col-sms-3 form-label"> Published By </label>

									</td>

									<td>

										<?php echo set_value("published_by", html_entity_decode($articles->published_by)); ?>

									</td>

								</tr>								<!-- Published_dt Start -->

								<tr>

									<td>

										<label for="published_dt" class="col-sms-3 form-label"> Published Time </label>

									</td>

									<td>

										<?php echo set_value("published_dt", html_entity_decode($articles->published_dt)); ?>

									</td>

								</tr>

								<!-- Published_dt End -->

								<!-- Image Start -->

								<tr>

									<td>

										<label for="address" class="col-sms-3 form-label"> Image </label>

									</td>

									<td>

										<?php if (isset($articles->image) && $articles->image != "") { ?>

											<br>

											<img src="<?php echo $this->config->item("photo_url"); ?><?php echo $articles->image; ?>" alt="pic" width="50" height="50" />

										<?php } ?>

									</td>

								</tr>

								<!-- Image End -->
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