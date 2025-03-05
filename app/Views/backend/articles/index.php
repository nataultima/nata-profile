<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Manage Articles</h4>
            <button class="btn btn-primary btn-sm d-flex align-items-center gap-1" onclick="showCreateModal()">
                <i class="bi bi-plus-circle"></i> Add New Article
            </button>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

    <!-- Articles Table -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">No</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Published At</th>
                        <th class="text-center" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; // Mulai nomor dari 1
                    foreach ($articles as $article):
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= esc($article['title']) ?></td>
                            <td><?= esc($article['slug']) ?></td>
                            <td><?= esc($article['published_at']) ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" onclick="showEditModal(<?= esc($article['id']) ?>)">
                                    <i class="fa fa-pencil-alt"></i> Edit
                                </button>
                                <form action="<?= base_url('/articles/delete/' . $article['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Article Modal -->
    <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="articleForm" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="articleModalLabel">Add New Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="articleId">

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <img id="previewImage" src="" class="mt-2" style="max-width: 100px; display:none;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Published At</label>
                            <input type="datetime-local" name="published_at" id="published_at" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Javascript (Modal Control) -->
<script>
    function showCreateModal() {
        resetForm();
        document.getElementById('articleModalLabel').innerText = 'Add New Article';
        document.getElementById('articleForm').action = '<?= base_url('/articles/store') ?>';
        new bootstrap.Modal(document.getElementById('articleModal')).show();
    }

    function showEditModal(id) {
        fetch('<?= base_url('/articles/get/') ?>' + id)
            .then(response => response.json())
            .then(data => {
                resetForm();

                document.getElementById('articleModalLabel').innerText = 'Edit Article';
                document.getElementById('articleForm').action = '<?= base_url('/articles/update/') ?>' + id;

                document.getElementById('articleId').value = data.id;
                document.getElementById('title').value = data.title;
                document.getElementById('content').value = data.content;
                document.getElementById('published_at').value = data.published_at ? data.published_at.replace(' ', 'T') : '';

                if (data.image) {
                    document.getElementById('previewImage').src = '<?= base_url('uploads/articles/') ?>' + data.image;
                    document.getElementById('previewImage').style.display = 'block';
                } else {
                    document.getElementById('previewImage').style.display = 'none';
                }

                new bootstrap.Modal(document.getElementById('articleModal')).show();
            })
            .catch(error => alert('Failed to fetch article data.'));
    }

    function resetForm() {
        document.getElementById('articleForm').reset();
        document.getElementById('articleId').value = '';
        document.getElementById('previewImage').style.display = 'none';
    }
</script>

<?= $this->endSection() ?>