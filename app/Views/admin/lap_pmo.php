<?= $this->include('admin/header') ?>
<div class="content-wrapper">
    <section class="content mx-4 pt-4">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Perintah Mengerjakan Order (PMO)</h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>
            <form role="form" action="<?= base_url(); ?>/admin/print_lap_pmo" target="_blank" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="nama..." name="awal" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="text-center">Sd</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="date" class="form-control" placeholder="nama..." name="akhir" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success col-sm-12" name="submit" value="submit">Cetak</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th witdh="5%">No</th>
                            <th>Tgl PMO</th>
                            <th>No PMO</th>
                            <th>No Sales Order</th>
                            <th>Kode Material</th>
                            <th>Area</th>
                            <th>Pelanggan</th>
                            <th>Proyek</th>
                            <th>Ket</th>
                            <!-- <th>Aksi</th> -->

                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($pmo as $d) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $d['tgl_pmo'] ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>/admin/print_det_pmo/<?= $d['id_pmo'] ?>" class="btn btn-block btn-info btn-sm" target="_blank"><i class="fa fa-print"> </i><?= $d['no_pmo'] ?></a>
                                </td>
                                <td><?= $d['no_sales'] ?></td>
                                <td><?= $d['kode_material'] ?></td>
                                <td><?= $d['area'] ?></td>
                                <td><?= $d['nama_pelanggan'] ?></td>
                                <td><?= $d['nama_proyek'] ?></td>
                                <td><?= $d['ket'] ?></td>
                                <!-- <td class="text-center" style="width: 10%;">
                                    <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/admin/edit_asesi/<?= $d['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="text-muted d-inline-block mr" href="<?= base_url(); ?>/admin/hapus_asesi/<?= $d['id'] ?>" onclick="return confirm('apakah anda ingin hapus data?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                </td> -->
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
    </section>

</div>
<?= $this->include('admin/footer') ?>