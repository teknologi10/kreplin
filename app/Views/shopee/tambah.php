<?= $this->include('header') ?>
<div class="content-wrapper pt-4">
    <section class="content mx-4">
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Tambah <?= $menu ?></h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>
            <!-- /.card-header -->
            <form role="form" action="<?= base_url(); ?>/shopee/tambah" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal</label>
                                            <input type="date" class="form-control" placeholder="nama..." name="tgl" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Total Penjualan</label>
                                            <input type="number" class="form-control" placeholder="penjualan..." name="penjualan" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Total Pesanan</label>
                                            <input type="number" class="form-control" placeholder="pesanan..." name="pesanan" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pernjualan Per Pesanan</label>
                                            <input type="number" class="form-control" placeholder="penjualan per pesanan..." name="jual_perpesanan" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Produk Dilihat</label>
                                            <input type="number" class="form-control" placeholder="produk dilihat..." name="produk_dilihat" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Total Pengunjung</label>
                                            <input type="number" class="form-control" placeholder="total pengunjung..." name="total_pengunjung" required>

                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-success col-sm-12 mt-2" name="submit" value="submit">Simpan Data</button>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card-body -->
    </section>

</div>
<?= $this->include('footer') ?>