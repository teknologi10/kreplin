<?= $this->include('website/header') ?>
<!-- Start Main Banner Area -->
<div class="main-banner">
    <div class="main-banner-item banner-item-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="main-banner-content">
                        <div class="col-lg-12">
                            <div class="quote-item" style="border-radius: 25px; margin:5px;">
                                <div class="content text-end" style="margin: 5px;">
                                    <div class="option-item">
                                        <button class="default-btn">
                                            <h4 id="demo" class="text-white"></h4>
                                        </button>

                                    </div>
                                    <!-- <img src="<?= base_url() ?>/theme/ketan/assets/img/main-banner/logo2.svg" class="white-image" width="250" alt="image"> -->
                                </div>
                                <br>
                                <!-- <form> -->
                                <div class="soal">
                                    <input type="hidden" name="jawaban" value="<?= $jawaban ?>">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <div class="content" style="margin: 15px;">
                                        <a href="#" class="optional-btn">
                                            <h3><?= $angka1 ?> + <?= $angka2 ?> = <?= $hasil ?></h3>
                                        </a>
                                        <!-- <h3><?= $angka1 ?> + <?= $angka2 ?> = <?= $hasil ?></h3> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="radio" class="btn-check" name="jawab" value="0" id="danger-outlined" autocomplete="off" onclick="check()">
                                            <label class="btn btn-outline-danger" for="danger-outlined">
                                                <div class="content" style="margin: 20px;">
                                                    <h3> Q</h3>
                                                </div>
                                            </label>
                                            <br>
                                            <p class="btn btn-danger mt-2">Salah</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="radio" class="btn-check" name="jawab" value="1" id="success-outlined" autocomplete="off" onclick="check()">
                                        <label class="btn btn-outline-success" for="success-outlined">
                                            <div class="content" style="margin: 20px;">
                                                <h3> P</h3>
                                            </div>
                                        </label>
                                        <br>
                                        <p class="btn btn-success mt-2">Benar</p>
                                    </div>
                                </div>
                                <br>
                                <button id="info" class="col-10 default-btn" disabled onclick="jawabannya();">
                                    Spasi
                                </button>
                                <!-- </form> -->
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
            <div class="child-1">
                <img src="<?= base_url() ?>/theme/ketan/assets/img/main-banner/kalkulator.png" width="300" alt="image">
            </div>

            <div class="child-2">
                <img src="<?= base_url() ?>/theme/ketan/assets/img/main-banner/pensil.png" width="300" alt="image">
            </div>
        </div>
    </div>
</div>
<!-- End Main Banner Area -->
<?= $this->include('website/footer') ?>
<script>
    function check() {
        if ((document.getElementById('success-outlined').checked || (document.getElementById('danger-outlined').checked))) {
            document.getElementById('info').disabled = false;
        }
    }

    // Set the date we're counting down to
    var countDownDate = new Date("<?php echo session('selesai') ?>").getTime();

    // membuat url tujuan
    var url = "<?php echo base_url() ?>/website/hasil_akhir";

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if (hours > 0) {
            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = "60m 00s";
        } else {
            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
        }
        // If the count down is over, write some text 
        if (distance < 0) {
            window.location.href = url;
            clearInterval(x);
            document.getElementById("demo").innerHTML = "SELESAI";
        }
        check();
    }, 1000);
</script>
<script>
    function jawabannya() {
        var jawab = $("input:radio[name=jawab]:checked").val()
        var jawaban = $("input:hidden[name=jawaban]").val()
        if (jawab == undefined) {
            // alert('salah');

        } else {
            // alert('benar');
            $.ajax({
                type: 'POST',
                data: {
                    jawab: jawab,
                    jawaban: jawaban
                    // kode_lapangan: kode_lapangan
                },
                url: "<?= base_url('website/jawab') ?>",
                async: true,
                success: function(data) {
                    document.getElementById('success-outlined').checked = false;
                    document.getElementById('danger-outlined').checked = false;
                    $('.soal').html(data);
                }
            });
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
    $(window).keypress(function(e) {
        //Captures 'a' or 'b'
        if (e.which == 113 || e.which == 112 || e.which == 32) {
            switch (e.which) {
                case 113:
                    $("#danger-outlined").prop("checked", true);
                    break;
                case 112:
                    $("#success-outlined").prop("checked", true);
                    break;
                case 32:
                    $("#info").click();

            }
        }
        check();
    });

    window.addEventListener('keydown', function() {
        if (event.keyCode == 32) {
            document.body.style.overflow = "hidden";
        }
    });
    window.addEventListener('keyup', function() {
        if (event.keyCode == 32) {
            document.body.style.overflow = "auto";
        }
    });
</script>