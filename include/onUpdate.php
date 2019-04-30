<?php

use XoopsModules\Tadtools\Utility;
use XoopsModules\Tad_lunch2\Update;

function xoops_module_update_tad_lunch2(&$module, $old_version)
{
    global $xoopsDB;

    Utility::mk_dir(XOOPS_ROOT_PATH . '/uploads/tad_lunch2');
    Utility::mk_dir(XOOPS_ROOT_PATH . '/uploads/tad_lunch2/thumbs');
    if (!Update::chk_chk1()) {
        Update::go_update1();
    }

    if (!Update::chk_chk2()) {
        Update::go_update2();
    }
    Update::chk_tad_lunch2_block();

    return true;
}
