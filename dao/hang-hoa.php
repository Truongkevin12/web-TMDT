<?php
//show hàng hóa ra
function hang_selectall(){
    $sql="select * from hang_hoa";
    return pdo_query($sql);
}
//thêm mới loại
function hh_insert($ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$ma_loai,$ma_hang){
    $sql="INSERT INTO `hang_hoa` (`ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `ma_loai`, `ma_hang`) VALUES (?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$ma_loai,$ma_hang);

}
// hàm lấy sản phảm ra
function sp_select(){
  $sql="SELECT * FROM `hang_hoa` INNER JOIN loai_hang on loai_hang.ma_loai = hang_hoa.ma_loai ";
  return pdo_query($sql);

}
//xóa
function hh_delete($ma_hh){
  $sql="DELETE FROM `hang_hoa` WHERE `ma_hh` = ?";
  pdo_execute($sql,$ma_hh);

}
//lấy thông tin mã loại
function hh_getinfoo($ma_hh){
  $sql="SELECT * FROM `hang_hoa` WHERE `ma_hh` = ?";
  return pdo_query_one($sql,$ma_hh);

}
//cập nhật dữ liệu
function hh_update($ma_hh,$ten_hh,$don_gia,$giam_gia,$so_luot_xem){
  $sql="UPDATE `hang_hoa` SET  `ten_hh` = ?, `don_gia` = ?, `giam_gia` = ?, `so_luot_xem` = ?  WHERE `ma_hh` = ? ";
  pdo_execute($sql,$ten_hh,$don_gia,$giam_gia,$so_luot_xem,$ma_hh);
}
function hang_hoa_select_by_id($ma_hh){
  $sql="SELECT * FROM hang_hoa WHERE ma_hh = ?";
  return pdo_query($sql,$ma_hh);

}

//tăng số lượt xem
function hang_hoa_tang_so_luot_xem($ma_hh){
  $sql="UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 where ma_hh=?";
  pdo_execute($sql,$ma_hh);
}
//kiểm tra sự tồn tại của hàng hóa
function hang_hoa_exist($ma_hh){
  $sql="SELECT count(*) FROM hang_hoa where ma_hh=?";
  return pdo_query_value($sql,$ma_hh) > 0;
}
//top 10 hàng hóa xem lớn nhất
function hang_hoa_select_top10(){
  $sql="SELECT * FROM hang_hoa where so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
  return pdo_query($sql);
}
//hàng hóa đặc biệt
function hang_hoa_select_dac_biet(){
  $sql="SELECT * FROM hang_hoa WHERE dac_biet=1";
  return pdo_query($sql);
}
//chọn hàng hóa theo từng loại
function hang_hoa_select_by_loai($ma_loai){
  $sql="SELECT * FROM hang_hoa WHERE ma_loai=?";
  return pdo_query($sql,$ma_loai);
}
//chọn hàng hóa theo tìm kiếm
function hang_hoa_select_keyword($keyword){
  $sql="SELECT * FROM hang_hoa hh"
  . " JOIN loai_hang lo ON lo.ma_loai=hh.ma_loai"
  . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
  return pdo_query($sql,'%'.$keyword.'%','%'.$keyword.'%');
}




?>