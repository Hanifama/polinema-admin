<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css" />
    <script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Login Dinar Mulia</title>
  </head>
  <body>
    <section class="vh-100 vw-100 overflow-hidden">
      <div class="row vh-100">
        <div
          class="col-7 position-relative d-flex flex-column align-items-center justify-content-center"
        >
          <div class="w-75">
            <h2 class="fw-bold text-primary">Selamat datang</h2>
            <p class="text-secondary fs__7">
              Enter your email and password to sign in
            </p>
            <?php if ($this->session->flashdata('message')): ?>

<div class="alert alert-warning">
    <?php echo $this->session->flashdata('message'); ?>
</div>

<?php endif; ?>
            <form  method="post">
              <div class="mb-3 mt-4">
                <label for="exampleInputEmail1" class="form-label fs__7"
                  >Email</label
                >
                <input
                  type="email"
                  class="form-control p-3 rounded-4"
                  placeholder="Username" value="<?php echo set_value('identity'); ?>" name='identity' id='identity'
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fs__7"
                  >Password</label
                >
                <input
                  type="password"
                  class="form-control p-3 rounded-4"
                  placeholder="Password" name='password' value="<?php echo set_value('password'); ?>" required=""
                />
              </div>
              <div class="form-check form-switch">
                <input
                  class="form-check-input"
                  type="checkbox"
                  role="switch"
                  id="flexSwitchCheckDefault"
                />
                <label
                  class="form-check-label fs__7"
                  for="flexSwitchCheckDefault"
                  >Remember me</label
                >
              </div>
              <button
                type="submit"
                class="btn btn-primary w-100 p-3 rounded-4 mt-5"
              >
                SIGN IN
              </button>
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            </form>
          </div>
          <div class="position-absolute bottom-0 mb-4 fs__7">
            ©2023, Made with ❤️ by
            <a href="https://digitalnode.id"><span class="text-primary">Digital Node Studio</span></a>
          </div>
        </div>
        <div
          class="col-5 bg-primary position-relative d-flex flex-column align-items-center justify-content-center"
        >
          <img
            src="<?= base_url() ?>public/assets/logo/logo__white.png"
            alt="logo white"
            class="object-fit-contain w-50"
          />
        </div>
      </div>
    </section>
  </body>
</html>
