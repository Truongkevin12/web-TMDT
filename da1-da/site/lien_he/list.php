
<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}

?>
<?php
        if (isset($_POST['btnGoiLoiNhan'])==true) {
    $email=$_POST['email'];
    $tieu_de=$_POST['tieu_de'];
    $noi_dung=$_POST['noi_dung'];
    $sql="INSERT INTO `lien_he`( `email`, `tieu_de`, `noi_dung`) VALUES (?,?,?)";
    $conn = pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([$email,$tieu_de,$noi_dung]);
        $count=$stmt->rowCount();
        GuiMail($email,$noi_dung,$tieu_de);
}
?>
<?php 
function GuiMail($email,$noi_dung,$tieu_de){
    require_once "PHPMailer-master/src/PHPMailer.php"; 
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
        $mail->setFrom('quangtruong011020022020@gmail.com', 'Shoppe' ); 
        $mail->addAddress($email); //mail và tên người nhận  
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư lien he';
        $noidungthu = "<h4> {$tieu_de}</h4>
        {$noi_dung}"; 
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
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
<div id="intro" class="bg-image vh-100 shadow-1-strong">
    <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
      <source class="h-100" src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
    </video>
    <div class="mask"     style="
    background: linear-gradient(
      45deg,
      rgba(29, 236, 197, 0.7),
      rgba(91, 14, 214, 0.7) 100%
    );
    ">
    <div class="container d-flex align-items-center justify-content-center text-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Chào Mừng Bạn Đến Với Trang Mua Hàng Của Chúng Tôi</h1>
        <h5 class="mb-4">Hãy Bắt Đầu Với Những Thứ Đơn Giản</h5>
        <a
        class="btn btn-outline-light btn-lg m-2"
        href="#abc"
        role="button"
        rel="nofollow"
        >Bắt Đầu Mua Hàng</a
        >
        <a
        class="btn btn-outline-info btn-lg m-2"
        href="#"

        >Tìm Hiểu Thêm Về Chúng Tôi</a
        >
      </div>
    </div>
  </div>
</div>
<!-- Background image -->

<body class="d-flex flex-column h-100">
    <main role="main" class="mb-2">
        <!-- Block content -->
        <div class="container mt-2">
            <h3 class="text-center">Liên hệ với chúng tôi</h3>
            <div class="row">
                <div class="col col-md-6">
                    <img src="../../assets/images/lienhe.png" class="img-fluid" />
                </div>
                <div class="col col-md-6">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="email">Email của bạn</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email của bạn">
                        </div>
                        <div class="form-group">
                            <label for="title">Tiêu đề của bạn</label>
                            <input type="text" class="form-control" id="title" name="tieu_de" placeholder="Tiêu đề của bạn">
                        </div>
                        <div class="form-group">
                            <label for="message">Lời nhắn của bạn</label>
                            <textarea name="noi_dung" class="form-control"  rows="8"></textarea>
                        </div>
                        <button class="btn btn-primary text-center" name="btnGoiLoiNhan">Gửi lời nhắn</button>
                    </form>
                </div>
            </div>
            
        </div>

