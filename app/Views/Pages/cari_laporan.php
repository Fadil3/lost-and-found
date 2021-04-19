<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-5">Cari Laporan</h2>
    <form action="#" method="GET">
        <div class="form-group row">
            <label for="inputJenis" class="col-sm-2 col-form-label">Jenis Laporan :</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Jenis Laporan...</option>
                        <option value="1">Laporan Penemuan</option>
                        <option value="2">Laporan Pencarian</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori Barang :</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Kategori barang ...</option>
                        <option value="1">Elektronik</option>
                        <option value="2">Dokumen</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputKategori" class="col-sm-2 col-form-label">Nama Barang :</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="inputLokasi" placeholder="Nama Barang" required>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputWaktu" class="col-sm-2 col-form-label">Waktu :</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputWaktu" placeholder="Waktu Hilang" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLokasi" class="col-sm-2 col-form-label">Lokasi :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputLokasi" placeholder="lokasi" required>
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-12 mt-5">
                <button type="submit" class="btn btn-primary">Cari Laporan Barang</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
