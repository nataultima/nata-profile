<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register - Nata Ultima Enggal</title>
    <link href="<?= base_url('frontend/assets/img/logo.png') ?>" rel="icon">
    <link href="<?= base_url('frontend/assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">
    <link href="<?= base_url('backend/css/styles.css') ?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">

                                    <!-- Tampilkan error validasi jika ada -->
                                    <?php if (session()->getFlashdata('errors')) : ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                                    <li><?= esc($error) ?></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                    <form action="<?= base_url('process-register') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" type="text" name="username" placeholder="Enter your username" value="<?= old('username') ?>">
                                            <label for="username">Username</label>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="password" type="password" name="password" placeholder="Create a password">
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm password">
                                                    <label for="confirm_password">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('login') ?>">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; PT.Nata Ultima Enggal <?= date('Y') ?></div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('backend/js/scripts.js') ?>"></script>

</body>

</html>