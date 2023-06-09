<?php
    if ($this->session->flashdata('sukses')) {
?>
<div class="callout callout-success">
    <p style="font-size:14px">
        <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
    </p>
</div>
<?php
    }
?>

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
        <a class="btn icon btn-outline-warning" href="<?php echo base_url("pegawai") ?>"><i
                class="bi bi-arrow-left-square-fill"
                style="margin-right:10px;margin-top:20px;font-weight:bold;"></i>Kembali</a>
    </div>
</nav>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Pegawai</h4>
            </div>
            <div class="card-body">
                <?php foreach ($pegawai as $p) : ?>
                <form class="form form-horizontal" method="POST"
                    action="<?php echo base_url('pegawai/update_data_aksi')?>" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Pegawai</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="hidden" id="first-name" class="form-control" name="id_pegawai"
                                    value="<?php echo $p->id_pegawai?>" />
                                <input type="text" id="first-name" class="form-control" name="nama_pegawai"
                                    placeholder="Nama Pegawai" value="<?php echo $p->nama_pegawai?>" />
                            </div>
                            <div class="col-md-4">
                                <label>NIP Pegawai</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="nip_pegawai"
                                    placeholder="NIP Pegawai" value="<?php echo $p->nip_pegawai?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Tempat Lahir</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="tempat_lahir"
                                    placeholder="Tempat Lahir" value="<?php echo $p->tempat_lahir?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" id="first-name" class="form-control" name="tanggal_lahir"
                                    placeholder="Tanggal Lahir" value="<?php echo $p->tanggal_lahir?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 mb-4">
                                <div class="form-group">
                                    <select class="choices form-select" name="jenis_kelamin"
                                        value="<?php echo $p->jenis_kelamin?>">
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="formFile" class="form-label">File Foto</label>
                            </div>
                         <div class="col-md-8 mb-4">
    <input class="form-control" type="file" id="formFile" name="foto" />
    <img src="<?= base_url('assets/images/' . $p->foto) ?>" style="width:100%;max-width:100px">
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