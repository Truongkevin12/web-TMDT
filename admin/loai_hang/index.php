<?php
require_once "../../global.php";
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
extract($_REQUEST);
if (exist_param("btn_list")) {
    //show loại
    $dsloai=loai_selectall();
    $VIEW_NAME="list.php";
}elseif(exist_param("btn_insert")){
    $ten_loai=$_POST['tenloai'];
    loai_insert($ten_loai);
    $dsloai=loai_selectall();
    $dsHang = hangsx_selectall();

    $VIEW_NAME="list.php";
    // $MESSGER="Thêm thành công";
}elseif(exist_param("xoa")){
    if (isset($_REQUEST['ma_loai'])) { 
        $ma_loai=$_REQUEST['ma_loai'];
    }else {
        $ma_loai="";
    }
    loai_delete($ma_loai);
    $dsloai=loai_selectall();
    $dsHang = hangsx_selectall();

    $VIEW_NAME="list.php";
}elseif (exist_param("hang_sx")) {
    $ten_hang = $_POST['tenhang'];
    hangsx_insert($ten_hang);
    $dsloai=loai_selectall();
    $dsHang = hangsx_selectall();

    $VIEW_NAME="list.php";

    
} elseif (exist_param("btn_edit")) {
    $ma_loai = $_REQUEST['ma_loai'];
    $dsloai=loai_getinfo($ma_loai);
    extract($dsloai);
    $VIEW_NAME="edit.php";

    # code...
}elseif (exist_param("btn_update")) {
    loai_update($_POST['ma_loai'],$_POST['ten_loai']);
    $dsloai = loai_selectAll();
    $dsHang = hangsx_selectall();
    
    $VIEW_NAME="list.php";


    # code...
}
else {
    # code...
    $VIEW_NAME="list.php";
    $dsloai = loai_selectAll();
    $dsHang = hangsx_selectall();
    
}



require "../layout.php";


?>