<?php 
// session_start();
if (isset($_POST['logout'])) {
  session_destroy();
  header("Refresh:0");


}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shopbee</title>
	<link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/all.min.css">
	<link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/mdb.min.css">
	<link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/1.css">
  <div id="fb-root"></div>

  <style>
    .item-product{
      width: 270px;
      height: 400px;
      border: 1px solid #f8f9fa;
      margin: 10px;
      float: left;
      position: relative;
      overflow: hidden;
      max-width: 100%;
      background-color: white;
      padding: 0 20px;
      border-radius: 8px;
      box-shadow: 0 10px 40px rgba(150, 174, 178, 0.8);
      
    }
    .sanpham{
      width: 1200px;
      margin: auto;
    }
    
    .box-products .list-product .item-product .item-product__box-promotion p, .box-products .list-product .item-product .promotion p {
      min-width: calc(100% - (45px+ 5px));
      float: left;
      margin-left: 0;
      margin-bottom: 0;
      font-size: 1.2rem;
      line-height: 1.5;
      text-transform: none;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
    @media (min-width: 992px) {
      #intro {
        /*margin-top: -58.59px;*/
        height: 50vh !important;
      }
    }


  </style>



  
</head>
<body>
 <?php require "menu.php"; ?>
 <?php include "$VIEW_NAME"; ?>

 <?php
 // require_once 'trang-chinh/danh-muc.php';
 ?>





 <script type="text/javascript"  src="<?= $CONTENT_URL ?>/js/jquery-3.4.1.min.js" charset="utf-8"></script>
 <script type="text/javascript"  src="<?= $CONTENT_URL ?>/js/bootstrap.min.js" charset="utf-8"></script>
 <script type="text/javascript"  src="<?= $CONTENT_URL ?>/js/mdb.min.js" charset="utf-8"></script>
 <script type="text/javascript"  src="<?= $CONTENT_URL ?>/js/popper.min.js" charset="utf-8"></script>
 <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=878420852972420&autoLogAppEvents=1" nonce="13sBi7RE"></script>
</body>

</html>