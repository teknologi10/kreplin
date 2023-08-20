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