<?php

namespace App\Controllers\Cms;

use App\Controllers\BaseController;

class News extends BaseController
{
    public function index(): string
    {
        $data['page'] = array(
            'page_title' => 'Home Page',
            'title' => 'Home Page',
            'layout' => 1,
        );
        return view('home', $data);
    }
}