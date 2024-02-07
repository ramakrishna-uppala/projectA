<?php
/**
 * Modules Page
 */ 
?>
<?= $this->extend('template/template_admin') ?>
<?= $this->section('page') ?>
<div id="modules_body">
	<?= view('settings/modules/modules_body') ?>
</div>
<?= $this->endSection() ?>