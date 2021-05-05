<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<?php 
$i=0;
?>
<div class="container">
    <h3 class="mt-5 sub-title font-weight-bold">
        Admin Panel
    </h3>
    <h3 class="mt-5 sub-title font-weight-bold text-center">
        Laporan Penemuan
    </h3>
    <section class="hero">
        <?php foreach($barangPenemuan as $b) : ?>
        <div class="row mt-5">
            <div class="col-md-3 mt-5 text-center">
            </div>
            <div class="col-md-6 mt-5 text-center">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 m-3">
                            <img src="images/1.jpg" class="align-item-center" alt="..." style="max-width: 200px;">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <p class="card-text"><?= $b->nama_barang; ?></p>
                                <p class="card-text"><?= $b->waktu_barang; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2 mt-2">
                            <a href="/barang/detail/<?= $b->id_barang; ?>" class="btn btn-primary">Details</a>
                            <a href="/barang/update/<?= $b->id_barang; ?>" class="btn btn-success mt-2">Terima</a>
                            <a href="#" class="btn btn-danger mt-2">Tolak</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-5 text-center">
            </div>
        </div>
        <?php endforeach; ?>
        <?php if($barangPenemuan == null) : ?>
        <h3 class="mt-5 text-center text-secondary">Tidak ada data</h3>
        <?php endif ?>
    </section>
</div>
</div>

<?= $this->endSection(); ?>
