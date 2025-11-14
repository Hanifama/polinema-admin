<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Programs</h2>

    
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
      <div class="ibox-title card-header" >
        <h5>Add <small></small></h5>
        <div class="ibox-tools">                           
        </div>
      </div>

      <!-- ............................................................. -->
      <!-- BO : content  -->

      <div class="col-sm-12 white-bg card-body">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">  </h3>
          </div>
          <!-- /.box-header -->

          <!-- form start -->
          <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="box-body">
              <?php if($this->session->flashdata('message')): ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-close="alert"></button>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
              <?php endif; ?> 

              


	<!-- Program_id Start -->
	<div class="form-group mb-3" style="display:none" >
	  <label for="program_id" class="col-sm-3 form-label"> Program ID </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="program_id" name="program_id" readonly value="<?php echo md5(uniqid(mt_rand(), true)) ?>"  >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("program_id","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- Program_id End -->

	



	<!-- Department_id Start -->
	<div class="form-group mb-3">
        <label class="form-label col-md-3"> Department </label>
        <div class="col-md-4">
              <select class="form-control select2" name="department_id" id="department_id">
              <option value="">select Department</option>
      <?php 
      if(isset($departments) && !empty($departments)):
      foreach($departments as $key => $value): ?>
          <option value="<?php echo $value->department_id; ?>">
            <?php echo $value->name; ?>
          </option>
      <?php endforeach; ?>
      <?php endif; ?>
      </select>
        </div>

    </div>

      <!-- Department_id End -->






	<!-- Name Start -->
	<div class="form-group mb-3">
	  <label for="name" class="col-sm-3 form-label"> Name </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value("name"); ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("name","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- Name End -->

	



	<!-- Created_dt Start -->

	<div class="form-group mb-3" style="display:none">
	  <label for="created_dt" class="col-sm-3 form-label"> Created </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control " id="created_dt" value="<?= date('Y-m-d H:i:s'); ?>"  name="created_dt"/>
	  </div>
	  <div class="col-sm-4" >
	    <?php echo form_error("created_dt","<span class='label label-danger'>","</span>")?>
	  </div>
	</div>

	<!-- Created_dt End -->



	

              <div class="form-group">
                <div class="col-sm-3" >                       
                </div>

                <div class="col-sm-6 m-3">
                  <button type="reset" class="btn btn-default ">Reset</button>
                  <button type="submit" class="btn btn-info ">Submit</button>
                </div>
                <div class="col-sm-3" >                       
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