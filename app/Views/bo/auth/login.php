<!-- auth page content -->
<div class="auth-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-sm-5 mb-4 text-white-50">
                    <div>
                        <a href="index.html" class="d-inline-block auth-logo">
                            <!-- <img src="<?= base_url('assets/bo/images/logo-light.png'); ?>" alt="" height="20"> -->
                        </a>
                    </div>
                    <p class="mt-3 fs-15 fw-medium">Login Akun</p>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Selamat Datang Kembali !</h5>
                            <p class="text-muted">Silahkan masukkan username dan password.</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form action="<?= base_url('auth/login'); ?>" method="post">
                                <?= csrf_field(); ?>

                                <?php if (!is_null(session()->get('error'))) { ?>
                                    <div class="alert alert-danger">
                                        <?= session()->get('error'); ?>
                                    </div>
                                <?php } ?>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" required>
                                    <?= (!is_null(session()->has('errors.username'))) ? '<label class="text-danger">' . session()->get('errors.username') . '</label>' : ''; ?>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Enter password" id="password-input" required>
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon" onclick="showpassword()"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                    <?= (!is_null(session()->has('errors.password'))) ? '<label class="text-danger">' . session()->get('errors.password') . '</label>' : ''; ?>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">Masuk</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end auth page content -->

<script>
    function showpassword() {
        var x = document.getElementById("password-input");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>