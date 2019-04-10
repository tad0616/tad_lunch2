<?php

use XoopsModules\Tad_lunch2\Utility;

include dirname(__DIR__) . '/preloads/autoloader.php';

function xoops_module_install_tad_lunch2(&$module)
{

    Utility::mk_dir(XOOPS_ROOT_PATH . "/uploads/tad_lunch2");
    Utility::mk_dir(XOOPS_ROOT_PATH . "/uploads/tad_lunch2/thumbs");

    return true;
}

