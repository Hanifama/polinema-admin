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
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ">
      <div class="ibox-title">
        <h5> Edit <small></small></h5>

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
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="box-body">

              <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success">
                  <button type="button" class="close" data-close="alert"></button>
                  <?php echo $this->session->flashdata('message'); ?>
                </div>
              <?php endif; ?>              <!-- Id Start -->

              <div class="form-group">

                <label for="id" class="col-sm-3 control-label"> Id </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="id" name="id" value="<?php echo set_value("id", html_entity_decode($admin->id)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("id", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Id End -->

              <!-- Username Start -->

              <div class="form-group">

                <label for="username" class="col-sm-3 control-label"> Username </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value("username", html_entity_decode($admin->username)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("username", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Username End -->

              <!-- Password Start -->

              <div class="form-group">

                <label for="password" class="col-sm-3 control-label"> Password </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="password" name="password" value="<?php echo set_value("password", html_entity_decode($admin->password)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("password", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Password End -->

              <!-- Email Start -->

              <div class="form-group">

                <label for="email" class="col-sm-3 control-label"> Email </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value("email", html_entity_decode($admin->email)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("email", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Email End -->

              <!-- Active Start -->

              <div class="form-group">

                <label for="active" class="col-sm-3 control-label"> Active </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="active" name="active" value="<?php echo set_value("active", html_entity_decode($admin->active)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("active", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Active End -->

              <!-- First_name Start -->

              <div class="form-group">

                <label for="first_name" class="col-sm-3 control-label"> First_name </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo set_value("first_name", html_entity_decode($admin->first_name)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("first_name", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- First_name End -->

              <!-- Last_name Start -->

              <div class="form-group">

                <label for="last_name" class="col-sm-3 control-label"> Last_name </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo set_value("last_name", html_entity_decode($admin->last_name)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("last_name", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Last_name End -->

              <!-- Company Start -->

              <div class="form-group">

                <label for="company" class="col-sm-3 control-label"> Company </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="company" name="company" value="<?php echo set_value("company", html_entity_decode($admin->company)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("company", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Company End -->

              <!-- Company_id Start -->

              <div class="form-group">

                <label for="company_id" class="col-sm-3 control-label"> Company_id </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="company_id" name="company_id" value="<?php echo set_value("company_id", html_entity_decode($admin->company_id)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("company_id", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Company_id End -->

              <!-- Type_user Start -->

              <div class="form-group">

                <label for="type_user" class="col-sm-3 control-label"> Type_user </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="type_user" name="type_user" value="<?php echo set_value("type_user", html_entity_decode($admin->type_user)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("type_user", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Type_user End -->

              <!-- Role_id Start -->

              <div class="form-group">

                <label for="role_id" class="col-sm-3 control-label"> Role_id </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="role_id" name="role_id" value="<?php echo set_value("role_id", html_entity_decode($admin->role_id)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("role_id", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Role_id End -->

              <!-- Store_id Start -->

              <div class="form-group">

                <label for="store_id" class="col-sm-3 control-label"> Store_id </label>

                <div class="col-sm-4">

                  <input type="text" class="form-control" id="store_id" name="store_id" value="<?php echo set_value("store_id", html_entity_decode($admin->store_id)); ?>">

                </div>

                <div class="col-sm-5">
                  <?php echo form_error("store_id", "<span class='label label-danger'>", "</span>") ?>

                </div>

              </div>

              <!-- Store_id End -->              <div class="form-group">
                <div class="col-sm-3">
                </div>

                <div class="col-sm-6">
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

<?php $this->load->view('footer');
