<main id="main">
  <div class="container-scroller mt-5">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
            <h2 class="text-center mb-4" style="color: Black">Sign <b>Up</b></h2>
            <div class="auto-form-wrapper">
              <?= $this->session->flashdata('pesan'); ?>
              <span id="success_message"></span>
              <form method="post" id="registerForm" action="">
                <div class="form-group">
                  <label class="label">Name</label>
                  <div class="input-group">
                    <input type="text" name="nama" autocomplete="off" class="form-control" placeholder="your name">
                    <input type="text" hidden name="status" autocomplete="off" class="form-control" value="1">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-account"></i>
                      </span>
                    </div>
                  </div>
                  <span id="nama_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label class="label">Phone Number</label>
                  <div class="input-group">
                    <input type="text" name="tlp" autocomplete="off" class="form-control" placeholder="your phone number">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-phone"></i>
                      </span>
                    </div>
                  </div>
                  <span id="tlp_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="text" name="email" autocomplete="off" class="form-control" placeholder="your email">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-email"></i>
                      </span>
                    </div>
                  </div>
                  <span id="email_error" style="color: red;"></span>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="password" autocomplete="off" class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-lock"></i>
                      </span>
                    </div>
                  </div>
                  <span id="password_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label class="label">Confirm Password</label>
                  <div class="input-group">
                    <input type="password" name="repassword" autocomplete="off" class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-lock"></i>
                      </span>
                    </div>
                  </div>
                  <span id="repassword_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary submit-btn btn-block " id="register">Sign Up</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <p>Already have an account? <a href="<?= base_url() . 'login/' ?>">Sign In</a></p>
                  <div class="form-check form-check-flat mt-0 pull-right">

                  </div>

                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</main>