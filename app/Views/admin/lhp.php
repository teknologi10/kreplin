<?= $this->include('admin/header') ?>
<div class="content-wrapper">
    <section class="content mx-4">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success mt-2" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <a href="<?= base_url(); ?>/admin/tambah_lhp" class="btn btn-success mb-2 mt-2">Tambah</a>
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Laporan Harian Produksi (LHP)</h3>
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
                            <th>Tgl Produksi</th>
                            <th>Plant</th>
                            <th>No Sales Order</th>
                            <th>Proyek</th>
                            <th>Kode Material</th>
                            <th>Jenis Produk</th>
                            <th>Tipe Produk</th>
                            <th>Vol PMO</th>
                            <th>Ra.Prod</th>
                            <th>Ri.Prod</th>
                            <th>Reject</th>
                            <th>Kumulasi</th>
                            <th>Sisa Prod</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($lhp as $d) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $d['tgl_produksi'] ?></td>
                                <td><?= $d['plant'] ?></td>
                                <td><?= $d['no_sales'] ?></td>
                                <td><?= $d['proyek'] ?></td>
                                <td><?= $d['kode_material'] ?></td>
                                <td><?= $d['jenis_produk'] ?></td>
                                <td><?= $d['tipe_produk'] ?></td>
                                <td><?= $d['volume'] ?></td>
                                <td><?= $d['ra_pro'] ?></td>
                                <td><?= $d['ri_pro'] ?></td>
                                <td><?= $d['reject'] ?></td>
                                <td><?= kumulasi($d['id'], $d['kode_material']) ?></td>
                                <td><?= ($d['volume'] - kumulasi($d['id'], $d['kode_material'])) ?></td>
                                <td class="text-center" style="width: 10%;">
                                    <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/admin/edit_lhp/<?= $d['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if (session('level') == 'Administrator') { ?>
                                        <a class="text-muted d-inline-block mr" href="<?= base_url(); ?>/admin/hapus_lhp/<?= $d['id'] ?>" onclick="return confirm('apakah anda ingin hapus data?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
    </section>

</div>
<?= $this->include('admin/footer') ?>