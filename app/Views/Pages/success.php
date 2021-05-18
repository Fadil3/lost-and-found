<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mb-5">
    <div class="d-grid gap-2 d-flex justify-content-center">
        <img src="images/success.png" style="max-width: 300px;" class=" mt-3 mb-2" alt=" fe-template" />
    </div>
    <h3 class="ml-3 mb-4  mx-auto d-flex justify-content-center sub-title text-center">
        Klaim Barang Telah Berhasil!
    </h3>
    <div class="d-grid gap-2 mx-auto d-flex justify-content-center">
        <a class="btn btn-primary ml-3 mb-5" href="/">Kembali ke Home</a>
    </div>
</div>
<?= $this->endSection(); ?>
