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
        <a href="<?php echo base_url("Pegawai") ?>"><i class="bi bi-chevron-left"></i></a>
        <a class="navbar-brand ms-4" href="<?php echo base_url("Pegawai") ?>">
            <img src="<?php echo base_url("") ?>assets/images/logo/logo.svg" />
        </a>
    </div>
</nav>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Pegawai</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" method="POST"
                    action="<?php echo base_url('pegawai/tambah_data_aksi')?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Pegawai</label>
                            </div>
                            <div class="col-md-8 form-group">
                            <input type="hidden" id="first-name" class="form-control" name="id_pegawai"/>    
                            <input type="text" id="first-name" class="form-control" name="nama_pegawai"
                                    placeholder="Nama Pegawai" />
                            </div>
                            <div class="col-md-4">
                                <label>NIP Pegawai</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="nip_pegawai"
                                    placeholder="NIP Pegawai" />
                            </div>
                            <div class="col-md-4">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="tempat_lahir"
                                    placeholder="Tempat Lahir" />
                            </div>
                            <div class="col-md-4">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" id="first-name" class="form-control" name="tanggal_lahir"
                                    placeholder="Tanggal Lahir" />
                            </div>
                            <div class="col-md-4">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 mb-4">
                                <div class="form-group">
                                    <select class="choices form-select" name="jenis_kelamin">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="formFile" class="form-label">File Foto</label>
                            </div>
                            <div class="col-md-8 mb-4">
                                <input class="form-control" type="file" id="formFile" name="foto" />
                            </div>
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
        </div>
    </div>
    </div>
    <script src="<?php echo base_url("") ?>assets/js/app.js"></script>
</body>