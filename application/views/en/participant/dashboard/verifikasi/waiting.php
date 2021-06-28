<main id="main" style="height: 80vh;">
    <div class="container d-flex pb-5 col-10">
        <div class="row">

            <div class="col-lg-6" style="padding-top: 150px;;">
                <?php foreach ($result as $view) : ?>
                    <h1 style="color:#333;">Hai, <b><?= $view->nama ?></b></h1>
                <?php endforeach ?>
                <p>Selamat datang dan selamat bergabung bersama kami, kami akan segera memproses data kamu paling lambat 2x24 jam. Daripada bosan menunggu baca yuk <a href="#">peraturan dan kebijakan</a> dari kami, kamu juga bisa menghubungi kami langsung dengan menekan tombol dibawah ini ya.</br></br>- Salam Hangat :)</p>
                <a href="mailto:admin@diyacademy.org" class="btn btn-primary" style="background-color: #0058dd;padding:10px 20px;border-radius:25px;"><i class="icofont-magic"></i>Hubungi Customer Support</a>

            </div>
            <div class="col-lg-6">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_QpolL2.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
            </div>
        </div>
</main>