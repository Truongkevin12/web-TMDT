
<?php 
// login khách hàng
function kh_login($ten_dang_nhap,$mat_khau){
	$sql="SELECT * FROM `khach_hang` WHERE  `ten_dang_nhap` = ? AND `mat_khau` = ? AND `active` = 1 AND `kich_hoat` = 1";
	return	pdo_query($sql,$ten_dang_nhap,$mat_khau);
	// var_dump($sql);

}
// hàm đăng ký khác hàng
function kh_dang_ky($makh,$ten_dang_nhap,$ma_khau,$ho_ten,$email,$randomkey){
    $sql="INSERT INTO `khach_hang`(ma_kh,ten_dang_nhap,mat_khau,ho_ten,email,randomkey) VALUES (?,?,?,?,?,?)";
    return pdo_execute($sql,$makh,$ten_dang_nhap,$ma_khau,$ho_ten,$email,$randomkey);

}

// hàm gửi mail
function GuiMail($email,$ho_ten,$ten_dang_nhap,$randomkey,$ma_khau){
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'preedyspires@gmail.com'; // SMTP username
        $mail->Password = 'kfmzvjmub';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('quangtruong011020022020@gmail.com', 'Shoppe' ); 
        $mail->addAddress($email, $ho_ten); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư kích hoạt tài khoản';
        $noidungthu = "
        <div>
        <p>Chào bạn:$ho_ten</p>
        <p>Chúc mừng đã đăng ký thành công hệ thông của chúng tôi</p>
        <p>Username:$ten_dang_nhap</p>
        <p>Password:$ma_khau</p>
        <p>Bạn click vào đây để xác nhận tài khoản:</p>
        <a href='localhost/da1/site/tai-khoan/?very&id={$ten_dang_nhap}&randomkey={$randomkey}' class='btn btn-primary'>Xác nhận tài khoản</a>
        <p>Sau đó bạn có thể sử dụng tài khoản của mình để mua sắm.</p>
        <p>Nếu Liên kết Không hoạt động vui lòng nhấn vào đây :</p>
        <a href='localhost/da1/site/tai-khoan/?very&id={$ten_dang_nhap}&randomkey={$randomkey}'>localhost/da1/site/tai-khoan/?very&id={$ten_dang_nhap}&randomkey={$randomkey}</a>
        <p><b>Lưu ý :</b> thời gian kích hoạt đăng ký tài khoản là <b>15 phút</b>, sau thời gian này nếu bạn không kích hoạt, thông tin đăng kí tài khoản sẽ bị hủy</p>
        <p>Trân trọng cảm ơn !</p>"; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }
}
// hàm check thông tin tài khoản
function check_very($id,$rd){
    $sql="SELECT * FROM `khach_hang` WHERE  ten_dang_nhap = ? and randomkey = ?";
    return  pdo_query($sql,$id,$rd);

}
function update_tt($id){
    $sql="UPDATE `khach_hang` SET `kich_hoat`= 1 where ten_dang_nhap = ?";
    return pdo_execute($sql,$id);


}


?>