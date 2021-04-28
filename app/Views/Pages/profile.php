<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 mt-5 text-center">
            <h3 class="text-left mb-3">Profile Saya</h3>
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-3 m-2">
                        <img src="images/1.jpg" class="align-item-center" alt="..." style="max-width: 200px;">
                    </div>
                    <div class="col-md-3">
                        <div class="card-body text-left">
                            <p class="card-text"><?= $user['user_name'] ?></p>
                            <p class="card-text"><?= $user['user_no_telepon'] ?></p>
                            <p class="card-text"><?= $user['user_alamat'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body text-left">
                            <h5>Social Media</h5>
                            <p class="card-text"><i class="fab fa-instagram mr-2">&nbsp;</i><?= $user['user_instagram'] ?></p>
                            <p class="card-text"><i class="fab fa-facebook mr-2">&nbsp;</i><?= $user['user_facebook'] ?></p>
                        </div>
                    </div>
                    <div class="col-md-2 mt-5 mb-3">
                        <a href="#" class="btn btn-warning">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12 mt-5 text-center mb-5">
            <h3 class="text-center mb-5">Laporan Saya</h3>
            <div class="d-flex justify-content-center">
                <div class="card mr-5">
                    <div class="col-md-12">
                        <div class="card-body text-center font-weight-bold">
                            <p class="card-text">Laporan yang telah disetujui oleh admin</p>
                            <a href="#" class="btn btn-success mt-5">Cek Laporan</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="col-md-12">
                        <div class="card-body text-center font-weight-bold">
                            <p class="card-text">Laporan yang telah disetujui oleh admin</p>
                            <a href="#" class="btn btn-success mt-5">Cek Laporan</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
