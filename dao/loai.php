<?php 
//truy vấn ds loại dã nhâp 
//mới lên trước
function loai_selectall(){
    $sql="select * from loai_hang order by ma_loai desc";
    return pdo_query($sql);
}
// truy vấn hãng sản xuất
function hangsx_selectall(){
    $sql="select * from hang_sx order by id ";
    return pdo_query($sql);
}
//thêm mới loại
function loai_insert($ten_loai){
    $sql="INSERT INTO `loai_hang` ( `ten_loai`) VALUES (?) ";
    pdo_execute($sql,$ten_loai);

}
//thêm mới hãng sản xuất
function hangsx_insert($ten_hang){
    $sql="INSERT INTO `hang_sx` ( `ten_hang`) VALUES (?) ";
    pdo_execute($sql,$ten_hang);

}
//xóa
function loai_delete($ma_loai){
    $sql="DELETE FROM `loai_hang` WHERE `ma_loai` = ?";
    pdo_execute($sql,$ma_loai);

}
//lấy thông tin mã loại
function loai_getinfo($ma_loai){
    $sql="SELECT * FROM `loai_hang` WHERE `ma_loai` = ?  ";
    return pdo_query_one($sql,$ma_loai);

}
//cập nhật dữ liệu
function loai_update($ma_loai,$ten_loai){
    $sql="UPDATE `loai_hang` SET `ten_loai` = ? WHERE `ma_loai` = ? ";
    pdo_execute($sql,$ten_loai,$ma_loai);
}


?>