<?php 
// session_start();
require "../../global.php";
require_once "../../dao/pdo.php";
require_once "../../dao/bai-viet.php";
// require_once "../../dao/.php";
extract($_REQUEST);
if(exist_param("btn_insert")){
	session_start();

	$tieu_de = $_POST['tieude'];
	$noidung=$_POST['noidung'];
	$hinh=save_file('hinh',$UPLOAD_URL);
	$date = date("Y-m-d");
	$user = $_SESSION['login_id'];
	create_post($tieu_de,$noidung,$hinh,$date,$user);
	// var_dump($ten_loai);

	$VIEW_NAME="list.php";

}
else{
	$VIEW_NAME = "new.php";


}
require "../layout.php";




?>