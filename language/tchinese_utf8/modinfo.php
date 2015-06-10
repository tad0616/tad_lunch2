<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2013-10-31
// $Id:$
// ------------------------------------------------------------------------- //
include_once XOOPS_ROOT_PATH . '/modules/tadtools/language/' . $xoopsConfig['language'] . '/modinfo_common.php';

define('_MI_TADLUNCH2_NAME', '營養午餐公告');
define('_MI_TADLUNCH2_AUTHOR', '營養午餐公告');
define('_MI_TADLUNCH2_CREDITS', 'tad');
define('_MI_TADLUNCH2_DESC', '此模組的用來快速匯入營養午餐資訊以便公告');
define('_MI_TADLUNCH2_AUTHOR_WEB', 'Tad 教材網');
define("_MI_TADLUNCH2_ADMENU1", "營養午餐設定");
define("_MI_TADLUNCH2_ADMENU1_DESC", "營養午餐設定");
define("_MI_TADLUNCH2_BNAME1", "營養午餐公告");
define("_MI_TADLUNCH2_BDESC1", "營養午餐公告(tad_lunch2_show)");
define("_MI_TADLUNCH2_FOR_WHOM", "菜單供給年級");
define("_MI_TADLUNCH2_FOR_WHOM_DESC", "若不同年級同時有不同廠商供餐，請在此設定年級，用小寫分號「;」隔開即可。");
define("_MI_TADLUNCH2_FOR_WHOM_DEFAULT", "全校");
define("_MI_TADLUNCH2_MANAGER", "午餐管理人");
define("_MI_TADLUNCH2_MANAGER_DESC", "設定可輸入或上傳午餐資料的人員（可複選）<div>若會員人數太多，選項預設為空值，需點「更多用戶」設定條件，才會產生選項。</div>");

define("_MI_TADLUNCH2_USE_COLS", "欲顯示欄位");
define("_MI_TADLUNCH2_USE_COLS_DESC", "會作用在區塊或任何需呈現的地方（輸入的表單不受影響）");
define("_MI_TADLUNCH2_MAIN_FOOD", "主食");
define("_MI_TADLUNCH2_MAIN_DISH", "主菜");
define("_MI_TADLUNCH2_SIDE_DISH1", "副菜1");
define("_MI_TADLUNCH2_SIDE_DISH2", "副菜2");
define("_MI_TADLUNCH2_SIDE_DISH3", "副菜3");
define("_MI_TADLUNCH2_FRUIT", "水果");
define("_MI_TADLUNCH2_SOUP", "湯點");
define("_MI_TADLUNCH2_CALORIE", "總熱量");
define("_MI_TADLUNCH2_SHOW_KIND", "模組列表是否顯示類別");
define("_MI_TADLUNCH2_SHOW_KIND_DESC", "若選否，僅單純秀出「米飯」、「洋蔥紅蘿蔔炒蛋」...這類的食物名稱，而不秀出「主食」、「主菜」...等類別名稱");
