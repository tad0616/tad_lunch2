<?php
include_once "header.php";

$op=isset($_POST['op'])?$_POST['op']:"";
$col=isset($_POST['col'])?$_POST['col']:"";
$val=isset($_POST['val'])?$_POST['val']:"";
if($op=="get_stuff"){
  $search_col="{$col}_stuff";
}elseif($op=="get_cook"){
  $search_col="{$col}_cook";
}else{
  exit;
}
$sql = "select `$search_col` from `".$xoopsDB->prefix("tad_lunch2_data")."` where `$col` = '$val' ";
$result = $xoopsDB->query($sql);

list($data)=$xoopsDB->fetchRow($result);
echo $data;
?>
