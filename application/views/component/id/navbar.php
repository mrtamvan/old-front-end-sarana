    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex">

            <div class="logo mr-auto">
                <!-- <h1 class="text-light"><a href="index.html"><span>Ninestars</span></a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="<?= base_url() . 'id/' ?>"><img src="<?= base_url() . '/theme/img/logo-landscape.png' ?>" alt="" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <!-- <li class="active"><a href="<?= base_url() . 'id/' ?>#header">Beranda</a></li> -->
                    <li><a href="<?= base_url() . 'id/' ?>#services">Kampanye</a></li>
                    <li><a href="<?= base_url() . 'id/' ?>#about">Tentang Kami</a></li>
                    <li><a href="<?= base_url() . 'id/' ?>#faq">F.A.Q</a></li>
                    <li><a href="<?= base_url() . 'id/' ?>#footer">Kontak</a></li>
                    <!-- <li class="drop-down"><a href="">Drop Down</a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="drop-down"><a href="#">Drop Down 2</a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                            <li><a href="#">Drop Down 5</a></li>
                        </ul>
                    </li> -->
                    <?php
                    if ($this->session->userdata('email') == "") {
                    ?>
                        <li class="get-started"><a href="<?= base_url() . 'id/masuk' ?>">Masuk</a></li>
                    <?php

                    } elseif ($this->session->userdata('is_admin') == "1") {
                    ?>
                        <li class="get-started"><a href="<?= base_url() . 'id/masuk' ?>">Masuk</a></li>
                    <?php

                    } else {
                    ?>
                        <li style="border-left: 1px solid #dedede;">
                            <!-- <li style="padding-left: 50px;;"><a href="<?= base_url() . 'clogin/logout' ?>" class="btn btn-danger" style="padding:10px 20px;border-radius:25px"><i class="icofont-power"></i> Sign Out</a></li> -->
                            <ul>
                                <li class="drop-down"><a href="#">Hi, <?php
                                                                        $name = $this->session->userdata('nama');
                                                                        $arr = explode(" ", $name);
                                                                        echo $arr[0]; ?></a>
                                    <ul>
                                        <?php if ($this->session->userdata('status') == "4") : ?>
                                            <li><a href="<?= base_url() . 'id/dashboard/' ?>"><i class="icofont-home mr-2" style="color: blue;"></i> Dashboard</a></li>
                                            <li><a href="#"><i class="icofont-user mr-2" style="color: gray;"></i> User Profile</a></li>
                                        <?php endif ?>
                                        <li><a href="<?= base_url() . 'clogin_id/logout' ?>"><i class="icofont-power mr-2" style="color: red;"></i> Keluar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>

                    <li>
                        <ul>
                            <li class="drop-down"><a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/255px-Flag_of_Indonesia.svg.png" width="25px" alt="Indonesia"> Indonesia</a>
                                <ul>
                                    <li><a href="<?= base_url() . 'en/' ?>"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/a/a4/Flag_of_the_United_States.svg/220px-Flag_of_the_United_States.svg.png" height="14px" alt="English"> English</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->