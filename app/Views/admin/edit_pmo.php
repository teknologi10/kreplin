<?= $this->include('admin/header') ?>
<div class="content-wrapper pt-4">
    <section class="content mx-4">
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Edit PMO</h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>
            <!-- /.card-header -->
            <form role="form" action="<?= base_url(); ?>/admin/edit_pmo/<?= $id ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal PMO</label>
                                            <input type="date" class="form-control" placeholder="tgl..." name="tgl" value="<?= $pmo['tgl_pmo'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Area</label>
                                            <input type="text" class="form-control" placeholder="area..." name="area" value="<?= $pmo['area'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor PMO</label>
                                            <input type="text" class="form-control" placeholder="nomor PMO..." name="nopmo" value="<?= $pmo['no_pmo'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                                            <input type="text" class="form-control" placeholder="nama pelanggan..." name="pelanggan" value="<?= $pmo['nama_pelanggan'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Sales Order</label>
                                            <input type="text" class="form-control" placeholder="nomor sales order..." name="noorder" value="<?= $pmo['no_sales'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Proyek</label>
                                            <input type="text" class="form-control" placeholder="nama proyek..." name="proyek" value="<?= $pmo['nama_proyek'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keterangan</label>
                                            <input type="text" class="form-control" placeholder="keterangan..." name="ket" value="<?= $pmo['ket'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Plant</label>
                                            <select class="form-control" name="plant" id="" required>
                                                <option value="">--Pilih Plant--</option>
                                                <option value="3A00" <?php if ($pmo['plant'] == '3A00') {
                                                                            echo 'selected';
                                                                        } ?>>3A00</option>
                                                <option value="3A01" <?php if ($pmo['plant'] == '3A01') {
                                                                            echo 'selected';
                                                                        } ?>>3A01</option>
                                                <option value="3A02" <?php if ($pmo['plant'] == '3A02') {
                                                                            echo 'selected';
                                                                        } ?>>3A02</option>
                                                <option value="3A03" <?php if ($pmo['plant'] == '3A03') {
                                                                            echo 'selected';
                                                                        } ?>>3A03</option>
                                                <option value="3A04" <?php if ($pmo['plant'] == '3A04') {
                                                                            echo 'selected';
                                                                        } ?>>3A04</option>
                                                <option value="3A05" <?php if ($pmo['plant'] == '3A05') {
                                                                            echo 'selected';
                                                                        } ?>>3A05</option>
                                                <option value="3A06" <?php if ($pmo['plant'] == '3A06') {
                                                                            echo 'selected';
                                                                        } ?>>3A06</option>
                                                <option value="3A07" <?php if ($pmo['plant'] == '3A07') {
                                                                            echo 'selected';
                                                                        } ?>>3A07</option>
                                                <option value="3A08" <?php if ($pmo['plant'] == '3A08') {
                                                                            echo 'selected';
                                                                        } ?>>3A08</option>
                                                <option value="3A09" <?php if ($pmo['plant'] == '3A09') {
                                                                            echo 'selected';
                                                                        } ?>>3A09</option>
                                            </select>
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
        </div>
    </section>

</div>
<?= $this->include('admin/footer') ?>