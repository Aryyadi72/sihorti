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
                            DataTable
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <a href="<?php echo base_url("rekapitulasi/tambah"); ?>" class="btn icon icon-left btn-primary"><i
            data-feather="edit"></i>
        Tambah Rekapitulasi</a>
    <a href="<?php echo base_url("rekapitulasi/tambah"); ?>" class="btn icon icon-left btn-success"><i
            data-feather="edit"></i>
        Report Rekapitulasi</a>
    <section class="section" style="margin-top:20px;">
        <div class="card">
            <div class="card-header">Tabel Data Rekapitulasi</div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>ID Komoditas</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($rekapitulasi as $r) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $r->kode?></td>
                            <td><?php echo $r->id_komoditas?></td>
                            <td>
                                <a href="<?php echo base_url("rekapitulasi/ubah/".$r->id_rekapitulasi); ?>" class="btn icon btn-warning"><i
                                        class="bi bi-pencil"></i></a>
                                <a href="<?php echo base_url("rekapitulasi/hapus"); ?>" class="btn icon btn-danger"><i
                                        class="bi bi-x"></i></a>
                                <a href="<?php echo base_url("rekapitulasi/detail"); ?>" class="btn icon btn-light"><i
                                        class="bi bi-info-circle"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>