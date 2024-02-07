<?php
/**
 * Departments View
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('page'); ?>
<div id="department_body">
    <?= view('hrm/department/department_body'); ?>
</div>   
<? $this->endSection('page'); ?>