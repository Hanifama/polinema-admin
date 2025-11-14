<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Tenant Categories</h2>

   
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
      <div class="ibox-title card-header" >
        <h5> Edit <small></small></h5>
        <div class="ibox-tools">                           
        </div>
      </div>
      <!-- ............................................................. -->

      <!-- BO : content  -->
      <div class="col-sm-12 white-bg card-body ">
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

              
<!-- Tencat_id Start -->

<div class="form-group mb-3" style="display:none">
  <label for="tencat_id" class="col-sm-3 form-label"> ID </label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="tencat_id" readonly name="tencat_id" value="<?php echo set_value("tencat_id",html_entity_decode($tenant_categories->tencat_id)); ?>">
  </div>
  <div class="col-sm-4" >
    <?php echo form_error("tencat_id","<span class='label label-danger'>","</span>")?>
  </div>

</div> 

<!-- Tencat_id End -->

<!-- Name Start -->

<div class="form-group mb-3">
  <label for="name" class="col-sm-3 form-label"> Name </label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value("name",html_entity_decode($tenant_categories->name)); ?>">
  </div>
  <div class="col-sm-4" >
    <?php echo form_error("name","<span class='label label-danger'>","</span>")?>
  </div>

</div> 

<!-- Name End -->

    <!-- Icon Start -->

    <div class="form-group mb-3">

      <label for="address" class="col-sm-3 form-label"> Icon </label>

      <div class="col-sm-6">

      <input type="file" name="icon" />

      <input type="hidden" name="old_icon" 

      value="<?php if (isset($icon) && $icon!=""){echo $icon; }?>" />  

        <?php if(isset($icon_err) && !empty($icon_err)) 

        {foreach($icon_err as $key => $error)

        {echo "<div class=\"error-msg\"></div>"; } }?>

        <?php if (isset($tenant_categories->icon) && $tenant_categories->icon!=""){?>

            <br>

  <img src="<?php echo $this->config->item("photo_url");?><?php echo $tenant_categories->icon; ?>" alt="pic" width="50" height="50" />

    <?php } ?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- Icon End -->
    
	 <!-- Status Start -->

	 <div class="form-group mb-3">

	          <label class="col-sm-3 form-label">Select Status</label>

	          <div class="col-sm-6">

	            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" <?php echo $tenant_categories->status=="active"?'checked="checked"':""; ?> name="status" value="active"> active </span>

	            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" <?php echo $tenant_categories->status=="inactive"?'checked="checked"':""; ?> name="status" value="inactive"> inactive </span>

	        </div>

	    </div>

	      <!-- Status End -->
	

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