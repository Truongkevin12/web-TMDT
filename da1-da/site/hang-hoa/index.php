<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once '../../dao/pdo.php';
require_once '../../global.php';
require_once '../../dao/hang-hoa.php';
require_once '../../dao/loai.php';
require_once '../../dao/cart.php';
ob_start();
extract($_REQUEST);
session_start();

//truy vấn măt hang theo ma
// $hang_hoa= hang_hoa_select_by_id($ma_hh);
// extract($hang_hoa);
//tăng số lượt xem lên 1
//hàng hóa cùng loại
// $hh_cung_loai=hang_hoa_select_by_loai($ma_loai);
// $dsloai=loai_selectall();
if (exist_param("sp")) {
	// session_start();

	$ma_hh = $_GET['sp'];
	hang_hoa_tang_so_luot_xem($ma_hh);

	$chitiet = hang_hoa_select_by_id($ma_hh);
	// var_dump($chitiet);
	// echo 'abcbcbcb';
	$VIEW_NAME="chi-tiet-ui.php";


}elseif (exist_param("cart")) {
	// echo $tong;
	if (isset($_POST['checkout'])&&$view==1) {
		$VIEW_NAME='../tai-khoan/?donhang';
		
	}else{
		$VIEW_NAME = 'cart.php';

	}


}
elseif ($_POST['upcart']){
	// session_start();
	$ma_hh = $_POST['ma_sp'];
	$sl = $_POST['sl'];

	// $_SESSION['cart']=	$ma_hh;

	// $sl = 0;
	if (!isset($_SESSION['cart'][$ma_hh])) {
		$_SESSION['cart'][$ma_hh]= array(
			'ma_hh' => $ma_hh,
			'sl' => $sl
		);		
	}else{
		$_SESSION['cart'][$ma_hh]['sl'] += $sl;
	}
	$tong = 0;
	foreach ($_SESSION['cart'] as $value) {

		$tong += $value['sl'];
		
	}
	$_SESSION['tong'] = $tong;
// var_dump($_SESSION['cart']);
	// echo $_SESSION['sl'];
	// echo $_SESSION['cart'];

	$chitiet = hang_hoa_select_by_id($ma_hh);
	$VIEW_NAME="chi-tiet-ui.php";



}else {
	$VIEW_NAME="hang-hoa/chi-tiet-ui.php";
	
}

require_once '../layout.php';
?>