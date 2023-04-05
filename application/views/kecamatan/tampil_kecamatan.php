<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last" style="margin-bottom:20px;">
                <h3>Data Kecamatan</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Kecamatan
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <a href="<?php echo base_url("kecamatan/tambah"); ?>" class="btn icon icon-left btn-primary"><i
            data-feather="edit"></i>
        Tambah Kecamatan</a>
    <section class="section" style="margin-top:20px;">
        <div class="card">
            <div class="card-header">Tabel Data Kecamatan</div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Kecamatan</th>
                            <th>Nama</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($kecamatan as $k) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td>0<?php echo $k->id_kecamatan?></td>
                            <td><?php echo $k->nama?></td>
                            <td><?php echo $k->latitude?></td>
                            <td><?php echo $k->longitude?></td>
                            <td>
                                <a href="<?php echo base_url("kecamatan/ubah/".$k->id_kecamatan); ?>"
                                    class="btn icon btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="<?php echo base_url("kecamatan/hapus/".$k->id_kecamatan); ?>"
                                    class="btn icon btn-danger"><i class="bi bi-x"></i></a>
                                <button type="button" class="btn icon btn-light" data-bs-toggle="modal"
                                    data-bs-target="#kecamatan"><i class="bi bi-info-circle"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="col-md-6 col-12">
    <div class="card">
        <!-- <div class="card-body"> -->
        <div class="modal fade text-left" id="kecamatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">
                            Basic Modal
                        </h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Bonbon caramels muffin. Chocolate bar oat cake
                            cookie pastry dragée pastry. Carrot cake chocolate
                            tootsie roll chocolate bar candy canes biscuit.
                            Gummies bonbon apple pie fruitcake icing biscuit
                            apple pie jelly-o sweet roll. Toffee sugar plum
                            sugar plum jelly-o jujubes bonbon dessert carrot
                            cake. Cookie dessert tart muffin topping donut
                            icing fruitcake. Sweet roll cotton candy dragée
                            danish Candy canes chocolate bar cookie.
                            Gingerbread apple pie oat cake. Carrot cake
                            fruitcake bear claw. Pastry gummi bears
                            marshmallow jelly-o.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
</div>