<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Diagnosa Gangguan Tidur</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= base_url('assets/templates/Kelly'); ?>/assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/templates/Kelly'); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url('assets/templates/Kelly'); ?>/assets/css/main.css" rel="stylesheet">

    <!-- Custom Color Override -->
    <style>
        body, .light-background {
            background-color: #2A5463 !important;
            color: #ffffff !important;
        }

        .navmenu ul li a,
        .navmenu ul li a:visited,
        .footer,
        .copyright,
        .credits,
        .social-links a,
        .sitename,
        .logo h1 {
            color: #ffffff !important;
        }

        .navmenu ul li a.active {
            color: #FFD700 !important;
        }

        .navmenu ul li a:hover,
        .social-links a:hover {
            color: #FFD700 !important;
        }

        .navmenu {
            background-color: #2A5463;
        }

        .header {
            background-color: #2A5463 !important;
        }

        #scroll-top {
            background-color: #ffffff;
            color: #2A5463;
        }

        #scroll-top:hover {
            background-color: #FFD700;
            color: #2A5463;
        }

        footer a {
            color: #ffffff !important;
        }

        footer a:hover {
            color: #FFD700 !important;
        }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center light-background sticky-top px-4 px-md-5">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Diagnosa  Gangguan Tidur</h1>
            </a>

            <?php $segment1 = $this->uri->segment(1); ?>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?= base_url('home'); ?>" class="<?= ($segment1 == 'home' || $segment1 == '') ? 'active' : '' ?>">Home</a></li>
                    <li><a href="<?= base_url('diagnosis'); ?>" class="<?= ($segment1 == 'diagnosis') ? 'active' : '' ?>">Diagnosis</a></li>
                    <li><a href="<?= base_url('gangguan'); ?>" class="<?= ($segment1 == 'gangguan') ? 'active' : '' ?>">Jenis Gangguan</a></li>
                    <li><a href="<?= base_url('tentang'); ?>" class="<?= ($segment1 == 'tentang') ? 'active' : '' ?>">Tentang</a></li>
                    <li><a href="<?= base_url('login'); ?>" class="<?= ($segment1 == 'login') ? 'active' : '' ?>">Login</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">
        <?= $contents; ?>
    </main>

    <footer id="footer" class="footer light-background">
        <div class="container">
            <div class="copyright text-center">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">SP Gangguan Tidur</strong> <span>All Rights Reserved<br></span></p>
            </div>
            <div class="social-links d-flex justify-content-center">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">@Jmpl</a>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url('assets/templates/Kelly'); ?>/assets/js/main.js"></script>

</body>

</html>
