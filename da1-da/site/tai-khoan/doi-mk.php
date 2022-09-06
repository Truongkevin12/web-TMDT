<?php
require "../../dao/pdo.php";
if(session_id()=='') session_start();
// if (isset($_SESSION ['login_id'])==false) {
//     header("location:dang-nhap.php");
//     exit();
// }
$ten_dang_nhap=$_SESSION['login_user'];
$loi="";
if (isset($_POST['btndoimatkhau'])==true) {
    $mat_khau=$_POST['mat_khau'];
    $mat_khau_moi_1 = $_POST['mat_khau_moi_1'];
    $mat_khau_moi_2 = $_POST['mat_khau_moi_2'];
    $sql="select * from khach_hang where ten_dang_nhap = ? AND mat_khau=?";
        $conn = pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([$ten_dang_nhap,$mat_khau]);
    if ($stmt->rowCount() ==0){
      $loi="Mật khẩu cũ của bạn đã sai <br>";
    }
    if (strlen($mat_khau_moi_1)<6) {
      $loi="Mật khẩu mới ngắn quá <br>";
    }
    if ($mat_khau_moi_1 != $mat_khau_moi_2) {
      $loi="Mật khẩu nhập 2 lần k giống nhau <br>";
    }
    if ($loi=="") {
      $sql="update khach_hang set mat_khau=? where ten_dang_nhap=? ";
      $stmt=$conn->prepare($sql);
      $stmt->execute([$mat_khau_moi_1,$ten_dang_nhap]);
      echo " Đã cập nhật mật khẩu mới";
      header("location:../trang-chinh/index.php");
        exit();
    }
}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div class="card">
    <div class="row ">
        <div class="col-6">
            <div class="">
                <div class="row"> 
                    <img src="https://as2.ftcdn.net/v2/jpg/03/05/43/83/1000_F_305438304_5Z7Lt03ZasyFtPDOtHbBPt2WOqougqyb.jpg  "class="image">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card2 mt-5  px-4 py-5">
                <h1 class="text-center">Đăng Ký Tài Khoản</h1>
                <form  method="post">
  <?php
  if ($loi!="") { ?>
    <div class="alert alert-danger" role="alert">
    <?php echo $loi; ?></div>
  <?php }?>
  <div class="row"> 
    <div class="col-8 mx-auto">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên đăng nhập</label>
    <input value="<?php echo $ten_dang_nhap ?>" type="text" class="form-control" disabled>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">mật khẩu cũ</label>
    <input value="<?php if (isset($mat_khau)==true) echo $mat_khau; ?>" type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="mật khẩu phải từ 6 chữ cai trở lên">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">mật khẩu mới</label>
    <input value="<?php if (isset($mat_khau_moi_1)==true) echo $mat_khau_moi_1; ?>" type="password" class="form-control" id="mat_khau_moi_1" name="mat_khau_moi_1" placeholder="mật khẩu phải từ 6 chữ cai trở lên">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">mật khẩu xác nhận</label>
    <input value="<?php if (isset($mat_khau_moi_2)==true) echo $mat_khau_moi_2; ?>" type="password" class="form-control" id="mat_khau_moi_2" name="mat_khau_moi_2" placeholder="mật khẩu phải từ 6 chữ cai trở lên">
  </div>
  <button type="submit" class="btn btn-primary" name="btndoimatkhau">Đổi mật khẩu</button>

    
</div>


</div>
</form>
</div>
</div>
<div class="bg-blue py-4">
<div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2 text-center">Nhóm 77 THIẾT KẾ</small>
<div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
</div>
</div>
</div>
</div>