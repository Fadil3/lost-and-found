<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="#">Lost and Found</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin_lap_kehilangan">Laporan Kehilangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin_lap_penemuan">Laporan Penemuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin_lap_selesai">Laporan yang telah selesai</a>
                </li>
            </ul>
            <div class="navbar-nav ml-auto">
                <?php if (session()->has('user_id')) : ?>
                <a class="nav-item nav-link" href="/login/logout">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
