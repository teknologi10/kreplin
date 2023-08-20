<?= $this->include('website/header') ?>
<!-- Start Main Banner Area -->
<div class="main-banner">
    <div class="main-banner-item banner-item-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <div class="event-details-information">
                                <h3>Hasil Tes Peserta</h3>

                                <div class="tes">
                                    <canvas id="myChart"></canvas>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/1.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-XulchVN83YTvsOaBGjLeApZuasKd8F4ZZ28/aMHevKjzrrjG0lor+T4VU248fWYMNki3Eimk+uwdlQS+uZmu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <?php if (!empty($tes)) { ?>
                                        <?php
                                        $x = 1;
                                        while ($x <= 20) {
                                            $benar[] = $tes['q' . $x];
                                            $salah[] = $tes['sq' . $x];
                                            $x++;
                                        }
                                        ?>
                                        <script>
                                            var ctx = document.getElementById('myChart');

                                            new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'Q9', 'Q10', 'Q11', 'Q12', 'Q13', 'Q14', 'Q15', 'Q16', 'Q17', 'Q18', 'Q19', 'Q20'],
                                                    datasets: [{
                                                            label: 'Benar',
                                                            data: <?php echo json_encode($benar) ?>,
                                                            borderWidth: 1
                                                        },
                                                        {
                                                            label: 'Salah',
                                                            data: <?php echo json_encode($salah) ?>,
                                                            borderWidth: 1
                                                        }
                                                    ]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                    }
                                                }
                                            });
                                        </script>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="event-details-information">
                                <h3>Data Diri</h3>

                                <ul>
                                    <li>
                                        <span>Username :</span><br>
                                        <?= session('username') ?>
                                    </li>
                                    <li>
                                        <div class="option-item">
                                            <a href="<?= base_url() ?>/website" class="default-btn">Tes Lagi</a>
                                        </div>
                                    </li>
                                </ul>
                                <br>
                                <ul>
                                    <li>
                                        <span>History Tes</span>
                                    </li>
                                    <li>
                                        <select name="history" id="history" class="form-select" onchange="history()">
                                            <option value="">--Pilih Tes--</option>
                                            <?php $no = 1;
                                            foreach ($history as $h) : ?>
                                                <option value="<?= $h['id']; ?>">Tes Ke-<?= $no++; ?> <?= date('d-m-Y', strtotime($h['selesai'])); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-banner-shape">
        <div class="banner-bg-shape">
            <img src="<?= base_url() ?>/theme/ketan/assets/img/main-banner/banner-bg-shape-1.png" class="white-image" alt="image">
        </div>

        <div class="banner-bg-shape-2">
            <img src="<?= base_url() ?>/theme/ketan/assets/img/main-banner/banner-bg-shape-2.png" class="white-image" alt="image">
        </div>

        <div class="banner-child">
            <div class="child-2">
                <!-- <img src="<?= base_url() ?>/theme/ketan/assets/img/main-banner/kalkulator.png" width="300" alt="image"> -->
            </div>
            <div class="child-2">
                <!-- <img src="<?= base_url() ?>/theme/ketan/assets/img/main-banner/pensil.png" width="300" alt="image"> -->
            </div>
        </div>
    </div>
</div>
<!-- End Main Banner Area -->
<?= $this->include('website/footer') ?>


<script>
    function history() {
        var tes = $("#history").val()
        $.ajax({
            type: 'POST',
            data: {
                tes: tes
            },
            url: "<?= base_url('website/history') ?>",
            // async: true,
            success: function(data) {
                // alert(data);
                $('.tes').html(data);
            }
        });
    }
</script>