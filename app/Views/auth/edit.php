<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Edit Account</h5>
                </div>
                <div class="card-body">

                    <!-- Menampilkan Notifikasi -->
                    <?php if (session()->getFlashdata('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('message') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('/auth/processEdit') ?>" method="post">
                        <?= csrf_field() ?>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">
                                <i class="fas fa-user me-2"></i> Username
                            </label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= esc($user['username']) ?>" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-2"></i> New Password
                            </label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" aria-label="New Password">
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword1">
                                    <i class="fas fa-eye-slash" id="eye-icon1"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">
                                <i class="fas fa-lock me-2"></i> Confirm New Password
                            </label>
                            <div class="input-group">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" aria-label="Confirm New Password">
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword2">
                                    <i class="fas fa-eye-slash" id="eye-icon2"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Show/Hide Password -->
<script>
    document.getElementById('togglePassword1').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const icon = document.getElementById('eye-icon1');
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordField.type = "password";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });

    document.getElementById('togglePassword2').addEventListener('click', function() {
        const passwordField = document.getElementById('confirm_password');
        const icon = document.getElementById('eye-icon2');
        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordField.type = "password";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    });
</script>

<?= $this->endSection() ?>