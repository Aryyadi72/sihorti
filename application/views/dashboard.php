<div class="page-heading">
    <marquee>
        <h3>SIHORTI Statistics</h3>
    </marquee>
</div>

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <img width="35px" height="35px"
                                            src="<?php echo base_url(""); ?>assets/images/logo/komoditas.svg">
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">
                                        Komoditas
                                    </h6>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $total_komoditas ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <img width="35px" height="35px"
                                            src="<?php echo base_url(""); ?>assets/images/logo/kecamatan.svg">
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kecamatan</h6>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $total_kecamatan ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <img width="35px" height="35px"
                                            src="<?php echo base_url(""); ?>assets/images/logo/akun.svg">
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Akun</h6>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $total_akun ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <img width="35px" height="35px"
                                            src="<?php echo base_url(""); ?>assets/images/logo/pegawai.svg">
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pegawai</h6>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $total_pegawai ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Leaflet Map -->
            <style>
            #map {
                height: 720px;
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
            }).setView([-3.1150193736068035, 115.05569967955239], 12);

            // Icon Kecamatan
            const kecamatanIcon = new L.icon({
                iconUrl: "./assets/legend/marker/kecamatan.png"
            });

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
        <div class="col-12 col-lg-3">
            <!-- <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="assets/images/faces/1.jpg" alt="Face 1" />
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">John Duck</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="card">
                <div class="card-header">
                    <h4>Recent Messages</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/4.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Hank Schrader</h5>
                            <h6 class="text-muted mb-0">@johnducky</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/5.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">Dean Winchester</h5>
                            <h6 class="text-muted mb-0">@imdean</h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="assets/images/faces/1.jpg" />
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1">John Dodol</h5>
                            <h6 class="text-muted mb-0">@dodoljohn</h6>
                        </div>
                    </div>
                    <div class="px-4">
                        <a class="btn btn-block btn-xl btn-outline-primary font-bold mt-3"
                            href="<?= base_url("") ?>">Logout</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div>
        </div>
    </section>
</div>