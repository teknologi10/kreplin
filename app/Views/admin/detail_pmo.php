<?= $this->include('admin/header') ?>
<div class="content-wrapper pt-4">
    <section class="content mx-4">
        <!-- <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Detail PMO</h3>
                <div class="card-tools">
                </div>
            </div>
            <form role="form" action="<?= base_url(); ?>/admin/tambah_pmo" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal PMO</label>
                                            <input type="date" class="form-control" placeholder="tgl..." name="tgl" value="<?= $pmo['tgl_pmo']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Area</label>
                                            <input type="text" class="form-control" placeholder="area..." name="area" value="<?= $pmo['area']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor PMO</label>
                                            <input type="text" class="form-control" placeholder="nomor PMO..." name="nopmo" value="<?= $pmo['no_pmo']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                                            <input type="text" class="form-control" placeholder="nama pelanggan..." name="pelanggan" value="<?= $pmo['nama_pelanggan']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Sales Order</label>
                                            <input type="text" class="form-control" placeholder="nomor sales order..." name="noorder" value="<?= $pmo['no_sales']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Proyek</label>
                                            <input type="text" class="form-control" placeholder="nama proyek..." name="proyek" value="<?= $pmo['nama_proyek']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keterangan</label>
                                            <input type="text" class="form-control" placeholder="keterangan..." name="ket" value="<?= $pmo['ket']; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success col-sm-12 mt-2" name="submit" value="submit">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> -->
        <!-- /.card-body -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-6"><a href="<?= base_url(); ?>/admin/tambah_item_pmo/<?= $pmo['id']; ?>" class="btn btn-success mb-2 mt-4">Tambah</a></div>
            <div class="col-lg-6 text-right"><a href="<?= base_url(); ?>/admin/pmo" class="btn btn-danger mb-2 mt-4">Kembali</a></div>
        </div>

        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Item PMO</h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th witdh="5%">No</th>
                            <th>Kode Material</th>
                            <th>Jenis Produksi</th>
                            <th>Tipe Produk</th>
                            <th>Sat</th>
                            <th>Vol</th>
                            <th>Ket</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($item as $d) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $d['kode_material']; ?></td>
                                <td><?= $d['jenis_produk']; ?></td>
                                <td><?= $d['tipe_produk']; ?></td>
                                <td><?= $d['satuan']; ?></td>
                                <td><?= $d['volume']; ?></td>
                                <td><?= $d['ket']; ?></td>
                                <td class="text-center" style="width: 10%;">
                                    <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/admin/edit_item_pmo/<?= $pmo['id']; ?>/<?= $d['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if (session('level') == 'Administrator') { ?>
                                        <a class="text-muted d-inline-block mr" href="<?= base_url(); ?>/admin/hapus_item_pmo/<?= $pmo['id']; ?>/<?= $d['id'] ?>" onclick="return confirm('apakah anda ingin hapus data?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>
<?= $this->include('admin/footer') ?>