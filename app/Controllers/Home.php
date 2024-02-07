<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['page'] = array(
            'page_title' => 'Home Page',
            'title' => 'Home Page',
            'layout' => 1,
            'css' => ['cms/css/content'],
        );
        return view('home', $data);
    }
    public function aboutUs(): string 
    {
        $data['page'] = array(
            'page_title' => 'About us',
            'title' => 'About us',
            'layout' => 1,
            'css' => ['cms/css/content'],
        );
        return view('cms/about_us', $data);
    }
}
