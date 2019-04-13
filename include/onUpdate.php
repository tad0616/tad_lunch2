<?php

use XoopsModules\Tad_lunch2\Utility;

function xoops_module_update_tad_lunch2(&$module, $old_version)
{
    global $xoopsDB;

    Utility::mk_dir(XOOPS_ROOT_PATH . '/uploads/tad_lunch2');
    Utility::mk_dir(XOOPS_ROOT_PATH . '/uploads/tad_lunch2/thumbs');
    if (!Utility::chk_chk1()) {
        Utility::go_update1();
    }

    if (!Utility::chk_chk2()) {
        Utility::go_update2();
    }
    Utility::chk_tad_lunch2_block();

    return true;
}
