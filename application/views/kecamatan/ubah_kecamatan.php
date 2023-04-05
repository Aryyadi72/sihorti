<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Layout Vertical 1 Column - Mazer</title>
    <link rel="stylesheet" href="<?php echo base_url("") ?>assets/css/main/app.css" />
    <link rel="stylesheet" href="<?php echo base_url("") ?>assets/css/main/app-dark.css" />
    <link rel="shortcut icon" href="<?php echo base_url("") ?>assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo base_url("") ?>assets/images/logo/favicon.png" type="image/png" />
</head>

<nav class="navbar navbar-light">
    <div class="container d-block">
        <a href="<?php echo base_url("kecamatan") ?>"><i class="bi bi-chevron-left"></i></a>
        <a class="navbar-brand ms-4" href="<?php echo base_url("kecamatan") ?>">
            <img src="<?php echo base_url("") ?>assets/images/logo/logo.svg" />
        </a>
    </div>
</nav>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Kecamatan</h4>
            </div>
            <div class="card-body">
                <?php foreach ($kecamatan as $k) : ?>
                <form class="form form-horizontal" method="POST"
                    action="<?php echo base_url('kecamatan/update_data_aksi')?>">
                    <div class="form-body">
                        <div class="row">
                            <!-- <div class="col-md-4">
                                <label>ID Kecamatan</label>
                            </div> -->
                            <!-- <div class="col-md-8 form-group"> -->
                            <input type="hidden" id="first-name" class="form-control" name="id_kecamatan"
                                placeholder="ID Kecamatan" value="<?php echo $k->id_kecamatan; ?>" readonly />
                            <!-- </div> -->
                            <div class="col-md-4">
                                <label>Nama Kecamatan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="nama"
                                    placeholder="Nama Kecamatan" value="<?php echo $k->nama; ?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Latitude</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="latitude"
                                    placeholder="Latitude" value="<?php echo $k->latitude; ?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Longitude</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="longitude"
                                    placeholder="Longitude" value="<?php echo $k->longitude; ?>" />
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                    Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url("") ?>assets/js/app.js"></script>
</body>