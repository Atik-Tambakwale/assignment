<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//TODO:: login and authentication routes
$route['auth']='C_login/authentication';
$route['logout'] ='C_login/logout';
$route['dashboard']='C_dashboard';

//TODO::user creation and display user lists route
$route['user']='C_user';
$route['usertype']='C_user/loadUserType';
$route['create']='C_user/insertData';
$route['displayData']='C_user/DisplayUserData';
$route['OneDplyDt']='C_user/oneDisplayData';
$route['updateData']='C_user/UpdateuserData';
$route['deleteData']='C_user/deleteuserData';
$route['regenerate']='C_user/regeneratePassword';

//TODO::App user and Display route
$route['master']='App_user/C_master';
$route['createAU']='App_user/C_master/createAppUser';
$route['displayAU']='App_user/C_master/displayAppUser';
$route['deleteAU']='App_user/C_master/DeleteAppUser';
$route['updateStatusAU']='App_user/C_master/update_status';
$route['updateUTAU']='App_user/C_master/update_userType';
$route['regeneratePAU']='App_user/C_master/ReGeneratePasswordAppUser';
$route['oneDplyAU']='App_user/C_master/oneDisplayAppUser';
$route['oneUpdateAU']='App_user/C_master/updateAppUser';

//TODO::  PROPERTY_TYPE,INSERT,DELETE, AND  DISPLAY LIST ROUTES
$route['createPT']='Property_Type/Property_type/createPropertyType';
$route['displayPT']='Property_Type/Property_type/displayPropertyType';
$route['deletePT']='Property_Type/Property_type/deletePropertyType';

//TODO:: PROPERTY_UNIT  INSERT DELETE,EDIT AND DISPLAY LIST ROUTES
$route['createPU']='Property_unit/Property_unit/createPropertyUnit';
$route['displayPU']='Property_unit/Property_unit/displayPropertyUnit';
$route['deletePU']='Property_unit/Property_unit/deletePropertyUnit';
$route['OneDplyPU']='Property_unit/Property_unit/oneDisplayPropertyUnit';
$route['updatePU']='Property_unit/Property_unit/UpdatePropertyUnit';
$route['deletePU']='Property_unit/Property_unit/deletePropertyUnit';

//TODO:: DOCUMENT TYPE INSERT,EDIT,DELETE AND DISPLAY LIST ROUTES
$route['createDT']='Document_Type/Document_type/createDocumentType';
$route['displayDT']='Document_Type/Document_type/displayDocumentType';
$route['OneDplyDT']='Document_Type/Document_type/oneDisplayDocumentType';
$route['updateDT']='Document_Type/Document_type/UpdateDocumentType';
$route['deleteDT']='Document_Type/Document_type/deleteDocumentType';


//TODO:: PROPERTY REGISTER INSERT AND   DISPLAY LIST ROUTES
$route['property']='Property/Property';
$route['insertP']='Property/Property/insertPropertyData';
$route['displayP']='Property/Property/displayPropertyList';
$route['OneDplyP']='Property/Property/oneDisplayProperty';
$route['updateP']='Property/Property/updateProperty';
$route['deleteP']='Property/Property/deleteProperty';
$route['OOneDplyP']='Property/Property/oneDisplayOwner';
$route['OupdateP']='Property/Property/UpdateOwerInfo';
$route['deletedisplayP']='Property/Property/displayDeletePropertyList';
$route['UndoP']='Property/Property/undoProperty';

//TODO::document upload routes
$route['displayPUR']='Document_upload/Document/displayPropertyUsername';
$route['insertDU']='Document_upload/Document/insertDocument_upload';
$route['displayDU']='Document_upload/Document/displayDocumentUpload';
$route['download']='Document_upload/Document/download/file_path';
$route['searchData']='Document_upload/Document/searchDocumentUpload';
$route['deleteDU']='Document_upload/Document/DeleteDocumentUpload';
$route['insertMDP']='Document_upload/Document/insertMDocuments';
$route['displayMDA']='Document_upload/Document/displayMissingDocument';
$route['OneDplyMD']='Document_upload/Document/oneDisplayMissingDocument';
$route['deleteMD']='Document_upload/Document/deleteMissingDocument';

//TODO:: notification routes
$route['nproperty']='Notification_Property/NProperty';
$route['displayNRMD']='Notification_Property/NProperty/displayRemainder';
$route['insertNP']='Notification_Property/NProperty/insertNotificationProperty';
$route['displayNP']='Notification_Property/NProperty/displayNotificationProperty';
$route['OneDplyNt']='Notification_Property/NProperty/oneDisplayNTList';
$route['updateNFN']='Notification_Property/NProperty/updateNTList'; 
$route['deleteNFN']='Notification_Property/NProperty/deleteNotification';
$route['upcomingNP']='Notification_Property/NProperty/upcomingNotificationProperty';
