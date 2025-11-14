<?php $this->load->view('admin/template/header'); ?>
<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/7p0474s3f2j0ccv7tittd1yuw6p82vyj9ut1vf70ay7xiy9r/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>


<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Banner</h2>

    
  </div>

  <div class="col-sm-6">
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

              


	<!-- Banner_id Start -->
	<div class="form-group mb-3" style="display:none">
	  <label for="banner_id" class="col-sm-3 form-label"> ID </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="banner_id" name="banner_id" readonly value="<?php echo md5(uniqid(mt_rand(), true)) ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("banner_id","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- Banner_id End -->

	



    <!-- Image Start -->

    <div class="form-group mb-3">
      <label for="address" class="col-sm-3 form-label"> Image </label>
      <div class="col-sm-6">
      <input type="file" name="image" />
      <input type="hidden" name="old_image" value="<?php if (isset($image) && $image!=""){echo $image; } ?>" />
        <?php if(isset($image_err) && !empty($image_err)) 
        { foreach($image_err as $key => $error)
        { echo "<div class=\"error-msg\"></div>"; } }?>
      </div>
        <div class="col-sm-3" >
      </div>
    </div>

    <!-- Image End -->



    



	<!-- Date_from Start -->

	<div class="form-group mb-3">
	  <label for="date_from" class="col-sm-3 form-label"> Date From </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control span2 " id="date_from" name="date_from" value="<?php echo set_value("date_from","2025-06-17"); ?>"	    >
	  </div>
	  <div class="col-sm-4" >
	    <?php echo form_error("date_from","<span class='label label-danger'>","</span>")?>
	  </div>

	</div> 

	<!-- Date_from End -->



	



	<!-- Date_to Start -->

	<div class="form-group mb-3">
	  <label for="date_to" class="col-sm-3 form-label"> Date To </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control span2 " id="date_to" name="date_to" value="<?php echo set_value("date_to","2025-06-17"); ?>"	    >
	  </div>
	  <div class="col-sm-4" >
	    <?php echo form_error("date_to","<span class='label label-danger'>","</span>")?>
	  </div>

	</div> 

	<!-- Date_to End -->



	



 <!-- Status Start -->

 <div class="form-group mb-3">

          <label class="col-sm-3 form-label">Select Status</label>

          <div class="col-sm-6">

            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="status" value="active"> active </span>

            <span style="margin-right:20px;"><input type="radio" style="width:20px; height:20px;" name="status" value="inactive"> inactive </span>

        </div>

    </div>

      <!-- Status End -->





			<!-- Content Start -->

			<div class="form-group mb-3">
			  <label for="content" class="col-sm-3 form-label"> Content </label>
			  <div class="col-sm-6">
			    <textarea class="form-control" id="content" name="content"><?php echo set_value("content"); ?></textarea>
			  </div>
			  <div class="col-sm-4" >
			    <?php echo form_error("content","<span class='label label-danger'>","</span>")?>
			  </div>
			</div> 

			<!-- Content End -->

			

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
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: [
      // Core editing features
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      // Your account includes a free trial of TinyMCE premium features
      
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
  });
</script>

<?php $this->load->view('admin/template/footer'); ?>