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
    <a href="<?php echo base_url("laporan_mingguan/exportReportToExcel"); ?>" class="btn icon icon-left btn-success"><i
            data-feather="edit"></i>
        Report Rekapitulasi</a>
  
    
    <section class="section" style="margin-top:20px;">
        <div class="card">
            <div class="card-header">Tabel Data Rekapitulasi</div>
             <!-- Form filter -->
<form id="filterForm" method="post" action="<?php echo base_url("Rekapitulasi/filter_data"); ?>">
    <div class="row m-3">
        <div class="col-md-3">
            <div class="form-group">
                <label for="kecamatan">Kecamatan:</label>
                <select class="form-control" id="kecamatan" name="kecamatan">
                    <?php foreach($kecamatan as $k) : ?>
                        <option value="<?php echo $k->id_kecamatan; ?>"><?php echo $k->kecamatan; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <select class="form-control" id="tahun" name="tahun">
                    <?php foreach($tanggal as $t) : ?>
                        <?php $tahun = date('Y', strtotime($t->tanggal)); ?>
                        <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="bulan">Bulan:</label>
                <select class="form-control" id="bulan" name="bulan">
                    <?php foreach($bulan as $b) : ?>
                        <?php $namaBulan = date('F', strtotime($b->tanggal)); ?>
                        <option value="<?php echo $namaBulan; ?>"><?php echo $namaBulan; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="#" id="exportBtn" class="btn icon icon-left btn-success"><i data-feather="edit"></i>Report Rekapitulasi</a>
            </div>
        </div>
    </div>
</form>

<!-- Tabel data -->
<!-- Tabel data -->
<div class="card-body" style="overflow-x:auto;">
    <table class="table table-striped" id="table1">
        <!-- Table headers -->
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th colspan="3">Komoditas</th>
                <th>Kecamatan</th>
                <th>Kategori</th>
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
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <!-- Table data -->
        <tbody>
            <?php if (!empty($rekapitulasi)) : ?>
                <?php $no=1; foreach($rekapitulasi as $r) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $r->kode?></td>
                        <td colspan="3"><?php echo $r->nama?></td>
                        <td><?php echo $r->kecamatan?></td>
                        <td><?php echo $r->kategori?></td>
                        <td><?php echo $r->hasil_produksi?></td>
                        <td><?php echo $r->luas_tanaman?></td>
                        <td><?php echo $r->luas_panen_habis?></td>
                        <td><?php echo $r->luas_panen_sisa?></td>
                        <td><?php echo $r->luas_rusak?></td>
                        <td><?php echo $r->luas_tambah_tanam?></td>
                        <td><?php echo $r->luas_laporan?></td>
                        <td><?php echo $r->produksi_habis?></td>
                        <td><?php echo $r->produksi_sisa?></td>
                        <td><?php echo $r->harga_jual?></td>
                        <td><?php echo $r->keterangan?></td>
                        <td><?php echo $r->tanggal?></td>
                        <td>
                            <a href="<?php echo base_url("rekapitulasi/ubah/".$r->id_rekapitulasi); ?>"
                                class="btn icon btn-warning"><i class="bi bi-pencil"></i></a>
                            <a href="<?php echo base_url("rekapitulasi/hapus"); ?>" class="btn icon btn-danger"><i
                                    class="bi bi-x"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="20" class="text-center">Data tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>


        </div>
    </section>
</div>
