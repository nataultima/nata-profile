<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">

    <!-- Header Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Manage Portfolio</h4>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                <i class="bi bi-plus-circle me-1"></i> Add Portfolio
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


    <!-- Tabel Portfolios -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table id="portfolioTable" class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th style="width: 5%;" class="text-center">No</th>
                            <th style="width: 15%;">Title</th>
                            <th style="width: 10%;">Category</th>
                            <th style="width: 10%;">Image</th>
                            <th style="width: 35%;">Description</th>
                            <th style="width: 20%;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($portfolios as $portfolio): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= esc($portfolio['title']) ?></td>
                                <td><span class="badge bg-info"><?= esc($portfolio['category']) ?></span></td>
                                <td>
                                    <?php if (!empty($portfolio['image'])): ?>
                                        <img src="<?= base_url('uploads/portfolios/' . $portfolio['image']) ?>" width="70" class="img-thumbnail">
                                    <?php else: ?>
                                        <span class="text-muted">No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td style="white-space: pre-wrap; word-wrap: break-word; font-size: 0.875rem; line-height: 1.3; background-color: #f8f9fa; padding: 6px; max-height: 100px; overflow-y: auto;">
                                    <?= nl2br(esc($portfolio['deskripsi'])) ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-sm d-flex align-items-center gap-1" onclick="editPortfolio(
                                        '<?= $portfolio['id'] ?>',
                                        '<?= esc($portfolio['title']) ?>',
                                        '<?= esc($portfolio['category']) ?>',
                                        '<?= esc($portfolio['image']) ?>',
                                        '<?= esc($portfolio['deskripsi'], 'js') ?>'
                                    )" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                                            <i class="fa fa-pencil-alt"></i> Edit
                                        </button>
                                        <a href="<?= site_url('porto/delete/' . $portfolio['id']) ?>"
                                            class="btn btn-danger btn-sm d-flex align-items-center gap-1"
                                            onclick="return confirm('Yakin mau hapus?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bootstrap 5 -->
<div class="modal fade" id="portfolioModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="portfolioForm" action="<?= site_url('porto/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="portfolioModalLabel">Add Portfolio</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="portfolioId">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category" id="category" class="form-select" required>
                            <option value="experience">Experience</option>
                            <option value="product">Product</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <small class="text-muted">Current Image: <span id="currentImage" class="text-info"></span></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Script Modal Reset/Edit -->
<script>
    function editPortfolio(id, title, category, image, deskripsi) {
        document.getElementById('portfolioModalLabel').innerText = 'Edit Portfolio';
        document.getElementById('portfolioForm').action = '<?= site_url('porto/update/') ?>' + id;

        document.getElementById('portfolioId').value = id;
        document.getElementById('title').value = title;
        document.getElementById('category').value = category;
        document.getElementById('deskripsi').value = deskripsi;

        if (image) {
            document.getElementById('currentImage').innerText = image;
        } else {
            document.getElementById('currentImage').innerText = 'No Image';
        }
    }

    const portfolioModal = document.getElementById('portfolioModal');
    portfolioModal.addEventListener('hidden.bs.modal', function() {
        document.getElementById('portfolioModalLabel').innerText = 'Add Portfolio';
        document.getElementById('portfolioForm').action = '<?= site_url('porto/store') ?>';

        document.getElementById('portfolioId').value = '';
        document.getElementById('title').value = '';
        document.getElementById('category').value = 'experience';
        document.getElementById('image').value = '';
        document.getElementById('deskripsi').value = '';
        document.getElementById('currentImage').innerText = '';
    });
</script>

<?= $this->endSection() ?>