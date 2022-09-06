<?php
require_once "../../dao/pdo.php";
require_once "../../dao/hang-hoa.php";
require_once "../../dao/loai.php";
require_once "../../global.php";
extract($_REQUEST);
if (exist_param("btn_list")) {
    //show loại
    $dshanghoa=hang_selectall();
    $VIEW_NAME="list.php";
    //thêm sản phẩm
}elseif(exist_param("btn_insertsp")){
    $ten_hh=$_POST['ten_hh'];
    $don_gia=$_POST['don_gia'];
    $giam_gia=$_POST['giam_gia'];
    //$hinh=$_FILES['hinh']['name'];
    $hinh=save_file('hinh',$UPLOAD_URL);
    $ma_loai=$_POST['ma_loai'];
    $ma_hang=$_POST['ma_hang'];
    $ngay_nhap=$_POST['ngay_nhap'];
    $mo_ta=$_POST["mota"];
    //hàm gọi 
    hh_insert($ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$ma_loai,$ma_hang);
    $dshanghoa=hang_selectall();
    $VIEW_NAME="list.php";
    //xóa dữ liệu
}elseif(exist_param("xoa")){
    if (isset($_REQUEST['ma_hh'])) { 
        $ma_hh=$_REQUEST['ma_hh'];
    }else {
        $ma_hh="";
    }
    hh_delete($ma_hh);
    $dshanghoa=hang_selectall();
    $VIEW_NAME="list.php";
}elseif (exist_param("btn_edit")) {
    $ma_hh = $_REQUEST['ma_hh'];
    $hh_info = hh_getinfo($ma_hh);
    extract($hh_info);
    $VIEW_NAME="edit.php";

    # code...
}elseif (exist_param("btn_update")) {
    hh_update($_POST['ma_hh'],$_POST['ten_hh'],$_POST['don_gia'],$_POST['giam_gia'],$_POST['so_luot_xem']);
    $dshanghoa=hang_selectall();
	$VIEW_NAME="list.php";


    # code...
}
else {
    # code...
    $VIEW_NAME="list.php";
    $dshanghoa=hang_selectall();
    

}
    


require_once "../layout.php";


?>