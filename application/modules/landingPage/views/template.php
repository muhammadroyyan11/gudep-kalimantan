<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>PRAMUKA BULUNGAN</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--

TemplateMo 570 Chain App Dev

https://templatemo.com/tm-570-chain-app-dev

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>landing/assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="<?= base_url() ?>landing/assets/css/animated.css">
    <link rel="stylesheet" href="<?= base_url() ?>landing/assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="<?= base_url() ?>landing/assets/images/logo.png" alt="Chain App Dev">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Registrasi</a></li>
                            <li class="scroll-to-section"><a href="#about">Alur</a></li>
                            <li>
                                <div class="gradient-button"><a id="modal_trigger" href="<?= site_url('login')?>"><i class="fa fa-sign-in-alt"></i> Registrasi</a></div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <?= $contents ?>

    <footer id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Kontak</h4>
                        <p></p>
                        <p>Tim Registrasi</p>
                        <p><a href="https://wa.me/6281225056254">Kak Aning - 081225056254</a></p>
                        <p><a href="https://wa.me/628125161562">Kak Syahabudin - 08125161562</a></p>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h4>Pramuka Bulungan</h4>
                        <div class="logo">
                            <img src="<?= base_url() ?>landing/assets/images/logo1.png" alt="">
                        </div>
                        <p>Selamat Datang Di Halaman Registrasi Gugus Depan Pramuka Kwartir Cabang gerakan Pramuka Bulungan.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Kwarcab Bulungan 2024 | Kak Syahabudin</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="<?= base_url() ?>landing/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>landing/assets/js/owl-carousel.js"></script>
    <script src="<?= base_url() ?>landing/assets/js/animation.js"></script>
    <script src="<?= base_url() ?>landing/assets/js/imagesloaded.js"></script>
    <script src="<?= base_url() ?>landing/assets/js/popup.js"></script>
    <script src="<?= base_url() ?>landing/assets/js/custom.js"></script>
</body>

</html>