
<?php 
require_once "../../dao/pdo.php";
// require_once "../../dao/hang-hoa.php";
require_once "../../dao/tai-khoan.php";
require_once "../../global.php";
require_once "../../dao/cart.php";
require_once "../../login-google/vendor/autoload.php";
require_once "../../dao/gg-login.php";
require "../../assets/mail/src/PHPMailer.php"; 
require "../../assets/mail/src/SMTP.php"; 
require '../../assets/mail/src/Exception.php'; 

$client = clientGoogle();
$url=$client->createAuthUrl();
$loi = ""; // giá trị lỗi ban đầu
extract($_REQUEST);
if (exist_param("dangky")) {

    $VIEW_NAME="dang-ki.php";

}elseif (isset($_GET['very'])){
    // echo '12';
    $id = $_GET['id'];
    $rd = $_GET['randomkey'];
    if (check_very($id,$rd) == NULL) {
        // echo 'Bạn ';
    }else {
        update_tt($id);
        echo 'Kích Hoạt Tài Khoản Thành Công';
    }
   // var_dump(check_very($id,$rd));
    $VIEW_NAME ="dang-ki.php";
    

}
elseif (exist_param("nutdangnhap")) {


    $ten_dang_nhap=$_POST['ten_dang_nhap'];
    $mat_khau=$_POST['mat_khau'];
    $login =   kh_login($ten_dang_nhap,$mat_khau); // hàm kiểm tra tên dăng nhập và mật khẩu
    // echo 'khiêm';
    // var_dump($login->rowCount());
    // var_dump($login);

    // hàm kiểm tra đăng nhập đúng sai nếu trả về rỗng thì báo sai tên đăng nhập hoặc pass
    if ($login == NULL) {
        $VIEW_NAME ="dang-nhap.php";
        $loi = "Tên đăng nhập hoặc mật khẩu không đúng vui lòng kiểm tra lại !";

        
    }else{
       foreach ($login as $key => $value) {
        session_start();
        extract($value); // lấy giá trị người dùng trong databse gắn thành biến
         // echo$ma_kh;
        $_SESSION ['login_id']= $ma_kh;
        $_SESSION ['login_user'] = $ten_dang_nhap;
        $_SESSION ['login_hoten'] = $ho_ten;
        $_SESSION ['avt'] = $hinh;

        if ($vai_tro == 1) {
          $_SESSION ['role']= $vai_tro;

          header("location:../../admin");  
      }else{
        header("location:../trang-chinh");  


    }
}
}
    // if ($login->rowCount() ==1){
        // $user = $login->fetch();
        // $_SESSION ['login_id']= $user['id'];
        // $_SESSION ['login_user'] =$user['ten_dang_nhap'];
        // $_SESSION ['login_hoten'] =$user['ho_ten'];
        // header("location:../admin/index.php");
    //     exit();

    // }else {
    //     header("location:dang-nhap.php");
    //     exit();
    // }

}elseif (exist_param("btn_dang_ky")) {
    $makh = date("YmdHis");
    $ten_dang_nhap=$_POST['ten_dang_nhap'];
    $mat_khau=$_POST['mat_khau'];
    $ho_ten=$_POST['ho_ten'];
    $email=$_POST['email'];
    //kiểm tra lỗi
    if (strlen($ten_dang_nhap)==0) {
        $loi.="Tên đăng nhập chưa nhập<br>";
        $VIEW_NAME="dang-ky.php";
        
    }
    if (strlen($mat_khau)<6) {
        $loi.="Mật khẩu quá ngắn<br>";
        $VIEW_NAME="dang-ky.php";

    }
    if (strlen($ho_ten)==0) {
        $loi.="Chưa nhập họ tên<br>";
        $VIEW_NAME="dang-ky.php";

    }
    if (strlen($email)<5) {
        $loi.="Email nhập không đúng<br>";
        $VIEW_NAME="dang-ky.php";

    }
    if ($loi=="") {
        $randomkey=substr(md5(rand(0,99999)),0,20);
        kh_dang_ky($makh,$ten_dang_nhap,$mat_khau,$ho_ten,$email,$randomkey);

        $VIEW_NAME="dang-nhap.php";
        // $stmt->execute([$ten_dang_nhap,$mat_khau,$ho_ten,$email,$vai_tro,$rd]);
        // $id=lastInsertId();
        GuiMail($email,$ho_ten,$ten_dang_nhap,$randomkey,$mat_khau);
        // header("location:dang-nhap.php");
        //         exit();
    }   
    echo $loi;  
}
elseif (exist_param('donhang')) {
    session_start();
    $userid = $_SESSION['login_id'];
    if (isset($_GET['ma_dh'])) {
        $invoice =  select_invoice($userid);
        foreach ($invoice as $value) {
            extract($value);
        }
        $hoten = $_SESSION['login_hoten'];
        // echo $thanh_tien;
// pay with momo
        if (isset($_GET['mm'])) {

   $orderId = $_GET['mm']; // Mã đơn hàng
   $orderInfo = 'Thanh toan don hang '.$orderId;
   $amount = $thanh_tien;
   $extraData = "";
   $serectkey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
   $redirectUrl = "http://localhost/da1/result.php";
    // $ipnUrl = "http://localhost/da1/tai-khoan/index.php";

    // $ipnUrl = $_POST["ipnUrl"];
    // $redirectUrl = $_POST["redirectUrl"];
    // $extraData = $_POST["extraData"];

   $requestId = time() . "";
   $requestType = "captureWallet";
    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
   $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
   $signature = hash_hmac("sha256", $rawHash, $serectkey);
   $data = array('partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature);
   $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json
// var_dump($jsonResult);
    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
}
if (isset($_GET['vnpay'])) {

//         // pay with vn pay
$vnp_TxnRef = $_GET['vnpay'];; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = 'Thanh toan don hang '.$vnp_TxnRef;
$vnp_Amount = $thanh_tien * 100;
$vnp_Locale = "vn";
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    // "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    // "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
if (isset($_GET['vnpay'])) {
    header('Location: ' . $vnp_Url);
    die();
} else {
    echo json_encode($returnData);
}
}


}
$invoice =  select_invoice($userid);
$VIEW_NAME ='don-hang.php';

}
else {
    $VIEW_NAME="dang-nhap.php";
    
}


require_once "../layout.php";



?>
<script>
    function checkun(obj) {
        var ten_dang_nhap=obj.value;
        var url="http://localhost/da1/site/tai-khoan/dang-ki_checkup.php?ten_dang_nhap="+ten_dang_nhap;
        fetch(url)
        .then(d => d.json())
        .then(data => {
            if(data.count > 0){
             document.getElementById('loiTenDangNhap').innerText="Tên đăng nhập " + ten_dang_nhap + " đã có người dùng";
         }else{
            document.getElementById('loiTenDangNhap').innerText="Bạn có thể dùng tên  " + ten_dang_nhap;
        }
    })
    }
    function checkemail(obj) {
        var email=obj.value;
        var url="http://localhost/da1/site/tai-khoan/dang-ki_checkemail.php?email="+email;
        fetch(url)
        .then(d => d.json())
        .then(data => {
            if(data.count > 0){
             document.getElementById('loiemail').innerText="Email " + email + " đã có người dùng";
         }else{
            document.getElementById('loiemail').innerText="Bạn có thể dùng email  " + email;
        }
    })
    }
</script>
