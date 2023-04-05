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
        <a href="<?php echo base_url("akun") ?>"><i class="bi bi-chevron-left"></i></a>
        <a class="navbar-brand ms-4" href="<?php echo base_url("akun") ?>">
            <img src="<?php echo base_url("") ?>assets/images/logo/logo.svg" />
        </a>
    </div>
</nav>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Akun</h4>
            </div>
            <div class="card-body">
                <?php foreach ($akun as $a):?>
                <form class="form form-horizontal" method="POST"
                    action="<?php echo base_url('akun/update_data_aksi/')?>" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Level</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="choices form-select" name="id_level" value="<?php echo $a->id_level?>">
                                        <option>-----Pilih Level------</option>
                                        <?php
                                                foreach ($level as $l) { ?>
                                        <option value="<?php echo $l->id_level ?>"><?php echo $l->level ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Pegawai</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <select class="choices form-select" name="id_pegawai" value="<?php echo $a->id_pegawai?>">
                                        <option>-----Pilih Pegawai------</option>
                                        <?php
                                                foreach ($pegawai as $p) { ?>
                                        <option value="<?php echo $p->id_pegawai ?>">
                                            <?php echo $p->nama_pegawai ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="nama"
                                    placeholder="Nama" value="<?php echo $a->nama?>"/>
                            </div>
                            <div class="col-md-4">
                                <label>NIP</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="nip" placeholder="NIP" value="<?php echo $a->nip?>"/>
                            </div>
                            <div class="col-md-4">
                                <label for="formFile" class="form-label">File Foto</label>
                            </div>
                            <div class="col-md-8 mb-3">
                                <input class="form-control" type="file" id="formFile" name="foto" value="<?php echo $a->foto?>"/>
                            </div>
                            <div class="col-md-4">
                                <label>Username</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="username"
                                    placeholder="Username" value="<?php echo $a->username?>"/>
                            </div>
                            <div class="col-md-4">
                                <label>Password</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="password" id="first-name" class="form-control" name="password"
                                    placeholder="Password" value="<?php echo $a->password?>"/>
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
            <?php endforeach; ?>
        </div>
    </div>
    </div>
    <script src="<?php echo base_url("") ?>assets/js/app.js"></script>
</body>