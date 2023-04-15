<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIHORTI - Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets2/img/hortiicon.png" rel="icon">
    <link href="assets2/img/hortiicon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>assets2/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>assets2/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets2/css/style2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>./assets/hover/css/hover.css">

    <!-- =======================================================
  * Template Name: Arsha - v4.9.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <section id="jumbo" class="d-flex align-items-center bg-success">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                        data-aos="fade-up" data-aos-delay="200">
                        <marquee>
                            <h1>DINAS PERTANIAN DAN HORTIKULTURA </h1>
                            <h1>KABUPATEN TAPIN</h1>
                            <h2>BIDANG HORTIKULTURA</h2>
                        </marquee>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <a href="<?php echo base_url('login')?>"
                                class="btn-get-started scrollto shake-hard">LOGIN</a>
                            <a href="https://youtu.be/UzP0FQFiix4" class="glightbox btn-watch-video"><i
                                    class="bi bi-play-circle"></i><span>Tonton Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 horti-img" data-aos="zoom-in" data-aos-delay="200">
                        <img src="assets2/img/horti-img.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- End Header -->
    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets2/img/clients/HORTI.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets2/img/clients/pemkot.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="assets2/img/clients/direktorat.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </section><!-- End Cliens Section -->

                
                <div class="section-title">
                    <h2 style="text-align:center;margin-top:50px;">Peta Persebaran Komoditas Hortikultura Kabupaten Tapin</h2>
                </div>
                        <!-- Leaflet Map -->
            <style>
            #map {
                height: 720px;
                width: 1600px;
                margin-top: 50px;
                margin-bottom: 100px;
                margin-right: 50px;
                margin-left: 150px;
                border-radius: 20px;
            }
            </style>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
                integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

            <!-- Make sure you put this AFTER Leaflet's CSS -->
            <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
                integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

            <!-- Fullscreen Map -->
            <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'>
            </script>
            <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css'
                rel='stylesheet' />

            <!-- Legend -->
            <link rel="stylesheet" href="<?php echo base_url("") ?>assets/legend/leaflet.legend.css">
            <script src="<?php echo base_url("") ?>assets/legend/leaflet.legend.js"></script>

            <div id="map"></div>

            <script>
            var map = L.map('map', {
                fullscreenControl: true,
            }).setView([-2.9858420039986195, 115.21446939378636], 11);

            // Icon Kecamatan
            const kecamatanIcon = new L.icon({
                iconUrl: "./assets/legend/marker/kecamatan.png"
            });

            // // Icon Tapin Utara
            // const tapinUtaraIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/tapin_utara.png"
            // });

            // // Icon Tapin Selatan
            // const tapinSelatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/tapin_selatan.png"
            // });

            // // Icon Tapin Tengah
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/tapin_tengah.png"
            // });

            // // Icon Bakarangan
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/bakarangan.png"
            // });

            // // Icon Salam Babaris
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/salam_babaris.png"
            // });

            // // Icon Binuang
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/binuang.png"
            // });

            // // Icon Hatungun
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/hatungun.png"
            // });

            // // Icon Piani
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/piani.png"
            // });

            // // Icon Lokapaikat
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/lokpaikat.png"
            // });

            // // Icon Bungur
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/bungur.png"
            // });

            // // Icon Candi Laras Selatan
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/cls.png"
            // });

            // // Icon Candi Laras Utara
            // const kecamatanIcon = new L.icon({
            //     iconUrl: "./assets/legend/marker/clu.png"
            // });

            <?php foreach($kecamatan as $k) { ?>

            L.marker([<?= $k->latitude ?>, <?= $k->longitude ?>], {
                    icon: kecamatanIcon
                }).bindPopup(
                    "<h5><?= $k->nama ?></h5>")
                .addTo(map);
            
            <?php } ?>

            // Icon Komoditas
            const komoditasIcon = new L.icon({
                iconUrl: "./assets/legend/marker/komoditas.png"
            });
            <?php foreach($lokasi as $l) { ?>
            L.marker([<?= $l->latitude ?>, <?= $l->longitude ?>], {
                    icon: komoditasIcon
                }).bindPopup(
                    "<h5><?= $l->nama ?></h5>")
                .addTo(map);
            <?php } ?>

            L.control.Legend({
                position: "bottomleft",
                legends: [{
                    label: "Kecamatan",
                    type: "image",
                    url: "<?php echo base_url("") ?>assets/legend/marker/kecamatan.png",
                }, {
                    label: "Komoditas",
                    type: "image",
                    url: "<?php echo base_url("") ?>assets/legend/marker/komoditas.png",
                }]
            }).addTo(map);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href=" http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            </script>
            <!-- Leaflet Map -->
                </div>
       
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2 style="text-align:center;">About Us</h2>
                    <h1 style="color:#228B22; text-align:center;">Dinas Pertanian dan Hortikultura Kabupaten Tapin</h1>
                </div>
                <br>
                <div class="row content">
                    <div class="text-center">
                        <h3 style="color:#FF0000 ;">VISI</h3>
                        <p>
                            " TERWUJUDNYA PERTANIAN TANAMAN PANGAN DAN HORTIKULTURA MAJU, BERDAYA SAING DAN BERBASIS
                            SUMBERDAYA LOKAL MENUJU MASYARAKAT PERTANIAN YANG MANDIRI DAN SEJAHTERA "
                        </p>
                        <br>
                        <h3 style="color:#FF0000 ;">MISI</h3>
                        <p>
                            " MENGEMBANGKAN SUMBER DAYA PERTANIAN TANAMAN PANGAN DAN HORTIKULTURA BERAWASAN KAWASAN
                            AGRIBISNIS, MENINGKATKAN PEREKONOMIAN PERTANIAN YANG BERTUMPU PADA PENGEMBANGAN
                            INFRASTRUKTUR PERTANIAN PEDESAAN, MENINGKATKAN DAYA SAING DAN NILAI TAMBAH TANAMAN PANGAN
                            DAN HORTIKULTURA SEGAR MAUPUN OLAHAN, MENINGKATKAN KUALITAS SUMBER DAYA MANUSIA PERTANIAN
                            YANG BERORIENTASI ILMU PENGETAHUAN DAN TEKNOLOGI (IPTEK) PERTANIAN "
                        </p>
                        <br>
                        <h3 style="color:#FF0000 ;">MOTTO</h3>
                        <p>
                            "BERTANI DENGAN BIJAK AGAR TETEP MEWARISKAN TANAH YANG SUBUR PADA GENERASI BERIKUTNYA"
                        </p>
                    </div>
                </div>
                <br><br>
            </div>
        </section><!-- End About Us Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="bg-warning">
            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    <div class="hvr-wobble-horizontal fs-4 float-none"
                        style="margin-left:570px;font-weight: bold;color: green;">2023 &copy; SIHORTI
                    </div>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() ?>assets2/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url() ?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets2/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?php echo base_url() ?>assets2/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() ?>assets2/js/main.js"></script>

</body>

</html>