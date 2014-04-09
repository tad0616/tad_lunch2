<?php
/*-----------引入檔案區--------------*/
include "header.php";
include_once XOOPS_ROOT_PATH."/header.php";

/*-----------功能函數區--------------*/


//以流水號秀出某筆tad_lunch2_data資料內容
function show_one_tad_lunch2_data($lunch_data_sn=""){
  global $xoopsDB , $xoopsTpl , $isAdmin , $isManager;

  if(empty($lunch_data_sn)){
    return;
  }


  $bootstrap=get_bootstrap();
  $jquery=get_jquery();

  $all_data="{$bootstrap}{$jquery}";

  $sql = "select a.*,b.* from `".$xoopsDB->prefix("tad_lunch2_data")."` as a left join `".$xoopsDB->prefix("tad_lunch2")."` as b on a.lunch_sn=b.lunch_sn where a.`lunch_data_sn` = '{$lunch_data_sn}' ";

  $result = $xoopsDB->query($sql) or redirect_header($_SERVER['PHP_SELF'],3, mysql_error());

  while($all=$xoopsDB->fetchArray($result)){

    //以下會產生這些變數： $lunch_data_sn , $lunch_sn , $lunch_date , $main_food , $main_food_stuff , $main_dish , $main_dish_stuff , $main_dish_cook , $side_dish1 , $side_dish1_stuff , $side_dish1_cook , $side_dish2 , $side_dish2_stuff , $side_dish2_cook , $side_dish3 , $side_dish3_stuff , $side_dish3_cook , $fruit , $soup , $soup_stuff , $soup_cook , $protein , $fat , $carbohydrate , $calorie
    foreach($all as $k=>$v){
      $$k=$v;
    }

    $main_food_stuff=change_stuff($main_food_stuff);
    $main_dish_stuff=change_stuff($main_dish_stuff);
    $side_dish1_stuff=change_stuff($side_dish1_stuff);
    $side_dish2_stuff=change_stuff($side_dish2_stuff);
    $side_dish3_stuff=change_stuff($main_food_stuff);
    $soup_stuff=change_stuff($soup_stuff);

    $title=sprintf(_MD_TAD_LUNCH2_DATA_MENU , $lunch_date , $lunch_target);

    $tool="";
    if($isAdmin or $isManager){
      $tool="
      <script type='text/javascript'>
      function delete_tad_lunch2_data_func(lunch_data_sn){
        var sure = window.confirm('"._TAD_DEL_CONFIRM."');
        if (!sure)  return;
        location.href='".XOOPS_URL."/modules/tad_lunch2/index.php?op=delete_tad_lunch2_data&lunch_data_sn=' + lunch_data_sn;
      }
      </script>
        <div class='span6 offset3 text-right'>
        <a href='javascript:delete_tad_lunch2_data_func($lunch_data_sn)' class='btn btn-mini btn-danger'>"._TAD_DEL."</a>
        <a href='".XOOPS_URL."/modules/tad_lunch2/index.php?op=tad_lunch2_data_form&lunch_data_sn={$lunch_data_sn}' class='btn btn-mini btn-warning'>"._TAD_EDIT."</a>
        <a href='".XOOPS_URL."/modules/tad_lunch2/index.php?op=tad_lunch2_data_form' class='btn btn-mini btn-info'>"._TAD_ADD."</a>
      </div>";
    }

    $all_data.="
    <div class='row-fluid'>
      <div class='span4' style='font-weight:bold;'>
       $title
      </div>

      <div class='span2'>
        <span class='label label-success'>"._MD_TADLUNCH2_PROTEIN."</span>
        {$protein} g
      </div>

      <div class='span2'>
        <span class='label label-warning'>"._MD_TADLUNCH2_FAT."</span>
        {$fat} g
      </div>

      <div class='span2'>
        <span class='label label-important'>"._MD_TADLUNCH2_CARBOHYDRATE."</span>
        {$carbohydrate} g
      </div>

      <div class='span2'>
        <span class='label label-info'>"._MD_TADLUNCH2_CALORIE."</span>
        {$calorie} g
      </div>

    </div>
    <table class='table table-striped table-bordered table-hover'>

      <tr>
        <th style='text-align:center;'><!--廠商--></th>
        <th style='text-align:center;'><!--主食-->
          <img src='".XOOPS_URL."/modules/tad_lunch2/images/main_food.png' alt='"._MD_TADLUNCH2_MDIN_FOOD."'>"._MD_TADLUNCH2_MDIN_FOOD."
        </th>
        <th style='text-align:center;'><!--主菜-->

        <img src='".XOOPS_URL."/modules/tad_lunch2/images/main_dish.png' alt='"._MD_TADLUNCH2_MDIN_DISH."'>"._MD_TADLUNCH2_MDIN_DISH."
        </th>
        <th style='text-align:center;'><!--副菜1-->

        <img src='".XOOPS_URL."/modules/tad_lunch2/images/side_dish1.png' alt='"._MD_TADLUNCH2_SIDE_DISH1."'>"._MD_TADLUNCH2_SIDE_DISH1."
        </th>
        <th style='text-align:center;'><!--副菜2-->

        <img src='".XOOPS_URL."/modules/tad_lunch2/images/side_dish2.png' alt='"._MD_TADLUNCH2_SIDE_DISH2."'>"._MD_TADLUNCH2_SIDE_DISH2."
        </th>
        <th style='text-align:center;'><!--副菜3-->

        <img src='".XOOPS_URL."/modules/tad_lunch2/images/side_dish3.png' alt='"._MD_TADLUNCH2_SIDE_DISH3."'>"._MD_TADLUNCH2_SIDE_DISH3."
        </th>
        <th style='text-align:center;'><!--水果-->

        <img src='".XOOPS_URL."/modules/tad_lunch2/images/fruit.png' alt='"._MD_TADLUNCH2_FRUIT."'>"._MD_TADLUNCH2_FRUIT."
        </th>
        <th style='text-align:center;'><!--湯點-->

        <img src='".XOOPS_URL."/modules/tad_lunch2/images/soup.png' alt='"._MD_TADLUNCH2_MDIN_FOOD."'>"._MD_TADLUNCH2_SOUP."
        </th>
      </tr>
      <tr>
        <th style='text-align:center;'>"._MD_TADLUNCH2_FOOD."</th>
        <td style='text-align:center;'>$main_food</td>
        <td style='text-align:center;'>$main_dish</td>
        <td style='text-align:center;'>$side_dish1</td>
        <td style='text-align:center;'>$side_dish2</td>
        <td style='text-align:center;'>$side_dish3</td>
        <td style='text-align:center;'>$fruit</td>
        <td style='text-align:center;'>$soup</td>
      </tr>
      <tr>
        <th style='text-align:center;'>"._MD_TADLUNCH2_FOOD_STUFF_SHORT."</th>
        <td style='text-align:center;'>$main_food_stuff</td>
        <td style='text-align:center;'>$main_dish_stuff</td>
        <td style='text-align:center;'>$side_dish1_stuff</td>
        <td style='text-align:center;'>$side_dish2_stuff</td>
        <td style='text-align:center;'>$side_dish3_stuff</td>
        <td></td>
        <td style='text-align:center;'>$soup_stuff</td>
      </tr>
      <tr>
        <th style='text-align:center;'>"._MD_TADLUNCH2_COOK_SHORT."</th>
        <td style='text-align:center;'>$main_food_cook</td>
        <td style='text-align:center;'>$main_dish_cook</td>
        <td style='text-align:center;'>$side_dish1_cook</td>
        <td style='text-align:center;'>$side_dish2_cook</td>
        <td style='text-align:center;'>$side_dish3_cook</td>
        <td style='text-align:center;'></td>
        <td style='text-align:center;'>$soup_cook</td>
      </tr>
    </table>
    $tool
    ";
  }
  die($all_data);
}

function change_stuff($stuff){
  $stuff=str_replace(";", "<br>", $stuff);
  $stuff=str_replace("g ", "g<br>", $stuff);
  return $stuff;
}



/*-----------執行動作判斷區----------*/
$lunch_data_sn=empty($_REQUEST['lunch_data_sn'])?"":intval($_REQUEST['lunch_data_sn']);
show_one_tad_lunch2_data($lunch_data_sn);

/*-----------秀出結果區--------------*/

include_once XOOPS_ROOT_PATH.'/footer.php';
?>