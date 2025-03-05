<?= $this->extend('backend/layouts/main') ?>

<?= $this->section('content') ?>


<div class="container py-4">
    <div class="card shadow-sm mb-4">
        <div class="card-body text-center">
            <h1 class="fw-bold text-primary animate-welcome">Selamat Datang, Admin!</h1>
        </div>
    </div>
</div>

<style>
    .animate-welcome {
        animation: fadeInDown 1s ease-out, pulse 2s infinite alternate;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {
        from {
            transform: scale(1);
        }

        to {
            transform: scale(1.05);
        }
    }
</style>

<?= $this->endSection() ?>