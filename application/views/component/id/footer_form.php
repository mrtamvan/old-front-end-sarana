   <!-- ======= Footer ======= -->
   <footer id="footer">
       <div class="container py-4">
           <div class="copyright">
               <?= date(
                 "Y"
               ) ?> &copy; Copyright <strong><span>Yayasan Pengembangan Pemuda Mandiri</span></strong>. All Rights Reserved
           </div>
           <div class="credits">
               Developed by <a href="https://digikref.com">Digikref Digital Agency</a>
           </div>
       </div>
   </footer><!-- End Footer -->

   <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

   <!-- Vendor JS Files -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
   <script src="https://demo.dewankomputer.com/php/dewan-rupiah/js/jquery.mask.min.js"></script>
   <!-- <script src="<?= base_url() .
     "/theme/vendor/bootstrap/js/bootstrap.bundle.min.js" ?>"></script> -->
   <!-- <script src="<?= base_url() .
     "/theme/vendor/jquery.easing/jquery.easing.min.js" ?>"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
   <!-- <script src="<?= base_url() . "/theme/js/custom.js" ?>"></script> -->
   <!-- Template Main JS File -->
   <!-- Template Main JS File -->
   <script src="<?= base_url() . "theme/js/scripts.min.js" ?>"></script>
   <!-- <script src="<?= base_url() . "theme/js/main.min.js" ?>"></script> -->
   <script src="<?= base_url() . "theme/js/main.js" ?>"></script>

   <!-- <script type="text/javascript">
       $('document').ready(function() {
           $('#ribuan').mask('#.##0', {
               reverse: true
           });
       });
       // Format mata uang.
   </script> -->
   
   <script>
       $(document).ready(function() {
           var baseUrl = '<?= base_url() ?>';
           var email = $("#email").val();
           var pass = $("#password").val();
           $('#registerFormid').on('submit', function(e) {
               e.preventDefault();
               var data = $('#registerFormid').serialize();
               $.ajax({
                   url: baseUrl + 'clogin_id/register',
                   type: 'POST',
                   dataType: 'json',
                   data: data,
                   success: function(data) {
                       if (data.error) {
                           if (data.nama_error != '') {
                               $('#nama_error').html(data.nama_error);
                           } else {
                               $('#nama_error').html('');
                           }
                           if (data.tlp_error != '') {
                               $('#tlp_error').html(data.tlp_error);
                           } else {
                               $('#tlp_error').html('');
                           }
                           if (data.email_error != '') {
                               $('#email_error').html(data.email_error);
                           } else {
                               $('#email_error').html('');
                           }
                           if (data.password_error != '') {
                               $('#password_error').html(data.password_error);
                           } else {
                               $('#password_error').html('');
                           }
                           if (data.repassword_error != '') {
                               $('#repassword_error').html(data.repassword_error);
                           } else {
                               $('#repassword_error').html('');
                           }
                       }
                       if (data.success) {
                        //    window.location.replace('verify');
                           window.location.href = baseUrl + "verify";

                       }

                    //    if (data.email && data.pass) {
                    //        $.ajax({
                    //            type: "POST",
                    //            url: baseUrl + "clogin_id/dologin",
                    //            data: {
                    //                mail: data.email,
                    //                pwd: data.pass,
                    //                nama: data.nama,
                    //                status: data.status
                    //            },
                    //            cache: false,
                    //            success: function(result) {
                    //                if (result != 0) {
                    //                    // On success redirect.  
                    //                    window.location.replace(result);
                    //                } else {
                    //                    console.log('gagal');
                    //                }
                    //            }
                    //        });
                           // $('#registerForm')[0].reset();

                           // window.location.href = baseUrl + "clogin/dologin/"+data;
                    //    }
                       $('#registerid').attr('disabled', false);
                   }
               });
           });

       });
   </script>
   <script>
       $(document).ready(function() {
           var baseUrl = '<?= base_url() ?>';
           var pass = $("#password").val();
           $('#resetPassword').on('submit', function(e) {
               e.preventDefault();
               var data = $('#resetPassword').serialize();
               $.ajax({
                   url: baseUrl + 'clogin_id/proses_newpassword',
                   type: 'POST',
                   dataType: 'json',
                   data: data,
                   success: function(data) {
                       if (data.error) {
                           if (data.password_error != '') {
                               $('#password_error').html(data.password_error);
                           } else {
                               $('#password_error').html('');
                           }
                           if (data.repassword_error != '') {
                               $('#repassword_error').html(data.repassword_error);
                           } else {
                               $('#repassword_error').html('');
                           }
                       }


                       if (data.email && data.pass) {
                           console.log(data.email);
                           console.log(data.pass);
                           console.log(data.nama);
                           console.log(data.status);
                        //    $.ajax({
                        //        type: "POST",
                        //        url: baseUrl + "clogin_id/dologin",
                        //        data: {
                        //            mail: data.email,
                        //            pwd: data.pass,
                        //            nama: data.nama,
                        //            status: data.status
                        //        },
                        //        cache: false,
                        //        success: function(result) {
                        //            if (result != 0) {
                        //                // On success redirect.  
                        //                window.location.replace(result);
                        //            } else {
                        //                console.log('gagal');
                        //            }
                        //        }
                        //    });
                           // $('#registerForm')[0].reset();

                           // window.location.href = baseUrl + "clogin/dologin/"+data;
                       }
                       $('#resetBtn').attr('disabled', false);
                   }
               });
           });

       });
   </script>
   <script>
       $(document).ready(function() {
           var baseUrl = '<?= base_url() ?>';
           $('#verifikasiForm').on('submit', function(event) {
               event.preventDefault();
               var formData = new FormData($('#verifikasiForm')[0]);
               formData.append('ktp', $('input[type=file]')[0].files[0]);
               $.ajax({
                   url: baseUrl + 'cdash_id/verifikasi',
                   type: 'POST',
                   dataType: 'json',
                   contentType: false,
                   processData: false,
                   data: formData,
                   success: function(data) {
                       if (data.error) {
                           if (data.nama_error != '') {
                               $('#nama_error').html(data.nama_error);
                           } else {
                               $('#nama_error').html('');
                           }
                           if (data.tlp_error != '') {
                               $('#tlp_error').html(data.tlp_error);
                           } else {
                               $('#tlp_error').html('');
                           }
                           if (data.nik_error != '') {
                               $('#nik_error').html(data.nik_error);
                           } else {
                               $('#nik_error').html('');
                           }
                           if (data.alamat_error != '') {
                               $('#alamat_error').html(data.alamat_error);
                           } else {
                               $('#alamat_error').html('');
                           }
                           if (data.ktp_error != '') {
                               $('#ktp_error').html(data.ktp_error);
                           } else {
                               $('#ktp_error').html('');
                           }
                           if (data.selfie_error != '') {
                               $('#selfie_error').html(data.selfie_error);
                           } else {
                               $('#selfie_error').html('');
                           }
                           if (data.temhir_error != '') {
                               $('#temhir_error').html(data.temhir_error);
                           } else {
                               $('#temhir_error').html('');
                           }
                           if (data.tanghir_error != '') {
                               $('#tanghir_error').html(data.tanghir_error);
                           } else {
                               $('#tanghir_error').html('');
                           }
                       }
                       if (data.success) {
                           window.location.replace('id/verifikasi');
                       }
                       $('#verifikasi').attr('disabled', false);
                   }
               });
           });

       });
   </script>

   </body>

   </html>