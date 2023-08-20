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
                                    <h3>Data Tes</h3>
                                </div>
                                <div class="content text-start">
                                    <h5>Username : <?= session('username'); ?></h5>
                                    <h5>Waktu : <?= session('waktu'); ?> Menit</h5>
                                </div>
                                <br>
                                <form action="<?= base_url() ?>/website/mulai" method="post">

                                    <button id="info" type="submit" name="submit" value="mulai" class="default-btn">
                                        Mulai Tes
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