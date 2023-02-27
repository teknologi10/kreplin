<?= $this->include('admin/header') ?>
<div class="content-wrapper pt-4">
    <section class="content mx-4">
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Edit Rari Produksi</h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>
            <!-- /.card-header -->
            <form role="form" action="<?= base_url(); ?>/admin/edit_lhp/<?= $id; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Produksi</label>
                                            <input type="date" class="form-control" placeholder="tgl..." name="tgl" value="<?= $lhp['tgl_produksi']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kode Material</label>
                                            <input type="text" class="form-control" placeholder="kode..." name="kode" value="<?= $lhp['kode_material']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kode Material</label>
                                            <input type="text" class="form-control" placeholder="kode..." name="kode" id="kode">
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Jenis Produk</label>
                                            <input type="text" class="form-control" placeholder="jenis produk..." name="jenis" id="jenis" value="<?= $lhp['jenis_produk']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tipe Produk</label>
                                            <input type="text" class="form-control" placeholder="tipe produk..." name="tipe" id="tipe" value="<?= $lhp['tipe_produk']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <input type="text" class="form-control" placeholder="satuan produk..." name="satuan" id="satuan" readonly>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ra. Produksi</label>
                                            <input type="text" class="form-control" placeholder="ra. produksi (volume)..." name="raprod" value="<?= $lhp['ra_pro']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ri. Produksi</label>
                                            <input type="text" class="form-control" placeholder="ri. produksi (volume)..." name="riprod" value="<?= $lhp['ri_pro']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reject</label>
                                            <input type="text" class="form-control" placeholder="reject (volume)..." name="reject" value="<?= $lhp['reject']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keterangan</label>
                                            <input type="text" class="form-control" placeholder="keterangan..." name="ket" value="<?= $lhp['ket']; ?>" required>
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
<?= $this->include('admin/footer') ?>