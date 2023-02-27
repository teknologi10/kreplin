<?= $this->include('header') ?>
<div class="content-wrapper">
    <section class="content mx-4">
        <a href="#" data-toggle="modal" data-target="#upload" class="btn btn-success mb-2 mt-4 mr-2">Upload <?= $menu ?></a>
        <a href="<?= base_url() ?>/tokped/tambah" class="btn btn-primary mb-2 mt-4">Tambah <?= $menu ?></a>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <div class="modal fade" id="upload" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background:#182C61">
                        <h4 class="modal-title" style="color:#ffffff">Upload File</h4>
                        <button type="button" class="close" style="color:#ffffff" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="<?= base_url(); ?>/tokped/simpanExcel" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Upload File</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="fileexcel" required accept=".xls,.xlsx">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <!-- <small>*upload file dengan format pdf, jpg, png, mp4</small> -->
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
                <h3 class="card-title" style="color:#ffffff"><?= $menu ?></h3>
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
                            <th>Waktu</th>
                            <th>Pendapatan Bersih Baru</th>
                            <th>Produk dilihat</th>
                            <th>Pesanan Baru</th>
                            <th>Pendapatan Bebas Ongkir</th>
                            <th>Pendapatan Bukan Bebas Ongkir</th>
                            <th>Pendapatan Baru Bebas Ongkir</th>
                            <th>Pendapatan Baru Bukan Bebas Ongkir</th>
                            <th>Pesanan Batal</th>
                            <th>Pesanan Batal Otomatis </th>
                            <th>Pesanan Batal Seller </th>
                            <th>Pesanan Batal Pembeli </th>
                            <th>Estimasi Pengeluaran</th>
                            <th>Estimasi Pengeluaran Biaya Layanan</th>
                            <th>Estimasi Pengeluaran Bebas Ongkir</th>
                            <th>Estimasi Pengeluaran Bebas Topads</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($umum_tokped as $d) : ?>
                            <tr>
                                <!-- <td class="text-center"><?= $no++ ?></td> -->
                                <td><?= $d['tgl'] ?></td>
                                <td><?= $d['pendapatan_bersih'] ?></td>
                                <td><?= $d['produk_dilihat'] ?></td>
                                <td><?= $d['pesanan_baru'] ?></td>
                                <td><?= $d['pendapatan_bersih_bebas_ongkir'] ?></td>
                                <td><?= $d['pendapatan_bersih_bukan_bebas_ongkir'] ?></td>
                                <td>
                                    <?= $d['pesanan_bebas_ongkir'] ?>
                                </td>
                                <td>
                                    <?= $d['pesanan_bukan_bebas_ongkir'] ?>
                                </td>
                                <td>
                                    <?= $d['pesanan_batal'] ?>
                                </td>
                                <td>
                                    <?= $d['pesanan_batal_otomatis'] ?>
                                </td>
                                <td>
                                    <?= $d['pesanan_batal_seller'] ?>
                                </td>
                                <td>
                                    <?= $d['pesanan_batal_pembeli'] ?>
                                </td>
                                <td>
                                    <?= $d['estimasi_pengeluaran'] ?>
                                </td>
                                <td>
                                    <?= $d['estimasi_pengeluaran_layanan'] ?>
                                </td>
                                <td>
                                    <?= $d['estimasi_pengeluaran_bebas_ongkir'] ?>
                                </td>
                                <td>
                                    <?= $d['estimasi_pengeluaran_topads'] ?>
                                </td>
                                <td class="text-center">
                                    <!-- <a class="text-muted d-inline-block mr-2" href="<?= base_url(); ?>/user/edit_user/#<?= $d['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </a> -->
                                    <a class="text-muted d-inline-block mr" href="<?= base_url(); ?>/tokped/hapus/<?= $d['id'] ?>" onclick="return confirm('apakah anda ingin hapus data?');">
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
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>