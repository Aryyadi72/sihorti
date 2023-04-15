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

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last" style="margin-bottom:20px;">
                <h3>Data Rekapitulasi</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Rekapitulasi
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <a href="<?php echo base_url("rekapitulasi/tambah"); ?>" class="btn icon icon-left btn-primary"><i
            data-feather="edit"></i>
        Tambah Rekapitulasi</a>
    <a href="<?php echo base_url("laporan_mingguan/exportrekap"); ?>" class="btn icon icon-left btn-success"><i
            data-feather="edit"></i>
        Report Rekapitulasi</a>
    <section class="section" style="margin-top:20px;">
        <div class="card">
            <div class="card-header">Tabel Data Rekapitulasi</div>
            <div class="card-body" style="overflow-x:auto;">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th colspan="3">ID Komoditas</th>
                            <th>ID Kategori</th>
                            <th>Hasil Produksi</th>
                            <th>Luas Tanaman</th>
                            <th>Luas Panen Habis</th>
                            <th>Luas Panen Sisa</th>
                            <th>Luas Rusak</th>
                            <th>Luas Tambah Tanam</th>
                            <th>Luas Laporan</th>
                            <th>Produksi Habis</th>
                            <th>Produksi Sisa</th>
                            <th>Harga Jual</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($rekapitulasi as $r) : ?>
                        <tr>
                            <th><?php echo $no++ ?></td>
                            <th><?php echo $r->kode?></td>
                            <th colspan="3"><?php echo $r->id_komoditas?></td>
                            <th><?php echo $r->id_kategori?></td>
                            <th><?php echo $r->hasil_produksi?></td>
                            <th><?php echo $r->luas_tanaman?></td>
                            <th><?php echo $r->luas_panen_habis?></td>
                            <th><?php echo $r->luas_panen_sisa?></td>
                            <th><?php echo $r->luas_rusak?></td>
                            <th><?php echo $r->luas_tambah_tanam?></td>
                            <th><?php echo $r->luas_laporan?></td>
                            <th><?php echo $r->produksi_habis?></td>
                            <th><?php echo $r->produksi_sisa?></td>
                            <th><?php echo $r->harga_jual?></td>
                            <th><?php echo $r->keterangan?></td>
                            <td>
                                <a href="<?php echo base_url("rekapitulasi/ubah/".$r->id_rekapitulasi); ?>"
                                    class="btn icon btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="<?php echo base_url("rekapitulasi/hapus"); ?>" class="btn icon btn-danger"><i
                                        class="bi bi-x"></i></a>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>