<main id="main" style="min-height: 100vh;">
    <div class="container mb-5 pb-5">
        <div class="row">
            <div class="col-lg-9 col-xs-12" style="padding-top: 50px;;">
                <?php foreach ($result as $view) : ?>
                    <h3 style="color:#333;">Hi, <b><?= $view->nama ?></b></h3>
                <?php endforeach ?>
                <h6 class="my-3">Your Campaign :</h6>
                <?php foreach ($campaigns as $campaign) : ?>
                    <?php
                    if ($campaign->campaign_status == '1') {
                        $status = "Waiting";
                    } elseif ($campaign->campaign_status == '2') {
                        $status = "Active";
                    } elseif ($campaign->campaign_status == '3') {
                        $status = "Danied";
                    }

                    $tgl1 = new DateTime($campaign->approve_date);
                    $tgl2 = new DateTime($campaign->end_campaign);
                    $d = $tgl2->diff($tgl1)->days + 1;
                    ?>
                    <div class="card mb-3" style="box-shadow:2px 4px 25px #dedede; border-radius:10px;">
                        <div style="background-image: url(<?= base_url() . '/assets/images/' . $campaign->featured_image ?>);background-size: cover; width: 100%;height: 250px;background-position-x: center;background-position-y: center;">

                        </div>
                        <!-- <img class="card-img-top" src="<?= base_url() . '/assets/images/' . $campaign->featured_image ?>" width="780px" height="180px" alt="Card image cap"> -->
                        <div class="card-body d-sm-block ">
                            <?php
                            if ($campaign->campaign_status == '2') {
                            ?>
                                <h3><b><?= $campaign->title ?></b></h3>
                                <div class="statuse mt-3">
                                    <p>Target : <b>Rp <?= number_format($campaign->target_fund, 0, ",", ".") ?></b></p>
                                    <p>Earning : <b>Rp <?= number_format("2000000", 0, ",", ".") ?></b></p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-s2" data-percent="20"></div>
                                </div>
                                <div class="statuse">
                                    <p>Status : <span class="badge badge-primary"><?= $status ?></span></p>
                                    <p>Remaining : <b><?= $d ?></b> Days</p>
                                </div>
                                <p class="card-text">
                                    <?php $isi = strip_tags($campaign->description) ?>
                                    <?= substr($isi, 0, 150) . ". . . . ." ?></p>
                                <p class="card-text"><small class="text-muted">Create date <?= date("d F Y", strtotime($campaign->create_date)) ?></small></p>
                        </div>
                        <?php
                                } else {
                        ?>
                            <h3><b><?= $campaign->title ?></b></h3>
                            <div class="statuse mt-3">
                                <p>Status : <span class="badge badge-primary"><?= $status ?></span></p>
                                <p>Target : <b>Rp <?= number_format($campaign->target_fund, 0, ",", ".") ?></b></p>
                            </div>
                            <p class="card-text">
                                <?php $isi = strip_tags($campaign->description) ?>
                                <?= substr($isi, 0, 150) . ". . . . ." ?></p>
                            <p class="card-text"><small class="text-muted">Create date <?= date("d F Y", strtotime($campaign->create_date)) ?></small></p>
                        </div>
                    <?php
                                }
                    ?>
            </div>

        <?php endforeach ?>
        <a href="<?= base_url() . 'en/new-campaign' ?>" class="btn btn-block mt-5" style="border:dashed 3px #999;padding:50px;border-radius:20px;color:#999;font-size:30px">Create New Campaign</a>


        </div>
    </div>
    </div>
</main>