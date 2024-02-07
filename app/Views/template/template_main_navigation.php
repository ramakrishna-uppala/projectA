<?
/**
 * Template Navigation
 * It's a view cell
 */
?>
<!-- Top Header Start-->
<div class="container-fluid bg-d-blue px-0">
    <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
            <div class="h-100 d-inline-flex align-items-center text-white">
                <span>Follow Us:</span>
                <a class="btn btn-link text-light" href=""><i class="bi bi-facebook"></i></a>
                <a class="btn btn-link text-light" href=""><i class="bi bi-twitter"></i></a>
                <a class="btn btn-link text-light" href=""><i class="bi bi-linkedin"></i></a>
                <a class="btn btn-link text-light" href=""><i class="bi bi-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 text-end">
            <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                <div class="d-flex align-items-center">
                    <span class="fs-6 me-2"><i class="bi bi-telephone-fill me-2"></i></span>
                    <span class="fs-6">+91 40 48552223</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Header End-->
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-light template-navbar">
    <div class="container-fluid px-3">
        <a class="navbar-brand" href="./index.html"><img src="<?= WEBROOT ?>html/cms/images/logo.png" alt=""></a>
        <button class="navbar-toggler offcanvas-nav-btn" type="button">
            <i class="bi bi-list"></i>
        </button>
        <div class="offcanvas offcanvas-start offcanvas-nav" style="width: 20rem">
            <div class="offcanvas-header">
                <a href="#" class="text-inverse"><img src="<?= WEBROOT ?>html/cms/images/logo.png" alt=""></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body pt-0 align-items-center">
                <ul class="navbar-nav mx-auto align-items-lg-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="aboutUs" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu - 1</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sub Menu - 1.1</a></li>
                            <li><a class="dropdown-item" href="#">Sub Menu - 1.2</a></li>
                            <li><a class="dropdown-item" href="#">Sub Menu - 1.3</a></li>
                            <li><a class="dropdown-item" href="#">Sub Menu - 1.4</a></li>
                            <li><a class="dropdown-item" href="#">Sub Menu - 1.5</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu - 2</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sub Menu - 2.1</a></li>
                            <li><a class="dropdown-item" href="#">Sub Menu - 2.2</a></li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">Sub Menu - 2.3</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#">Sub Menu - 2.3.1</a>
                                        <ul class="dropdown-menu">
                                             <li>
                                                <a class="dropdown-item" href="#">Sub Menu - 2.3.1.1</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Sub Menu - 2.4</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu dropend">
                                <a class="dropdown-item dropdown-toggle" href="#">Menu -3</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">Sub Menu - 3.1</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Sub Menu - 3.2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu - 4</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sub Menu - 4.1</a></li>
                            <li><a class="dropdown-item" href="#">Sub Menu - 4.2</a></li>
                        </ul>
                    </li>
                </ul>                
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
