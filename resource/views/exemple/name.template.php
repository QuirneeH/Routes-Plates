<?php $this->layout('main.template', ['title' => $title]); ?>

<!-- <?php $this->unshift('styles') ?> <?php $this->end(); ?> -->

<?php $this->start('name'); ?>
    Você escreveu <?= $name; ?>
<?php $this->stop(); ?>