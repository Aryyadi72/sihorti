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
        <a class="btn icon btn-outline-warning" href="<?php echo base_url("komoditas") ?>"><i
                class="bi bi-arrow-left-square-fill"
                style="margin-right:10px;margin-top:20px;font-weight:bold;"></i>Kembali</a>
    </div>
</nav>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Komoditas</h4>
            </div>
            <div class="card-body">
                <form class="form form-horizontal" method="POST"
                    action="<?php echo base_url('komoditas/tambah_data_aksi')?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Komoditas</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="nama"
                                    placeholder="Nama Komoditas" />
                            </div>
                            <div class="col-md-4">
                                <label>Kode Komoditas</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="kode"
                                    placeholder="Kode Komoditas" />
                            </div>
                            <div class="col-md-4">
                                <label>Kode Kategori</label>
                            </div>
                            <div class="col-md-8 mb-4">
                                <div class="form-group">
                                    <select class="choices form-select" name="id_kategori">
                                        <option value="">----Pilih Kategori----</option>
                                        <?php
                                                foreach ($kategori as $k) { ?>
                                        <option value="<?php echo $k->id_kategori ?>"><?php echo $k->kategori ?>
                                        </option>
                                        <?php } ?>
                                    </select>
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