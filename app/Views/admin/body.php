<?= $this->include('admin/header') ?>
<div class="content-wrapper">
    <section class="content mx-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Produksi</h3>
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
                                <div class="chart">
                                    <canvas id="myChart" width="100%" height="35"></canvas>
                                </div>
                                <form role="form" action="<?= base_url(); ?>/admin/index" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Bulan</label>
                                                        <select class="form-control" name="bulan" required>
                                                            <option value="">--Pilih Bulan--</option>
                                                            <option value="01">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Maret</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Juni</option>
                                                            <option value="07">Juli</option>
                                                            <option value="08">Agustus</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Tahun</label>
                                                        <select class="form-control" name="tahun" required>
                                                            <option value="">--Pilih Tahun--</option>
                                                            <?php foreach ($tahun as $t) : ?>
                                                                <option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label for=""></label>
                                                    <button type="submit" class="btn btn-success col-sm-12 mt-2" name="submit" value="submit">Submit</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url(); ?>/theme/admin/assets/plugins/chart.js/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/1.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-XulchVN83YTvsOaBGjLeApZuasKd8F4ZZ28/aMHevKjzrrjG0lor+T4VU248fWYMNki3Eimk+uwdlQS+uZmu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
if ($lhp) {
    foreach ($lhp as $key => $d) {
        $tanggal = substr($d['tgl_produksi'], 8);
        $tgl[] = $tanggal;
        $ra[] = $d['ra'];
        $ri[] = $d['ri'];
    } ?>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($tgl) ?>,
                datasets: [{
                        label: 'Ra',
                        data: <?php echo json_encode($ra) ?>,
                        backgroundColor: '#dc3545'

                    },
                    {
                        label: 'Ri',
                        data: <?php echo json_encode($ri) ?>,
                        backgroundColor: '#28a745'

                    }
                ]
            },
            options: {
                scaleShowLabels: false,
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        color: 'black',
                        align: 'end',
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Grafik RaRi '
                }

            },
            plugins: [ChartDataLabels],
        });
        <?php } ?>
    </script>
    <?= $this->include('admin/footer') ?>