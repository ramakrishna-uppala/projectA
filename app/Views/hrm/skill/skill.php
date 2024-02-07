<?php
/**
 * Skills view
 */
 ?>
 <? $this->extend('template/template_admin') ?>
 <? $this->section('page') ?>

    <div class="card-body">
        <div id="skill_body">
            <?= view('hrm/skill/skill_body'); ?>
        </div>
    </div>

<? $this->endSection('page') ?>
