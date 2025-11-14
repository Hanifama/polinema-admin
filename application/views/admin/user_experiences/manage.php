<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10 m-3">
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

   <div class="col-lg-2">
   </div>
</div>

<div class="row">
   <div class="col-lg-12">
      <div class="ibox card mt-3 ">
         <br>
         <div class="ibox-title card-header">

            <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-success alert-dismissible">
               <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
               <?php echo $this->session->flashdata('message'); ?>
            </div>
            <?php endif; ?>

            <a href="<?php echo base_url(); ?>admin/user_experiences/add" class="btn btn-info m-2">ADD NEW</a>

            <div class="form-group pull-right m-2">
               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>
               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>
            </div>

            <form method="GET" action="<?php echo base_url().'admin/user_experiences/index'; ?>" class="form-inline ibox-content">
               <div class="form-group m-2">
                  <select name="searchBy" class="form-control">
                  <option value="experience_id" <?php echo $searchBy=="experience_id"?'selected="selected"':""; ?>>Experience_id</option><option value="users.name" <?php echo $searchBy=="users.name"?'selected="selected"':""; ?>>User_id</option><option value="company_name" <?php echo $searchBy=="company_name"?'selected="selected"':""; ?>>Company_name</option><option value="company_category" <?php echo $searchBy=="company_category"?'selected="selected"':""; ?>>Company_category</option><option value="position" <?php echo $searchBy=="position"?'selected="selected"':""; ?>>Position</option><option value="start_year" <?php echo $searchBy=="start_year"?'selected="selected"':""; ?>>Start_year</option><option value="end_year" <?php echo $searchBy=="end_year"?'selected="selected"':""; ?>>End_year</option><option value="description" <?php echo $searchBy=="description"?'selected="selected"':""; ?>>Description</option>
                  </select>
               </div>

               <div class="form-group m-2">
                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">
               </div>

               <input type="submit" name="search" value="Search" class="btn btn-info m-2">

               <div class="form-group pull-right">
                  <select name="per_page" class="form-control" onchange="this.form.submit()">
                     <option value="5" <?php echo $per_page=="5"?'selected="selected"':""; ?>>5</option>
                     <option value="10" <?php echo $per_page=="10"?'selected="selected"':""; ?>>10</option>
                     <option value="20" <?php echo $per_page=="20"?'selected="selected"':""; ?>>20</option>
                     <option value="50" <?php echo $per_page=="50"?'selected="selected"':""; ?>>50</option>
                     <option value="100" <?php echo $per_page=="100"?'selected="selected"':""; ?>>100</option>
                  </select>
               </div>
            </form>
         </div>

         <div class="ibox-content card-body">
            <div class="table table-responsive">
               <table class="table table-striped table-bordered table-hover Tax" style="font-size: 13px;" >
                  <thead>
                     <tr>
                        <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th>
                        <th>No.</th>
                        <?php $sortSym=isset($_GET["order"]) && $_GET["order"]=="asc" ? "up" : "down"; ?>

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="experience_id"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["experience_id"]; ?>" class="link_css"> Experience_id <?php echo $symbol ?></a></th>

						

				<?php

				 $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="users.name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>
				<th> <a href="<?php echo $fields_links["users.name"]; ?>" class="link_css"> User_id <?php echo $symbol ?></a></th>

   						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="company_name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["company_name"]; ?>" class="link_css"> Company_name <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="company_category"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["company_category"]; ?>" class="link_css"> Company_category <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="position"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["position"]; ?>" class="link_css"> Position <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="start_year"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["start_year"]; ?>" class="link_css"> Start_year <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="end_year"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["end_year"]; ?>" class="link_css"> End_year <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="description"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["description"]; ?>" class="link_css"> Description <?php echo $symbol ?></a></th>

						
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
                     <tr  id="hide<?php echo $value->id; ?>" >
                     <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->id; ?>'/></th>

                              

            <th><?php if(!empty($value->id)){ echo $count; $count++; }?></th><th><?php if(!empty($value->experience_id)){ echo $value->experience_id; }?></th>

                <th><?php if(!empty($value->user_id)){ echo $value->user_id; }?></th>

                <th><?php if(!empty($value->company_name)){ echo $value->company_name; }?></th>

                <th><?php if(!empty($value->company_category)){ echo $value->company_category; }?></th>

                <th><?php if(!empty($value->position)){ echo $value->position; }?></th>

                <th><?php if(!empty($value->start_year)){ echo $value->start_year; }?></th>

                <th><?php if(!empty($value->end_year)){ echo $value->end_year; }?></th>

                <th><?php if(!empty($value->description)){ echo $value->description; }?></th>

                <th class="action-width btn-group">

		   <a href="<?php echo base_url()?>admin/user_experiences/view/<?php echo $value->id; ?>" class="btn btn-info" title="View">
            <i class="fa fa-eye"></i>
           </a>
           <a href="<?php echo base_url()?>admin/user_experiences/edit/<?php echo $value->id; ?>" class="btn btn-info" title="Edit">
            <i class="fa fa-edit"></i>
           </a>
           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" class="btn btn-info" onclick="set_common_delete('<?php echo $value->id; ?>','user_experiences');">
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
            <?php echo $links; ?>
         </div>
      </div>
      <img onclick="callme('','item','')" src="<?php echo $this->config->item('accet_url')?>/img/mac-trashcan_full-new.png" id="recycle" style="width:90px;  display:none; position:fixed; bottom: 50px; right: 50px;"/>
   </div>
</div>

<script type="text/javascript">

   function delRow()
   {
      var confrm = confirm("Are you sure you want to delete?");
      if(confrm)
      {
         ids = values();
         $.ajax({
         type:"POST",
         url:'<?php echo base_url()."admin/user_experiences/deleteAll"; ?>',
         data:{
            allIds : ids,
            '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
         },

         success:function(){
            location.reload();
            },
         });
      }
   }
</script>
<?php $this->load->view('admin/template/footer'); ?>