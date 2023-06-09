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

<nav class="navbar navbar-light">
    <div class="container d-block">
        <a class="btn icon btn-outline-warning" href="<?php echo base_url("rekapitulasi") ?>"><i
                class="bi bi-arrow-left-square-fill"
                style="margin-right:10px;margin-top:20px;font-weight:bold;"></i>Kembali</a>
    </div>
</nav>
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Ubah Data Rekapitulasi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <?php foreach ($rekapitulasi as $r) : ?>
                        <form class="form form-horizontal" method="POST"
                            action="<?php echo base_url('rekapitulasi/ubah_data_aksi')?>">
                            <div class="row">
                                <input type="hidden" id="first-name-column" class="form-control" name="id_rekapitulasi"
                                    value="<?php echo $r->id_rekapitulasi; ?>" />
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Kode</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="Kode" name="kode" value="<?php echo $r->kode; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">ID Komoditas</label>
                                        <!-- <input type="text" id="last-name-column" class="form-control"
                                            placeholder="ID Komoditas" name="id_komoditas" /> -->
                                        <div class="form-group">
                                            <select class="choices form-select" name="id_komoditas"
                                                value="<?php echo $r->id_komoditas; ?>">
                                                <option value="">--- Pilih Komoditas ---</option>
                                                <?php
                                                foreach ($komoditas as $ko) { ?>
                                                <option value="<?php echo $ko->id_komoditas ?>"><?php echo $ko->nama ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">ID Kategori</label>
                                        <!-- <input type="text" id="last-name-column" class="form-control"
                                            placeholder="ID Komoditas" name="id_komoditas" /> -->
                                        <div class="form-group">
                                            <select class="choices form-select" name="id_kategori">
                                                <option value="">--- Pilih Kategori ---</option>
                                                <?php
                                                foreach ($kategori as $ka) { ?>
                                                <option value="<?php echo $ka->id_kategori ?>">
                                                    <?php echo $ka->kategori ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Hasil Produksi</label>
                                        <input type="text" id="city-column" class="form-control"
                                            placeholder="Hasil Produksi" name="hasil_produksi"
                                            value="<?php echo $r->hasil_produksi; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Luas Tanaman</label>
                                        <input type="text" id="country-floating" class="form-control"
                                            name="luas_tanaman" placeholder="Luas Tanaman"
                                            value="<?php echo $r->luas_tanaman; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Luas Panen Habis</label>
                                        <input type="text" id="company-column" class="form-control"
                                            name="luas_panen_habis" placeholder="Luas Panen Habis"
                                            value="<?php echo $r->luas_panen_habis;?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Luas Panen Sisa</label>
                                        <input type="text" id="email-id-column" class="form-control"
                                            name="luas_panen_sisa" placeholder="Luas Panen Sisa"
                                            value="<?php echo $r->luas_panen_sisa; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Luas Rusak</label>
                                        <input type="text" id="email-id-column" class="form-control" name="luas_rusak"
                                            placeholder="Luas Rusak" value="<?php echo $r->luas_rusak; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Luas Tambah Tanam</label>
                                        <input type="text" id="email-id-column" class="form-control"
                                            name="luas_tambah_tanam" placeholder="Luas Tambah Tanam"
                                            value="<?php echo $r->luas_tambah_tanam;?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Luas Laporan</label>
                                        <input type="text" id="email-id-column" class="form-control" name="luas_laporan"
                                            placeholder="Luas Laporan" value="<?php echo $r->luas_laporan; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Produksi Habis</label>
                                        <input type="text" id="email-id-column" class="form-control"
                                            name="produksi_habis" placeholder="Produksi Habis"
                                            value="<?php echo $r->produksi_habis; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Produksi Sisa</label>
                                        <input type="text" id="email-id-column" class="form-control"
                                            name="produksi_sisa" placeholder="Produksi Sisa"
                                            value="<?php echo $r->produksi_sisa; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Harga Jual</label>
                                        <input type="text" id="email-id-column" class="form-control" name="harga_jual"
                                            placeholder="Harga Jual" value="<?php echo $r->harga_jual; ?>" />
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <label for="email-id-column">Keterangan</label>
                                        <input type="text" id="email-id-column" class="form-control" name="keterangan"
                                            placeholder="Keterangan" value="<?php echo $r->keterangan; ?>" />
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                        Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->