<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title); ?></title>
    <?= $this->section('favicon'); ?>
    <link rel="stylesheet" href="resource/css/styles.css">
    <?= $this->section('styles'); ?>
</head>
<body>
    <!-- HEADER -->
    <section class="header">
        <?= $this->insert('partials/header'); ?>
        
        <div class="nav">
            <!-- <?= $this->insert('partials/nav'); ?> -->
        </div>
    </section>

    <!-- CONTENT PAGE -->
    <section class="content">
        <?= $this->section('welcome'); ?>
    </section>

    <!-- FOOTER -->
    <section class="footer">
        <?= $this->insert('partials/footer'); ?>
    </section>
</body>
</html>