<?= $this->include('admin/header') ?>
<div class="content-wrapper">
    <section class="content mx-4">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <a href="<?= base_url(); ?>/admin/tambah_pmo" class="btn btn-success mb-2 mt-4">Tambah</a>
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Perintah Mengerjakan Order (PMO)</h3>
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
                            <th>Tgl PMO</th>
                            <th>Area</th>
                            <th>No PMO</th>
                            <th>No Sales Order</th>
                            <th>Pelanggan</th>
                            <th>Proyek</th>
                            <th>Ket</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($pmo as $d) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $d['tgl_pmo'] ?></td>
                                <td><?= $d['area'] ?></td>
                                <td><?= $d['no_pmo'] ?></td>
                                <td><?= $d['no_sales'] ?></td>
                                <td><?= $d['nama_pelanggan'] ?></td>
                                <td><?= $d['nama_proyek'] ?></td>
                                <td><?= $d['ket'] ?></td>
                                <td class="text-center" style="width: 10%;">
                                    <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/admin/detail_pmo/<?= $d['id'] ?>">
                                        <i class="fas fa-list"></i>
                                    </a>
                                    <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/admin/edit_pmo/<?= $d['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if (session('level') == 'Administrator') { ?>
                                        <a class="text-muted d-inline-block mr" href="<?= base_url(); ?>/admin/hapus_pmo/<?= $d['id'] ?>" onclick="return confirm('apakah anda ingin hapus data?');">
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