<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('backend/layouts/header', ['page_title' => 'Services', 'breadcrumb' => 'Services Management']) ?>

<div class="container mt-4">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#serviceModal" onclick="showCreateModal()">Tambah Service</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Link</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $key => $service): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= esc($service['title']) ?></td>
                    <td><?= esc($service['description']) ?></td>
                    <td><i class="<?= esc($service['icon']) ?>"></i></td>
                    <td><?= esc($service['link'] ?? '-') ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="showEditModal(<?= $service['id'] ?>)">Edit</button>
                        <a href="<?= site_url('services/delete/' . $service['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Form (Tambah/Edit) -->
<div class="modal fade" id="serviceModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?= site_url('services/store') ?>" method="post" id="serviceForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="service_id">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Icon</label>
                        <input type="text" class="form-control" name="icon" id="icon">
                    </div>
                    <div class="mb-3">
                        <label>Link (Optional)</label>
                        <input type="text" class="form-control" name="link" id="link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function showCreateModal() {
        document.getElementById('modalTitle').innerText = 'Tambah Service';
        document.getElementById('serviceForm').action = '<?= site_url('services/store') ?>';
        document.getElementById('serviceForm').reset();
    }

    function showEditModal(id) {
        fetch('<?= site_url('services/edit/') ?>' + id)
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalTitle').innerText = 'Edit Service';
                document.getElementById('serviceForm').action = '<?= site_url('services/update/') ?>' + id;

                document.getElementById('service_id').value = data.id;
                document.getElementById('title').value = data.title;
                document.getElementById('description').value = data.description;
                document.getElementById('icon').value = data.icon;
                document.getElementById('link').value = data.link ?? '';

                var myModal = new bootstrap.Modal(document.getElementById('serviceModal'));
                myModal.show();
            });
    }
</script>

<?= $this->endSection() ?>