<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Tenants</h2>

  
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

              	<!-- Tenant_id Start -->
	<div class="form-group mb-3" style="display:none">
	  <label for="tenant_id" class="col-sm-3 form-label"> ID </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="tenant_id"  name="tenant_id" readonly value="<?php echo md5(uniqid(mt_rand(), true)) ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("tenant_id","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- Tenant_id End -->

	
	<!-- Tencat_id Start -->
	<div class="form-group mb-3">
        <label class="form-label col-md-3"> Category </label>
        <div class="col-md-4">
              <select class="form-control select2" name="tencat_id" id="tencat_id">
              <option value="">select Category</option>
      <?php 
      if(isset($tenant_categories) && !empty($tenant_categories)):
      foreach($tenant_categories as $key => $value): ?>
          <option value="<?php echo $value->tencat_id; ?>">
            <?php echo $value->name; ?>
          </option>
      <?php endforeach; ?>
      <?php endif; ?>
      </select>
        </div>

    </div>

      <!-- Tencat_id End -->
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

	
    <!-- Banner Start -->

    <div class="form-group mb-3">
      <label for="address" class="col-sm-3 form-label"> Banner </label>
      <div class="col-sm-6">
      <input type="file" name="banner" />
      <input type="hidden" name="old_banner" value="<?php if (isset($banner) && $banner!=""){echo $banner; } ?>" />
        <?php if(isset($banner_err) && !empty($banner_err)) 
        { foreach($banner_err as $key => $error)
        { echo "<div class=\"error-msg\"></div>"; } }?>
      </div>
        <div class="col-sm-3" >
      </div>
    </div>

    <!-- Banner End -->
    

			<!-- Address Start -->

			<div class="form-group mb-3">
			  <label for="address" class="col-sm-3 form-label"> Address </label>
			  <div class="col-sm-6">
			    <textarea class="form-control" id="address" name="address"><?php echo set_value("address"); ?></textarea>
			  </div>
			  <div class="col-sm-4" >
			    <?php echo form_error("address","<span class='label label-danger'>","</span>")?>
			  </div>
			</div> 

			<!-- Address End -->

			

			<!-- About Start -->

			<div class="form-group mb-3">
			  <label for="about" class="col-sm-3 form-label"> About </label>
			  <div class="col-sm-6">
			    <textarea class="form-control" id="about" name="about"><?php echo set_value("about"); ?></textarea>
			  </div>
			  <div class="col-sm-4" >
			    <?php echo form_error("about","<span class='label label-danger'>","</span>")?>
			  </div>
			</div> 

			<!-- About End -->

			
    <!-- Image_1 Start -->

    <div class="form-group mb-3">
      <label for="address" class="col-sm-3 form-label"> Image 1 </label>
      <div class="col-sm-6">
      <input type="file" name="image_1" />
      <input type="hidden" name="old_image_1" value="<?php if (isset($image_1) && $image_1!=""){echo $image_1; } ?>" />
        <?php if(isset($image_1_err) && !empty($image_1_err)) 
        { foreach($image_1_err as $key => $error)
        { echo "<div class=\"error-msg\"></div>"; } }?>
      </div>
        <div class="col-sm-3" >
      </div>
    </div>

    <!-- Image_1 End -->
    
    <!-- Image_2 Start -->

    <div class="form-group mb-3">
      <label for="address" class="col-sm-3 form-label"> Image 2 </label>
      <div class="col-sm-6">
      <input type="file" name="image_2" />
      <input type="hidden" name="old_image_2" value="<?php if (isset($image_2) && $image_2!=""){echo $image_2; } ?>" />
        <?php if(isset($image_2_err) && !empty($image_2_err)) 
        { foreach($image_2_err as $key => $error)
        { echo "<div class=\"error-msg\"></div>"; } }?>
      </div>
        <div class="col-sm-3" >
      </div>
    </div>

    <!-- Image_2 End -->
    
    <!-- Image_3 Start -->

    <div class="form-group mb-3">
      <label for="address" class="col-sm-3 form-label"> Image 3 </label>
      <div class="col-sm-6">
      <input type="file" name="image_3" />
      <input type="hidden" name="old_image_3" value="<?php if (isset($image_3) && $image_3!=""){echo $image_3; } ?>" />
        <?php if(isset($image_3_err) && !empty($image_3_err)) 
        { foreach($image_3_err as $key => $error)
        { echo "<div class=\"error-msg\"></div>"; } }?>
      </div>
        <div class="col-sm-3" >
      </div>
    </div>

    <!-- Image_3 End -->
    
    <!-- Image_4 Start -->

    <div class="form-group mb-3">
      <label for="address" class="col-sm-3 form-label"> Image 4 </label>
      <div class="col-sm-6">
      <input type="file" name="image_4" />
      <input type="hidden" name="old_image_4" value="<?php if (isset($image_4) && $image_4!=""){echo $image_4; } ?>" />
        <?php if(isset($image_4_err) && !empty($image_4_err)) 
        { foreach($image_4_err as $key => $error)
        { echo "<div class=\"error-msg\"></div>"; } }?>
      </div>
        <div class="col-sm-3" >
      </div>
    </div>

    <!-- Image_4 End -->
    	<!-- Lat Start -->
	<div class="form-group mb-3">
	  <label for="lat" class="col-sm-3 form-label"> Lat </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="lat" name="lat" value="<?php echo set_value("lat"); ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("lat","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- Lat End -->

		<!-- Lng Start -->
	<div class="form-group mb-3">
	  <label for="lng" class="col-sm-3 form-label"> Lng </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="lng" name="lng" value="<?php echo set_value("lng"); ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("lng","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- Lng End -->

	
 <!-- Status Start -->

 <div class="form-group mb-3">

          <label class="col-sm-3 form-label">Select Status</label>

          <div class="col-sm-6">

            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="status" value="active"> active </span>

            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="status" value="inactive"> inactive </span>

        </div>

    </div>

      <!-- Status End -->              <div class="form-group">
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