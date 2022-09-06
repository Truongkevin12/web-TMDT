<?php 

function create_invoice($startTime,$today,$thanhtien,$ma_kh){
	$sql="INSERT INTO `hoadon` (`so_hoa_don`, `ngay_mua`, `thanh_tien`, `ma_kh`) VALUES (?,?,?,?)";
	pdo_execute($sql,$startTime,$today,$thanhtien,$ma_kh);

}
function create_invoice_info($startTime,$masp,$sl,$dongia){
	$sql="INSERT INTO `CThoaDon` (`so_hoa_don`, `ma_sp`, `so_luong`, `don_gia`) VALUES (?,?,?,?);";
	pdo_execute($sql,$startTime,$masp,$sl,$dongia);

}
function select_invoice($userid){
	$sql = "SELECT * FROM `hoadon` INNER JOIN khach_hang ON hoadon.ma_kh = khach_hang.ma_kh where hoadon.ma_kh = ?";
	return pdo_query($sql,$userid);


	

}
function info_incoice(){
	$sql ="SELECT * FROM `hang_hoa` INNER JOIN CThoaDon ON hang_hoa.ma_hh = CThoaDon.ma_sp INNER JOIN hoadon ON hoadon.so_hoa_don = CThoaDon.so_hoa_don INNER JOIN khach_hang ON khach_hang.ma_kh = hoadon.ma_kh";
	return pdo_query($sql);


}
function change_status_invoice($status){
	$sql ="UPDATE `hoadon` SET `trang_thai`= 1 WHERE so_hoa_don = ?";
	pdo_execute($sql,$status);



}

?>