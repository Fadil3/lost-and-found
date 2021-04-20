<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
        <h3 class="mt-5 sub-title font-weight-bold text-center">
            About Us
        </h3>
        <section class="hero">
            <div class="row mt-5">
                <div class="col-md-4 mt-5 mb-5 text-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/1.jpg" class="card-img-top" alt="ilham">
                        <div class="card-body">
                          <p class="card-text text-center">Muhammad Ilham Malik</p>
                          <p class="card-text text-center">Ilmu Komputer C1</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 mb-5 text-center ">
                    <div class="card" style="width: 18rem;">
                        <img src="images/2.jpg" class="card-img-top" alt="fadil">
                        <div class="card-body">
                          <p class="card-text text-center">Muhammad Rayhan F.</p>
                          <p class="card-text text-center">Ilmu Komputer C1</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 mb-5 text-center">
                    <div class="card" style="width: 18rem;">
                        <img src="images/3.jpg" class="card-img-top" alt="fadhli">
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