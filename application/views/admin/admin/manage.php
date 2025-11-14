<?php $this->load->view('header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-10">
      <h2>Admin</h2>
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url() . 'admin/' ?>">Dashboard</a>
         </li>

         <li class="active">
            <strong>Admin</strong>
         </li>
      </ol>
   </div>

   <div class="col-lg-2">
   </div>
</div>

<div class="row">
   <div class="col-lg-12">
      <div class="ibox ">
         <br>
         <div class="ibox-title">

            <?php if ($this->session->flashdata('message')) : ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-close="alert"></button>
                  <?php echo $this->session->flashdata('message'); ?>
               </div>
            <?php endif; ?>

            <a href="<?php echo base_url(); ?>admin/admin/add" class="btn btn-info">ADD NEW</a>

            <div class="form-group pull-right">
               <a href="<?php echo $csvlink; ?>" class="btn btn-info">CSV</a>
               <a href="<?php echo $pdflink; ?>" class="btn btn-info">PDF</a>
            </div>

            <form method="GET" action="<?php echo base_url() . 'admin/admin/index'; ?>" class="form-inline ibox-content">
               <div class="form-group">
                  <select name="searchBy" class="form-control">
                     <option value="id" <?php echo $searchBy == "id" ? 'selected="selected"' : ""; ?>>Id</option>
                     <option value="username" <?php echo $searchBy == "username" ? 'selected="selected"' : ""; ?>>Username</option>
                     <option value="password" <?php echo $searchBy == "password" ? 'selected="selected"' : ""; ?>>Password</option>
                     <option value="email" <?php echo $searchBy == "email" ? 'selected="selected"' : ""; ?>>Email</option>
                     <option value="active" <?php echo $searchBy == "active" ? 'selected="selected"' : ""; ?>>Active</option>
                     <option value="first_name" <?php echo $searchBy == "first_name" ? 'selected="selected"' : ""; ?>>First_name</option>
                     <option value="last_name" <?php echo $searchBy == "last_name" ? 'selected="selected"' : ""; ?>>Last_name</option>
                     <option value="company" <?php echo $searchBy == "company" ? 'selected="selected"' : ""; ?>>Company</option>
                     <option value="company_id" <?php echo $searchBy == "company_id" ? 'selected="selected"' : ""; ?>>Company_id</option>
                     <option value="type_user" <?php echo $searchBy == "type_user" ? 'selected="selected"' : ""; ?>>Type_user</option>
                     <option value="role_id" <?php echo $searchBy == "role_id" ? 'selected="selected"' : ""; ?>>Role_id</option>
                     <option value="store_id" <?php echo $searchBy == "store_id" ? 'selected="selected"' : ""; ?>>Store_id</option>
                  </select>
               </div>

               <div class="form-group">
                  <input type="text" name="searchValue" id="searchValue" class="form-control" value="<?php echo $searchValue; ?>">
               </div>

               <input type="submit" name="search" value="Search" class="btn btn-info">

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

         <div class="ibox-content">
            <div class="table table-responsive">
               <table class="table table-striped table-bordered table-hover Tax">
                  <thead>
                     <tr>
                        <th><input onclick="toggle(this,'cbgroup1')" id="foo[]" name="foo[]" type="checkbox" value="" /></th>
                        <th> Sr No. </th>
                        <?php $sortSym = isset($_GET["order"]) && $_GET["order"] == "asc" ? "up" : "down"; ?>

                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "id" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["id"]; ?>" class="link_css"> Id <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "username" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["username"]; ?>" class="link_css"> Username <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "password" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["password"]; ?>" class="link_css"> Password <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "email" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["email"]; ?>" class="link_css"> Email <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "active" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["active"]; ?>" class="link_css"> Active <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "first_name" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["first_name"]; ?>" class="link_css"> First_name <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "last_name" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["last_name"]; ?>" class="link_css"> Last_name <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "company" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["company"]; ?>" class="link_css"> Company <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "company_id" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["company_id"]; ?>" class="link_css"> Company_id <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "type_user" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["type_user"]; ?>" class="link_css"> Type_user <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "role_id" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["role_id"]; ?>" class="link_css"> Role_id <?php echo $symbol ?></a></th>
                        <?php $symbol = isset($_GET["sortBy"]) && $_GET["sortBy"] == "store_id" ? "<i class='fa fa-sort-$sortSym' aria-hidden='true'></i>" : "<i class='fa fa-sort' aria-hidden='true'></i>"; ?>

                        <th> <a href="<?php echo $fields_links["store_id"]; ?>" class="link_css"> Store_id <?php echo $symbol ?></a></th>                        <th> Action </th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php if (isset($results) and !empty($results)) {
                        $count = 1;
                     ?>

                        <?php
                        foreach ($results as $key => $value) {
                        ?>
                           <tr id="hide<?php echo $value->id; ?>">
                              <th><input name='input' id='del' onclick="callme('show')" type='checkbox' class='del' value='<?php echo $value->id; ?>' /></th>
                              <th><?php if (!empty($value->id)) {
                                       echo $count;
                                       $count++;
                                    } ?></th>
                              <th><?php if (!empty($value->id)) {
                                       echo $value->id;
                                    } ?></th>

                              <th><?php if (!empty($value->username)) {
                                       echo $value->username;
                                    } ?></th>

                              <th><?php if (!empty($value->password)) {
                                       echo $value->password;
                                    } ?></th>

                              <th><?php if (!empty($value->email)) {
                                       echo $value->email;
                                    } ?></th>

                              <th><?php if (!empty($value->active)) {
                                       echo $value->active;
                                    } ?></th>

                              <th><?php if (!empty($value->first_name)) {
                                       echo $value->first_name;
                                    } ?></th>

                              <th><?php if (!empty($value->last_name)) {
                                       echo $value->last_name;
                                    } ?></th>

                              <th><?php if (!empty($value->company)) {
                                       echo $value->company;
                                    } ?></th>

                              <th><?php if (!empty($value->company_id)) {
                                       echo $value->company_id;
                                    } ?></th>

                              <th><?php if (!empty($value->type_user)) {
                                       echo $value->type_user;
                                    } ?></th>

                              <th><?php if (!empty($value->role_id)) {
                                       echo $value->role_id;
                                    } ?></th>

                              <th><?php if (!empty($value->store_id)) {
                                       echo $value->store_id;
                                    } ?></th>

                              <th class="action-width">

                                 <a href="<?php echo base_url() ?>admin/admin/view/<?php echo $value->id; ?>" title="View">

                                    <span class="btn btn-info "><i class="fa fa-eye"></i></span>

                                 </a>

                                 <a href="<?php echo base_url() ?>admin/admin/edit/<?php echo $value->id; ?>" title="Edit">

                                    <span class="btn btn-info "><i class="fa fa-edit"></i></span>

                                 </a>

                                 <a title="Delete" data-toggle="modal" data-target="#commonDelete" onclick="set_common_delete('<?php echo $value->id; ?>','admin');">

                                    <span class="btn btn-info "><i class="fa fa-trash-o "></i></span>

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
            url: '<?php echo base_url() . "admin/admin/deleteAll"; ?>',
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
<?php $this->load->view('footer'); ?>