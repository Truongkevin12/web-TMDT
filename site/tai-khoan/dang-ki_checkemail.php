<?php
require "../../dao/pdo.php";
$email=$_GET['email'];
$sql="select * from khach_hang where email=?";
    $conn = pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([$email]);
        $count=$stmt->rowCount();
        echo json_encode(['count'=>$count]);
 ?>