<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>System_master</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>System_master</strong>
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

	   <label for="category" class="col-sm-3 form-label"> Category </label>

	 </td>

	 <td> 

	   <?php echo set_value("category",html_entity_decode($system_master->category)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="sub_category" class="col-sm-3 form-label"> Sub_category </label>

	 </td>

	 <td> 

	   <?php echo set_value("sub_category",html_entity_decode($system_master->sub_category)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="key" class="col-sm-3 form-label"> Key </label>

	 </td>

	 <td> 

	   <?php echo set_value("key",html_entity_decode($system_master->key)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="value" class="col-sm-3 form-label"> Value </label>

	 </td>

	 <td> 

	   <?php echo set_value("value",html_entity_decode($system_master->value)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="description" class="col-sm-3 form-label"> Description </label>

	 </td>

	 <td> 

	   <?php echo set_value("description",html_entity_decode($system_master->description)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="status" class="col-sm-3 form-label"> Status </label>

	 </td>

	 <td> 

	   <?php echo set_value("status",html_entity_decode($system_master->status)); ?>

	 </td>

	</tr>

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