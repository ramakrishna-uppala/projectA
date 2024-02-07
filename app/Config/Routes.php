<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [App\Controllers\Home::class, 'index']);
//$routes->get('/(:any)', [App\Controllers\Home::class, '$1']);
//$routes->post('/(:any)', [App\Controllers\Home::class, '$1']);

/**
 * Default Modules
 */
// Login module
$routes->get('login', [App\Controllers\User\Login::class, 'index']);
$routes->get('login/(:any)', [App\Controllers\User\Login::class, '$1']);
$routes->post('login/(:any)', [App\Controllers\User\Login::class, '$1']);

// Profile
$routes->get('profile', [App\Controllers\User\Profile::class, 'index'], ['filter' => \App\Filters\Auth::class]);
$routes->get('profile/(:any)', [App\Controllers\User\Profile::class, '$1'], ['filter' => \App\Filters\Auth::class]);
$routes->post('profile/(:any)', [App\Controllers\User\Profile::class, '$1'], ['filter' => \App\Filters\Auth::class]);

// Users Module
$routes->get('user', [App\Controllers\User\User::class, 'index'], ['filter' => \App\Filters\ModuleAuth::class]);
$routes->get('user/(:any)', [App\Controllers\User\User::class, '$1'], ['filter' => \App\Filters\ModuleAuth::class]);
$routes->post('user/(:any)', [App\Controllers\User\User::class, '$1'], ['filter' => \App\Filters\ModuleAuth::class]);

// Roles Module
$routes->get('role', [App\Controllers\User\Roles::class, 'index'], ['filter' => \App\Filters\ModuleAuth::class]);
$routes->get('role/(:any)', [App\Controllers\User\Roles::class, '$1'], ['filter' => \App\Filters\ModuleAuth::class]);
$routes->post('role/(:any)', [App\Controllers\User\Roles::class, '$1'], ['filter' => \App\Filters\ModuleAuth::class]);

// Modules Module
$routes->get('module', [App\Controllers\Settings\Modules::class, 'index'], ['filter' => \App\Filters\ModuleAuth::class]);
$routes->get('module/(:any)', [App\Controllers\Settings\Modules::class, '$1'], ['filter' => \App\Filters\ModuleAuth::class]);
$routes->post('module/(:any)', [App\Controllers\Settings\Modules::class, '$1'], ['filter' => \App\Filters\ModuleAuth::class]);

// Configuration Module
$routes->get('configuration', [App\Controllers\Settings\Configuration::class, 'index'], ['filter' => \App\Filters\ModuleAuth::class]);
$routes->get('configuration/(:any)', [App\Controllers\Settings\Configuration::class, '$1'], ['filter' => \App\Filters\ModuleAuth::class]);
$routes->post('configuration/(:any)', [App\Controllers\Settings\Configuration::class, '$1'], ['filter' => \App\Filters\ModuleAuth::class]);

/**
 * HRM Modules
 */
$routes->group('hrm', static function ($routes) {
    // Dashboard
    $routes->get('/', [App\Controllers\Hrm\Hrm::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
   
    // Pofiles
    $routes->get('profiles', [App\Controllers\Hrm\Profiles::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->get('profiles/(:any)', [App\Controllers\Hrm\Profiles::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->post('profiles/(:any)', [App\Controllers\Hrm\Profiles::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);



    // HRM - Department
    $routes->get('department', [App\Controllers\Hrm\Department::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->get('department/(:any)', [App\Controllers\Hrm\Department::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->post('department/(:any)', [App\Controllers\Hrm\Department::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

    // HRM - Education
    $routes->get('education', [App\Controllers\Hrm\Education::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->get('education/(:any)', [App\Controllers\Hrm\Education::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->post('education/(:any)', [App\Controllers\Hrm\Education::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

    // HRM - Skills
    $routes->get('skill', [App\Controllers\Hrm\Skill::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->get('skill/(:any)', [App\Controllers\Hrm\Skill::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->post('skill/(:any)', [App\Controllers\Hrm\Skill::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

    // HRM - Events
    $routes->get('event', [App\Controllers\Hrm\Event::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->get('event/(:any)', [App\Controllers\Hrm\Event::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->post('event/(:any)', [App\Controllers\Hrm\Event::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);

    // HRM - Job 
    $routes->get('jobcategory', [App\Controllers\Hrm\JobCategory::class, 'index'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->get('jobcategory/(:any)', [App\Controllers\Hrm\JobCategory::class, '$1'], ['filter' => App\Filters\ModuleAuth::class]);
    $routes->post('jobcategory/(:any)', [App\Controllers\Hrm\JobCategory::class, '$1'], ['filter' =>App\Filters\ModuleAuth::class]);

    // HRM - Profile Status
    $routes->get('profilestatus',[App\Controllers\Hrm\ProfileStatus::class,'index'],['filter' => App\Filters\ModuleAuth::class]);
    $routes->get('profilestatus/(:any)',[App\Controllers\Hrm\ProfileStatus::class,'$1'],['filter' => App\Filters\ModuleAuth::class]);
    $routes->post('profilestatus/(:any)',[App\Controllers\Hrm\ProfileStatus::class,'$1'],['filter' => App\Filters\ModuleAuth::class]);

    
});

/**
 * CMS Modules
 */
// CMS - content
$routes->get('content', [App\Controllers\Cms\Content::class, 'index']);
$routes->get('content/(:any)', [App\Controllers\Cms\Content::class, '$1']);
