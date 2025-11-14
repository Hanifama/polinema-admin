<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Posts</h2>

    
  </div>

  <div class="col-sm-8">
    <div class="title-action">
    </div>
  </div>
</div>

<!--  EO :heading -->
<div class="row">
  <div class="animated fadeInRight">
    <div class="ibox card ">
      <div class="ibox-title card-header">
        <h5> Edit <small></small></h5>
        <div class="ibox-tools">
        </div>
      </div>
      <!-- ............................................................. -->

      <!-- BO : content  -->
      <div class="col-sm-12 white-bg card-body ">
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


              <!-- ID Start -->

              <div class="form-group mb-3" style="display:none">
                <label for="post_id" class="col-sm-3 form-label"> ID </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="post_id" name="post_id" value="<?php echo set_value("post_id", html_entity_decode($posts->post_id)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("post_id", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- ID End -->

              <!-- To User Start -->

              <div class="form-group mb-3">
                <label class="form-label col-md-3"> To User </label>
                <div class="col-md-4">
                  <select class="form-control select2" name="wall_owner_id" id="wall_owner_id">
                    <option value="">select To User</option>
                    <?php

                    if (isset($users) && !empty($users)):

                      foreach ($users as $key => $value): ?>
                        <option value="<?php echo $value->user_id; ?>" <?php echo $value->user_id == $posts->wall_owner_id ? 'selected="selected"' : ""; ?>>
                          <?php echo $value->name; ?>
                        </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <!-- To User End -->

              <!-- From User Start -->

              <div class="form-group mb-3">
                <label class="form-label col-md-3"> From User </label>
                <div class="col-md-4">
                  <select class="form-control select2" name="author_id" id="author_id">
                    <option value="">select From User</option>
                    <?php

                    if (isset($users) && !empty($users)):

                      foreach ($users as $key => $value): ?>
                        <option value="<?php echo $value->user_id; ?>" <?php echo $value->user_id == $posts->author_id ? 'selected="selected"' : ""; ?>>
                          <?php echo $value->name; ?>
                        </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <!-- From User End --><!-- Content Start -->

              <div class="form-group mb-3">
                <label for="content" class="col-sm-3 form-label"> Content </label>
                <div class="col-sm-6">
                  <textarea class="form-control" id="content" name="content"><?php echo set_value("content", html_entity_decode($posts->content)); ?></textarea>
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("content", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Content End --> <!-- Attachment Start -->

              <div class="form-group mb-3">

                <label for="address" class="col-sm-3 form-label"> Attachment </label>

                <div class="col-sm-6">

                  <input type="file" name="attachment" />

                  <input type="hidden" name="old_attachment"

                    value="<?php if (isset($attachment) && $attachment != "") {
                              echo $attachment;
                            } ?>" />

                  <?php if (isset($attachment_err) && !empty($attachment_err)) {
                    foreach ($attachment_err as $key => $error) {
                      echo "<div class=\"error-msg\"></div>";
                    }
                  } ?>

                  <?php if (isset($posts->attachment) && $posts->attachment != "") { ?>

                    <br>

                    <img src="<?php echo $this->config->item("photo_url"); ?><?php echo $posts->attachment; ?>" alt="pic" width="50" height="50" />

                  <?php } ?>

                </div>

                <div class="col-sm-3">

                </div>

              </div>

              <!-- Attachment End -->

              <!-- Type Start -->

              <div class="form-group mb-3">
                <label for="type" class="col-sm-3 form-label"> Type </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="type" name="type" value="<?php echo set_value("type", html_entity_decode($posts->type)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("type", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Type End -->

              <!-- Privacy Start -->

              <div class="form-group mb-3">

                <label class="col-sm-3 form-label">Select Privacy</label>

                <div class="col-sm-6">

                  <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" <?php echo $posts->privacy == "public" ? 'checked="checked"' : ""; ?> name="privacy" value="public"> public </span>

                  <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" <?php echo $posts->privacy == "private" ? 'checked="checked"' : ""; ?> name="privacy" value="private"> private </span>

                </div>

              </div>

              <!-- Privacy End -->

              <!-- Created Start -->

              <div class="form-group mb-3">
                <label for="created_dt" class="col-sm-3 form-label"> Created </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control datetimepicker" name="created_dt" id="created_dt" value="<?php echo set_value("created_dt", $posts->created_dt); ?>" />
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("created_dt", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Created End -->

              <!-- Replied Start -->

              <div class="form-group mb-3">

                <label class="col-sm-3 form-label">Select Replied</label>

                <div class="col-sm-6">

                  <?php $arr = explode(", ", $posts->replied) ?>



                  <span style="margin-right:20px;"><input type="checkbox" style="width:20px; height:20px;" <?php echo in_array("1", $arr) ? 'checked="checked"' : ""; ?> name="replied[]" value="1"> 1 </span>

                  <span style="margin-right:20px;"><input type="checkbox" style="width:20px; height:20px;" <?php echo in_array("0", $arr) ? 'checked="checked"' : ""; ?> name="replied[]" value="0"> 0 </span>

                </div>

              </div>

              <!-- Replied End -->


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

<?php $this->load->view('admin/template/footer') ?>