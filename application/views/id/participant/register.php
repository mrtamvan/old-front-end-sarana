
<main id="main">
  <div class="container-scroller mt-5">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-5 mx-auto">
            <h2 class="text-center mb-4" style="color: Black">Formulir <b>Pendaftaran</b></h2>
            <div class="auto-form-wrapper">
              <?= $this->session->flashdata("pesan") ?>
              <span id="success_message"></span>
              <form method="post" id="registerFormid" action="">
                <div class="form-group">
                  <label class="label">Nama</label>
                  <div class="input-group">
                    <input type="text" name="nama" autocomplete="off" class="form-control" placeholder="tulis nama kamu disini">
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
                  <label class="label">Nomor telepon</label>
                  <div class="input-group">
                    <input type="text" name="tlp" autocomplete="off" class="form-control" placeholder="tulis nomor telepon kamu disini">
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
                    <input type="text" name="email" autocomplete="off" class="form-control" placeholder="tulis alamat email kamu disini">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-email"></i>
                      </span>
                    </div>
                  </div>
                  <span id="email_error" style="color: red;"></span>
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
                  <span id="password_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <label class="label">Konfirmasi Kata Sandi</label>
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
                  <button type="submit" class="btn btn-primary submit-btn btn-block " id="registerid">Daftar</button>
                </div>
                <div class="form-group d-flex justify-content-between">
                  <p>Sudah Punya Akun? <a href="<?= base_url() .
                    "id/masuk/" ?>">Masuk Sekarang</a></p>
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