<?php
/**
 * Navigation cell
 */

namespace App\Cells;

class Navigation
{
    /**
     * Main navigation
     * Top
     */
    public function mainNavigation() : string
    {
        return view('template/template_main_navigation');
    }

    /**
     * Footer navigation
     */
    public function footerNavigation() : string
    {
        return view('template/template_footer');
    }

    /**
     * Template Admin Navigation
     */
    public function templateAdminMainNavigation() : string
    {
        return view('template/template_admin_main_navigation');
    }
}
