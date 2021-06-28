<main id="main">
  <div class="container-scroller mt-5 pt-5 mb-5">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center ">

        <div class="col-lg-8 mx-auto">
          <h2 class="text-center mb-4" style="color: Black">Biodata</h2>
          <div class="auto-form-wrapper">
            <span id="success_message"></span>
            <form method="post" id="verifikasiForm" action="" enctype="multipart/form-data">
              <?php foreach ($result as $view) : ?>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label class="label">Nama Lengkap</label>
                      <div class="input-group">
                        <input type="text" value="<?= $view->nama ?>" name="nama" autocomplete="off" class="form-control" placeholder="your name">
                        <input type="hidden" value="<?= $view->email ?>" name="email" autocomplete="off" class="form-control" placeholder="your name">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-account"></i>
                          </span>
                        </div>
                      </div>
                      <span id="nama_error" class="text-danger"></span>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label class="label">Nomor Telepon</label>
                      <div class="input-group">
                        <input type="text" name="tlp" value="<?= $view->tlp ?>" autocomplete="off" class="form-control" placeholder="your phone number">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="mdi mdi-phone"></i>
                          </span>
                        </div>
                      </div>
                      <span id="tlp_error" class="text-danger"></span>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
              <div class="form-group">
                <label class="label">NIK</label>
                <div class="input-group">
                  <input type="number" name="nik" autocomplete="off" class="form-control" placeholder="">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-card"></i>
                    </span>
                  </div>
                </div>
                <span id="nik_error" style="color: red;"></span>
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label class="label">Tempat Lahir</label>
                    <div class="input-group">
                      <input type="text" name="temhir" autocomplete="off" class="form-control" placeholder="your name">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-pin"></i>
                        </span>
                      </div>
                    </div>
                    <span id="temhir_error" class="text-danger"></span>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label class="label">Tanggal Lahir</label>
                    <div class="input-group">
                      <input type="date" name="tanghir" autocomplete="off" class="form-control" placeholder="your phone number">
                      <div class="input-group-append">
                      </div>
                    </div>
                    <span id="tanghir_error" class="text-danger"></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="label">Alamat</label>
                <div class="input-group">
                  <textarea name="alamat" rows="4" class="form-control"></textarea>
                  <div class="input-group-append">
                  </div>
                </div>
                <span id="alamat_error" style="color: red;"></span>
              </div>
              <hr class=" my-5">
              <div class="row mb-4">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label class="label">Foto KTP</label>
                    <div class="input-group">
                      <!-- <div class="custom-file"> -->
                        <input type="file" name="ktp" >
                        <!-- <label >Pilih file</label> -->
                      <!-- </div> -->
                    </div>
                    <span id="ktp_error" style="color: red;"></span>
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label class="label">Foto Selfie dengan KTP</label>
                    <div class="input-group">
                    <!-- <input type="text" name="selfie" autocomplete="off" class="form-control" placeholder=""> -->
                    <input type="file" name="selfie" >
                      <!-- <div class="custom-file">
                        <input type="file" name="selfie" class="custom-file-input">
                        <label class="custom-file-label pt-2" for="inputGroupFile01">Pilih file</label>
                      </div> -->
                    </div>
                    <span id="selfie_error" class="text-danger"></span>
                  </div>
                </div>
              </div>

              <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-primary submit-btn py-2 px-4 rounded" id="verifikasi">Verifikasi Biodata</button>
              </div>

            </form>
          </div>
        </div>

      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</main>