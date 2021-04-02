<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//TODO:: login and authentication routes
$route['auth']='C_login/authentication';
$route['logout'] ='C_login/logout';
$route['dashboard']='C_dashboard';
$route['list']='Display_list';
$route['displayPList']='Display_list/display_ksa_list';
$route['displayPList/(:any)']='Ajax_pagination/pagination';

$route['displayKSAL']='C_list/displayKSAList';
$route['displaySRCKSA']='C_list/searchDisplayList';
$route['exportExcel']='ExcelController/phpExcelList';
$route['displaytable']='C_list/displaytableFormat';
$route['insert_excel_file']='Import_excel/import_excel_file';

$route['add_user']='User';
$route['insertUser']='User/insertUserData';

//$route['pdf_report']='C_report';