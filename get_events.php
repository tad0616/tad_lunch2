<?php
include_once "header.php";

$start=date("Y-m-d",$_REQUEST['start']/1000);
$end=date("Y-m-d",$_REQUEST['end']/1000);

$lunch_target_arr=explode(';',$xoopsModuleConfig['lunch_target']);
if(empty($_REQUEST['lunch_target'])){
  $lunch_target=trim($lunch_target_arr[0]);
}else{
  $lunch_target=trim($_REQUEST['lunch_target']);
}

$sql = "select  * from `".$xoopsDB->prefix("tad_lunch2_data")."` where lunch_date >= '$start' and lunch_date <= '$end' and lunch_target='{$lunch_target}'";
$result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

$myEvents="";
$i=0;
while($all=$xoopsDB->fetchArray($result)){
    //以下會產生這些變數： $lunch_data_sn ,$lunch_target, $lunch_sn , $lunch_date , $main_food , $main_food_stuff , $main_dish , $main_dish_stuff , $main_dish_cook , $side_dish1 , $side_dish1_stuff , $side_dish1_cook , $side_dish2 , $side_dish2_stuff , $side_dish2_cook , $side_dish3 , $side_dish3_stuff , $side_dish3_cook , $fruit , $soup , $soup_stuff , $soup_cook , $protein , $fat , $carbohydrate , $calorie
  foreach($all as $k=>$v){
    $$k=$v;
  }

  $name="";
  if(!empty($main_food))$name.=_MD_TADLUNCH2_MDIN_FOOD._TAD_FOR.$main_food."\n";
  if(!empty($main_dish))$name.=_MD_TADLUNCH2_MDIN_DISH._TAD_FOR.$main_dish."\n";
  if(!empty($side_dish1))$name.=_MD_TADLUNCH2_SIDE_DISH1._TAD_FOR.$side_dish1."\n";
  if(!empty($side_dish2))$name.=_MD_TADLUNCH2_SIDE_DISH2._TAD_FOR.$side_dish2."\n";
  if(!empty($side_dish3))$name.=_MD_TADLUNCH2_SIDE_DISH3._TAD_FOR.$side_dish3."\n";
  if(!empty($fruit))$name.=_MD_TADLUNCH2_FRUIT._TAD_FOR.$fruit."\n";
  if(!empty($soup))$name.=_MD_TADLUNCH2_SOUP._TAD_FOR.$soup."\n";

  $myEvents[$i]['id']=$lunch_data_sn;
  $myEvents[$i]['title']=$name;
  $myEvents[$i]['start']=strtotime($lunch_date);
  $myEvents[$i]['rel']=XOOPS_URL."/modules/tad_lunch2/lunch.php?lunch_data_sn=".$lunch_data_sn;
  $i++;
}

echo json_encode($myEvents);
?>
