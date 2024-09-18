<?php $this->layout('template', ['title' => $title]); ?>

<?php $this->unshift('favicon') ?>
    <link rel="shortcut icon" href="resource/images/icons/route-bus.png" type="image/x-icon">
<?php $this->end() ?>

<h1>Content SHOP</h1>

<?= $instance['shop']->buy(); ?>