<?php
defined("BASEPATH") or exit("No direct script access allowed");

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
$route["default_controller"] = "main_c";
$route["404_override"] = "";
$route["translate_uri_dashes"] = false;

// custom en routes
$route["en"] = "main_c";
$route["en/detail"] = "main_c/causedetail";
$route["en/all-campaigns"] = "main_c/allcause";
$route["en/login"] = "clogin";
$route["en/sign-up"] = "clogin/sign_up";
$route["en/verifikasi"] = "cdash";
$route["en/dashboard"] = "cdash/dashboard";
$route["en/create-campaign"] = "cdash/create_campaign";
$route["en/new-campaign"] = "cdash/new_campaign";

// custom id routes
$route["id"] = "main_id";
$route["id/masuk"] = "clogin_id";
$route["id/daftar"] = "clogin_id/sign_up";
$route["id/lupa-password"] = "clogin_id/password";
$route["new-password/(:any)/(:any)"] = "clogin_id/new_password/$1/$2";
$route["id/verifikasi"] = "cdash_id";
$route["id/dashboard"] = "cdash_id/dashboard";
$route["id/create-campaign"] = "cdash_id/create_campaign";
$route["id/new-campaign"] = "cdash_id/new_campaign";

//verify
$route["verify/(:any)/(:any)"] = 'verify/email/$1/$2';
$route["success"] = "verify/success/";
$route["error"] = "verify/error/";
