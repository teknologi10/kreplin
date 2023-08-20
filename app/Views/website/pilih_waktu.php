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
                                <div class="content">
                                    <?php if (session()->getFlashdata('pesan')) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= session()->getFlashdata('pesan'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <br>
                                    <h3>Pilihan Waktu</h3>
                                </div>
                                <br>
                                <form action="<?= base_url() ?>/website/data" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="radio" class="btn-check" name="waktu" value="30" id="danger-outlined" autocomplete="off" onclick="check()">
                                                <label class="btn btn-outline-info" for="danger-outlined">
                                                    <div class="content" style="margin: 20px;">
                                                        <h3> 30 Menit</h3>
                                                    </div>
                                                </label>
                                                <br>
                                                <!-- <p class="btn btn-danger mt-2">Salah</p> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="radio" class="btn-check" name="waktu" value="60" id="success-outlined" autocomplete="off" onclick="check()">
                                            <label class="btn btn-outline-info" for="success-outlined">
                                                <div class="content" style="margin: 20px;">
                                                    <h3> 60 Menit</h3>
                                                </div>
                                            </label>
                                            <br>
                                            <!-- <p class="btn btn-success mt-2">Benar</p> -->
                                        </div>
                                    </div>

                                    <button id="info" type="submit" name="submit" value="submit" class="default-btn" disabled>
                                        Lanjut
                                    </button>
                                </form>
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
</script>