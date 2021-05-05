<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="mt-5 sub-title font-weight-bold text-center">
        Laporan Penemuan
    </h3>
    <section class="hero">
        <?php foreach($barang as $b) : ?>
        <div class="row mt-2">
            <div class="col-md-3 mt-5 text-center">
            </div>
            <div class="col-md-6 mt-5 text-center">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 m-3">
                            <img src="images/<?= $b->foto_barang; ?>" class="align-item-center" alt="..."
                                style="max-width: 150px;">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <p class="card-text"><?= $b->nama_barang; ?></p>
                                <p class="card-text"><?= $b->lokasi_barang; ?></p>
                                <p class="card-text"><?= $b->waktu_barang; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2 mt-5 mb-2">
                            <td><a href="/barang/detail/<?= $b->id_barang; ?>" class="btn btn-primary">Detail</a></td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php if($barang == null) : ?>
        <h3 class="mt-5 text-center text-secondary">Tidak ada data</h3>
        <?php endif ?>
    </section>
</div>
<?= $this->endSection(); ?>
