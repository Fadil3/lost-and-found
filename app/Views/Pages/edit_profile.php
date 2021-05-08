<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="wrap-container">
    <div class="container">
        <div class="text-center row-padding">
            <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
            <?php endif; ?>
            <article class="card-body mx-auto col-md-8">
                <h4 class="card-title mt-3 text-center">Edit Profile</h4>
                <form action="/profile/edit/<?= $user['user_id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="name"
                            class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>"
                            placeholder="Full name" type="text" value="<?= old('name',$user['user_name']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input name="no_telepon"
                            class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>"
                            placeholder="Phone number" type="text"
                            value="<?= old('no_telepon',$user['user_no_telepon']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_telepon'); ?>
                        </div>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                        </div>
                        <input name="address"
                            class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>"
                            placeholder="Address" type="text" value="<?= old('address',$user['user_alamat']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('address'); ?>
                        </div>
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email"
                            class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                            placeholder="Email address" id="name" type="email"
                            value="<?= old('email',$user['user_email']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div> <!-- form-group// -->
                    <!-- <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="password" class="form-control pwd" placeholder="Isi untuk ganti password" id="pw"
                            type="password">
                        <span class="input-group-btn">
                            <button class="btn btn-default reveal" type="button"><i class="fas fa-eye"></i></button>
                        </span>
                    </div> -->
                    <p>Media Sosial</p>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-instagram"></i> </span>
                        </div>
                        <input name="instagram"
                            class="form-control <?= ($validation->hasError('instagram')) ? 'is-invalid' : ''; ?>"
                            placeholder="Instagram" type="text"
                            value="<?= old('instagram',$user['user_instagram']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('instagram'); ?>
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-facebook"></i> </span>
                        </div>
                        <input name="facebook"
                            class="form-control  <?= ($validation->hasError('facebook')) ? 'is-invalid' : ''; ?>"
                            placeholder="Facebook" type="text" value="<?= old('facebook',$user['user_facebook']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('facebook'); ?>
                        </div>
                    </div>
                    <p>Foto Profile</p>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <?php if($user['user_img'] == "")  :?>
                            <img src="/images/foto_profile/default-profile.png" class="img-thumbnail img-preview">
                            <?php endif ?>
                            <?php if($user['user_img'] != "")  :?>
                            <img src="/images/<?=old('user_img',$user['user_img']); ?>; ?>"
                                class="img-thumbnail img-preview">
                            <?php endif ?>
                        </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input
                                    class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                                    type="file" id="sampul" name="sampul" onchange="previewImg()">
                                <label class="custom-file-label " for="sampul">Upload gambar...</label>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('sampul'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" value="Register">
                            Edit Profile </button>
                    </div>
                </form>
            </article>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
