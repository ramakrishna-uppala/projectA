<?
/**
 * Admin Navigation
 * It's a view cell
 */
?>
<!-- <div class="p-1 border-bottom">
    <a href="<?= WEBROOT ?>">
        <img src="<?= WEBROOT ?>images/logo.png" alt="Logo">
    </a>
    <?
    // Check and display logged in user
    if(session()->get('user')) {
        ?>
        Welcome! <?= session()->get('user')['name'];?> (<?= session()->get('user')['username'];?>) - <a href="<?= WEBROOT ?>login/logOut">Logout</a>
        <?
    }
    else {
        echo 'Login';
    }
    ?>
</div> -->
<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">
            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="bi bi-list"></i>
            </button>
            <span style="width: 90px;">
                <a href="#" title="Home"><img src="<?= WEBROOT ?>html/images/logo.png" alt="logo" class="img-fluid"></a>
            </span>
            <!-- Horizontal Menu Toggle Button -->
            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
        <ul class="topbar-menu d-flex align-items-center gap-3">
            <!-- Topbar Search Form -->
            <li class="d-none d-sm-inline-block">
                <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" aria-label="Theme Mode" data-bs-original-title="Theme Mode">
                <i class="bi bi-brightness-high font-22"></i>
            </div>
            </li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="d-lg-flex align-items-center gap-1 d-none">
                        <div><h5 class="my-0">Admin</h5></div>
                        <div><h6 class="my-0 fw-normal">(admin)</h6></div>
                    </span>
                    <span class="account-user-avatar">
                        <img src="<?= WEBROOT ?>html/images/profile/profile_img.png" alt="profile-image" class="rounded-circle" width="18">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome admin!</h6>
                    </div>
                    <a href="<?= WEBROOT ?>profile" class="dropdown-item">
                        <i class="bi bi-person-circle me-1"></i>
                        <span>My Account</span>
                    </a>
                    <a href="<?= WEBROOT ?>profile/changePassword" class="dropdown-item">
                        <i class="bi bi-person-lock me-1"></i>
                        <span>Change Password</span>
                    </a>
                    <a href="<?= WEBROOT ?>login/logOut" class="dropdown-item">
                        <i class="bi bi-box-arrow-right me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="leftside-menu menuitem-active">
    <!-- Sidebar -left -->
    <div class="h-100 show" id="leftside-menu-container" data-simplebar="init"><div class="simplebar-wrapper menuitem-active" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask show"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper menuitem-active" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content show" style="padding: 0px;">

        <!-- Leftbar User -->
        <div class="leftbar-user"></div>
        <!-- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-item menuitem-active">
                <a href="#" class="side-nav-link">
                    <i class="bi bi-columns-gap"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="bi bi-file-earmark-ruled"></i>
                    <span>Module - 1</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports" class="side-nav-link collapsed">
                    <i class="bi bi-files"></i>
                    <span>Module - 2</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="reports">
                    <ul class="side-nav-second-level">
                        <li><a href="#">Sub Module - 1</a></li>
                        <li><a href="#">Sub Module - 2</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <!--- End Sidemenu -->
        <div class="clearfix"></div>

    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: auto;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 407px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
</div>