<?php
/**
 * Created by PhpStorm.
 * User: icocos
 * Date: 2017/4/16
 * Time: 下午11:43
 */

//http://www.icocos.cn/APP/iCocosHome.php?page=1&size=10

require_once('./iCocosResponse.php');
require_once('./iCocosDB.php');

$page = isset($_GET['page'])?$_GET['page']:0;
$size = isset($_GET['size'])?$_GET['size']:10;

if (!is_numeric($page) || !is_numeric($size)) {
    return iCocosResponse::show(401,'数据不合法');
}

//$offset = ($page - 1) * $size;
$offset = ($page) * $size;
//$sql = "select * from APP";
//$sql = "select * from APP where id=1 order by orderby id limit ".$offset.",".$size;
$sql = "select * from APP where id>3 order by id desc limit ".$offset.",".$size;

//echo $sql;

try{
$connect = iCocosDB::getInstance()->connect();
} catch (Exception $e) {
    return iCocosResponse::show(404,'首页数链接失败');
}
mysqli_select_db($connect, 'APP');
$res = mysqli_query($connect,$sql);
//var_dump($res);

//echo '===============<br />';

$apps = array();
while ($app=mysqli_fetch_array($res)) {
    $apps[] = $app;
}

//var_dump($apps);

if ($apps) {
    return iCocosResponse::show(200,'首页数据获取成功', $apps);
} else {
    return iCocosResponse::show(400,'首页数据获取失败', $apps);
}





