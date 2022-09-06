<?php
require "../../dao/pdo.php";
$ten_dang_nhap=$_GET['ten_dang_nhap'];
$sql="select * from khach_hang where ten_dang_nhap=?";
    $conn = pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([$ten_dang_nhap]);
        $count=$stmt->rowCount();
        echo json_encode(['count'=>$count]);
 ?>