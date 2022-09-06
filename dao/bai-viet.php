<?php 

function create_post($tieu_de,$noidung,$hinh,$date,$user){
	$sql="INSERT INTO `bai_viet`(`tieu_de`, `noi_dung_tin`,`hinh_anh`,`ngay_dang`,`ma_kh`) VALUES (?,?,?,?,?)";
	pdo_execute($sql,$tieu_de,$noidung,$hinh,$date,$user);

}

function show_post(){
	$sql ="SELECT * FROM `bai_viet` INNER JOIN khach_hang ON bai_viet.ma_kh = khach_hang.ma_kh";
	return pdo_query($sql);


}
function show_post_info($id){
	$sql ="SELECT * FROM `bai_viet` INNER JOIN khach_hang ON bai_viet.ma_kh = khach_hang.ma_kh where id = ?";
	return pdo_query($sql,$id);

}
?>