<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Discussion</h2>
     
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
            <h5> <small></small></h5>

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

	   <label for="discus_id" class="col-sm-3d form-label"> ID </label>

	 </td>

	 <td> 

	   <?php echo set_value("discus_id",html_entity_decode($discussion->discus_id)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="title" class="col-sm-d3 form-label"> Title </label>

	 </td>

	 <td> 

	   <?php echo set_value("title",html_entity_decode($discussion->title)); ?>

	 </td>

	</tr>

	
    <!-- Content Start -->

	<tr>

	 <td>

	  <label for="content" class="col-sm-d3 form-label"> Content </label>

	 </td>

	 <td> 

	   <?php echo set_value("content",  html_entity_decode($discussion->content)); ?>

	 </td>

	</tr>

    <!-- Content End -->
	
    <!-- Attachment Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sm-d3 form-label"> Attachment </label>

	 </td>

	 <td>

	 <?php if (isset($discussion->attachment) && $discussion->attachment!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $discussion->attachment; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Attachment End -->
	

	<tr>

	 <td>

	   <label for="attachment_mime" class="col-sm-d3 form-label"> Attachment Mime </label>

	 </td>

	 <td> 

	   <?php echo set_value("attachment_mime",html_entity_decode($discussion->attachment_mime)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="created_dt" class="col-sm-d3 form-label"> Created </label>

	 </td>

	 <td> 

	   <?php echo set_value("created_dt",html_entity_decode($discussion->created_dt)); ?>

	 </td>

	</tr>

	
    <!-- User_id Start -->

	<tr>

	 <td>

	  <label class="form-label col-md-d3"> User </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($users) && !empty($users)):
	      foreach($users as $key => $value): 

	       if($value->user_id==$discussion->user_id)

	             echo $value->name;
	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- User_id End -->
	

	<tr>

	 <td>

	   <label for="view_cnt" class="col-sm-d3 form-label"> View </label>

	 </td>

	 <td> 

	   <?php echo set_value("view_cnt",html_entity_decode($discussion->view_cnt)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="like_cnt" class="col-sm-d3 form-label"> Like </label>

	 </td>

	 <td> 

	   <?php echo set_value("like_cnt",html_entity_decode($discussion->like_cnt)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="comment_cnt" class="col-sm-d3 form-label"> Comment </label>

	 </td>

	 <td> 

	   <?php echo set_value("comment_cnt",html_entity_decode($discussion->comment_cnt)); ?>

	 </td>

	</tr>

	
    <!-- Community Start -->

	<tr>

	 <td>

	  <label class="form-label col-md-d3"> Community </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($communities) && !empty($communities)):
	      foreach($communities as $key => $value): 

	       if($value->community_id==$discussion->community_id)

	             echo $value->name;
	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Community End -->
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