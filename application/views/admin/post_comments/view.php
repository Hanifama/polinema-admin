<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Post Comments</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>Post Comments</strong>
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
   <div class="col-lg-12 row wrapper ">
      <div class="ibox card ">
         <div class="ibox-title" >
            <h5>View <small></small></h5>

            <div class="ibox-tools">                           
            </div>
         </div>

         <!-- ............................................................. -->

         <!-- BO : content  -->
         <div class="col-sm-12 white-bg ">
            <div class="box box-info">
               <div class="box-header with-border">
                  <h3 class="box-title">  </h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->

               <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">
                  <div class="box-body">
                     <?php if($this->session->flashdata('message')): ?>
                     <div class="alert alert-success">
                        <button type="button" class="close" data-close="alert"></button>
                        <?php echo $this->session->flashdata('message'); ?>
                     </div>
                     <?php endif; ?> 

                     

<table class='table table-bordered' style='width:70%;' align='center'>

	<tr>

	 <td>

	   <label for="comment_id" class="col-sm-3 form-label"> ID </label>

	 </td>

	 <td> 

	   <?php echo set_value("comment_id",html_entity_decode($post_comments->comment_id)); ?>

	 </td>

	</tr>

	
    <!-- Post_id Start -->

	<tr>

	 <td>

	  <label class="form-label col-md-3"> Post ID </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($posts) && !empty($posts)):
	      foreach($posts as $key => $value): 

	       if($value->post_id==$post_comments->post_id)

	             echo $value->post_id;
	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Post_id End -->
	
    <!-- User_id Start -->

	<tr>

	 <td>

	  <label class="form-label col-md-3"> User </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($users) && !empty($users)):
	      foreach($users as $key => $value): 

	       if($value->user_id==$post_comments->user_id)

	             echo $value->name;
	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- User_id End -->
	
    <!-- Content Start -->

	<tr>

	 <td>

	  <label for="content" class="col-sm-3 form-label"> Content </label>

	 </td>

	 <td> 

	   <?php echo set_value("content",  html_entity_decode($post_comments->content)); ?>

	 </td>

	</tr>

    <!-- Content End -->
	
    <!-- Created Start -->

	<tr>

	 <td>

	  <label for="created_dt" class="col-sm-3 form-label"> Created </label>

	 </td>

	 <td> 

	   <?php echo set_value("created_dt", html_entity_decode($post_comments->created_dt)); ?>

	 </td>

	</tr>

    <!-- Created End -->
	<tr><td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a></td></tr></table>

                     <div class="form-group">
                        <div class="col-sm-3" >                       
                        </div>

                        <div class="col-sm-6">
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