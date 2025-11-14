<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Discussion Comment</h2>

    <ol class="breadcrumb">
      <li>
        <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
      </li>
      <li class="active">
        <strong>Discussion Comment</strong>
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

              	<!-- ID Start -->
	<div class="form-group mb-3">
	  <label for="comment_id" class="col-sm-3 form-label"> ID </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="comment_id" name="comment_id" value="<?php echo set_value("comment_id"); ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("comment_id","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- ID End -->

		<!-- User Start -->
	<div class="form-group mb-3">
	  <label for="user_id" class="col-sm-3 form-label"> User </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo set_value("user_id"); ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("user_id","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- User End -->

	
	<!-- Discussion Start -->
	<div class="form-group mb-3">
        <label class="form-label col-md-3"> Discussion </label>
        <div class="col-md-4">
              <select class="form-control select2" name="discus_id" id="discus_id">
              <option value="">select Discussion</option>
      <?php 
      if(isset($discussion) && !empty($discussion)):
      foreach($discussion as $key => $value): ?>
          <option value="<?php echo $value->discus_id; ?>">
            <?php echo $value->discus_id; ?>
          </option>
      <?php endforeach; ?>
      <?php endif; ?>
      </select>
        </div>

    </div>

      <!-- Discussion End -->
	<!-- Created Start -->
	<div class="form-group mb-3">
	  <label for="created_dt" class="col-sm-3 form-label"> Created </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="created_dt" name="created_dt" value="<?php echo set_value("created_dt"); ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("created_dt","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- Created End -->

	

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

			
    <!-- Attachment Start -->

    <div class="form-group mb-3">
      <label for="address" class="col-sm-3 form-label"> Attachment </label>
      <div class="col-sm-6">
      <input type="file" name="attachment" />
      <input type="hidden" name="old_attachment" value="<?php if (isset($attachment) && $attachment!=""){echo $attachment; } ?>" />
        <?php if(isset($attachment_err) && !empty($attachment_err)) 
        { foreach($attachment_err as $key => $error)
        { echo "<div class=\"error-msg\"></div>"; } }?>
      </div>
        <div class="col-sm-3" >
      </div>
    </div>

    <!-- Attachment End -->
    	<!-- Attachment Mime Start -->
	<div class="form-group mb-3">
	  <label for="attachment_mime" class="col-sm-3 form-label"> Attachment Mime </label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="attachment_mime" name="attachment_mime" value="<?php echo set_value("attachment_mime"); ?>" >
	  </div>
	  <div class="col-sm-6" >
	    <?php echo form_error("attachment_mime","<span class='label label-danger'>","</span>")?>
	  </div>
	</div> 
	<!-- Attachment Mime End -->

	

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