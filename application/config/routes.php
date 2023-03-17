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

//##Akses Master##
//menu dashboard
$route['master-dashboard'] = 'master/Dashboard';
$route['master-get-fam'] = 'master/Dashboard/get_fam';
$route['master-get-uname']['post'] = 'master/dashboard/get_uname/';
$route['master-get-my']['post'] = 'master/dashboard/get_my/';

//profile
$route['master-profile'] = 'master/Profile';
$route['master-update-pofile']['post'] = 'master/Profile/update';
$route['master-update-username']['post'] = 'master/Profile/update_username';
$route['master-update-password']['post'] = 'master/Profile/update_password';
$route['master-update-foto']['post'] = 'master/Profile/update_foto';

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
$route['master-acara-add']['post'] = 'master/Acara/add_acara';
$route['master-acara-update-foto']['post'] = 'master/Acara/update_foto';
$route['master-get-acara']['post'] = 'master/Acara/get_acara';
$route['master-acara-update']['post'] = 'master/Acara/update_acara';
$route['master-acara-delete']['post'] = 'master/Acara/delete_acara';

//menu galeri
$route['master-galeri'] = 'master/Galeri';
$route['master-galeri-add']['post'] = 'master/Galeri/add_galeri';
$route['master-galeri-get']['post'] = 'master/Galeri/get_galeri';
$route['master-galeri-update']['post'] = 'master/Galeri/update_galeri';
$route['master-galeri-delete']['post'] = 'master/Galeri/delete_galeri';


// ##Akses usermanager##

//menu dashboard usm
$route['dashboard-usm'] = 'userManager/Dashboard';
$route['usm-get-fam'] = 'userManager/Dashboard/get_fam';
$route['usm-get-uname']['post'] = 'userManager/dashboard/get_uname/';
$route['usm-get-my']['post'] = 'userManager/dashboard/get_my/';

//profile usm
$route['profile-usm'] = 'userManager/Profile';
$route['usm-update-pofile']['post'] = 'userManager/Profile/update';
$route['usm-update-username']['post'] = 'userManager/Profile/update_username';
$route['usm-update-password']['post'] = 'userManager/Profile/update_password';
$route['usm-update-foto']['post'] = 'userManager/Profile/update_foto';

//menu pengguna usm
$route['data-keluarga-usm'] = 'userManager/Pengguna';
$route['data-keluarga-usm-validasi'] = 'userManager/Pengguna/validasi';
$route['usm-add-pengguna']['post'] = 'userManager/Pengguna/add_pengguna';
$route['usm-update-pengguna']['post'] = 'userManager/Pengguna/update_pengguna';
$route['usm-delete-pengguna']['post'] = 'userManager/Pengguna/delete_pengguna';
$route['usm-get-user']['post'] = 'userManager/Pengguna/get_user';
$route['usm-update-foto-pengguna']['post'] = 'userManager/Pengguna/update_foto';
$route['usm-get-user-val']['post'] = 'userManager/Pengguna/get_user_val';
$route['usm-get-uname-val']['post'] = 'userManager/Pengguna/get_uname_val/';
$route['usm-update-pengguna-val']['post'] = 'userManager/Pengguna/update_pengguna_val';
$route['usm-delete-pengguna-val']['post'] = 'userManager/Pengguna/delete_pengguna_val';