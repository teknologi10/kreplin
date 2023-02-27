<?= $this->include('admin/header') ?>
<div class="content-wrapper">
    <section class="content mx-4">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <a href="<?= base_url(); ?>/admin/tambah_user" class="btn btn-success mb-2 mt-4">Tambah</a>
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Data Users</h3>
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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Bagian</th>
                            <th>Level</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($user as $d) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $d['nama'] ?></td>
                                <td><?= $d['username'] ?></td>
                                <td><?= $d['password'] ?></td>
                                <td><?= $d['bagian'] ?></td>
                                <td><?= $d['level'] ?></td>
                                <td class="text-center" style="width: 10%;">
                                    <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/admin/edit_user/<?= $d['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="text-muted d-inline-block mr" href="<?= base_url(); ?>/admin/hapus_user/<?= $d['id'] ?>" onclick="return confirm('apakah anda ingin hapus data?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </section>

</div>
<?= $this->include('admin/footer') ?>