<?php
//  ------------------------------------------------------------------------ //
// 本模組由 tad 製作
// 製作日期：2013-10-31
// $Id:$
// ------------------------------------------------------------------------- //

//區塊主函式 (營養午餐公告(tad_lunch2_show))
function tad_lunch2_show($options){
  global $xoopsDB;

  $modhandler = &xoops_gethandler('module');
  $xoopsModule = &$modhandler->getByDirname("tad_lunch2");
  $config_handler =& xoops_gethandler('config');
  $xoopsModuleConfig =& $config_handler->getConfigsByCat(0, $xoopsModule->getVar('mid'));

  $nowYm=empty($show_ym)?date("Y-m"):$show_ym;

  $lunch_target=str_replace(";", ",", $xoopsModuleConfig['lunch_target']);

  $sql = "select * from `".$xoopsDB->prefix("tad_lunch2_data")."` where lunch_date like '{$nowYm}-%' order by lunch_date , find_in_set(`lunch_target`,'{$lunch_target},') limit 0,{$options[0]}";

  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  $all_content="";
  $i=0;
  while($all=$xoopsDB->fetchArray($result)){
    //以下會產生這些變數： $lunch_data_sn ,$lunch_target, $lunch_sn , $lunch_date , $main_food , $main_food_stuff , $main_dish , $main_dish_stuff , $main_dish_cook , $side_dish1 , $side_dish1_stuff , $side_dish1_cook , $side_dish2 , $side_dish2_stuff , $side_dish2_cook , $side_dish3 , $side_dish3_stuff , $side_dish3_cook , $fruit , $soup , $soup_stuff , $soup_cook , $protein , $fat , $carbohydrate , $calorie
    foreach($all as $k=>$v){
      $$k=$v;
    }


    $all_content[$i]['lunch_data_sn']=$lunch_data_sn;
    $all_content[$i]['lunch_target']=$lunch_target;
    $all_content[$i]['lunch_sn']=$lunch_sn;
    $all_content[$i]['lunch_date']=$lunch_date;
    $all_content[$i]['main_food']=$main_food;
    $all_content[$i]['main_food_stuff']=$main_food_stuff;
    $all_content[$i]['main_dish']=$main_dish;
    $all_content[$i]['main_dish_stuff']=$main_dish_stuff;
    $all_content[$i]['main_dish_cook']=$main_dish_cook;
    $all_content[$i]['side_dish1']=$side_dish1;
    $all_content[$i]['side_dish1_stuff']=$side_dish1_stuff;
    $all_content[$i]['side_dish1_cook']=$side_dish1_cook;
    $all_content[$i]['side_dish2']=$side_dish2;
    $all_content[$i]['side_dish2_stuff']=$side_dish2_stuff;
    $all_content[$i]['side_dish2_cook']=$side_dish2_cook;
    $all_content[$i]['side_dish3']=$side_dish3;
    $all_content[$i]['side_dish3_stuff']=$side_dish3_stuff;
    $all_content[$i]['side_dish3_cook']=$side_dish3_cook;
    $all_content[$i]['fruit']=$fruit;
    $all_content[$i]['soup']=$soup;
    $all_content[$i]['soup_stuff']=$soup_stuff;
    $all_content[$i]['soup_cook']=$soup_cook;
    $all_content[$i]['protein']=$protein;
    $all_content[$i]['fat']=$fat;
    $all_content[$i]['carbohydrate']=$carbohydrate;
    $all_content[$i]['calorie']=$calorie;
    $all_content[$i]['title']=sprintf(_MB_TAD_LUNCH2_DATA_SHORT_MENU,$lunch_target);
    $i++;
  }

  //刪除確認的JS

 return $all_content;
}

//區塊編輯函式
function tad_lunch2_show_edit($options){
  $seled0_0=($options[0]=="1")?"selected":"";
  $seled0_1=($options[0]=="2")?"selected":"";
  $seled0_2=($options[0]=="3")?"selected":"";
  $seled0_3=($options[0]=="4")?"selected":"";
  $seled0_4=($options[0]=="5")?"selected":"";
  $seled0_5=($options[0]=="6")?"selected":"";
  $seled0_6=($options[0]=="7")?"selected":"";

  $form="
  "._MB_TADLUNCH2_TAD_LUNCH2_SHOW_EDIT_BITEM0."
  <select name='options[0]'>
    <option $seled0_0 value='1'>1</option>
    <option $seled0_1 value='2'>2</option>
    <option $seled0_2 value='3'>3</option>
    <option $seled0_3 value='4'>4</option>
    <option $seled0_4 value='5'>5</option>
    <option $seled0_5 value='6'>6</option>
    <option $seled0_6 value='7'>7</option>
  </select>
  ";
  return $form;
}

?>