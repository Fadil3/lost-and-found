<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h3 class="mt-5 sub-title font-weight-bold text-center">
        Laporan Kehilangan
    </h3>
    <section class="search">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <!-- <input class="mt-3 form-control" id="namesearch" type="text" name="namabarang"
                    placeholder="Nama Barang"> -->
                <section class="d-flex justify-content-around mt-5">
                    <input class="form-control mr-sm-2" id="namesearch" name="namabarang" type="search"
                        placeholder="Cari nama barang" aria-label="Search">
                    <button id="btn-search" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                </section>
                <a class=" d-flex justify-content-center mt-3" href="/lap_kehilangan">Reset Pencarian</a>
            </div>
        </div>
    </section>
    <section class="hero " id="listBarang">
        <?php foreach($barang as $b) : ?>
        <div class="row mt-2  list">
            <div class="col-md-6 mt-5 text-center mx-auto">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 m-3">
                            <img src="images/<?= $b->foto_barang; ?>" class="align-item-center" alt="..."
                                style="max-width: 150px;">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <p class="card-text nama"><?= $b->nama_barang; ?></p>
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

        <script src="js/search.js"></script>
    </section>
</div>
<?= $this->endSection(); ?>
