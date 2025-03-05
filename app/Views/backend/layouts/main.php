<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?? 'Dashboard'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url('backend/css/styles.css') ?>" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">


</head>

<body class="sb-nav-fixed">
    <?= $this->include('backend/layouts/navbar') ?>
    <div id="layoutSidenav">
        <?= $this->include('backend/layouts/sidebar') ?>
        <div id="layoutSidenav_content">
            <main>
                <?= $this->renderSection('content') ?>
            </main>
            <?= $this->include('backend/layouts/footer') ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('backend/js/scripts.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="<?= base_url('backend/assets/demo/chart-area-demo.js') ?>"></script>
    <script src="<?= base_url('backend/assets/demo/chart-bar-demo.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
    <script src="<?= base_url('backend/js/datatables-simple-demo.js') ?>"></script>
    <!-- jQuery (wajib kalau pakai DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>