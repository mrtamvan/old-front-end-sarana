<main id="main">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4" style="color: Black">Sign  <b>In</b></h2>
              <div class="auto-form-wrapper">
              <?=$this->session->flashdata('pesan'); ?>
                <?=form_open(base_url().'clogin/login');?>
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
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block ">Login</button>
                  </div>
                  <div class="form-group d-flex justify-content-between">
                  <p>Don't have an account yet? <a href="<?=base_url().'en/sign-up'?>">Sign Up</a></p>
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
