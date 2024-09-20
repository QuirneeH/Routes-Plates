<?php $this->layout('template', ['title' => $title]); ?>

<?php $this->unshift('favicon') ?>
    <link rel="shortcut icon" href="resource/images/icons/route-66.png" type="image/x-icon">
<?php $this->end() ?>

<h1>Bem Vindo <?php echo $user->apelido; ?></h1>

<h1>Content HOME</h1>

<?php $instance['home']->teste(); ?>