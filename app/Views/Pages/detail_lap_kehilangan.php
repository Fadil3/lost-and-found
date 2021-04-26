<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="container">
        <h3 class="mt-5 sub-title font-weight-bold text-center">
            Laporan Kehilangan
        </h3>
        <section class="hero">
            <div class="row mt-5">
                <div class="col-md-6 mt-5 text-center">
                    <div class="col-md-4 m-3">
                        <img src="../images/<?= $barang['foto_barang']; ?>" class="align-item-center" alt="..."
                            style="max-width: 275px;">
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <p>Nama Barang : <?= $barang['nama_barang']; ?></p>
                    <p>Waktu Hilang : <?= $barang['waktu_barang']; ?></p>
                    <p>Lokasi Hilang : <?= $barang['lokasi_barang']; ?></p>
                    <p>Ciri-ciri Barang : <?= $barang['deskripsi_barang']; ?></p>
                    <p>Pemilik Barang : xxxxxxx</p>
                    <p>Hubungi Pencari melalui</p>
                    <a href="#" class="btn btn-success mt-2 mr-5">Whatsapp</a>
                    <a href="#" class="btn btn-danger mt-2 mr-5">E-Mail</a>
                    <a href="#" class="btn btn-primary mt-2">Facebook</a>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <p class="text-center mt-5">Sudah kontak pencari dan memastikan itu adalah barang pencari ?</p>
        <p class="text-center mb-4">Jika sudah, silahkan tekan tombol di bawah !</p>
    </div>

    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <button class="btn btn-light mt-2 mb-5 p-2" style="background-color: #8F00FF;" type="button">
                <span class="text-white">Saya telah menemukan barang Ini!</span>
            </button>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
