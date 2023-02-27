<?= $this->include('header') ?>
<div class="content-wrapper">
    <section class="content mx-2">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div>
                </div>
                <?php if ($grafik > 0) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Grafik Perbandingan</h3>
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
                                        <canvas id="myChart" height="100"></canvas>
                                    </div>
                                    <form role="form" action="<?= base_url(); ?>/laporan/grafik" method="post" enctype="multipart/form-data">

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
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
                                <form role="form" action="<?= base_url(); ?>/laporan/index" method="post" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <?= csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Awal</label>
                                                    <input type="date" name="awal" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Akhir</label>
                                                    <input type="date" name="akhir" class="form-control">
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
                                                <button type="submit" class="btn btn-success col-sm-12 mt-2" name="submit" value="submit">Cari</button>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php if ($grafik > 0) { ?>
    <?php foreach ($grafik as $key => $d) {
        $periode[] = label_grafik($d['periode']);
        $blibli[] = $d['blibli'];
        $shopee[] = $d['shopee'];
        $tokped[] = $d['tokped'];
    } ?>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($periode) ?>,
                datasets: [{
                        label: 'BliBli',
                        backgroundColor: 'rgba(0,143,210, 1)',
                        borderColor: 'rgba(0,143,210,0.8)',
                        pointRadius: false,
                        pointColor: '#0095da',
                        pointStrokeColor: 'rgba(0,143,210, 1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(0,143,210, 1)',
                        data: <?php echo json_encode($blibli) ?>
                    },
                    {
                        label: 'Shopee',
                        backgroundColor: 'rgba(239,66,46, 1)',
                        borderColor: 'rgba(239,66,46, 1)',
                        pointRadius: false,
                        pointColor: '#f84a2f',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: <?php echo json_encode($shopee) ?>
                    },
                    {
                        label: 'Tokopedia',
                        backgroundColor: 'rgba(64,175,71, 1)',
                        borderColor: 'rgba(64,175,71, 1)',
                        pointRadius: false,
                        pointColor: '#6D7588',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: <?php echo json_encode($tokped) ?>
                    },
                ]
            },
            options: {
                scaleShowLabels: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }

            }
        });
    </script>
<?php } ?>
<?= $this->include('footer') ?>