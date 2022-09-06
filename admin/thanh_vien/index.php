<?php
require_once "../../dao/pdo.php";
require_once "../../dao/khach-hang.php";

require_once "../../global.php";
extract($_REQUEST);

if(exist_param("xoa")){
    if (isset($_REQUEST['kh'])) { 
        $ma_kh=$_REQUEST['kh'];
    }else {
        $ma_kh="";
    }
    kh_delete($ma_kh);
    $user = khachhang_selectall();
    $VIEW_NAME="user.php";
}elseif (exist_param("btn_reset")){
    $makh = $_POST['makh'];
    $newpass=$_POST['newpass'];
    khach_hang_change_password($makh,$newpass);
    var_dump(khach_hang_change_password($makh,$newpass));
    $VIEW_NAME="user.php";
    $user = khachhang_selectall();
}elseif (exist_param("btn_update")){
    $makh = $_POST['id'];
    $tenkh = $_POST['hoten'];
    $ten_dang_nhap = $_POST['ten_dang_nhap'];
  echo  $role = $_POST['role'];
    $active = $_POST['kich_hoat'];
    $email = $_POST['email'];
    $sdt=$_POST['phone'];
    $diachi=$_POST['dia_chi'];
    kh_update($ten_dang_nhap,$tenkh,$sdt,$diachi,$email,$role,$active,$makh);
    // khach_hang_change_password($makh,$newpass);
    // var_dump(khach_hang_change_password($makh,$newpass));
    $VIEW_NAME="user.php";
    $user = khachhang_selectall();
}
else{
    # code...
    $VIEW_NAME="user.php";
    $user = khachhang_selectall();
    // $dshanghoa=hang_selectall();

}





require_once "../layout.php";


?>