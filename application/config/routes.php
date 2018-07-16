<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['crud/delete/(:any)'] = 'CrudController/delete/$1';
$route['crud/update'] = 'CrudController/update';
$route['crud/edit/(:any)'] = 'CrudController/edit/$1';
$route['crud/show'] = 'CrudController/show';
$route['crud/add'] = 'CrudController/add';
$route['crud'] = 'CrudController/index';
$route['default_controller'] = 'CrudController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
