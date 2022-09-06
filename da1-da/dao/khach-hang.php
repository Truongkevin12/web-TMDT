<?php
//thêm mới loại
function  kh_insert($ten_dang_nhap,$mat_khau,$ho_ten,$email,$vai_tro){
    $sql="INSERT INTO `khach_hang` (`ten_dang_nhap`,`mat_khau`, `ho_ten`, `email`, `vai_tro`) VALUES (?,?,?,?,?)";
    pdo_execute($sql,$ten_dang_nhap,$mat_khau,$ho_ten,$email,$vai_tro);
}
//show khác hàng
function khachhang_selectall(){
    $sql="SELECT * FROM `khach_hang` ORDER BY `ma_kh` DESC";
    return pdo_query($sql);
}
//xóa
function kh_delete($ma_kh){
    $sql="DELETE FROM `khach_hang` WHERE `ma_kh` = ?";
    pdo_execute($sql,$ma_kh);
    
}
//lấy thông tin mã loại
function kh_getinfo($ma_kh){
    $sql="SELECT * FROM `khach_hang` WHERE `ma_kh` = ?";
    return pdo_query_one($sql,$ma_kh);
}
  //cập nhật dữ liệu
function kh_update($ten_dang_nhap,$tenkh,$sdt,$diachi,$email,$role,$active,$makh){
    $sql="UPDATE `khach_hang` SET `ten_dang_nhap`= ? ,`ho_ten`=?,`sdt`=?,`dia_chi`=?,`email`=?,`vai_tro`=?,`active`=?   WHERE `ma_kh` = ? ";
    pdo_execute($sql,$ten_dang_nhap,$tenkh,$sdt,$diachi,$email,$role,$active,$makh);
}
  //kiểm tra sự tồn tại của khách hàng
function khach_hang_exist($ma_kh){
    $sql="SELECT count (*) FROM khach_hang WHERE $ma_kh=?";
    return pdo_query_value($sql,$ma_kh) > 0;
}
  //vai trò khách hàng
function khach_hang_select_by_role($vai_tro){
    $sql="SELECT * FROM khach_hang WHERE vai_tro=?";
    return pdo_query($sql,$vai_tro);
}
  //check passwork mới cho khách hàng
function khach_hang_change_password($ma_kh,$newpass){
    $sql="UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
    pdo_execute($sql,$newpass,$ma_kh);
}
  

?>