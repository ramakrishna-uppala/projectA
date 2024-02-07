<?php

namespace App\Controllers\Hrm;

use App\Controllers\BaseController;

/**
 * @package HRM
 * HRM dashboard
 */
class Hrm extends BaseController
{
    /**
     * Index method
     */
    public function index()
    {
        $data['page'] = array(
            'title' => 'HRM',
            'page_title' => 'HRM Module',
        );
        return view('hrm/dashboard', $data);
    }
}