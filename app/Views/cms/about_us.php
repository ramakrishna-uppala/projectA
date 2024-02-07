<? $this->extend('template/template') ?>
<? $this->section('page') ?>
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
    <div class="container py-5">
        <h1 class="display-3 text-white  slideInRight">About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb  slideInRight mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ol>
        </nav>
    </div>
</div>
<!-- about us -->
<div class="container py-5">
    <div class="about-us">
        <div class="row g-5">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="row gx-3 h-100">
                    <div class="col-6 align-self-start">
                        <img class="img-fluid" src="<?= WEBROOT ?>html/cms/images/about-us/about-us1.png">
                    </div>
                    <div class="col-6 align-self-end">
                        <img class="img-fluid" src="<?= WEBROOT ?>html/cms/images/about-us/about-us1.png">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="main-title">
                    <p class="fw-bold text-uppercase text-orange mb-2">About Us</p>
                    <h1 class="mb-4">We Are Leader In Industrial Market</h1>
                </div>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0 bg-orange p-4">
                        <h1 class="display-2 text-blue">25</h1>
                        <h5 class="text-white">Years of</h5>
                        <h5 class="text-white">Experience</h5>
                    </div>
                    <div class="ms-4">
                        <p><i class="bi bi-check-lg text-orange me-2"></i>Power &amp; Energy</p>
                        <p><i class="bi bi-check-lg text-orange me-2"></i>Civil Engineering</p>
                        <p><i class="bi bi-check-lg text-orange me-2"></i>Chemical Engineering</p>
                        <p><i class="bi bi-check-lg text-orange me-2"></i>Mechanical Engineering</p>
                        <p class="mb-0"><i class="bi bi-check-lg text-orange me-2"></i>Oil &amp; Gas Engineering</p>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="about-us-info rounded-circle bg-orange">
                                <i class="bi bi-envelope-open-fill text-white"></i>
                            </div>
                            <div class="ms-3 about-us-content">
                                <p class="mb-2">Email us</p>
                                <h5 class="mb-0">info@example.com</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="about-us-info rounded-circle bg-orange">
                                <i class="bi bi-telephone-fill text-white"></i>
                            </div>
                            <div class="ms-3 about-us-content">
                                <p class="mb-2">Call us</p>
                                <h5 class="mb-0">+012 345 6789</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<? $this->endSection('page') ?>