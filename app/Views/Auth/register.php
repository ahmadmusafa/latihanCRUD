<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>


<div class="container mt-5">
        <a
            href="<?= base_url('tugas') ?>"
            class="btn-back">
            <i class="bi bi-arrow-left"></i>
        </a>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Daftar Akun</h4>
                </div>

                <div class="card-body">

                    <?= view('App\Views\Auth\_message_block') ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="<?= old('email') ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   value="<?= old('username') ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                   name="pass_confirm"
                                   class="form-control"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Daftar
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        Sudah punya akun?
                        <a href="<?= url_to('login') ?>">Login</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>