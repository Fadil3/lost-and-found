<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="wrap-container mt-5">
    <div class="container">
        <div class="row row-padding justify-content-center">
            <div class="col-md-4 text-center">
                <form action="/login/auth" method="post" class="form-signin">
                    <h1 class="font-weight-bold mb-5">Lost and Found</h1>
                    <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <!-- <h5 class="h3 mb-3 font-weight-normal">Please sign in</h5> -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="far fa-envelope"></i> </span>
                        </div>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input name="email" type="email" id="userName" class="form-control" placeholder="Email address"
                            required autofocus>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-lock"></i> </span>
                        </div>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input name="password" type="password" id="userPw" class="form-control" placeholder="Password"
                            required autofocus>
                    </div>
                    <div class="checkbox m-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="check()">Sign
                        in</button>
                    <p class="m-3 mb-5 sub-title">Dont Have an Account ? <a href="/register">Register</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
