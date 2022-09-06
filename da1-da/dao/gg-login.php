<?php
function clientGoogle(){
     // Lấy những giá trị này từ https://console.google.com
     $client_id = '766513642759-oir7j8h8eu5j25d5fntq121ce4e19c0b.apps.googleusercontent.com'; // Client ID
     $client_secret = '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'; // Client secret
    $redirect_uri = 'http://localhost/da1/site/tai-khoan/xulygoogle.php'; 
    
     $client = new Google_Client();
     $client->setClientId($client_id);
     $client->setClientSecret($client_secret);
     $client->setRedirectUri($redirect_uri);
     $client->addScope("email");
     $client->addScope("profile");
    
     return $client;
    
     }

function checkThongTin($ten_dang_nhap,$rule=''){
    // nếu rỗng thì kiểm tra theo username
    if($rule == ''){
    $sql='SELECT * FROM `khach_hang` WHERE `ten_dang_nhap` = ?';
    // ngược lại kiểm tra theo id
    }else{
    $sql='SELECT * FROM `khach_hang` WHERE `ma_kh` = ?';
    }
    return pdo_query_one($sql,$ten_dang_nhap);
}

 
// Thêm người dùng
function insertUser($makh,$id,$password,$name,$kich_hoat,$email,$token,$avatar){
    $sql='INSERT INTO `khach_hang`(`ma_kh`,`ten_dang_nhap`,`mat_khau`,`ho_ten`,`kich_hoat`,`email`,`token`,`hinh`)VALUES(?,?, ?, ?, ?,?,?,?)';
    pdo_execute($sql,$makh,$id,$password,$name,$kich_hoat,$email,$token,$avatar);
    }
 ?>