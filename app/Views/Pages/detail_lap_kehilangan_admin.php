<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?> 
<?php  
    $twitter ="[DICARI] ".$barang['nama_barang']."\nLokasi hilang : ".$barang['lokasi_barang']."\nCiri-ciri : ".$barang['deskripsi_barang'];
    $url = current_url();
    $formatWA = "Halo, saya menemukan barang yang anda cari.\n Nama Barang : ".$barang['nama_barang'];
    $formatEmail_subject = "Penemuan ".$barang['nama_barang'];
    $formatEmail_body = "Halo, saya menemukan barang yang anda cari.\n Nama Barang : ".$barang['nama_barang'];
    $tes = "http://mrayhanfadil.cehiji.com/";
?>
<div class="container">
    <div class="container">
        <h3 class="mt-5 sub-title font-weight-bold text-center">
            Laporan Kehilangan
        </h3>
        <section class="hero">
            <div class="row mt-5">
                <div class="col-md-6 mt-5 text-center">
                    <div class="col-md-4 m-3">
                        <img src="/images/<?= $barang['foto_barang']; ?>" class="align-item-center" alt="..."
                            style="max-width: 275px;">
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <p>Nama Barang : <?= $barang['nama_barang']; ?></p>
                    <p>Waktu Hilang : <?= $barang['waktu_barang']; ?></p>
                    <p>Lokasi Hilang : <?= $barang['lokasi_barang']; ?></p>
                    <p>Ciri-ciri Barang : <?= $barang['deskripsi_barang']; ?></p>
                    <p>Pemilik Barang : <?= $pencari['user_name']; ?></p>
                    <p>Hubungi Pencari melalui</p>

                    <?php if (session()->has('user_id')) : ?>
                    <a href="https://api.whatsapp.com/send?phone=<?= $pencari['user_no_telepon']; ?>&text=<?= urlencode($formatWA); ?>"
                        class="btn btn-success mt-2 mr-5"><i class="fab fa-whatsapp mr-1"></i>Whatsapp</a>
                    <a href="mailto:<?= $pencari['user_email']; ?>&subject=<?= urlencode($formatEmail_subject); ?>body=<?= urlencode($formatEmail_body); ?>"
                        class="btn btn-danger mt-2 mr-5"><i class="far fa-envelope mr-1"></i>E-Mail</a>
                    <a href="https://www.facebook.com/<?= $pencari['user_facebook']; ?>/"
                        class="btn btn-primary mt-2"><i class="fab fa-facebook-f mr-1"></i>Facebook</a>
                    <a href="https://www.instagram.com/<?= $pencari['user_instagram']; ?>/"
                        class="btn btn-secondary mt-2"><i class="fab fa-instagram mr-1"></i>Instagram</a>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['user_id']) == null) : ?>
                    <p class="font-weight-bold">Silahkan <a href="/login">Login</a> untuk melihat kontak pencari barang
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

    <?php if(isset($_SESSION['user_id']) != null) : ?>
    <div class="container">
        <p class="text-center mt-5">Sudah kontak pencari dan memastikan itu adalah barang pencari ?</p>
        <p class="text-center mb-4">Jika sudah, silahkan tekan tombol di bawah !</p>
    </div>

    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <?php if($_SESSION['role'] == 1) :?>
        <form action="/pengajuanbarang/pengajuan/<?= $barang['id_barang']; ?>/<?= $userPenemu['id_penemu']; ?>">
            <button class="btn btn-light mt-2 mb-5 p-2" style="background-color: #8F00FF;" type="submit">
                <span class="text-white">Saya telah menemukan barang Ini!</span>
            </button>
        </form>
        <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="container">
        <div class="col-md-8 mx-auto text-center">
            <p class="font-weight-bold">Share Laporan ini ke sosial media</p>
            <div class="row d-flex justify-content-around">
                <a href="https://twitter.com/intent/tweet/?text=<?= urlencode($twitter); ?>&amp;url=<?= urlencode($url); ?>"
                    target="_blank" rel="noopener" class="btn btn-info mt-2 "><i
                        class="fab fa-twitter mr-1"></i>Twitter</a>
                <button onclick="copyToClipboard()" class="btn btn-secondary mt-2"><i class="far fa-copy mr-1"></i>Copy
                    Url
                    Laporan ini</button>
                <a href="https://facebook.com/sharer/sharer.php?u=<?= urlencode($tes); ?>" target="_blank"
                    rel="noopener" class="btn btn-primary mt-2"><i class="fab fa-facebook-f mr-1"></i>Facebook</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>