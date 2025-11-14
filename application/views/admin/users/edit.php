<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Users</h2>

    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url() . 'admin/' ?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Users</strong>
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
              <?php endif; ?>              <!-- User_id Start -->

              <div class="form-group mb-3">
                <label for="user_id" class="col-sm-3 form-label"> ID </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="user_id" name="user_id" readonly value="<?php echo set_value("user_id", html_entity_decode($users->user_id)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("user_id", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- User_id End -->

              <!-- Name Start -->

              <div class="form-group mb-3">
                <label for="name" class="col-sm-3 form-label"> Name </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value("name", html_entity_decode($users->name)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("name", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Name End -->

              <!-- Email Start -->

              <div class="form-group mb-3">
                <label for="email" class="col-sm-3 form-label"> Email </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value("email", html_entity_decode($users->email)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("email", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Email End -->

              <!-- Major Start -->

              <div class="form-group mb-3">
                <label for="major" class="col-sm-3 form-label"> Major </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="major" name="major" value="<?php echo set_value("major", html_entity_decode($users->major)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("major", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Major End -->

              <!-- Year_generation Start -->

              <div class="form-group mb-3">
                <label for="year_generation" class="col-sm-3 form-label"> Year </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="year_generation" name="year_generation" value="<?php echo set_value("year_generation", html_entity_decode($users->year_generation)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("year_generation", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Year_generation End -->

              <!-- Job Start -->

              <div class="form-group mb-3">
                <label for="job" class="col-sm-3 form-label"> Job </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="job" name="job" value="<?php echo set_value("job", html_entity_decode($users->job)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("job", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Job End -->

              <!-- Location Start -->

              <div class="form-group mb-3">
                <label for="location" class="col-sm-3 form-label"> Location </label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="location" name="location" value="<?php echo set_value("location", html_entity_decode($users->location)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("location", "<span class='label label-danger'>", "</span>") ?>
                </div>

              </div>

              <!-- Location End -->              <div class="form-group">
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