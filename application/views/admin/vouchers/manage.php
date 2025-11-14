<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10 m-3">
      <h2>Vouchers</h2>
     
   </div>

   <div class="col-lg-2">
   </div>
</div>

<div class="row">
   <div class="col-lg-12">
      <div class="ibox card mt-3 ">
         <br>
         <div class="ibox-title card-header">

            <?php if ($this->session->flashdata('message')): ?>
               <div class="alert alert-success alert-dismissible">
                  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  <?php echo $this->session->flashdata('message'); ?>
               </div>
            <?php endif; ?>

            <a href="<?php echo base_url(); ?>admin/vouchers/add" class="btn btn-info m-2">ADD NEW</a>

            <div class="form-group pull-right m-2">
               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>
               <!--a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a-->
            </div>

            <form method="GET" action="<?php echo base_url() . 'admin/vouchers/index'; ?>" class="form-inline ibox-content">
               <div class="form-group m-2">
                  <select name="searchBy" class="form-control">
                     <option value="voucher_id" <?php echo $searchBy == "voucher_id" ? 'selected="selected"' : ""; ?>>ID</option>
                     <option value="tenants.name" <?php echo $searchBy == "tenants.name" ? 'selected="selected"' : ""; ?>>Tenant</option>
                     <option value="title" <?php echo $searchBy == "title" ? 'selected="selected"' : ""; ?>>Title</option>
                     <option value="description" <?php echo $searchBy == "description" ? 'selected="selected"' : ""; ?>>Description</option>
                     <option value="discount_type" <?php echo $searchBy == "discount_type" ? 'selected="selected"' : ""; ?>>Discount Type</option>
                     <option value="discount_value" <?php echo $searchBy == "discount_value" ? 'selected="selected"' : ""; ?>>Discount Value</option>
                     <option value="status" <?php echo $searchBy == "status" ? 'selected="selected"' : ""; ?>>Status</option>
                     <option value="voucher_categories.name" <?php echo $searchBy == "voucher_categories.name" ? 'selected="selected"' : ""; ?>>Category</option>
                  </select>
               </div>

               <div class="form-group m-2">
                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">
               </div>

               <input type="submit" name="search" value="Search" class="btn btn-info m-2">

               <div class="form-group pull-right">
                  <select name="per_page" class="form-control" onchange="this.form.submit()">
                     <option value="5" <?php echo $per_page == "5" ? 'selected="selected"' : ""; ?>>5</option>
                     <option value="10" <?php echo $per_page == "10" ? 'selected="selected"' : ""; ?>>10</option>
                     <option value="20" <?php echo $per_page == "20" ? 'selected="selected"' : ""; ?>>20</option>
                     <option value="50" <?php echo $per_page == "50" ? 'selected="selected"' : ""; ?>>50</option>
                     <option value="100" <?php echo $per_page == "100" ? 'selected="selected"' : ""; ?>>100</option>
                  </select>
               </div>
            </form>
         </div>

         <div class="ibox-content card-body">
            <div class="table table-responsive">
               <table class="table table-striped table-bordered table-hover Tax" style="font-size: 13px;">
                  <thead>
                     <tr>
                        <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th>
                        <th>No.</th>
                        <?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

                        
                        <?php

                        $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "tenants.name" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>
                        <th> <a href="<?php echo $fields_links["tenants.name"]; ?>" class="link_css"> Tenant <?php echo $symbol ?></a></th>

                        <?php

                        $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "voucher_categories.name" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>
                        <th> <a href="<?php echo $fields_links["voucher_categories.name"]; ?>" class="link_css"> Category <?php echo $symbol ?></a></th>                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "title" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["title"]; ?>" class="link_css"> Title <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "description" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["description"]; ?>" class="link_css"> Description <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "banner_1" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["banner_1"]; ?>" class="link_css"> Banner 1 <?php echo $symbol ?></a></th>                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "discount_type" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["discount_type"]; ?>" class="link_css"> Discount Type <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "discount_value" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["discount_value"]; ?>" class="link_css"> Discount Value <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "minimum_amount" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["minimum_amount"]; ?>" class="link_css"> Minimum Amount <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "maximum_discount" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["maximum_discount"]; ?>" class="link_css"> Maximum Discount <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "start_dt" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["start_dt"]; ?>" class="link_css"> Start <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "end_dt" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["end_dt"]; ?>" class="link_css"> End <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "is_claimed" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["is_claimed"]; ?>" class="link_css"> Claimed <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "quota" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["quota"]; ?>" class="link_css"> Quota <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "used" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["used"]; ?>" class="link_css"> Used <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "created_dt" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["created_dt"]; ?>" class="link_css"> Created <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "status" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["status"]; ?>" class="link_css"> Status <?php echo $symbol ?></a></th>
                        <th> Action </th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php if (isset($results) and !empty($results)) {
                        $count = 1;
                     ?>

                        <?php
                        foreach ($results as $key => $value) {
                        ?>
                           <tr id="hide<?php echo $value->voucher_id; ?>">
                              <th><input name='input' id='del' onclick="callme('show')" type='checkbox' class='del' value='<?php echo $value->voucher_id; ?>' /></th>
                              <th><?php if (!empty($value->voucher_id)) {
                                       echo $count;
                                       $count++;
                                    } ?></th>
                              

                              <th><?php if (!empty($value->tenant_id)) {
                                       echo $value->tenant_id;
                                    } ?></th>
                              <th><?php if (!empty($value->vocat_id)) {
                                       echo $value->vocat_id;
                                    } ?></th>

                              <th><?php if (!empty($value->title)) {
                                       echo $value->title;
                                    } ?></th>

                              <th><?php if (!empty($value->description)) {
                                       echo $value->description;
                                    } ?></th>

                              <th><?php if (!empty($value->banner_1)) { ?>

                                    <img src="<?php echo $this->config->item('photo_url'); ?><?php echo $value->banner_1; ?>" alt="pic" width="50" height="50" />

                                 <?php } ?>
                              </th>
                              <th><?php if (!empty($value->discount_type)) {
                                       echo $value->discount_type;
                                    } ?></th>

                              <th><?php if (!empty($value->discount_value)) {
                                       echo $value->discount_value;
                                    } ?></th>

                              <th><?php if (!empty($value->minimum_amount)) {
                                       echo $value->minimum_amount;
                                    } ?></th>

                              <th><?php if (!empty($value->maximum_discount)) {
                                       echo $value->maximum_discount;
                                    } ?></th>

                              <th><?php if (!empty($value->start_dt)) {
                                       echo $value->start_dt;
                                    } ?></th>

                              <th><?php if (!empty($value->end_dt)) {
                                       echo $value->end_dt;
                                    } ?></th>

                              <th><?php if (!empty($value->is_claimed)) {
                                       echo $value->is_claimed;
                                    } ?></th>

                              <th><?php if (!empty($value->quota)) {
                                       echo $value->quota;
                                    } ?></th>

                              <th><?php if (!empty($value->used)) {
                                       echo $value->used;
                                    } ?></th>

                              <th><?php if (!empty($value->created_dt)) {
                                       echo $value->created_dt;
                                    } ?></th>

                              <th><?php if (!empty($value->status)) {
                                       echo $value->status;
                                    } ?></th>
                              <th class="action-width btn-group">

                                 <a href="<?php echo base_url() ?>admin/vouchers/view/<?php echo $value->voucher_id; ?>" class="btn btn-info" title="View">
                                    <i class="fa fa-eye"></i>
                                 </a>
                                 <a href="<?php echo base_url() ?>admin/vouchers/edit/<?php echo $value->voucher_id; ?>" class="btn btn-info" title="Edit">
                                    <i class="fa fa-edit"></i>
                                 </a>
                                 <a title="Delete" data-toggle="modal" data-target="#commonDelete" class="btn btn-info" onclick="set_common_delete('<?php echo $value->voucher_id; ?>','vouchers');">
                                    <i class="fa fa-trash-o "></i>
                                 </a>

                              </th>
                           </tr>
                     <?php
                        }
                     } else {
                        echo '<tr><td colspan="100"><h3 align="center" class="text-danger">No Record found!</center</td></tr>';
                     } ?>
                  </tbody>
               </table>
            </div>
            <?php echo $links; ?>
         </div>
      </div>
      <img onclick="callme('','item','')" src="<?php echo $this->config->item('accet_url') ?>/img/mac-trashcan_full-new.png" id="recycle" style="width:90px;  display:none; position:fixed; bottom: 50px; right: 50px;" />
   </div>
</div>

<script type="text/javascript">
   function delRow() {
      var confrm = confirm("Are you sure you want to delete?");
      if (confrm) {
         ids = values();
         $.ajax({
            type: "POST",
            url: '<?php echo base_url() . "admin/vouchers/deleteAll"; ?>',
            data: {
               allIds: ids,
               '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            },

            success: function() {
               location.reload();
            },
         });
      }
   }
</script>
<?php $this->load->view('admin/template/footer'); ?>