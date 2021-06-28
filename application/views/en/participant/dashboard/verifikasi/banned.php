<main id="main" style="height: 80vh;">
    <div class="container d-flex justify-content-center pb-5 col-10">
        <div class="col-lg-6" style="padding-top: 150px;">
            <?php foreach($result as $view):?>
            <h1 style="color:#333;">Hai, <b><?=$view -> nama?></b></h1>
            <?php endforeach ?>
            <p>Yah sayang banget, data kamu ditolak :( mungkin kamu masih belum paham <a href="#">peraturan dan kebijakan</a> dari kami, silahkan menghubungi kami untuk detail lebih lanjut</br></br>- Salam Hangat :)</p>
            <a href="mailto:admin@diyacademy.org" class="btn btn-primary" style="background-color: #0058dd;padding:10px 20px;border-radius:25px;"><i class="icofont-magic"></i>Hubungi Customer Support</a>

        </div>
        <div class="col-lg-6" style="padding-top: 100px;padding-left:50px">
        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_bc4ugzhr.json" mode="bounce" background="transparent"  speed="1"  style="width: 350px; height: 350px;"  loop  autoplay></lottie-player>
        </div>
</main>
 