<main id="main" style="height: 80vh;">
    <div class="container d-flex justify-content-center pb-5 col-10">
        <div class="col-lg-6" style="padding-top: 110px;;">
            <?php foreach($result as $view):?>
            <h1 style="color:#333;"><b>Hurray....</b></h1>
            <?php endforeach ?>
            <p>Selamat, <b><?=$view -> nama?></b> !! Data kamu lolos seleksi dari kami :D Sekarang kamu sudah bisa memulai kampanye kamu. Silahkan tekan tombol dibawah ini untuk memulai ya..</p>
            <a href="<?=base_url().'en/create-campaign'?>" class="btn btn-block"  style="border:dashed 3px #999;padding:50px;border-radius:20px;color:#999;font-size:30px">Mulai Kampanye</a>

        </div>
        <div class="col-lg-6">
        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_ysqrlxjw.json"  background="transparent"  speed="0.8"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
        </div>
</main>
 