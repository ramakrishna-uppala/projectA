<?php
/**
 * Home page
 */
?>
<? $this->extend('template/template') ?>
<? $this->section('page') ?>
    
<!-- Carousel Slider -->
<div id="carousel_slider" class="carousel slide carousel-fade">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= WEBROOT ?>html/images/slider/slider1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 text-start">
                            <p class="fs-5 fw-bold text-orange text-uppercase animated slideInRight">25 Years
                                of Working Experience</p>
                            <h1 class="slider-title text-white mb-5 animated slideInRight">Industrial Solution
                                Providing Company</h1>
                            <a href="" class="btn btn-carousel py-3 px-5 animated slideInRight">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= WEBROOT ?>html/images/slider/slider2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 text-start">
                            <p class="fs-5 fw-bold text-orange text-uppercase animated slideInRight">25 Years
                                of Working Experience</p>
                            <h1 class="slider-title text-white mb-5 animated slideInRight">The Best Reliable
                                Industry Solution</h1>
                            <a href="" class="btn btn-carousel py-3 px-5 animated slideInRight">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?= WEBROOT ?>html/images/slider/slider3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 text-start">
                            <p class="fs-5 fw-bold text-orange text-uppercase animated slideInRight">25 Years
                                of Working Experience</p>
                            <h1 class="slider-title text-white mb-5 animated slideInRight">Industrial Solution
                                Providing Company</h1>
                            <a href="" class="btn btn-carousel py-3 px-5 animated slideInRight">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev cus-control-prev" type="button" data-bs-target="#carousel_slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next cus-control-next" type="button" data-bs-target="#carousel_slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- about us -->
<div class="container mt-5 mb-5">
    <div class="about-us py-5">
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
<script type="text/javascript">
   "use strict";
    var navbar = document.querySelector(".navbar");
    const navOffCanvasBtn = document.querySelectorAll(".offcanvas-nav-btn"),
        navOffCanvas = document.querySelector(".navbar:not(.navbar-clone) .offcanvas-nav");
    let bsOffCanvas;

    function toggleOffCanvas() {
        bsOffCanvas && bsOffCanvas._isShown ? bsOffCanvas.hide() : bsOffCanvas && bsOffCanvas.show()
    }
    navOffCanvas && (bsOffCanvas = new bootstrap.Offcanvas(navOffCanvas, {
        scroll: !0
    }), navOffCanvasBtn.forEach((e => {
        e.addEventListener("click", (e => {
            toggleOffCanvas()
        }))
    })));
</script>
<!-- services -->
<div class="container py-5">
    <div class="container">
        <div class="text-center mx-auto main-title pb-4">
            <p class="fw-medium text-uppercase text-orange mb-2">Our Services</p>
            <h1 class="display-5 mb-4">We Provide Best Industrial Services</h1>
        </div>
        <div class="row gy-5 gx-4">
            <div class="col-md-6 col-lg-4">
                <div class="service-item">
                    <img class="img-fluid" src="<?= WEBROOT ?>html/images/services/services-1.png" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="<?= WEBROOT ?>html/images/services/services-1.png" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Civil &amp; Gas Engineering</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                lorem sed diam stet diam sed stet.</p>
                        </div>
                    </div>
                    <a class="btn btn-orange" href="">Read More</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-item">
                    <img class="img-fluid" src="<?= WEBROOT ?>html/images/services/services-2.png" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="<?= WEBROOT ?>html/images/services/services-2.png" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Power &amp; Energy Engineering</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                lorem sed diam stet diam sed stet.</p>
                        </div>
                    </div>
                    <a class="btn btn-orange" href="">Read More</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-item">
                    <img class="img-fluid" src="<?= WEBROOT ?>html/images/services/services-3.png" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="<?= WEBROOT ?>html/images/services/services-3.png" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Plumbing &amp; Water Treatment</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                lorem sed diam stet diam sed stet.</p>
                        </div>
                    </div>
                    <a class="btn btn-orange" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our Projects -->
<div class="pt-5 my-5 px-0" style="background-color:#02245B;">
    <div class="container-fluid">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
            <p class="fw-medium text-uppercase text-orange mb-2">Our Projects</p>
            <h1 class="display-5 text-white mb-5" style="font-size: 3rem;">See What We Have Completed Recently</h1>
        </div>
      <div class="row justify-content-center">
        <div id="carouselExampleControls" class="carousel slide project-carousel">
          <div class="carousel-inner project-slide-inner" role="listbox">
            <div class="carousel-item active project-slide-item">
              <div class="col">
                <a class="project-item" href="">
                    <img class="img-fluid" src="https://themewagon.github.io/Industrio/img/project-1.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-orange mb-0">Energy Engineering</h5>
                    </div>
                </a>
              </div>
            </div>
            <div class="carousel-item project-slide-item">
              <div class="col">
                <a class="project-item" href="">
                    <img class="img-fluid" src="https://themewagon.github.io/Industrio/img/project-2.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-orange mb-0">Energy Engineering</h5>
                    </div>
                </a>
              </div>
            </div>
            <div class="carousel-item project-slide-item">
              <div class="col">
                <a class="project-item" href="">
                    <img class="img-fluid" src="https://themewagon.github.io/Industrio/img/project-3.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-orange mb-0">Energy Engineering</h5>
                    </div>
                </a>
              </div>
            </div>
            <div class="carousel-item project-slide-item">
              <div class="col">
                <a class="project-item" href="">
                    <img class="img-fluid" src="https://themewagon.github.io/Industrio/img/project-4.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-orange mb-0">Energy Engineering</h5>
                    </div>
                </a>
              </div>
            </div>
            <div class="carousel-item project-slide-item">
              <div class="col">
                <a class="project-item" href="">
                    <img class="img-fluid" src="https://themewagon.github.io/Industrio/img/project-5.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-orange mb-0">Energy Engineering</h5>
                    </div>
                </a>
              </div>
            </div>
            <div class="carousel-item project-slide-item">
              <div class="col">
                <a class="project-item" href="">
                    <img class="img-fluid" src="https://themewagon.github.io/Industrio/img/project-6.jpg" alt="">
                    <div class="project-title">
                        <h5 class="text-orange mb-0">Energy Engineering</h5>
                    </div>
                </a>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev w-aut project cus-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </a>
          <a class="carousel-control-next w-aut project cus-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </a>
        </div>
      </div>
    </div>
</div>
<!-- Team -->
<div class="container py-5">
    <div class="container">
        <div class="text-center mx-auto main-title">
            <p class="fw-bold text-uppercase text-orange mb-2">Our Team</p>
            <h1 class="display-5 mb-5">Dedicated Team Members</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="team-item">
                    <img class="img-fluid" src="<?= WEBROOT ?>html/images/team/team.png" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-orange" style="width: 90px; height: 90px;">
                            <i class="bi bi-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4" style="height: 90px;">
                            <h5>Rob Miller</h5>
                            <span class="text-orange">CEO &amp; Founder</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-item">
                    <img class="img-fluid" src="<?= WEBROOT ?>html/images/team/team.png" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-orange" style="width: 90px; height: 90px;">
                            <i class="bi bi-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4" style="height: 90px;">
                            <h5>Adam Crew</h5>
                            <span class="text-orange">Project Manager</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="team-item">
                    <img class="img-fluid" src="<?= WEBROOT ?>html/images/team/team.png" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-orange" style="width: 90px; height: 90px;">
                            <i class="bi bi-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4" style="height: 90px;">
                            <h5>Peter Farel</h5>
                            <span class="text-orange">Engineer</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-twitter"></i></a>
                                <a class="btn btn-square btn-d-primary rounded-circle mx-1" href=""><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let items = document.querySelectorAll('.project-carousel .carousel-item')

  items.forEach((el) => {
    const minPerSlide = 5
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
      if (!next) {
        // wrap carousel by using first child
        next = items[0]
      }
      let cloneChild = next.cloneNode(true)
      el.appendChild(cloneChild.children[0])
      next = next.nextElementSibling
    }
  })
</script>
<!-- Testimonails -->
<div class="container py-5">
    <div class="text-center mx-auto main-title">
        <p class="fw-bold text-uppercase text-orange mb-2">Testimonial</p>
        <h1 class="display-5 mb-5">What Our Clients Say!</h1>
    </div>
    <div id="Testimonails" class="carousel slide testimonial-carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto" src="<?= WEBROOT ?>html/images/testimonials/testimonial-1.png">
                        <div class="btn-square bg-orange rounded-circle">
                            <i class="bi bi-quote text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center p-4 mt-5">
                        <div class="arrow-top"></div>
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                            ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                            clita.</p>
                        <h5 class="mb-1">Client Name - 1</h5>
                        <span class="fst-italic">Profession - 1</span>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto" src="<?= WEBROOT ?>html/images/testimonials/testimonial-1.png">
                        <div class="btn-square bg-orange rounded-circle">
                            <i class="bi bi-quote text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center p-4 mt-5">
                        <div class="arrow-top"></div>
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                            ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                            clita.</p>
                        <h5 class="mb-1">Client Name - 2</h5>
                        <span class="fst-italic">Profession - 2</span>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="testimonial-item text-center">
                    <div class="testimonial-img position-relative">
                        <img class="img-fluid rounded-circle mx-auto" src="<?= WEBROOT ?>html/images/testimonials/testimonial-1.png">
                        <div class="btn-square bg-orange rounded-circle">
                            <i class="bi bi-quote text-white"></i>
                        </div>
                    </div>
                    <div class="testimonial-text text-center p-4 mt-5">
                        <div class="arrow-top"></div>
                        <p>Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna
                            ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea
                            clita.</p>
                        <h5 class="mb-1">Client Name - 3</h5>
                        <span class="fst-italic">Profession - 3</span>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev testimonial-control-prev" type="button" data-bs-target="#Testimonails" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next testimonial-control-next" type="button" data-bs-target="#Testimonails" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<style type="text/css">
    /*** Testimonial ***/
    .testimonial-control-prev .carousel-control-prev-icon, .testimonial-control-next .carousel-control-next-icon {
        filter: invert(61%) sepia(55%) saturate(6916%) hue-rotate(351deg) brightness(100%) contrast(101%);
        opacity: 0;
        transition: .5s;
    }
    .testimonial-carousel:hover .testimonial-control-prev .carousel-control-prev-icon , .testimonial-carousel:hover .testimonial-control-next .carousel-control-next-icon {
        opacity: 1;
    }
    .testimonial-control-prev, .testimonial-control-next {
        bottom: auto;
        top: 40px;
        opacity: 1;
    }
    .testimonial-img {
        margin-left: 50px;
    }
    .testimonial-img img {
        width: 100px;
        height: 100px;
    }
    .testimonial-img .btn-square {
        position: absolute;
        bottom: -19px;
        left: 50%;
        transform: translateX(-50%);
    }
    .testimonial-text {
        margin-bottom: 30px;
        box-shadow: 0 0 45px rgba(0, 0, 0, .08);
        transform: scale(.8);
        transition: .5s;
        padding: 1.8125rem 1.125rem;
        background-color: #02245B;
        border-radius: 1.25rem;
        color: #fff;
        height: auto;
    }
    .testimonial-text {
        transform: scale(1);
    }
    .arrow-top {
        width: 0;
        height: 0;
        border-left: 1.5625rem solid transparent;
        border-right: 1.5625rem solid transparent;
        border-bottom: 1.25rem solid #02245B;
        position: absolute;
        top: -20px;
        display: inline-block;
    }
</style>
<? $this->endSection('page') ?>