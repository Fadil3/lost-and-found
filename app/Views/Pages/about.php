<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="mt-5 sub-title font-weight-bold text-center">
        About Us
    </h3>
    <section class="hero">
        <div class="row mt-5 d-flex">
            <div class="col-md-4 mt-5 mb-5 text-center ">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="images/foto_about/1.jpeg" class="card-img-top mx-auto d-block" alt="ilham"
                        style="height: 250px; width:200px">
                    <div class="card-body">
                        <p class="card-text text-center">Muhammad Ilham Malik</p>
                        <p class="card-text text-center">Ilmu Komputer C1</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mb-5 text-center ">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="images/foto_about/2.png" class="card-img-top mx-auto d-block" alt="fadil"
                        style="height: 250px; width:200px">
                    <div class="card-body">
                        <p class="card-text text-center">Muhammad Rayhan F.</p>
                        <p class="card-text text-center">Ilmu Komputer C1</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5 mb-5">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="images/foto_about/3.jpeg" class="card-img-top mx-auto d-block" alt="fadhli"
                        style="height: 250px; width:200px">
                    <div class="card-body">
                        <p class="card-text text-center">Fadhlirrahman K.</p>
                        <p class="card-text text-center">Ilmu Komputer C1</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>
