<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-sm-4">
      <h2>Communities</h2>
      
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
         <div class="ibox-title">
            <h5> <small></small></h5>

            <div class="ibox-tools">
            </div>
         </div>

         <!-- ............................................................. -->

         <!-- BO : content  -->
         <div class="col-sm-12 white-bg ">
            <div class="box box-info">
               <div class="box-header with-border">
                  <h3 class="box-title"> </h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->

               <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">
                  <div class="box-body">
                     <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-success">
                           <button type="button" class="close" data-close="alert"></button>
                           <?php echo $this->session->flashdata('message'); ?>
                        </div>
                     <?php endif; ?>
                     <table class='table table-bordered' style='width:70%;' align='center'>

                        <tr>

                           <td>

                              <label for="community_id" class="col-sm-s form-label"> ID </label>

                           </td>

                           <td>

                              <?php echo set_value("community_id", html_entity_decode($communities->community_id)); ?>

                           </td>

                        </tr>
                        <tr>

                           <td>

                              <label for="name" class="col-sm-s form-label"> Name </label>

                           </td>

                           <td>

                              <?php echo set_value("name", html_entity_decode($communities->name)); ?>

                           </td>

                        </tr>                        <!-- Description Start -->

                        <tr>

                           <td>

                              <label for="description" class="col-sm-s3 form-label"> Description </label>

                           </td>

                           <td>

                              <?php echo set_value("description",  html_entity_decode($communities->description)); ?>

                           </td>

                        </tr>

                        <!-- Description End -->

                        <!-- Logo Start -->

                        <tr>

                           <td>

                              <label for="address" class="col-sm-s3 form-label"> Logo </label>

                           </td>

                           <td>

                              <?php if (isset($communities->logo) && $communities->logo != "") { ?>

                                 <br>

                                 <img src="<?php echo $this->config->item("photo_url"); ?><?php echo $communities->logo; ?>" alt="pic" width="50" height="50" />

                              <?php } ?>

                           </td>

                        </tr>

                        <!-- Logo End -->

                        <!-- Category_id Start -->

                        <tr>

                           <td>

                              <label class="form-label col-md-s3"> Category </label>

                           </td>

                           <td>

                              <?php

                              if (isset($community_categories) && !empty($community_categories)):
                                 foreach ($community_categories as $key => $value):

                                    if ($value->category_id == $communities->category_id)

                                       echo $value->name;
                                 endforeach;

                              endif; ?>

                           </td>

                        </tr>

                        <!-- Category_id End -->
                        <tr>
                           <td colspan="2"><a type="reset" class="btn btn-info pull-right" onclick="history.back()">Back</a></td>
                        </tr>
                     </table>

                     <div class="form-group">
                        <div class="col-sm-3">
                        </div>

                        <div class="col-sm-6">
                        </div>

                        <div class="col-sm-3">
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