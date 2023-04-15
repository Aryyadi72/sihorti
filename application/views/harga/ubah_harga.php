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
        <a class="btn icon btn-outline-warning" href="<?php echo base_url("harga") ?>"><i
                class="bi bi-arrow-left-square-fill"
                style="margin-right:10px;margin-top:20px;font-weight:bold;"></i>Kembali</a>
    </div>
</nav>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4 class="card-title">Ubah Data Harga</h4>
            </div>
            <div class="card-body">
                <?php foreach ($harga as $h):?>
                <form class="form form-horizontal" method="POST"
                    action="<?php echo base_url('harga/update_data_aksi')?>">
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" id="first-name" class="form-control" name="id_harga"
                                value="<?php echo $h->id_harga; ?>" />
                            <div class="col-md-4">
                                <label>Harga Produsen</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="hidden" id="first-name" class="form-control" name="id_harga"
                                    value="<?php echo $h->id_harga ?>" />
                                <input type="text" id="first-name" class="form-control" name="harga_produsen"
                                    placeholder="Harga Produsen" value="<?php echo $h->harga_produsen ?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Harga Grosir</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="harga_grosir"
                                    placeholder="Harga Grosir" value="<?php echo $h->harga_grosir ?>" />
                            </div>
                            <div class="col-md-4">
                                <label>Harga Eceran</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="first-name" class="form-control" name="harga_eceran"
                                    placeholder="Harga Eceran" value="<?php echo $h->harga_eceran ?>" />
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
<!-- // Basic Horizontal form layout section end -->