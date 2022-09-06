<?php 
	$ROOT_URL = "/da1";
	$CONTENT_URL = "$ROOT_URL/assets";
	$ADMIN_URL = "$ROOT_URL/admin";
	$SITE_URL = "$ROOT_URL/site";
	$UPLOAD_URL="../../uploads/";

	function exist_param($fieldname){
		return array_key_exists($fieldname, $_REQUEST);

	}
	function save_file($fieldname,$target_dir){
        $file_uploaded=$_FILES[$fieldname];
        $file_name=basename($file_uploaded["name"]);
        $target_path=$target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"],$target_path);
        return $file_name;
    }
    // tích hợp vn pay
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
$vnp_TmnCode = "3EKMM3OH"; //Website ID in VNPAY System
$vnp_HashSecret = "UYVSWCUDOMJTAEUGBXYBHRNEQBTUMZIG"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/da1/vnpay_return.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

// pay with momo config
$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
// $orderInfo = "Thanh toán qua MoMo";
// $amount = "10000";
// $orderId = time() ."";
$ipnUrl = "http://localhost/payment/php/PayMoMo/ipn_momo.php";
// $extraData = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


 ?>