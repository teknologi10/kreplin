<?= $this->include('header') ?>
<div class="content-wrapper">
    <section class="content mx-4 pt-4">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        <!-- <a href="<?= base_url(); ?>/user/tambah_<?= $tambah ?>" class="btn btn-success mb-2 mt-4">Tambah <?= $menu ?></a> -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Rentang Waktu</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" action="<?= base_url(); ?>/base/export_excel" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Awal</label>
                                            <input type="datetime-local" name="awal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Akhir</label>
                                            <input type="datetime-local" name="akhir" class="form-control">
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tahun</label>
                                                    <select class="form-control" name="tahun" required>
                                                        <option value="">--Pilih Tahun--</option>

                                                    </select>
                                                </div>
                                            </div> -->

                                    <div class="col-sm-2">
                                        <label for=""></label>
                                        <button type="submit" class="btn btn-success col-sm-12 mt-2" name="submit" value="submit">Export</button>
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header" style="background:#182C61">
                <h3 class="card-title" style="color:#ffffff">Data <?= $menu ?></h3>
                <div class="card-tools">
                    <!-- <a href="" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i>
                    </a> -->
                </div>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
                <table id="hasil" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <!-- <th witdh="5%">No</th> -->
                            <th rowspan="3">Username</th>
                            <th rowspan="3">Selesai</th>
                            <th colspan="40">Interval</th>

                        </tr>
                        <tr class="text-center">
                            <!-- <th witdh="5%">No</th> -->
                            <th colspan="2">Q1</th>
                            <th colspan="2">Q2</th>
                            <th colspan="2">Q3</th>
                            <th colspan="2">Q4</th>
                            <th colspan="2">Q5</th>
                            <th colspan="2">Q6</th>
                            <th colspan="2">Q7</th>
                            <th colspan="2">Q8</th>
                            <th colspan="2">Q9</th>
                            <th colspan="2">Q10</th>
                            <th colspan="2">Q11</th>
                            <th colspan="2">Q12</th>
                            <th colspan="2">Q13</th>
                            <th colspan="2">Q14</th>
                            <th colspan="2">Q15</th>
                            <th colspan="2">Q16</th>
                            <th colspan="2">Q17</th>
                            <th colspan="2">Q18</th>
                            <th colspan="2">Q19</th>
                            <th colspan="2">Q20</th>

                        </tr>
                        <tr class="text-center">
                            <!-- <th witdh="5%">No</th> -->
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>
                            <th>B</th>
                            <th>S</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($hasil_tes as $d) : ?>
                            <tr>
                                <!-- <td class="text-center"><?= $no++ ?></td> -->
                                <td><?= $d['username'] ?></td>
                                <td><?= $d['selesai'] ?></td>
                                <td><?= $d['q1'] ?></td>
                                <td><?= $d['sq1'] ?></td>
                                <td><?= $d['q2'] ?></td>
                                <td><?= $d['sq2'] ?></td>
                                <td><?= $d['q3'] ?></td>
                                <td><?= $d['sq3'] ?></td>
                                <td><?= $d['q4'] ?></td>
                                <td><?= $d['sq4'] ?></td>
                                <td><?= $d['q5'] ?></td>
                                <td><?= $d['sq5'] ?></td>
                                <td><?= $d['q6'] ?></td>
                                <td><?= $d['sq6'] ?></td>
                                <td><?= $d['q7'] ?></td>
                                <td><?= $d['sq7'] ?></td>
                                <td><?= $d['q8'] ?></td>
                                <td><?= $d['sq8'] ?></td>
                                <td><?= $d['q9'] ?></td>
                                <td><?= $d['sq9'] ?></td>
                                <td><?= $d['q10'] ?></td>
                                <td><?= $d['sq10'] ?></td>
                                <td><?= $d['q11'] ?></td>
                                <td><?= $d['sq11'] ?></td>
                                <td><?= $d['q12'] ?></td>
                                <td><?= $d['sq12'] ?></td>
                                <td><?= $d['q13'] ?></td>
                                <td><?= $d['sq13'] ?></td>
                                <td><?= $d['q14'] ?></td>
                                <td><?= $d['sq14'] ?></td>
                                <td><?= $d['q15'] ?></td>
                                <td><?= $d['sq15'] ?></td>
                                <td><?= $d['q16'] ?></td>
                                <td><?= $d['sq16'] ?></td>
                                <td><?= $d['q17'] ?></td>
                                <td><?= $d['sq17'] ?></td>
                                <td><?= $d['q18'] ?></td>
                                <td><?= $d['sq18'] ?></td>
                                <td><?= $d['q19'] ?></td>
                                <td><?= $d['sq19'] ?></td>
                                <td><?= $d['q20'] ?></td>
                                <td><?= $d['sq20'] ?></td>
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
    $('#hasil').DataTable({
        scrollX: true,
    });
</script>