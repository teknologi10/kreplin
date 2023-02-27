<?= $this->include('header') ?>
<div class="content-wrapper">
    <section class="content mx-4">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <a href="#" data-toggle="modal" data-target="#upload" class="btn btn-success mb-2 mt-4 mr-2">Tambah</a>
        <div class="modal fade" id="upload" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background:#182C61">
                        <h4 class="modal-title" style="color:#ffffff">Tambah User</h4>
                        <button type="button" class="close" style="color:#ffffff" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="<?= base_url(); ?>/base/tambah_user" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Username</label>
                                                    <input type="text" class="form-control" placeholder="username..." name="username" required>

                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success col-sm-12 mt-2" name="submit" value="rekomendasi">Simpan Data</button>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Data User</h3>
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
                            <!-- <th witdh="5%">No</th> -->
                            <th witdh="60%">Nama</th>
                            <th witdh="20%">Level</th>
                            <th witdh="15%">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($user as $d) : ?>
                            <tr>
                                <!-- <td class="text-center"><?= $no++ ?></td> -->
                                <td><?= $d['username'] ?></td>
                                <td><?php if ($d['level'] == 0) {
                                        echo 'Admin';
                                    } else {
                                        echo "Peserta";
                                    } ?></td>
                                <td class="text-center" style="width: 10%;">
                                    <!-- <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/user/edit_user/#<?= $d['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a> -->
                                    <a class="text-muted d-inline-block mr" href="<?= base_url(); ?>/base/hapus_user/<?= $d['id'] ?>" onclick="return confirm('apakah anda ingin hapus data?');">
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
<?= $this->include('footer') ?>