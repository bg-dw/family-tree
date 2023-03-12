<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = 'login';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = 'Login/logout';

//profile
$route['master-profile'] = 'master/Profile';
$route['master-update-username']['post'] = 'master/Profile/update_username';
$route['master-update-password']['post'] = 'master/Profile/update_password';
$route['master-update-foto']['post'] = 'master/Profile/update_foto';

//menu dashboard
$route['master-dashboard'] = 'master/Dashboard';
$route['master-get-uname']['post'] = 'master/dashboard/get_uname/';
$route['master-get-my']['post'] = 'master/dashboard/get_my/';

//menu pengguna
$route['master-data-keluarga'] = 'master/Pengguna';
$route['master-add-pengguna']['post'] = 'master/Pengguna/add_pengguna';
$route['master-update-pengguna']['post'] = 'master/Pengguna/update_pengguna';
$route['master-delete-pengguna']['post'] = 'master/Pengguna/delete_pengguna';
$route['master-get-user']['post'] = 'master/Pengguna/get_user';
$route['master-update-foto-pengguna']['post'] = 'master/Pengguna/update_foto';

$route['master-hubungan-keluarga'] = 'master/Relasi';
$route['master-get-user-relasi'] = 'master/Relasi/get_user';
$route['master-get-ortu']['post'] = 'master/Relasi/get_ortu';
$route['master-get-pasangan']['post'] = 'master/Relasi/get_pasangan';
$route['master-add-relasi']['post'] = 'master/Relasi/add_relasi';
$route['master-update-relasi']['post'] = 'master/Relasi/update_relasi';
$route['master-delete-relasi']['post'] = 'master/Relasi/delete_relasi';

//menu portofolio
$route['master-portofolio'] = 'master/Portofolio';
$route['master-portofolio-add']['post'] = 'master/Portofolio/add_porto';
$route['master-update-foto-porto']['post'] = 'master/Portofolio/update_foto';
$route['master-get-porto']['post'] = 'master/Portofolio/get_porto';
$route['master-portofolio-update']['post'] = 'master/Portofolio/update_porto';
$route['master-delete-porto']['post'] = 'master/Portofolio/delete_porto';

//menu acara
$route['master-acara'] = 'master/Acara';

//menu galeri
$route['master-galeri'] = 'master/Galeri';