<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>

<div class="card shadow-sm w-100">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-1"><i class="fas fa-cogs me-2"></i> Site Settings</h5>
    </div>
    <div class="card-body">
        <!-- Menampilkan pesan sukses jika ada -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('/settings/update') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
                <!-- Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="site_name" class="form-label fw-bold">
                            <i class="fas fa-font me-2"></i>Site Name
                        </label>
                        <input type="text" name="site_name" value="<?= esc($setting['site_name'] ?? '') ?>" class="form-control" placeholder="Enter site name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">
                            <i class="fas fa-envelope me-2"></i>Email
                        </label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= esc($setting['email'] ?? '') ?>" placeholder="Enter email address">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">
                            <i class="fas fa-phone me-2"></i>Phone
                        </label>
                        <input type="text" name="phone" id="phone" class="form-control" value="<?= esc($setting['phone'] ?? '') ?>" placeholder="Enter phone number">
                    </div>
                </div>

                <!-- Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="site_logo" class="form-label fw-bold">
                            <i class="fas fa-image me-2"></i>Site Logo
                        </label>
                        <div class="d-flex align-items-center gap-3">
                            <input type="file" name="site_logo" class="form-control">
                            <?php if (!empty($setting['site_logo'])): ?>
                                <img src="<?= base_url($setting['site_logo']) ?>" class="img-thumbnail border shadow-sm" width="80" alt="Site Logo">
                            <?php else: ?>
                                <span class="text-muted fst-italic">No logo uploaded</span>
                            <?php endif ?>
                        </div>
                        <div class="form-text">Upload logo baru jika ingin mengganti.</div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">
                            <i class="fas fa-map-marker-alt me-2"></i>Address
                        </label>
                        <textarea name="address" id="address" class="form-control" rows="4" placeholder="Enter address"><?= esc($setting['address'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-2"></i>Save Settings
                </button>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection() ?>