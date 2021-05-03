<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> 
<div class="container">
    <h3 class="text-center mt-5">Laporan yang belum diterima</h3>
    <section class="hero">
        <h4 class="mt-5 sub-title font-weight-bold text-left">
            Laporan Penemuan Saya
        </h4>

        <div class="row mt-3">
        <?php foreach($barangPenemuan as $b) : ?>
            <div class="col-md-12 mt-5 mx-auto text-center">
            
                <div class="card ">
                    <div class="row g-0">
                        <div class="col-md-3 m-3">
                            <img src="images/1.jpg" class="align-item-center" alt="..." style="max-width: 200px;">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body text-left">
                                <p class="card-text"><?= $b->nama_barang; ?></p>
                                <p class="card-text"><?= $sess; ?></p>
                                <p class="card-text"><?= $b->waktu_barang; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2 mt-xl-4 mt-2">
                            <a href="#" class="btn btn-primary">Details</a>
                            <a href="#" class="btn btn-success mt-xl-1 mt-md-2">Lihat Klaim</a>
                        </div>
                        <div class="col-md-2 mt-xl-4 mt-2 mb-3">
                            <a href="#" class="btn btn-warning">Edit Laporan</a>
                            <a href="#" class="btn btn-danger mt-xl-1 mt-md-2">Hapus Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>    
        </div>
    </section>
    <section class="hero">
        <h4 class="mt-5 sub-title font-weight-bold text-left">
            Laporan Kehilangan Saya
        </h4>

        <div class="row mt-3">
        <?php foreach($barangKehilangan as $b) : ?>
            <div class="col-md-12 mt-5 mx-auto text-center">
                <div class="card ">
                    <div class="row g-0">
                        <div class="col-md-3 m-3">
                            <img src="images/1.jpg" class="align-item-center" alt="..." style="max-width: 200px;">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body text-left">
                                <p class="card-text"><?= $b->nama_barang; ?></p>
                                <p class="card-text"><?= $sess; ?></p>
                                <p class="card-text"><?= $b->waktu_barang; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2 mt-xl-4 mt-2">
                            <a href="#" class="btn btn-primary">Details</a>
                            <a href="#" class="btn btn-success mt-xl-1 mt-md-2">Lihat Klaim</a>
                        </div>
                        <div class="col-md-2 mt-xl-4 mt-2 mb-3">
                            <a href="#" class="btn btn-warning">Edit Laporan</a>
                            <a href="#" class="btn btn-danger mt-xl-1 mt-md-2">Hapus Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?> 
        </div>
    </section>
</div>


<?= $this->endSection(); ?>