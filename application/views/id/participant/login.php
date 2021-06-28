<main id="main">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4" style="color: Black">Masuk ke  <b>Sistem</b></h2>
              <div class="auto-form-wrapper">
              <?= $this->session->flashdata("pesan") ?>
                <?= form_open(base_url() . "clogin_id/login") ?>
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
                    <label class="label">Kata Sandi</label>
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
                    <button class="btn btn-primary submit-btn btn-block ">Masuk</button>
                  </div>
                  <div class="form-group d-flex justify-content-between">
                  <p>Belum Punya Akun? <a href="<?= base_url() .
                    "id/daftar" ?>">Daftar</a></p>
                    <div class="form-check form-check-flat mt-0 pull-right">
                      <p><a href="<?= base_url() .
                        "id/lupa-password" ?>">Lupa Password</a></p>
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
