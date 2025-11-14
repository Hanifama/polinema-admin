<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Posts</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url().'admin/'?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>Posts</strong>
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
            <h5>&nbsp; <small></small></h5>

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

	   <label for="post_id" class=" form-label"> ID </label>

	 </td>

	 <td> 

	   <?php echo set_value("post_id",html_entity_decode($posts->post_id)); ?>

	 </td>

	</tr>

	
    <!-- To User Start -->

	<tr>

	 <td>

	  <label class="form-label "> To User </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($users) && !empty($users)):
	      foreach($users as $key => $value): 

	       if($value->user_id==$posts->wall_owner_id)

	             echo $value->name;
	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- To User End -->
	
    <!-- From User Start -->

	<tr>

	 <td>

	  <label class="form-label "> From User </label>

	 </td>

	 <td> 

	   <?php 

	      if(isset($users) && !empty($users)):
	      foreach($users as $key => $value): 

	       if($value->user_id==$posts->author_id)

	             echo $value->name;
	       endforeach; 

	       endif; ?>

	 </td>

	</tr>

    <!-- From User End -->
	
    <!-- Content Start -->

	<tr>

	 <td>

	  <label for="content" class="colss-sm-3 form-label"> Content </label>

	 </td>

	 <td> 

	   <?php echo set_value("content",  html_entity_decode($posts->content)); ?>

	 </td>

	</tr>

    <!-- Content End -->
	
    <!-- Attachment Start -->

	<tr>

	 <td>

	  <label for="address" class="col-sssm-3 form-label"> Attachment </label>

	 </td>

	 <td>

	 <?php if (isset($posts->attachment) && $posts->attachment!=""){?>

	            <br>

	    <img src="<?php echo $this->config->item("photo_url");?><?php echo $posts->attachment; ?>" alt="pic" width="50" height="50" />

	    <?php } ?>

	 </td>

	</tr>

    <!-- Attachment End -->
	

	<tr>

	 <td>

	   <label for="type" class="col-smss-3 form-label"> Type </label>

	 </td>

	 <td> 

	   <?php echo set_value("type",html_entity_decode($posts->type)); ?>

	 </td>

	</tr>

	
    <!-- Privacy Start -->

	<tr>

	 <td>

	  <label class="col-sm-3 form-label">Select Privacy</label>

	 </td>

	 <td> 

	   

	   <?php echo $posts->privacy=="public"?'public':""; ?>

	   <?php echo $posts->privacy=="private"?'private':""; ?>

	 </td>

	</tr>

    <!-- Privacy End -->
	
    <!-- Created Start -->

	<tr>

	 <td>

	  <label for="created_dt" class="col-sm-ss3 form-label"> Created </label>

	 </td>

	 <td> 

	   <?php echo set_value("created_dt", html_entity_decode($posts->created_dt)); ?>

	 </td>

	</tr>

    <!-- Created End -->
	
    <!-- Replied Start -->

	<tr>

	 <td>

	  <label class="col-sm-e3 form-label">Replied</label>

	 </td>

	 <td> 

	   <?php $arr=explode(", ", $posts->replied) ?>

	          

	            <span style="margin-left:5px;"><?php echo in_array("t", $arr)?'t, ':""; ?></span>

	            <span style="margin-left:5px;"><?php echo in_array("f", $arr)?'f, ':""; ?></span>

	 </td>

	</tr>

    <!-- Replied End -->
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
		  
		  <div class="ibox-content card-body">
			  <h5>Comment <small></small></h5>
            <div class="table table-responsive">
               <table class="table table-striped table-bordered table-hover Tax" style="font-size: 13px;" >
                  <thead>
                     <tr>
                        <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th>
                        <th>No.</th>
                        <?php $sortSym=isset($_GET["order"]) && $_GET["order"]=="asc" ? "up" : "down"; ?>

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="comment_id"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> ID </th>
				<th> User </th>

   				<th> Content </th>

				<th> Created </th>

						
                        <th> Action </th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php if(isset($results) and !empty($results))
                     {
                        $count=1;
                     ?>

                     <?php 
                        foreach ($results as $key => $value) {
                        ?>
                     <tr  id="hide<?php echo $value->comment_id; ?>" >
                     <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->comment_id; ?>'/></th>

                              

            <th><?php if(!empty($value->comment_id)){ echo $count; $count++; }?></th><th><?php if(!empty($value->comment_id)){ echo $value->comment_id; }?></th>

                <th><?php if(!empty($value->post_id)){ echo $value->post_id; }?></th>

                <th><?php if(!empty($value->user_id)){ echo $value->user_id; }?></th>

                <th><?php if(!empty($value->content)){ echo $value->content; }?></th>

                <th><?php if(!empty($value->created_dt)){ echo $value->created_dt; }?></th>

                <th class="action-width btn-group">

           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" class="btn btn-info" onclick="set_common_delete('<?php echo $value->comment_id; ?>','post_comments');">
           <i class="fa fa-trash-o "></i>
           </a>

            </th>
                     </tr>
                     <?php 
                        }
                     } else{
                        echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';
                     } ?>  
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<?php $this->load->view('admin/template/footer'); ?>