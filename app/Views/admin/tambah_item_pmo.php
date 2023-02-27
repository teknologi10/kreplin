<?= $this->include('admin/header') ?>
<div class="content-wrapper pt-4">
    <section class="content mx-4">
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Tambah Item PMO</h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>
            <!-- /.card-header -->
            <form role="form" action="<?= base_url(); ?>/admin/tambah_item_pmo/<?= $id; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kode Material</label>
                                            <input type="text" class="form-control" placeholder="kode..." name="kode" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Jenis Produk</label>
                                            <select class="form-control" name="jenis" required>
                                                <option value="">--Pilih Jenis Produk--</option>
                                                <?php foreach ($jenis as $b) : ?>
                                                    <option value="<?= $b['nama'] ?>"><?= $b['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tipe Produk</label>
                                            <input type="text" class="form-control" placeholder="tipe produk..." name="tipe" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select class="form-control" name="satuan" required>
                                                <option value="">--Pilih Satuan--</option>
                                                <?php foreach ($satuan as $b) : ?>
                                                    <option value="<?= $b['nama'] ?>"><?= $b['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Volume</label>
                                            <input type="text" class="form-control" placeholder="volume..." name="volume" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keterangan</label>
                                            <input type="text" class="form-control" placeholder="keterangan..." name="ket" required>

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