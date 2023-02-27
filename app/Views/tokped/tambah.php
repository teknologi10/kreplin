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
            <form role="form" action="<?= base_url(); ?>/tokped/tambah" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Waktu</label>
                                            <input type="date" class="form-control" placeholder="nama..." name="tgl" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pendapatan Bersih Baru</label>
                                            <input type="number" class="form-control" placeholder="pendapatan bersih..." name="pendapatan_bersih" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Produk dilihat</label>
                                            <input type="number" class="form-control" placeholder="produk dilihat..." name="produk_dilihat" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pesanan Baru</label>
                                            <input type="number" class="form-control" placeholder="pesanan baru..." name="pesanan_baru" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pendapatan Bebas Ongkir</label>
                                            <input type="number" class="form-control" placeholder="pendapatan bersih bebas_ongkir..." name="pendapatan_bersih_bebas_ongkir" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pendapatan Bukan Bebas Ongkir</label>
                                            <input type="number" class="form-control" placeholder="Pendapatan Bukan Bebas Ongkir..." name="pendapatan_bersih_bukan_bebas_ongkir" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pendapatan Baru Bebas Ongkir</label>
                                            <input type="number" class="form-control" placeholder="Pendapatan Baru Bebas Ongkir..." name="pesanan_bebas_ongkir" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pendapatan Baru Bukan Bebas Ongkir</label>
                                            <input type="number" class="form-control" placeholder="Pendapatan Baru Bukan Bebas Ongkir..." name="pesanan_bukan_bebas_ongkir" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pesanan Batal</label>
                                            <input type="number" class="form-control" placeholder="Pesanan Batal..." name="pesanan_batal" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pesanan Batal Otomatis</label>
                                            <input type="number" class="form-control" placeholder="Pesanan Batal Otomatis..." name="pesanan_batal_otomatis" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pesanan Batal Seller</label>
                                            <input type="number" class="form-control" placeholder="Pesanan Batal Seller..." name="pesanan_batal_seller" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pesanan Batal Pembeli</label>
                                            <input type="number" class="form-control" placeholder="Pesanan Batal Pembelir..." name="pesanan_batal_pembeli" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Estimasi Pengeluaran</label>
                                            <input type="number" class="form-control" placeholder="Estimasi Pengeluaran..." name="estimasi_pengeluaran" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Estimasi Pengeluaran Biaya Layanan</label>
                                            <input type="number" class="form-control" placeholder="Estimasi Pengeluaran Biaya Layanan..." name="estimasi_pengeluaran_layanan" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Estimasi Pengeluaran Bebas Ongkir</label>
                                            <input type="number" class="form-control" placeholder="Estimasi Pengeluaran Bebas Ongkir..." name="estimasi_pengeluaran_bebas_ongkir" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Estimasi Pengeluaran Bebas Topads</label>
                                            <input type="number" class="form-control" placeholder="Estimasi Pengeluaran Bebas Topads..." name="estimasi_pengeluaran_topads" required>

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