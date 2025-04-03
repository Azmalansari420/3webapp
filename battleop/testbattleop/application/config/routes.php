<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = 'Admin/index';
$route['forget-password'] = 'Admin/forget_password';
$route['create-password'] = 'Admin/create_password';

$route['super_admin/dashboard'] = 'Admin/dashboard';


$route['project-details/(:any)'] = 'Welcome/project_details/$1';

// $route['app/user'] = 'Home/user_app';
// $route['app/user/(:any)'] = 'Home/user_app/$1';


$route['app/user'] = 'Home/user_app';
$route['app/user/(:any)'] = 'Home/user_app/$1';


// $route['app/user_ajax'] = 'Home/user_app';
// $route['app/user_ajax/(:any)'] = 'Home/user_app/$1';


$route['(:any)'] = 'Welcome/all/$1';