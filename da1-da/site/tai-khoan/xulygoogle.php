<?php
ob_start(); // khắc phục lỗi chuyển hướng header
session_start();
require "../../dao/pdo.php";
require "../../login-google/vendor/autoload.php";
require "../../dao/gg-login.php";
// client
$client = clientGoogle();
// Tạo ra 1 biến mới để lấy thông tin người dùng
$service = new Google_Service_Oauth2($client);
// Kiểm tra xem có $_GET['code'] không. nếu không thì trở về login còn không thì tiếp tục xử lý
if(isset($_GET['code'])){
// Kiểm tra mã code có hợp lệ hay không
	$check = $client->authenticate($_GET['code']);
// Mã code sẽ phát sinh trong lần request đầu tiên lần phát sinh sau sẽ lỗi.
// Và mã code sẽ sinh ra 1 đoạn array có các key là: error(mã lỗi),error_description('code');
	if(isset( $check['error'] )){
		echo $check['error_description'];
	}else{
// Thông tin người dùng
		$user = $service->userinfo->get();
// Lấy thông tin người dùng
$info = checkThongTin($user->id); // lấy token bằng hàm
// var_dump($user).'<br>';
if(!$info){
// Nếu không có tài khoản thì thêm 1 tài khoản mới
	$id = $user->id;
	$makh = date("YmdHis");
$email = $user->email; // var_dump($user) ra xem
$name = $user->name;
$avatar = $user->picture; // var_dump($user) ra xem
$password = md5($user->email); // password tạo ra cho vui nên mình gán luôn
$token = mt_rand(1000,50000); // hàm getAccessToken của thư viện
$kich_hoat = "1" ;
insertUser($makh,$id,$password,$name,$kich_hoat,$email,$token,$avatar); // thêm người
// SET SESSION['id'] và trở về trang chủ
$_SESSION['login_id'] = $makh;
$_SESSION ['avatar'] = $avatar;
header('location: ../trang-chinh');
}else{
// Nếu đã có tài khoản thì set SESSION['id'] và trở vềtrang chủ
	$_SESSION['login_id'] = $info['ma_kh'];
	$_SESSION ['avatar'] = $info['hinh'];

	header('location: ../trang-chinh');
}
}
}else{
	header('location: ../trang-chinh');
}
?>