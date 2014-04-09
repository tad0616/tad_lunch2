<?php
$modversion = array();

//---模組基本資訊---//
$modversion['name'] = _MI_TADLUNCH2_NAME;
$modversion['version']	= '1.3';
$modversion['description'] = _MI_TADLUNCH2_DESC;
$modversion['author'] = _MI_TADLUNCH2_AUTHOR;
$modversion['credits']	= _MI_TADLUNCH2_CREDITS;
$modversion['help'] = 'page=help';
$modversion['license']		= 'GPL see LICENSE';
$modversion['image']		= "images/logo.png";
$modversion['dirname'] = basename(dirname(__FILE__));


//---模組狀態資訊---//
$modversion['release_date'] = '2014-03-06';
$modversion['module_website_url'] = 'http://tad0616.net';
$modversion['module_website_name'] = _MI_TADLUNCH2_AUTHOR_WEB;
$modversion['module_status'] = 'release';
$modversion['author_website_url'] = 'http://tad0616.net';
$modversion['author_website_name'] = _MI_TADLUNCH2_AUTHOR_WEB;
$modversion['min_php']= 5.2;
$modversion['min_xoops']='2.5';


//---paypal資訊---//
$modversion ['paypal'] = array();
$modversion ['paypal']['business'] = 'tad0616@gmail.com';
$modversion ['paypal']['item_name'] = 'Donation :'. _MI_TADLUNCH2_AUTHOR;
$modversion ['paypal']['amount'] = 0;
$modversion ['paypal']['currency_code'] = 'USD';

//---啟動後台管理界面選單---//
$modversion['system_menu'] = 1;//---資料表架構---//
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][1] = "tad_lunch2";
$modversion['tables'][2] = "tad_lunch2_data";

//---管理介面設定---//
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/main.php";
$modversion['adminmenu'] = "admin/menu.php";

//---使用者主選單設定---//
$modversion['hasMain'] = 1;


//---樣板設定---//
$i=0;
$modversion['templates'][$i]['file'] = 'tad_lunch2_adm_main.html';
$modversion['templates'][$i]['description'] = 'tad_lunch2_adm_main.html';

$i++;
$modversion['templates'][$i]['file'] = 'tad_lunch2_index.html';
$modversion['templates'][$i]['description'] = 'tad_lunch2_index.html';


//---區塊設定---//
$i=0;
$modversion['blocks'][$i]['file'] = "tad_lunch2_show.php";
$modversion['blocks'][$i]['name'] = _MI_TADLUNCH2_BNAME1;
$modversion['blocks'][$i]['description'] = _MI_TADLUNCH2_BDESC1;
$modversion['blocks'][$i]['show_func'] = "tad_lunch2_show";
$modversion['blocks'][$i]['template'] = "tad_lunch2_block_tad_lunch2_show.html";
$modversion['blocks'][$i]['edit_func'] = "tad_lunch2_show_edit";
$modversion['blocks'][$i]['options'] = "1;horizontal";

//---偏好設定---//
$modversion['config'][1]['name']    = 'lunch_target';
$modversion['config'][1]['title']   = '_MI_TADLUNCH2_FOR_WHOM';
$modversion['config'][1]['description'] = '_MI_TADLUNCH2_FOR_WHOM_DESC';
$modversion['config'][1]['formtype']    = 'textbox';
$modversion['config'][1]['valuetype']   = 'text';
$modversion['config'][1]['default'] = _MI_TADLUNCH2_FOR_WHOM_DEFAULT;

$modversion['config'][2]['name']    = 'lunch_manager';
$modversion['config'][2]['title']   = '_MI_TADLUNCH2_MANAGER';
$modversion['config'][2]['description'] = '_MI_TADLUNCH2_MANAGER_DESC';
$modversion['config'][2]['formtype']    = 'user_multi';
$modversion['config'][2]['valuetype']   = 'array';
$modversion['config'][2]['default'] = '1';


?>