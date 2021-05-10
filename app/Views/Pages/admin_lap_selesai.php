<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="mt-5 sub-title font-weight-bold">
        Admin Panel
    </h3>
    <h3 class="mt-5 sub-title font-weight-bold text-center">
        Laporan yang Telah Selesai
    </h3>
    <section class="hero">
    <?php foreach($barang as $b) : ?>
    <?php if( $b->konfirmasi_pengajuan == 1 && $b->kd_hilang == 'ST-00') :?>
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
                                <p class="card-text"><?= $b->lokasi_barang; ?></p>
                            </div>
                        </div>
                        <div class="col-md-2 mt-4">
                            <a href="#" class="btn btn-primary">Details</a>
                            <form action="/barang/updateHilang/<?= $b->id_barang; ?>">
                                <button class="btn btn-success mt-3" type="submit">
                                    <span class="text-white">Selesai</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-md-3 mt-5 text-center">
            </div>
        </div>
    <?php endif; ?>
    <?php endforeach; ?> 
    </section>
</div>
<?= $this->endSection(); ?>
