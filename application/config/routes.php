<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// BACK-END
$route['(root|my)'] 																= 'back_end/Root/Index';
$route['(root|my)/oturumu-kapat'] 													= 'back_end/Root/Sign_Out';
$route['panel'] 																	= 'back_end/Back_End/Uri_Parser';
$route['panel/(:any)'] 																= 'back_end/Back_End/Uri_Parser/$1';
$route['panel/(:any)/(:any)'] 														= 'back_end/Back_End/Uri_Parser/$1/$2';
$route['panel/(:any)/(:any)/(:any)'] 												= 'back_end/Back_End/Uri_Parser/$1/$2/$3';

// FRONT-END
$route['yayin-kapali']																= 'Closed';
$route['(:any)/(:any)/(:any)'] 														= 'Front_End/Uri_Parser/$1/$2/$3';
$route['(:any)/(:any)'] 															= 'Front_End/Uri_Parser/$1/$2';
$route['(:any)'] 																	= 'Front_End/Uri_Parser/$1';

$route['default_controller'] 														= 'Front_End/Uri_Parser';
$route['404_override'] 																= '';
$route['translate_uri_dashes'] 														= FALSE;