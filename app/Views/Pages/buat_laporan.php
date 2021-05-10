<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> 

<div class="container mt-5">
    <?php if (session()->getFlashdata('msg')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('msg2')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg2') ?></div>
    <?php endif; ?>
    <h2 class="text-center mb-5">Buat Laporan</h2>
    <form action="/barang/add" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="inputJenis" class="col-sm-2 col-form-label">Jenis Laporan :</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <select name="status" class="custom-select" id="inputGroupSelect01">
                        <option <?= old('status') == null ? 'selected' : ''; ?>>Jenis Laporan...</option>
                        <option <?= old('status') == "1" ? 'selected' : ''; ?> value="1">Laporan Penemuan</option>
                        <option <?= old('status') == "Laporan Kehilangan" ? 'selected' : ''; ?>value="0">Laporan
                            Kehilangan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputKategori" class="col-sm-2 col-form-label">Kategori Barang :</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <select name="kategori" class="custom-select" id="inputGroupSelect01">
                        <option <?= old('kategori') == null ? 'selected' : ''; ?> selected>Kategori barang ...</option>
                        <option <?= old('kategori') == 'Elektronik'  ? 'selected' : ''; ?> value="Elektronik">Elektronik
                        </option>
                        <option <?= old('kategori') == 'Dokumen' ? 'selected' : ''; ?> value="Dokumen">Dokumen</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputKategori" class="col-sm-2 col-form-label">Nama Barang :</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" id="inputLokasi" placeholder="Nama Barang"
                        required value="<?= old('name'); ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputWaktu" class="col-sm-2 col-form-label">Waktu :</label>
            <div class="col-sm-10">
                <input type="date" name="time" value="<?= old('time'); ?>" class="form-control" id="inputWaktu"
                    placeholder="Waktu Hilang" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLokasi" class="col-sm-2 col-form-label">Lokasi :</label>
            <div class="col-sm-10">
                <input type="text" name="location" value="<?= old('location'); ?>" class="form-control" id="inputLokasi"
                    placeholder="lokasi" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="sampul" class="col-sm-2 col-form-label">Gambar :</label>
            <div class="col-sm-2">
                <img src="/images/default.png" class="img-thumbnail img-preview">
            </div>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                        type="file" id="sampul" name="sampul" onchange="previewImg()">
                    <label class="custom-file-label " for="sampul">Upload gambar...</label>
                    <div class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="form-group row">
            <label for="inputCiri" class="col-sm-2 col-form-label">Ciri - Ciri :</label>
            <div class="col-sm-10">
                <div class="form-group">
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                        rows="3"><?= old('description'); ?></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-12 mt-5">
                <button type="submit" class="btn btn-primary" name="btn" value="Save">Buat Laporan Barang</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>
