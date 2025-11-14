<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Events</h2>
      
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

	   <label for="event_id" class="col-sms-3 form-label"> ID </label>

	 </td>

	 <td> 

	   <?php echo set_value("event_id",html_entity_decode($events->event_id)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="event_name" class="col-sms-3 form-label"> Name </label>

	 </td>

	 <td> 

	   <?php echo set_value("event_name",html_entity_decode($events->event_name)); ?>

	 </td>

	</tr>

	



    <!-- Event_date Start -->

	<tr>

	 <td>

	  <label for="event_date" class="col-sms-3 form-label"> Event Date </label>

	 </td>

	 <td> 

	   <?php echo set_value("event_date", html_entity_decode($events->event_date)); ?>

	 </td>

	</tr>

    <!-- Event_date End -->



	

	<tr>

	 <td>

	   <label for="location" class="col-sms-3 form-label"> Location </label>

	 </td>

	 <td> 

	   <?php echo set_value("location",html_entity_decode($events->location)); ?>

	 </td>

	</tr>

	



    <!-- Photo Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sms-3 form-label"> Photo </label>

	 </td>

	 <td>

	 <?php if (isset($events->photo) && $events->photo!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $events->photo; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Photo End -->



	



    <!-- Description Start -->

	<tr>

	 <td>

	  <label for="description" class="col-sms-3 form-label"> Description </label>

	 </td>

	 <td> 

	   <?php echo set_value("description",  html_entity_decode($events->description)); ?>

	 </td>

	</tr>

    <!-- Description End -->



	

	<tr>

	 <td>

	   <label for="status" class="col-sms-3 form-label"> Status </label>

	 </td>

	 <td> 

	   <?php echo set_value("status",html_entity_decode($events->status)); ?>

	 </td>

	</tr>

	



    <!-- Created_dt Start -->

	<tr>

	 <td>

	  <label for="created_dt" class="col-sms-3 form-label"> Created </label>

	 </td>

	 <td> 

	   <?php echo set_value("created_dt", html_entity_decode($events->created_dt)); ?>

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