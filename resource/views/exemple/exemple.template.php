<?php $this->layout('main.template', ['title' => $title]); ?>

<!-- <?php $this->unshift('styles') ?> <?php $this->end(); ?> -->

<?php $this->start('welcome'); ?>
    <?php $instance['exemple']::teste() ?>
<?php $this->stop(); ?>