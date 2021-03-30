<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//TODO:: login and authentication routes
$route['auth']='C_login/authentication';
$route['logout'] ='C_login/logout';
$route['dashboard']='C_dashboard';
$route['list']='Ajax_pagination';
$route['displayPList']='Ajax_pagination/pagination';
$route['displayPList/(:any)']='Ajax_pagination/pagination';

$route['displayKSAL']='C_list/displayKSAList';
$route['displaySRCKSA']='C_list/searchDisplayList';
$route['exportExcel']='ExcelController/phpExcelList';
$route['displaytable']='C_list/displaytableFormat';

//$route['pdf_report']='C_report';