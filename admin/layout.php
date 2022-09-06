
<?php 
session_start();
if (isset($_SESSION ['login_id'])&&isset($_SESSION['role']) == 1){
          // echo 'abc';
       }
       else{
         header('Location:../../site/tai-khoan');
       }
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
	<script src="https://cdn.tiny.cloud/1/gk9d9jhk9clfhv6zrf2rvndqfei7645kz8whw0r1a7gpqphd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body>
	<?php require "menu.php"; ?>
	<main style="margin-top: 58px">
		<div class="container pt-2">
			<?php include "$VIEW_NAME"; ?>
		</div>
	</main>




	<script type="text/javascript"  src="<?= $CONTENT_URL ?>/js/jquery-3.4.1.min.js" charset="utf-8"></script>
	<script type="text/javascript"  src="<?= $CONTENT_URL ?>/js/bootstrap.min.js" charset="utf-8"></script>
	<script type="text/javascript"  src="<?= $CONTENT_URL ?>/js/mdb.min.js" charset="utf-8"></script>
	<script type="text/javascript"  src="<?= $CONTENT_URL ?>/js/popper.min.js" charset="utf-8"></script>
</body>

</html>