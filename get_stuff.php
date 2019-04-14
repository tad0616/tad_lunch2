<?php
require_once __DIR__ . '/header.php';

$op = isset($_POST['op']) ? $_POST['op'] : '';
$col = isset($_POST['col']) ? $_POST['col'] : '';
$val = isset($_POST['val']) ? $_POST['val'] : '';
if ('get_stuff' === $op) {
    $search_col = "{$col}_stuff";
} elseif ('get_cook' === $op) {
    $search_col = "{$col}_cook";
} else {
    exit;
}
$sql = "select `$search_col` from `" . $xoopsDB->prefix('tad_lunch2_data') . "` where `$col` = '$val' ";
$result = $xoopsDB->query($sql);

list($data) = $xoopsDB->fetchRow($result);
echo $data;
