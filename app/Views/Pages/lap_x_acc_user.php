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
            <div class="col-md-10 mt-5 mx-auto text-center">
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
                        <div class="col-md-4 mt-xl-5 mt-4 mb-3">
                            <a href="#" class="btn btn-warning">Edit Laporan</a>
                            <a href="#" class="btn btn-danger mt-xl-1 mt-md-2">Hapus Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if($barang == null) : ?>
        <h3 class="mt-5 text-center text-secondary">Tidak ada data</h3>
        <?php endif ?>
    </section>
    <section class="hero">
        <h4 class="mt-5 sub-title font-weight-bold text-left">
            Laporan Kehilangan Saya
        </h4>
        <div class="row mt-3">
            <?php foreach($barangKehilangan as $b) : ?>
            <div class="col-md-10 mt-5 mx-auto text-center">
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
                        <div class="col-md-4 mt-xl-5 mt-4 mb-3">
                            <a href="#" class="btn btn-warning">Edit Laporan</a>
                            <a href="#" class="btn btn-danger mt-xl-1 mt-md-2">Hapus Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if($barang == null) : ?>
        <h3 class="mt-5 text-center text-secondary">Tidak ada data</h3>
        <?php endif ?>
    </section>
</div>


<?= $this->endSection(); ?>
