<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Tenants</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>Tenants</strong>
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

	   <label for="tenant_id" class="form-label"> ID </label>

	 </td>

	 <td> 

	   <?php echo set_value("tenant_id",html_entity_decode($tenants->tenant_id)); ?>

	 </td>

	</tr>

	
    <!-- Tencat_id Start -->

	<tr>

	 <td>

	  <label class="form-label "> Category </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($tenant_categories) && !empty($tenant_categories)):
	      foreach($tenant_categories as $key => $value): 

	       if($value->tencat_id==$tenants->tencat_id)

	             echo $value->name;
	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- Tencat_id End -->
	

	<tr>

	 <td>

	   <label for="name" class=" form-label"> Name </label>

	 </td>

	 <td> 

	   <?php echo set_value("name",html_entity_decode($tenants->name)); ?>

	 </td>

	</tr>

	
    <!-- Banner Start -->

	<tr>

	 <td>

	  <label for="address" class=" form-label"> Banner </label>

	 </td>

	 <td>

	 <?php if (isset($tenants->banner) && $tenants->banner!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $tenants->banner; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Banner End -->
	
    <!-- Address Start -->

	<tr>

	 <td>

	  <label for="address" class=" form-label"> Address </label>

	 </td>

	 <td> 

	   <?php echo set_value("address",  html_entity_decode($tenants->address)); ?>

	 </td>

	</tr>

    <!-- Address End -->
	
    <!-- About Start -->

	<tr>

	 <td>

	  <label for="about" class=" form-label"> About </label>

	 </td>

	 <td> 

	   <?php echo set_value("about",  html_entity_decode($tenants->about)); ?>

	 </td>

	</tr>

    <!-- About End -->
	
    <!-- Image_1 Start -->

	<tr>

	 <td>

	  <label for="address" class=" form-label"> Image 1 </label>

	 </td>

	 <td>

	 <?php if (isset($tenants->image_1) && $tenants->image_1!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $tenants->image_1; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Image_1 End -->
	
    <!-- Image_2 Start -->

	<tr>

	 <td>

	  <label for="address" class="form-label"> Image 2 </label>

	 </td>

	 <td>

	 <?php if (isset($tenants->image_2) && $tenants->image_2!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $tenants->image_2; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Image_2 End -->
	
    <!-- Image_3 Start -->

	<tr>

	 <td>

	  <label for="address" class="form-label"> Image 3 </label>

	 </td>

	 <td>

	 <?php if (isset($tenants->image_3) && $tenants->image_3!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $tenants->image_3; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Image_3 End -->
	
    <!-- Image_4 Start -->

	<tr>

	 <td>

	  <label for="address" class=" form-label"> Image 4 </label>

	 </td>

	 <td>

	 <?php if (isset($tenants->image_4) && $tenants->image_4!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $tenants->image_4; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Image_4 End -->
	

	<tr>

	 <td>

	   <label for="lat" class=" form-label"> Lat </label>

	 </td>

	 <td> 

	   <?php echo set_value("lat",html_entity_decode($tenants->lat)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="lng" class="form-label"> Lng </label>

	 </td>

	 <td> 

	   <?php echo set_value("lng",html_entity_decode($tenants->lng)); ?>

	 </td>

	</tr>

	
    <!-- Status Start -->

	<tr>

	 <td>

	  <label class=" form-label">Status</label>

	 </td>

	 <td> 

	   

	   <?php echo $tenants->status=="active"?'active':""; ?>

	   <?php echo $tenants->status=="inactive"?'inactive':""; ?>

	 </td>

	</tr>

    <!-- Status End -->
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