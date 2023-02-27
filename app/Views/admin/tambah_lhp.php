<?= $this->include('admin/header') ?>
<div class="content-wrapper pt-4">
    <section class="content mx-4">
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Tambah Rari Produksi</h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>
            <!-- /.card-header -->
            <form role="form" action="<?= base_url(); ?>/admin/tambah_lhp" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Produksi</label>
                                            <input type="date" class="form-control" placeholder="tgl..." name="tgl" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Kode Material</label>
                                            <select class="form-control select2" name="kode" id="kode" required style="height: 100%;">
                                                <option value="">--Pilih Kode Material--</option>
                                                <?php foreach ($kode as $b) : ?>
                                                    <option <?= cek_lhp($b['kode_material']); ?> value="<?= $b['kode_material'] ?>"><?= $b['kode_material'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
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
                                            <input type="text" class="form-control" placeholder="jenis produk..." name="jenis" id="jenis" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tipe Produk</label>
                                            <input type="text" class="form-control" placeholder="tipe produk..." name="tipe" id="tipe" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <input type="text" class="form-control" placeholder="satuan produk..." name="satuan" id="satuan" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ra. Produksi</label>
                                            <input type="text" class="form-control" placeholder="ra. produksi (volume)..." name="raprod" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ri. Produksi</label>
                                            <input type="text" class="form-control" placeholder="ri. produksi (volume)..." name="riprod" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Reject</label>
                                            <input type="text" class="form-control" placeholder="reject (volume)..." name="reject" required>
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
<script>
    $(document).ready(function() {
        $('#kode').change(function() {
            var kode_material = $('#kode').val();
            $.ajax({
                url: "<?php echo base_url('/admin/cari_item'); ?>",
                method: "POST",
                data: {
                    kode_material: kode_material
                },
                dataType: "JSON",
                success: function(data) {
                    $('#jenis').val(data[0].jenis);
                    $('#tipe').val(data[0].tipe);
                    $('#satuan').val(data[0].satuan);

                },
            });

        });
    });
</script>
<?= $this->include('admin/footer') ?>