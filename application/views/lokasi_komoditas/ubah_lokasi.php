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
        <a class="btn icon btn-outline-warning" href="<?php echo base_url("lokasi_komoditas") ?>"><i
                class="bi bi-arrow-left-square-fill"
                style="margin-right:10px;margin-top:20px;font-weight:bold;"></i>Kembali</a>
    </div>
</nav>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Kecamatan</h4>
            </div>
            <div class="card-body">
                <?php foreach ($lokasi_komoditas as $lk):?>
                <form class="form form-horizontal" method="POST"
                    action="<?php echo base_url('lokasi_komoditas/update_data_aksi')?>">
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" id="first-name" class="form-control" name="id_lokasi"
                                placeholder="ID Lokasi" value="<?php echo $lk->id_lokasi ?>" />
                            <div class="col-md-4">
                                <label>Nama Kecamatan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="choices form-select" name="id_kecamatan">
                                    <option value="">----Pilih Kecamatan----</option>
                                    <?php
                                            foreach ($kecamatan as $k) { ?>
                                    <option value="<?php echo $k->id_kecamatan ?>"><?php echo $k->nama ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Nama Komoditas</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="choices form-select" name="id_komoditas">
                                    <option value="">----Pilih Komoditas----</option>
                                    <?php
                                            foreach ($komoditas as $ko) { ?>
                                    <option value="<?php echo $ko->id_komoditas ?>"><?php echo $ko->nama ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Latitude</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="latitude"
                                    placeholder="Latitude" value="<?php echo $lk->latitude ?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Longitude</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="longitude"
                                    placeholder="Nama Kecamatan" value="<?php echo $lk->longitude ?>" />
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