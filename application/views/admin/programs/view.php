<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Programs</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>Programs</strong>
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

	   <label for="program_id" class="col-sm-3 form-label"> Program_id </label>

	 </td>

	 <td> 

	   <?php echo set_value("program_id",html_entity_decode($programs->program_id)); ?>

	 </td>

	</tr>

	



    <!-- Department_id Start -->

	<tr>

	 <td>

	  <label class="form-label col-md-3"> Department_id </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($departments) && !empty($departments)):



	      foreach($departments as $key => $value): 

	       if($value->department_id==$programs->department_id)

	             echo $value->name;



	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Department_id End -->



	

	<tr>

	 <td>

	   <label for="name" class="col-sm-3 form-label"> Name </label>

	 </td>

	 <td> 

	   <?php echo set_value("name",html_entity_decode($programs->name)); ?>

	 </td>

	</tr>

	



    <!-- Created_dt Start -->

	<tr>

	 <td>

	  <label for="created_dt" class="col-sm-3 form-label"> Created_dt </label>

	 </td>

	 <td> 

	   <?php echo set_value("created_dt", html_entity_decode($programs->created_dt)); ?>

	 </td>

	</tr>

    <!-- Created_dt End -->



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