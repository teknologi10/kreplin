<?= $this->include('admin/header') ?>
<div class="content-wrapper pt-4">
    <section class="content mx-4">
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Edit Item PMO</h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>
            <!-- /.card-header -->
            <form role="form" action="<?= base_url(); ?>/admin/edit_item_pmo/<?= $pmo; ?>/<?= $item; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kode Material</label>
                                            <input type="text" class="form-control" placeholder="kode..." name="kode" value="<?= $item_pmo['kode_material'] ?>" required>

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
                                                    <option value="<?= $b['nama'] ?>" <?php if ($item_pmo['jenis_produk'] == $b['nama']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $b['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tipe Produk</label>
                                            <input type="text" class="form-control" placeholder="tipe produk..." name="tipe" value="<?= $item_pmo['tipe_produk'] ?>" required>

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
                                                    <option value="<?= $b['nama'] ?>" <?php if ($item_pmo['satuan'] == $b['nama']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $b['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Volume</label>
                                            <input type="text" class="form-control" placeholder="volume..." name="volume" value="<?= $item_pmo['volume'] ?>" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keterangan</label>
                                            <input type="text" class="form-control" placeholder="keterangan..." name="ket" value="<?= $item_pmo['ket'] ?>" required>

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