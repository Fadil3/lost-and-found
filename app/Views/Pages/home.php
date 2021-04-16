<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <section class="hero">
        <div class="row mt-5">
            <div class="col-md-6 mt-5 ">
                <div class="">
                    <img src="images/banner-home.png" loading="lazy" class="img-fluid def-size" alt=" fe-template" />
                </div>
            </div>
            <div class="col-md-6 mt-5 text-center ">
                <h3 class="mt-5 sub-title">
                    Mempertemukan penemu dan pencari barang yang hilang
                </h3>
                <div class="mt-3">
                    <a href="#why" class="btn btn-primary mt-1">Saya Menemukan Barang</a>
                    <a href="#why" class="btn btn-success mt-1 ml-2">Saya Kehilangan Barang</a>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
