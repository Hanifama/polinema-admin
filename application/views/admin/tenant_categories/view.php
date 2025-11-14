<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Tenant Categories</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>Tenant Categories</strong>
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

	   <label for="tencat_id" class="col-sm-3 form-label"> Tencat_id </label>

	 </td>

	 <td> 

	   <?php echo set_value("tencat_id",html_entity_decode($tenant_categories->tencat_id)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="name" class="col-sm-3 form-label"> Name </label>

	 </td>

	 <td> 

	   <?php echo set_value("name",html_entity_decode($tenant_categories->name)); ?>

	 </td>

	</tr>

	
    <!-- Icon Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sm-3 form-label"> Icon </label>

	 </td>

	 <td>

	 <?php if (isset($tenant_categories->icon) && $tenant_categories->icon!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $tenant_categories->icon; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Icon End -->
	
    <!-- Status Start -->

	<tr>

	 <td>

	  <label class="col-sm-3 form-label">Select Status</label>

	 </td>

	 <td> 

	   

	   <?php echo $tenant_categories->status=="active"?'active':""; ?>

	   <?php echo $tenant_categories->status=="inactive"?'inactive':""; ?>

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