<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>User Experiences</h2>

    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url() . 'admin/' ?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>User Experiences</strong>
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
              <?php endif; ?>              <!-- Experience_id Start -->

              <div class="form-group mb-3">
                <label for="experience_id" class="col-sm-3 form-label"> Experience_id </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="experience_id" name="experience_id" value="<?php echo set_value("experience_id", html_entity_decode($user_experiences->experience_id)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("experience_id", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Experience_id End -->

              <!-- User_id Start -->

              <div class="form-group mb-3">
                <label class="form-label col-md-3"> User_id </label>
                <div class="col-md-4">
                  <select class="form-control select2" name="user_id" id="user_id">
                    <option value="">select User_id</option>
                    <?php

                    if (isset($users) && !empty($users)):

                      foreach ($users as $key => $value): ?>
                        <option value="<?php echo $value->user_id; ?>" <?php echo $value->user_id == $user_experiences->user_id ? 'selected="selected"' : ""; ?>>
                          <?php echo $value->name; ?>
                        </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>

              <!-- User_id End -->

              <!-- Company_name Start -->

              <div class="form-group mb-3">
                <label for="company_name" class="col-sm-3 form-label"> Company_name </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo set_value("company_name", html_entity_decode($user_experiences->company_name)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("company_name", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Company_name End -->

              <!-- Company_category Start -->

              <div class="form-group mb-3">
                <label for="company_category" class="col-sm-3 form-label"> Company_category </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="company_category" name="company_category" value="<?php echo set_value("company_category", html_entity_decode($user_experiences->company_category)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("company_category", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Company_category End -->

              <!-- Position Start -->

              <div class="form-group mb-3">
                <label for="position" class="col-sm-3 form-label"> Position </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="position" name="position" value="<?php echo set_value("position", html_entity_decode($user_experiences->position)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("position", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Position End -->

              <!-- Start_year Start -->

              <div class="form-group mb-3">
                <label for="start_year" class="col-sm-3 form-label"> Start_year </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="start_year" name="start_year" value="<?php echo set_value("start_year", html_entity_decode($user_experiences->start_year)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("start_year", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Start_year End -->

              <!-- End_year Start -->

              <div class="form-group mb-3">
                <label for="end_year" class="col-sm-3 form-label"> End_year </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="end_year" name="end_year" value="<?php echo set_value("end_year", html_entity_decode($user_experiences->end_year)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("end_year", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- End_year End -->              <!-- Description Start -->

              <div class="form-group mb-3">
                <label for="description" class="col-sm-3 form-label"> Description </label>
                <div class="col-sm-6">
                  <textarea class="form-control" id="description" name="description"><?php echo set_value("description", html_entity_decode($user_experiences->description)); ?></textarea>
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("description", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Description End -->
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