<?php
/**
 * @package HRM
 * Profilesashboard
 */
?>
<? $this->extend('template/template_admin') ?>
<? $this->section('page') ?>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
        	<a href="<?= WEBROOT ?>hrm/profiles" class="d-block p-4 fw-bold text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-2">
        		<div class="d-flex align-items-center justify-content-between"><div class="lh-1"><i class="bi bi-person fs-3"></i></div><div class="fs-5">Profiles</div></div>
        	</a>    				
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
        	<a href="<?= WEBROOT ?>hrm/department" class="d-block p-4 fw-bold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">
        		<div class="d-flex align-items-center justify-content-between"><div class="lh-1"><i class="bi bi-building fs-3"></i></div><div class="fs-5">Departments</div></div>
        	</a>    				
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
        	<a href="<?= WEBROOT ?>hrm/education" class="d-block p-4 fw-bold text-info-emphasis bg-info-subtle border border-info-subtle rounded-2">
        		<div class="d-flex align-items-center justify-content-between"><div class="lh-1"><i class="bi bi-book fs-3"></i></div><div class="fs-5">Education</div></div>
        	</a>		
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
        	<a href="<?= WEBROOT ?>hrm/skill" class="d-block p-4 fw-bold text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-2">
        		<div class="d-flex align-items-center justify-content-between"><div class="lh-1"><i class="bi bi-award fs-3"></i></div><div class="fs-5">Skills</div></div>
        	</a>    				
		</div>
	</div>
<? $this->endSection('page') ?>