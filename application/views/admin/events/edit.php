<?php $this->load->view('admin/template/header'); ?>

<!--  BO :heading -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>Events</h2>

    
  </div>

  <div class="col-sm-8">
    <div class="title-action">
    </div>
  </div>
</div>

<!--  EO :heading -->
<div class="row">
  <div class="animated fadeInRight">
    <div class="ibox card ">
      <div class="ibox-title card-header" >
        <h5> Edit <small></small></h5>
        <div class="ibox-tools">                           
        </div>
      </div>
      <!-- ............................................................. -->

      <!-- BO : content  -->
      <div class="col-sm-12 white-bg card-body ">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">  </h3>
          </div>
          <!-- /.box-header -->

          <!-- form start -->
          <form action="" id="" class="form-horizontal " method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="box-body">

              <?php if($this->session->flashdata('message')): ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-close="alert"></button>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
              <?php endif; ?> 

              



<!-- Event_id Start -->

<div class="form-group mb-3" style="display:none">
  <label for="event_id" class="col-sm-3 form-label"> ID </label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="event_id" name="event_id" readonly value="<?php echo set_value("event_id",html_entity_decode($events->event_id)); ?>">
  </div>
  <div class="col-sm-4" >
    <?php echo form_error("event_id","<span class='label label-danger'>","</span>")?>
  </div>

</div> 

<!-- Event_id End -->







<!-- Event_name Start -->

<div class="form-group mb-3">
  <label for="event_name" class="col-sm-3 form-label"> Name </label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="event_name" name="event_name" value="<?php echo set_value("event_name",html_entity_decode($events->event_name)); ?>">
  </div>
  <div class="col-sm-4" >
    <?php echo form_error("event_name","<span class='label label-danger'>","</span>")?>
  </div>

</div> 

<!-- Event_name End -->







<!-- Event_date Start -->

<div class="form-group mb-3">
  <label for="event_date" class="col-sm-3 form-label"> Date </label>
  <div class="col-sm-6">
    <input type="text" class="form-control span2 " id="event_date" name="event_date" value="<?php echo set_value("event_date",$events->event_date); ?>">
  </div>
  <div class="col-sm-4" >
    <?php echo form_error("event_date","<span class='label label-danger'>","</span>")?>
  </div>

</div> 

<!-- Event_date End -->







<!-- Location Start -->

<div class="form-group mb-3">
  <label for="location" class="col-sm-3 form-label"> Location </label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="location" name="location" value="<?php echo set_value("location",html_entity_decode($events->location)); ?>">
  </div>
  <div class="col-sm-4" >
    <?php echo form_error("location","<span class='label label-danger'>","</span>")?>
  </div>

</div> 

<!-- Location End -->







    <!-- Photo Start -->

    <div class="form-group mb-3">

      <label for="address" class="col-sm-3 form-label"> Photo </label>

      <div class="col-sm-6">

      <input type="file" name="photo" />

      <input type="hidden" name="old_photo" 

      value="<?php if (isset($photo) && $photo!=""){echo $photo; }?>" />  

        <?php if(isset($photo_err) && !empty($photo_err)) 

        {foreach($photo_err as $key => $error)

        {echo "<div class=\"error-msg\"></div>"; } }?>

        <?php if (isset($events->photo) && $events->photo!=""){?>

            <br>

  <img src="<?php echo $this->config->item("photo_url");?><?php echo $events->photo; ?>" alt="pic" width="50" height="50" />

    <?php } ?>

      </div>

        <div class="col-sm-3" >

      </div>

    </div>

    <!-- Photo End -->



    

<!-- Description Start -->

<div class="form-group mb-3">
  <label for="description" class="col-sm-3 form-label"> Description </label>
  <div class="col-sm-6">
    <textarea class="form-control" id="description" name="description"><?php echo set_value("description",html_entity_decode($events->description)); ?></textarea>
  </div>
  <div class="col-sm-4" >
    <?php echo form_error("description","<span class='label label-danger'>","</span>")?>
  </div>
</div> 

<!-- Description End -->





<!-- Status Start -->

<div class="form-group mb-3">
  <label for="status" class="col-sm-3 form-label"> Status </label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="status" name="status" value="<?php echo set_value("status",html_entity_decode($events->status)); ?>">
  </div>
  <div class="col-sm-4" >
    <?php echo form_error("status","<span class='label label-danger'>","</span>")?>
  </div>

</div> 

<!-- Status End -->







	

              <div class="form-group">
                <div class="col-sm-3" >                       
                </div>

                <div class="col-sm-6 m-3">
                  <button type="reset" class="btn btn-default ">Reset</button>
                  <button type="submit" class="btn btn-info ">Submit</button>
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

<?php $this->load->view('admin/template/footer') ?>