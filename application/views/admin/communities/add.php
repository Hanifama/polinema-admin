<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Communities</h2>

    
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

              <!-- Community_id Start -->
              <div class="form-group mb-3" style="display:none">
                <label for="community_id" class="col-sm-3 form-label"> ID </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="community_id" name="community_id" readonly value="<?php echo md5(uniqid(mt_rand(), true)) ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("community_id", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Community_id End -->

              <!-- Name Start -->
              <div class="form-group mb-3">
                <label for="name" class="col-sm-3 form-label"> Name </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value("name"); ?>">
                </div>
                <div class="col-sm-6">
                  <?php echo form_error("name", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>
              <!-- Name End -->
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

              <!-- Description End -->              <!-- Logo Start -->

              <div class="form-group mb-3">
                <label for="address" class="col-sm-3 form-label"> Logo </label>
                <div class="col-sm-6">
                  <input type="file" name="logo" />
                  <input type="hidden" name="old_logo" value="<?php if (isset($logo) && $logo != "") {
                                                                echo $logo;
                                                              } ?>" />
                  <?php if (isset($logo_err) && !empty($logo_err)) {
                    foreach ($logo_err as $key => $error) {
                      echo "<div class=\"error-msg\"></div>";
                    }
                  } ?>
                </div>
                <div class="col-sm-3">
                </div>
              </div>

              <!-- Logo End -->

              <!-- Category_id Start -->
              <div class="form-group mb-3">
                <label class="form-label col-md-3"> Category </label>
                <div class="col-md-4">
                  <select class="form-control select2" name="category_id" id="category_id">
                    <option value="">select Category</option>
                    <?php
                    if (isset($community_categories) && !empty($community_categories)):
                      foreach ($community_categories as $key => $value): ?>
                        <option value="<?php echo $value->category_id; ?>">
                          <?php echo $value->name; ?>
                        </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>

              </div>

              <!-- Category_id End -->              <div class="form-group">
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