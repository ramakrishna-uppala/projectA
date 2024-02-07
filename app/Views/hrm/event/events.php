<?php
/**
 * Event View
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('page'); ?>
<div id="event_body">
    <?= view('hrm/event/event_body'); ?>
</div>   
<? $this->endSection('page'); ?>