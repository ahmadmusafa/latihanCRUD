<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>To do list</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>
<div class="container-main">

<!-- Navbar -->
 <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-danger" href="/index">
            <img src="<?= base_url('assets/img/icon.ico') ?>" alt="Logo" width="50" height="36">
            Sinsen
        </a>
        <ul class="navbar-nav">
            
            <?php if (logged_in()): ?>

                <li class="nav-item">
                <a class="nav-link text-dark bg-success" href="/logout"><?= user()->email?></a>
                </li>

            <?php else : ?>

                <li class="nav-item">
                <a class="nav-link text-dark bg-success" href="/login">Login</a>
                </li>

            <?php endif; ?>
        </ul>
    </div>
</nav>