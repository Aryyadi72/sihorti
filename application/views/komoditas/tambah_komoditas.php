<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class=" card-header">
                    <h4 class="card-title">Tambah Data Komoditas</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">    
                    <form class="form form-horizontal" method="POST" action="<?php echo base_url('rekapitulasi/tambah_data_aksi')?>">
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
                                                    <option value="<?php echo $k->id_kategori ?>"><?php echo $k->kategori ?></option>
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
        </div>
    </div>
</section>
<!-- // Basic Horizontal form layout section end -->