
<?php
session_start();
require_once "../../dao/loai.php"; 
require_once "../../dao/loai.php"; 
require_once "../../dao/hang-hoa.php"; 
require_once "../../dao/pdo.php";
require_once "../../global.php";
extract($_REQUEST);
$dsloai=loai_selectall();
$dssp=hang_selectall();
$dshang=hangsx_selectall();
$showsp = sp_select();
// var_dump($showsp);

	$VIEW_NAME="home.php";




require_once "../layout.php";

?>