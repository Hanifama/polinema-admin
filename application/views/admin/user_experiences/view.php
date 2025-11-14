<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>User Experiences</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
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

	   <label for="experience_id" class="col-sm-3 form-label"> Experience_id </label>

	 </td>

	 <td> 

	   <?php echo set_value("experience_id",html_entity_decode($user_experiences->experience_id)); ?>

	 </td>

	</tr>

	
    <!-- User_id Start -->

	<tr>

	 <td>

	  <label class="form-label col-md-3"> User_id </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($users) && !empty($users)):
	      foreach($users as $key => $value): 

	       if($value->user_id==$user_experiences->user_id)

	             echo $value->name;
	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- User_id End -->
	

	<tr>

	 <td>

	   <label for="company_name" class="col-sm-3 form-label"> Company_name </label>

	 </td>

	 <td> 

	   <?php echo set_value("company_name",html_entity_decode($user_experiences->company_name)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="company_category" class="col-sm-3 form-label"> Company_category </label>

	 </td>

	 <td> 

	   <?php echo set_value("company_category",html_entity_decode($user_experiences->company_category)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="position" class="col-sm-3 form-label"> Position </label>

	 </td>

	 <td> 

	   <?php echo set_value("position",html_entity_decode($user_experiences->position)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="start_year" class="col-sm-3 form-label"> Start_year </label>

	 </td>

	 <td> 

	   <?php echo set_value("start_year",html_entity_decode($user_experiences->start_year)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="end_year" class="col-sm-3 form-label"> End_year </label>

	 </td>

	 <td> 

	   <?php echo set_value("end_year",html_entity_decode($user_experiences->end_year)); ?>

	 </td>

	</tr>

	
    <!-- Description Start -->

	<tr>

	 <td>

	  <label for="description" class="col-sm-3 form-label"> Description </label>

	 </td>

	 <td> 

	   <?php echo set_value("description",  html_entity_decode($user_experiences->description)); ?>

	 </td>

	</tr>

    <!-- Description End -->
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