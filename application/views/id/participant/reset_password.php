<main id="main">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4" style="color: Black">Reset  <b>Password</b></h2>
              <div class="auto-form-wrapper">
              <?= $this->session->flashdata("pesan") ?>
              <?php if ($this->session->flashdata("success") == "") { ?>
                <?= form_open(base_url() . "clogin_id/reset_password") ?>
                  <div class="form-group">
                    <label class="label">Input your email account</label>
                    <div class="input-group">
                      <input type="text" name="email" autocomplete="off" class="form-control" placeholder="your email">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-email"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block ">Submit</button>
                  </div>

                  </div>
                  
                </form>
                <?php } else {echo $this->session->flashdata("success");} ?>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
</main>
