<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="wrap-container">
    <div class="container">
        <div class="text-center row-padding">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Create Account</h4>
                <form action="/register/save" method="post">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="name" class="form-control" placeholder="Full name" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" style="max-width: 120px;">
                            <option value="1">+62</option>
                            <option value="1">+63</option>
                            <option value="2">+64</option>
                            <option value="3">+65</option>
                        </select>
                        <input name="no_telepon" class="form-control" placeholder="Phone number" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                        </div>
                        <input name="address" class="form-control" placeholder="Address" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email address" id="name" type="email">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="password" class="form-control" placeholder="Create password" id="pw" type="password">
                    </div>
                    <p>Media Sosial</p>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-instagram"></i> </span>
                        </div>
                        <input name="instagram" class="form-control" placeholder="Instagram" type="text">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-facebook"></i> </span>
                        </div>
                        <input name="facebook" class="form-control" placeholder="Facebook" type="text">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" value="Register" onclick="store()">
                            Create Account </button>
                    </div>
                    <p class="text-center">Have an account? <a href="login.html">Log In</a> </p>
                </form>
            </article>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
