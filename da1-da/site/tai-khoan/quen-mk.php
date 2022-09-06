<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

<?php
require "../../dao/pdo.php"; 
$loi="";
if (isset($_POST['btn_gui'])==true) {
    $email=$_POST['email'];
    $sql="select * from khach_hang where email=?";
    $conn = pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([$email]);
        $count=$stmt->rowCount();
        if ($count==0) {
            $loi="email chưa đăng ký thành viên với chúng tôi";
        }else {
            $mat_khau_moi=substr(md5(rand(0,99999)),0,8);
            $sql="update khach_hang set mat_khau=? where email=?";
            $stmt=$conn->prepare($sql);
            $stmt->execute([$mat_khau_moi,$email]);
            GuiMail($email,$mat_khau_moi);
            //gửi email
            header("location:index.php");
            exit();
        }

}
?>
<?php 
function GuiMail($email,$mat_khau_moi){
    require "PHPMailer-master/src/PHPMailer.php"; 
    require "PHPMailer-master/src/SMTP.php"; 
    require 'PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'quangtruong011020022020@gmail.com'; // SMTP username
        $mail->Password = 'Truongkevin12';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('quangtruong011020022020@gmail.com', 'Trường' ); 
        $mail->addAddress($email); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư kích hoạt tài khoản';
        $noidungthu = "<h4> ai đó yêu cầu mật khâu bạn</h4>
        mật khẩu của bạn là {$mat_khau_moi}
        "; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo 'Đã gửi mail xong';
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
        
    }
}

?>
<div class="card">
    <div class="row ">
        <div class="col-6">
            <div class="">
                <div class="row"> 
                    <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/255766369_277586814325570_8464238314935464577_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=aee45a&_nc_ohc=wR0LhVHtbQ4AX-jchFN&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=a3652b7767c9d98e436bb1b216bac35a&oe=61B7F30E" class="image">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card2 mt-5 px-4 py-5">
                <h1 class="text-center">Quên Mật Khẩu</h1>
                <form  method="post">
        <?php
    //báo lỗi
        if ($loi!="") { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $loi; ?></div>
            <?php }?>
                    <div class="row"> 
                        <div class="col-8 mx-auto">
                            <div class="form-group">
                                <label for="ma_loai" class="form-label">Địa chỉ email</label>
                                <input value="<?php if (isset($email)==true) echo $email ?>" type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="row mb-3 px-3"> 
                            <button name="btn_gui" value="btn_gui" type="submit" class="btn btn-primary">Gửi yêu cầu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="bg-blue py-4">
        <div class="row px-3"> 
        <small class="ml-4 ml-sm-5 mb-2 text-center">Nhóm 77 THIẾT KẾ</small>
            <div class="social-contact ml-4 ml-sm-auto">
             <span class="fa fa-facebook mr-4 text-sm"></span> 
             <span class="fa fa-google-plus mr-4 text-sm"></span>
              <span class="fa fa-linkedin mr-4 text-sm"></span> 
              <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> 
            </div>
        </div>
    </div>
</div>
