<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10 m-3">
      <h2>Banner</h2>
      
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

            <a href="<?php echo base_url(); ?>admin/banner/add" class="btn btn-info m-2">ADD NEW</a>

            <div class="form-group pull-right m-2">
               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>
               <!--a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a-->
            </div>

            <form method="GET" action="<?php echo base_url().'admin/banner/index'; ?>" class="form-inline ibox-content">
               <div class="form-group m-2">
                  <select name="searchBy" class="form-control">
                  <option value="status" <?php echo $searchBy=="status"?'selected="selected"':""; ?>>Status</option>
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

				
				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="image"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["image"]; ?>" class="link_css"> Image <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="date_from"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["date_from"]; ?>" class="link_css"> Date From <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="date_to"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["date_to"]; ?>" class="link_css"> Date To <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="status"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["status"]; ?>" class="link_css"> Status <?php echo $symbol ?></a></th>

						

				<?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"]=="content"?"<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>": "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

				<th> <a href="<?php echo $fields_links["content"]; ?>" class="link_css"> Content <?php echo $symbol ?></a></th>

						
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
                     <tr  id="hide<?php echo $value->banner_id; ?>" >
                     <th><input name='input' id='del' onclick="callme('show')"  type='checkbox' class='del' value='<?php echo $value->banner_id; ?>'/></th>

                              

            <th><?php if(!empty($value->banner_id)){ echo $count; $count++; }?></th>

                <th><?php if(!empty($value->image)){ ?> 

                        <img src="<?php echo $this->config->item('photo_url');?><?php echo $value->image; ?>" alt="pic" width="50" height="50" />

                         <?php }?></th><th><?php if(!empty($value->date_from)){ echo $value->date_from; }?></th>

                <th><?php if(!empty($value->date_to)){ echo $value->date_to; }?></th>

                <th><?php if(!empty($value->status)){ echo $value->status; }?></th>

                <th><?php if(!empty($value->content)){ echo $value->content; }?></th>

                <th class="action-width btn-group">

		   <a href="<?php echo base_url()?>admin/banner/view/<?php echo $value->banner_id; ?>" class="btn btn-info" title="View">
            <i class="fa fa-eye"></i>
           </a>
           <a href="<?php echo base_url()?>admin/banner/edit/<?php echo $value->banner_id; ?>" class="btn btn-info" title="Edit">
            <i class="fa fa-edit"></i>
           </a>
           <a  title="Delete"  class="btn btn-info" onclick="set_common_delete('<?php echo $value->banner_id; ?>','banner');">
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
         url:'<?php echo base_url()."admin/banner/deleteAll"; ?>',
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