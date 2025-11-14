<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>User</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>Users</strong>
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
			<br>
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

	   <label for="user_id" class="form-label"> ID </label>

	 </td>

	 <td> 

	   <?php echo set_value("user_id",html_entity_decode($users->user_id)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="name" class="form-label"> Name </label>

	 </td>

	 <td> 

	   <?php echo set_value("name",html_entity_decode($users->name)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="email" class=" form-label"> Email </label>

	 </td>

	 <td> 

	   <?php echo set_value("email",html_entity_decode($users->email)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="major" class=" form-label"> Major </label>

	 </td>

	 <td> 

	   <?php echo set_value("major",html_entity_decode($users->major)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="year_generation" class=" form-label"> Year </label>

	 </td>

	 <td> 

	   <?php echo set_value("year_generation",html_entity_decode($users->year_generation)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="job" class=" form-label"> Job </label>

	 </td>

	 <td> 

	   <?php echo set_value("job",html_entity_decode($users->job)); ?>

	 </td>

	</tr>

	

	<tr>

	 <td>

	   <label for="location" class=" form-label"> Location </label>

	 </td>

	 <td> 

	   <?php echo set_value("location",html_entity_decode($users->location)); ?>

	 </td>

	</tr>

	</table>

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
		  <div class="ibox-content card-body">
			  <h5>User Experiences <small></small></h5>
            <div class="table table-responsive">
               <table class="table table-striped table-bordered table-hover Tax" style="font-size: 13px;" >
                  <thead>
                     <tr>
                        <th>No.</th>
   						<th>Company Name</th>
						<th>Company Category</th>
						<th>Position</th>
						<th>Start Year</th>
						<th>End Year</th>
						<th>Description</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php if(isset($user_experiences) and !empty($user_experiences))
                     {
                        $count=1;
                     ?>

                     <?php 
						$i = 1;
                        foreach ($user_experiences as $key => $value) {
                        ?>
                     <tr  id="hide<?php echo $value->experience_id; ?>" >
                     <th><?php echo $i;$i++; ?> </th>
                <th><?php if(!empty($value->company_name)){ echo $value->company_name; }?></th>

                <th><?php if(!empty($value->company_category)){ echo $value->company_category; }?></th>

                <th><?php if(!empty($value->position)){ echo $value->position; }?></th>

                <th><?php if(!empty($value->start_year)){ echo $value->start_year; }?></th>

                <th><?php if(!empty($value->end_year)){ echo $value->end_year; }?></th>

                <th><?php if(!empty($value->description)){ echo $value->description; }?></th>

                
                     </tr>
                     <?php 
                        }
                     } else{
                        echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';
                     } ?>  
                  </tbody>
               </table>
				<table>
					<tr><td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a></td></tr></table>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('admin/template/footer'); ?>