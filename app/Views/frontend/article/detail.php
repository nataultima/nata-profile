<?= $this->extend('frontend/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1><?= esc($article['title']) ?></h1>
    <p class="text-muted"><?= date('d M Y', strtotime($article['created_at'])) ?></p>
    <img src="<?= base_url('uploads/articles/' . $article['image']) ?>" class="img-fluid mb-3" alt="<?= esc($article['title']) ?>">
    <div><?= $article['content'] ?></div>

    <a href="<?= base_url() ?>" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
</div>
<?= $this->endSection() ?>