<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10 m-3">
      <h2>Users</h2>
      
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

            <!--a href="<?php echo base_url(); ?>admin/users/add" class="btn btn-info m-2">ADD NEW</a-->

            <div class="form-group pull-right m-2">
               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>
               <!--a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a-->
            </div>

            <form method="GET" action="<?php echo base_url().'admin/users/index'; ?>" class="form-inline ibox-content">
               <div class="form-group m-2">
                  <select name="searchBy" class="form-control">
                  <option value="user_id" <?php echo $searchBy=="user_id"?'selected="selected"':""; ?>>ID</option><option value="name" <?php echo $searchBy=="name"?'selected="selected"':""; ?>>Name</option><option value="email" <?php echo $searchBy=="email"?'selected="selected"':""; ?>>Email</option><option value="major" <?php echo $searchBy=="major"?'selected="selected"':""; ?>>Major</option><option value="year_generation" <?php echo $searchBy=="year_generation"?'selected="selected"':""; ?>>Year Generation</option><option value="location" <?php echo $searchBy=="location"?'selected="selected"':""; ?>>Location</option>
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

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="user_id"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["user_id"]; ?>" class="link_css"> ID <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="name"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["name"]; ?>" class="link_css"> Name <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="email"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["email"]; ?>" class="link_css"> Email <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="major"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["major"]; ?>" class="link_css"> Major <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="year_generation"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["year_generation"]; ?>" class="link_css"> Year <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="job"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="location"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["location"]; ?>" class="link_css"> Location <?php echo $symbol ?></a></th>

						
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
                     <tr  id="hide<?php echo $value->user_id; ?>" >
                     <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->user_id; ?>'/></th>

                              

            <th><?php if(!empty($value->user_id)){ echo $count; $count++; }?></th><th><?php if(!empty($value->user_id)){ echo $value->user_id; }?></th>

                <th><?php if(!empty($value->name)){ echo $value->name; }?></th>

                <th><?php if(!empty($value->email)){ echo $value->email; }?></th>

                <th><?php if(!empty($value->major)){ echo $value->major; }?></th>

                <th><?php if(!empty($value->year_generation)){ echo $value->year_generation; }?></th>                <th><?php if(!empty($value->location)){ echo $value->location; }?></th>

                <th class="action-width btn-group">

		   <a href="<?php echo base_url()?>admin/users/view/<?php echo $value->user_id; ?>" class="btn btn-info" title="View">
            <i class="fa fa-eye"></i>
           </a>
           <a href="<?php echo base_url()?>admin/users/edit/<?php echo $value->user_id; ?>" class="btn btn-info" title="Edit">
            <i class="fa fa-edit"></i>
           </a>
           <a  title="Delete" data-toggle="modal" data-target="#commonDelete" class="btn btn-info" onclick="set_common_delete('<?php echo $value->user_id; ?>','users');">
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
         url:'<?php echo base_url()."admin/users/deleteAll"; ?>',
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