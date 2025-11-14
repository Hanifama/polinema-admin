<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Vouchers</h2>

    
  </div>

  <div class="col-sm-8">
    <div class="title-action">
    </div>
  </div>
</div>

<!--  EO :heading -->
<div class="row">
  <div class="animated fadeInRight">
    <div class="ibox card">
      <div class="ibox-title card-header">
        <h5>Add <small></small></h5>
        <div class="ibox-tools">
        </div>
      </div>

      <!-- ............................................................. -->
      <!-- BO : content  -->

      <div class="col-sm-12 white-bg card-body">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"> </h3>
          </div>
          <!-- /.box-header -->

          <!-- form start -->
          <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="box-body">
              <?php if ($this->session->flashdata('message')): ?>
                <div class="alert alert-success">
                  <button type="button" class="close" data-close="alert"></button>
                  <?php echo $this->session->flashdata('message'); ?>
                </div>
              <?php endif; ?>

              <!-- Voucher_id Start -->
              <div class="form-group mb-3" style="display:none">
                <label for="voucher_id" class="col-sm-3 form-label"> ID </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="voucher_id" readonly name="voucher_id" value="<?php echo md5(uniqid(mt_rand(), true)) ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("voucher_id", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Voucher_id End -->              <!-- Tenant_id Start -->
              <div class="form-group mb-3">
                <label class="form-label col-md-3"> Tenant </label>
                <div class="col-md-4">
                  <select class="form-control select2" name="tenant_id" id="tenant_id">
                    <option value="">select Tenant</option>
                    <?php
                    if (isset($tenants) && !empty($tenants)):
                      foreach ($tenants as $key => $value): ?>
                        <option value="<?php echo $value->tenant_id; ?>">
                          <?php echo $value->name; ?>
                        </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>

              </div>

              <!-- Tenant_id End -->              <!-- Vocat_id Start -->
              <div class="form-group mb-3">
                <label class="form-label col-md-3"> Category </label>
                <div class="col-md-4">
                  <select class="form-control select2" name="vocat_id" id="vocat_id">
                    <option value="">select Category</option>
                    <?php
                    if (isset($voucher_categories) && !empty($voucher_categories)):
                      foreach ($voucher_categories as $key => $value): ?>
                        <option value="<?php echo $value->vocat_id; ?>">
                          <?php echo $value->name; ?>
                        </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>

              </div>

              <!-- Vocat_id End -->
              <!-- Title Start -->
              <div class="form-group mb-3">
                <label for="title" class="col-sm-3 form-label"> Title </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value("title"); ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("title", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Title End -->
              <!-- Description Start -->

              <div class="form-group mb-3">
                <label for="description" class="col-sm-3 form-label"> Description </label>
                <div class="col-sm-6">
                  <textarea class="form-control" id="description" name="description"><?php echo set_value("description"); ?></textarea>
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("description", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Description End -->              <!-- Banner_1 Start -->

              <div class="form-group mb-3">
                <label for="address" class="col-sm-3 form-label"> Banner 1 </label>
                <div class="col-sm-6">
                  <input type="file" name="banner_1" />
                  <input type="hidden" name="old_banner_1" value="<?php if (isset($banner_1) && $banner_1 != "") {
                                                                    echo $banner_1;
                                                                  } ?>" />
                  <?php if (isset($banner_1_err) && !empty($banner_1_err)) {
                    foreach ($banner_1_err as $key => $error) {
                      echo "<div class=\"error-msg\"></div>";
                    }
                  } ?>
                </div>
                <div class="col-sm-3">
                </div>
              </div>

              <!-- Banner_1 End -->

              <!-- Banner_2 Start -->

              <div class="form-group mb-3">
                <label for="address" class="col-sm-3 form-label"> Banner 2 </label>
                <div class="col-sm-6">
                  <input type="file" name="banner_2" />
                  <input type="hidden" name="old_banner_2" value="<?php if (isset($banner_2) && $banner_2 != "") {
                                                                    echo $banner_2;
                                                                  } ?>" />
                  <?php if (isset($banner_2_err) && !empty($banner_2_err)) {
                    foreach ($banner_2_err as $key => $error) {
                      echo "<div class=\"error-msg\"></div>";
                    }
                  } ?>
                </div>
                <div class="col-sm-3">
                </div>
              </div>

              <!-- Banner_2 End -->

              <!-- Banner_3 Start -->

              <div class="form-group mb-3">
                <label for="address" class="col-sm-3 form-label"> Banner 3 </label>
                <div class="col-sm-6">
                  <input type="file" name="banner_3" />
                  <input type="hidden" name="old_banner_3" value="<?php if (isset($banner_3) && $banner_3 != "") {
                                                                    echo $banner_3;
                                                                  } ?>" />
                  <?php if (isset($banner_3_err) && !empty($banner_3_err)) {
                    foreach ($banner_3_err as $key => $error) {
                      echo "<div class=\"error-msg\"></div>";
                    }
                  } ?>
                </div>
                <div class="col-sm-3">
                </div>
              </div>

              <!-- Banner_3 End -->

              <!-- Banner_4 Start -->

              <div class="form-group mb-3">
                <label for="address" class="col-sm-3 form-label"> Banner 4 </label>
                <div class="col-sm-6">
                  <input type="file" name="banner_4" />
                  <input type="hidden" name="old_banner_4" value="<?php if (isset($banner_4) && $banner_4 != "") {
                                                                    echo $banner_4;
                                                                  } ?>" />
                  <?php if (isset($banner_4_err) && !empty($banner_4_err)) {
                    foreach ($banner_4_err as $key => $error) {
                      echo "<div class=\"error-msg\"></div>";
                    }
                  } ?>
                </div>
                <div class="col-sm-3">
                </div>
              </div>

              <!-- Banner_4 End -->

              <!-- Discount_type Start -->

              <div class="form-group mb-3">

                <label class="col-sm-3 form-label">Select Discount Type</label>

                <div class="col-sm-6">

                  <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="discount_type" value="percentage"> percentage </span>

                  <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="discount_type" value="fixed"> fixed </span>

                </div>

              </div>

              <!-- Discount_type End -->
              <!-- Discount_value Start -->
              <div class="form-group mb-3">
                <label for="discount_value" class="col-sm-3 form-label"> Discount Value </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="discount_value" name="discount_value" value="<?php echo set_value("discount_value"); ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("discount_value", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Discount_value End -->

              <!-- Minimum_amount Start -->
              <div class="form-group mb-3">
                <label for="minimum_amount" class="col-sm-3 form-label"> Minimum Amount </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="minimum_amount" name="minimum_amount" value="<?php echo set_value("minimum_amount"); ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("minimum_amount", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Minimum_amount End -->

              <!-- Maximum_discount Start -->
              <div class="form-group mb-3">
                <label for="maximum_discount" class="col-sm-3 form-label"> Maximum Discount </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="maximum_discount" name="maximum_discount" value="<?php echo set_value("maximum_discount"); ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("maximum_discount", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Maximum_discount End -->              <!-- Start_dt Start -->

              <div class="form-group mb-3">
                <label for="start_dt" class="col-sm-3 form-label"> Start </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control datetimepicker" id="start_dt" name="start_dt" />
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("start_dt", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Start_dt End -->

              <!-- End_dt Start -->

              <div class="form-group mb-3">
                <label for="end_dt" class="col-sm-3 form-label"> End </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control datetimepicker" id="end_dt" name="end_dt" />
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("end_dt", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- End_dt End -->
              <!-- Is_claimed Start -->
              <div class="form-group mb-3">
                <label for="is_claimed" class="col-sm-3 form-label"> Claimed </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="is_claimed" name="is_claimed" value="<?php echo set_value("is_claimed"); ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("is_claimed", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Is_claimed End -->

              <!-- Quota Start -->
              <div class="form-group mb-3">
                <label for="quota" class="col-sm-3 form-label"> Quota </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="quota" name="quota" value="<?php echo set_value("quota"); ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("quota", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Quota End -->

              <!-- Used Start -->
              <div class="form-group mb-3">
                <label for="used" class="col-sm-3 form-label"> Used </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="used" name="used" value="<?php echo set_value("used"); ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("used", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Used End -->              <!-- Created Start -->

              <div class="form-group mb-3">
                <label for="created_dt" class="col-sm-3 form-label"> Created </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control datetimepicker" id="created_dt" name="created_dt" />
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("created_dt", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Created End -->

              <!-- Status Start -->

              <div class="form-group mb-3">

                <label class="col-sm-3 form-label">Select Status</label>

                <div class="col-sm-6">

                  <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="status" value="active"> active </span>

                  <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="status" value="inactive"> inactive </span>

                  <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="status" value="expired"> expired </span>

                </div>

              </div>

              <!-- Status End -->

              <div class="form-group">
                <div class="col-sm-3">
                </div>

                <div class="col-sm-6 m-3">
                  <button type="reset" class="btn btn-default ">Reset</button>
                  <button type="submit" class="btn btn-info ">Submit</button>
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