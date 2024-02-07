<?php
/**
 * @package User
 * Users view
 */ 
?>
<?= $this->extend('template/template_admin') ?>
<?= $this->section('page') ?>
<div id="users_body">
    <?= view('user/users/users_body'); ?>
</div>
<?= $this->endSection() ?>