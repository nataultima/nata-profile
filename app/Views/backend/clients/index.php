<?= $this->extend('backend/layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <!-- Header Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Manage Clients</h4>
            <button class="btn btn-primary btn-sm d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#addClientModal">
                <i class="bi bi-plus-circle"></i> Add New Client
            </button>
        </div>
    </div>

    <!-- Alert sukses jika ada -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Tabel Clients -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th style="width: 5%;">No</th>
                            <th style="width: 30%;">Logo</th>
                            <th style="width: 45%;">Description</th>
                            <th style="width: 20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $key => $client): ?>
                            <tr>
                                <td class="text-center"><?= $key + 1 ?></td>
                                <td class="text-center">
                                    <img src="<?= base_url('uploads/clients/' . $client['image']) ?>" class="img-thumbnail" style="max-width: 90px; height: auto;">
                                </td>

                                <td style="white-space: pre-wrap; word-wrap: break-word; font-size: 0.875rem; line-height: 1.3; background-color: #f8f9fa; padding: 6px; max-height: 100px; overflow-y: auto;">
                                    <?= nl2br(esc($client['deskripsi'])) ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-sm d-flex align-items-center gap-1"
                                            data-bs-toggle="modal" data-bs-target="#editClientModal<?= $client['id'] ?>">
                                            <i class="fa fa-pencil-alt"></i> Edit
                                        </button>
                                        <a href="<?= base_url('clients/delete/' . $client['id']) ?>"
                                            class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Modal per Client -->
                            <div class="modal fade" id="editClientModal<?= $client['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="<?= base_url('clients/store') ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= $client['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title">Edit Client</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3 text-center">
                                                    <label class="form-label fw-bold">Current Logo</label><br>
                                                    <img src="<?= base_url('uploads/clients/' . $client['image']) ?>" height="50" class="img-thumbnail">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label fw-bold">Change Logo (optional)</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Description</label>
                                                    <textarea name="deskripsi" class="form-control" rows="4"><?= esc($client['deskripsi']) ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Save Changes</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Edit Modal -->

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Add Client Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= base_url('clients/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Add New Client</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="image" class="form-label fw-bold">Client Logo</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add Client</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Add Modal -->

<?= $this->endSection() ?>