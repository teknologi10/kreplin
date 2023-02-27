<?= $this->include('admin/header') ?>
<div class="content-wrapper pt-4">
    <section class="content mx-4">
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Tambah PMO</h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>
            <!-- /.card-header -->
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
                                            <input type="date" class="form-control" placeholder="tgl..." name="tgl" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Area</label>
                                            <input type="text" class="form-control" placeholder="area..." name="area" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor PMO</label>
                                            <input type="text" class="form-control" placeholder="nomor PMO..." name="nopmo" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                                            <input type="text" class="form-control" placeholder="nama pelanggan..." name="pelanggan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Sales Order</label>
                                            <input type="text" class="form-control" placeholder="nomor sales order..." name="noorder" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Proyek</label>
                                            <input type="text" class="form-control" placeholder="nama proyek..." name="proyek" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Keterangan</label>
                                            <input type="text" class="form-control" placeholder="keterangan..." name="ket" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Plant</label>
                                            <select class="form-control" name="plant" id="" required>
                                                <option>--Pilih Plant--</option>
                                                <option value="3A00">3A00</option>
                                                <option value="3A01">3A01</option>
                                                <option value="3A02">3A02</option>
                                                <option value="3A03">3A03</option>
                                                <option value="3A04">3A04</option>
                                                <option value="3A05">3A05</option>
                                                <option value="3A06">3A06</option>
                                                <option value="3A07">3A07</option>
                                                <option value="3A08">3A08</option>
                                                <option value="3A09">3A09</option>
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
        <!-- /.card-body -->
        <!-- <a href="<?= base_url(); ?>/admin/tambah_item_pmo" class="btn btn-success mb-2 mt-4">Tambah</a>
        <div class="card">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Item PMO</h3>
                <div class="card-tools">
                </div>
            </div>


            
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
                        <tr>
                            <td class="text-center"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-center" style="width: 10%;">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    </section>

</div>
<?= $this->include('admin/footer') ?>