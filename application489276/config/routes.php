<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

$route['default_controller'] = 'candidates/candidate_loggin_render';
$route['candidatos/ingresar'] = 'candidates/candidate_validate_render';
$route['candidatos/registrar'] = 'candidates/candidate_register_render';
$route['candidatos/actualizar/(:num)'] = 'candidates/candidate_register_render_update/$1';
$route['candidatos/validar'] = 'candidates/candidate_form_validation_render';
$route['candidatos/contrasena'] = 'candidates/candidate_recover_password';
$route['candidatos/cambiopassword/(:num)'] = 'candidates/candidate_change_password_render/$1';
//$route['candidatos/loggin'] = 'candidates/candidate_loggin_render';
$route['administracion/listado'] = 'administrator/candidates_list_render';
$route['administracion/ingresar'] = 'administrator/administrator_loggin_render';
$route['administracion/detalle/(:num)'] = 'administrator/detail/$1';
$route['parametrizacion/mail'] = 'administrator/parametrization_mail_render';
$route['parametrizacion/select'] = 'administrator/getInfoProcess';
$route['404_override'] = '';
$route['acceso_no_permitido'] = 'welcome';
$route['translate_uri_dashes'] = FALSE;