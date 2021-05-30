<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
<?php if (session()->getFlashdata('msg_tolak')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg_tolak') ?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('msg_konfirmasi')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('msg_konfirmasi') ?></div>
<?php endif; ?>
    <h3 class="mt-5 sub-title font-weight-bold text-center">
        Klaim Barang <?= $data_barang['nama_barang']; ?>
    </h3>
    <p class="text-center ml-5 mr-5 pt-5">
        Berikut ini adalah daftar klaim dari laporan yang anda buat.
    </p>
    <p class="text-center">
        Apakah yang bersangkutan telah menghubungi Anda dan mengkonfirmasi barang miliknya ?  
    </p>
    <p class="text-center">
        Jika <span class="font-weight-bold">Iya</span>, Silahkan melakukan konfirmasi !  
    </p>
    <section class="hero">
    <?php foreach($barang as $b) :?> 
    <?php if($id_barang == $b->id_barang && $id_status == $b->id_korban && $b->konfirmasi_pengajuan != 1) : ?>
        <div class="row mt-5">
            <div class="col-md-3 mt-5 text-center">
            </div>
            <div class="col-md-6 mt-5 text-center">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4 m-3">
                            <?php if($b->img == "")  :?>
                            <img src="/images/foto_profile/default-profile.png" class="img-thumbnail img-preview">
                            <?php endif ?>
                            <?php if($b->img != "")  :?>
                            <img src="/images/foto_profile/<?= $b->img; ?>"
                                class="img-thumbnail img-preview">
                            <?php endif ?>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <p class="card-text"><?= $b->nama_user; ?></p>
                                <p class="card-text"><?= $b->no_telepon;?></p>
                                <p class="card-text"><?= $b->waktu_diajukan;?></p>
                            </div>
                        </div>
                        <div class="col-md-2 mt-4">
                        <form action="/pengajuanbarang/konfirmasikehilangan/<?= $b->id_barang; ?>/<?= $b->id_penemu; ?>/<?= $b->id_korban;?>">
                            <button class="btn btn-success" type="submit">
                                <span class="text-white">Terima</span>
                            </button>
                        </form>
                        <form action="/pengajuanbarang/deletepengajuankehilangan/<?= $b->id_pengajuan;?>/<?= $b->id_korban;?>/<?= $b->id_barang;?>"> 
                            <button class="btn btn-danger mt-3" type="submit">
                                <span class="text-white">Tolak</span>
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
