<?php
header('Content-type: text/html; charset=utf-8');


$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa'; //Put your secret key in there
   require_once "./dao/pdo.php";

    require_once("./global.php");
    require_once("./dao/cart.php");
if (!empty($_GET)) {
    $partnerCode = $_GET["partnerCode"];
    $accessKey = $_GET["accessKey"];
    $orderId = $_GET["orderId"];
    $localMessage = $_GET["localMessage"];
    $message = $_GET["message"];
    $transId = $_GET["transId"];
    $orderInfo = $_GET["orderInfo"];
    $amount = $_GET["amount"];
    $errorCode = $_GET["errorCode"];
    $responseTime = $_GET["responseTime"];
    $requestId = $_GET["requestId"];
    $extraData = $_GET["extraData"];
    $payType = $_GET["payType"];
    $orderType = $_GET["orderType"];
    $extraData = $_GET["extraData"];
    $m2signature = $_GET["signature"]; //MoMo signature


    //Checksum
    $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
        "&orderType=" . $orderType . "&transId=" . $transId . "&message=" . $message . "&localMessage=" . $localMessage . "&responseTime=" . $responseTime . "&errorCode=" . $errorCode .
        "&payType=" . $payType . "&extraData=" . $extraData;

    $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);

    echo "<script>console.log('Debug huhu Objects: " . $rawHash . "' );</script>";
    echo "<script>console.log('Debug huhu Objects: " . $partnerSignature . "' );</script>";


//     if ($m2signature == $partnerSignature) {
//         if ($errorCode == '0') {
//             $result = '<div class="alert alert-success"><strong>Payment status: </strong>Success</div>';
//         } else {
//             $result = '<div class="alert alert-danger"><strong>Payment status: </strong>' . $message .'/'.$localMessage. '</div>';
//         }
//     } else {
//         $result = '<div class="alert alert-danger">This transaction could be hacked, please check your signature and returned signature</div>';
//     }
// }
if ($_GET['resultCode'] == 0 ) {
        $status = $_GET['orderId'];
        change_status_invoice($status);
        header('location: site/tai-khoan/?donhang');


    }
}
?>
