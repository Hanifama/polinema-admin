<?php $this->load->view('admin/template/header'); ?>

<script src="https://cdn.tiny.cloud/1/7p0474s3f2j0ccv7tittd1yuw6p82vyj9ut1vf70ay7xiy9r/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-sm-4 m-2">
    <h2>System Master</h2>
  </div>
  <div class="col-sm-8">
    <div class="title-action"></div>
  </div>
</div>

<div class="row">
  <div class="animated fadeInRight">
    <div class="ibox card">
      <div class="ibox-title card-header">
        <h5>Edit <small></small></h5>
        <div class="ibox-tools"></div>
      </div>

      <div class="col-sm-12 white-bg card-body">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div>

          <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
              value="<?php echo $this->security->get_csrf_hash(); ?>">

            <div class="box-body">

              <?php if ($this->session->flashdata('message')): ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-close="alert"></button>
                <?php echo $this->session->flashdata('message'); ?>
              </div>
              <?php endif; ?>

              <!-- Category -->
              <div class="form-group mb-3">
                <label for="category" class="col-sm-3 form-label">Category</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="category" name="category"
                    value="<?php echo set_value('category', html_entity_decode($system_master->category)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error('category', "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Sub Category -->
              <div class="form-group mb-3">
                <label for="sub_category" class="col-sm-3 form-label">Sub Category</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="sub_category" name="sub_category"
                    value="<?php echo set_value('sub_category', html_entity_decode($system_master->sub_category)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error('sub_category', "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Key -->
              <div class="form-group mb-3">
                <label for="key" class="col-sm-3 form-label">Key</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="key" name="key"
                    value="<?php echo set_value('key', html_entity_decode($system_master->key)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error('key', "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Select Value Type -->
              <div class="form-group mb-3">
                <label class="col-sm-3 form-label">Select Value Type</label>
                <div class="col-sm-6">
                  <span style="margin-right:20px;">
                    <input type="radio" style="width:20px; height:20px;" name="value_type" value="text"
                      <?php echo (set_value('value_type', $system_master->value_type ?? 'text') == 'text') ? 'checked' : ''; ?>> Text
                  </span>
                  <span style="margin-right:20px;">
                    <input type="radio" style="width:20px; height:20px;" name="value_type" value="image"
                      <?php echo (set_value('value_type', $system_master->value_type ?? '') == 'image') ? 'checked' : ''; ?>> Image
                  </span>
                </div>
              </div>

              <!-- Value Text (textarea with TinyMCE) -->
              <div class="form-group mb-3" id="value_text_group" style="display:none;">
                <label for="value_text" class="col-sm-3 form-label">Value (Text)</label>
                <div class="col-sm-6">
                  <textarea class="form-control" id="value_text" name="value_text"><?php echo set_value("value_text", html_entity_decode($system_master->value)); ?></textarea>
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("value_text", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Value Image (file upload + preview) -->
              <div class="form-group mb-3" id="value_image_group" style="display:none;">
                <label for="value_image" class="col-sm-3 form-label">Value (Image)</label>
                <div class="col-sm-6">
                  <input type="file" id="value_image" name="value_image" accept="image/*">
                  <input type="hidden" id="value_image_url" name="value_image_url" value="<?php echo set_value("value_image_url", html_entity_decode($system_master->value)); ?>">
                  <br>
                  <img id="preview_image" src="<?php echo !empty($system_master->value) ? base_url($system_master->value) : ''; ?>"
                    alt="Preview Image" style="max-width:150px; max-height:150px; <?php echo empty($system_master->value) ? 'display:none;' : ''; ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error("value_image", "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Description -->
              <div class="form-group mb-3">
                <label for="description" class="col-sm-3 form-label">Description</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="description" name="description"
                    value="<?php echo set_value('description', html_entity_decode($system_master->description)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error('description', "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <!-- Status -->
              <div class="form-group mb-3">
                <label for="status" class="col-sm-3 form-label">Status</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="status" name="status"
                    value="<?php echo set_value('status', html_entity_decode($system_master->status)); ?>">
                </div>
                <div class="col-sm-4">
                  <?php echo form_error('status', "<span class='label label-danger'>", "</span>") ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 m-3">
                  <button type="reset" class="btn btn-default">Reset</button>
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <div class="col-sm-3"></div>
              </div>

            </div>
          </form>
        </div>

        <br><br><br><br>
      </div>
    </div>
  </div>
</div>

<script>
  // Init TinyMCE only for value_text textarea
  tinymce.init({
    selector: '#value_text',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | checklist numlist bullist indent outdent',
    menubar: false,
    height: 300,
  });

  // Function to toggle between text editor and image uploader
  function toggleValueInput() {
    const valueType = document.querySelector('input[name="value_type"]:checked').value;
    if (valueType === 'text') {
      document.getElementById('value_text_group').style.display = 'block';
      document.getElementById('value_image_group').style.display = 'none';
    } else if (valueType === 'image') {
      document.getElementById('value_text_group').style.display = 'none';
      document.getElementById('value_image_group').style.display = 'block';
    }
  }

  // On page load
  document.addEventListener('DOMContentLoaded', function () {
    toggleValueInput();

    document.querySelectorAll('input[name="value_type"]').forEach(el => {
      el.addEventListener('change', toggleValueInput);
    });

    // Preview image when file selected
    document.getElementById('value_image').addEventListener('change', function (event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.getElementById('preview_image');
          img.src = e.target.result;
          img.style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    });
  });
</script>

<?php $this->load->view('admin/template/footer'); ?>
