<main id="main">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4" style="color: Black">New  <b>Password</b></h2>
              <div class="auto-form-wrapper">
                <form method="post" id="resetPassword" action="">
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="text" hidden name="id" autocomplete="off" class="form-control" value="<?= $id ?>">
                      <input type="text" hidden name="code" autocomplete="off" class="form-control" value="<?= $code ?>">
                      <input type="password" name="password" autocomplete="off" class="form-control" placeholder="*********">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-email"></i>
                        </span>
                      </div>
                    </div>
                  <span id="password_error" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label class="label">Retype Password</label>
                    <div class="input-group">
                      <input type="password" name="repassword" autocomplete="off" class="form-control" placeholder="*********">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-email"></i>
                        </span>
                      </div>
                    </div>
                  <span id="repassword_error" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block " id="resetBtn">Submit</button>
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
