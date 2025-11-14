<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Banner_tenant</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>Banner_tenant</strong>
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

	   <label for="banner_id" class="col-sm-3 form-label"> Banner_id </label>

	 </td>

	 <td> 

	   <?php echo set_value("banner_id",html_entity_decode($banner_tenant->banner_id)); ?>

	 </td>

	</tr>

	



    <!-- Image Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sm-3 form-label"> Image </label>

	 </td>

	 <td>

	 <?php if (isset($banner_tenant->image) && $banner_tenant->image!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $banner_tenant->image; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Image End -->



	



    <!-- Date_from Start -->

	<tr>

	 <td>

	  <label for="date_from" class="col-sm-3 form-label"> Date_from </label>

	 </td>

	 <td> 

	   <?php echo set_value("date_from", html_entity_decode($banner_tenant->date_from)); ?>

	 </td>

	</tr>

    <!-- Date_from End -->



	



    <!-- Date_to Start -->

	<tr>

	 <td>

	  <label for="date_to" class="col-sm-3 form-label"> Date_to </label>

	 </td>

	 <td> 

	   <?php echo set_value("date_to", html_entity_decode($banner_tenant->date_to)); ?>

	 </td>

	</tr>

    <!-- Date_to End -->



	



    <!-- Status Start -->

	<tr>

	 <td>

	  <label class="col-sm-3 form-label">Select Status</label>

	 </td>

	 <td> 

	   

	   <?php echo $banner_tenant->status=="active"?'active':""; ?>

	   <?php echo $banner_tenant->status=="inactive"?'inactive':""; ?>

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