<?php 
// $loi = "";
?>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="../../assets/css/dangnhap.css"> -->
<div class="card">
    <div class="row ">
        <div class="col-6">
            <div class="">
                <div class="row"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card2 mt-5  px-4 py-5">
                <h1 class="text-center">Đăng Nhập Tài Khoản</h1>
                <form  method="post" action="index.php" >
                    <div class="row"> 
                        <div class="col-8 mx-auto">
                           <div class="form-outline mt-4">
                              <input value="<?php if (isset($ten_dang_nhap)==true) echo $ten_dang_nhap; ?>" type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên đăng nhập từ 6 đến 20 ký tự" />
                              <label class="form-label" for="ten_dang_nhap">Tên Đăng Nhập</label>
                          </div>
                          <div class="form-outline mt-4 mb-4">
                              <input value="<?php if (isset($mat_khau)==true) echo $mat_khau;?>" type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu" />
                              <label class="form-label" for="mat_khau">Mật Khẩu</label>     
                          </div>
                          <div class="row mb-2">
                              <div class="col-6">
                                <a href="quen-mk.php" class="ml-auto mb-0 text-sm">Quên Mật Khẩu ?</a>
                            </div>
                            <div class="col-6 text-right">
                                <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> 
                                <label for="chk1" class="custom-control-label text-sm">Remember me</label> 
                            </div>
                            <div class="text-left" style="color:red">
                                <?= $loi; ?>
                            </div>
                        </div>
                        <div class="row mb-3 px-3"> 
                            <button type="submit" name="nutdangnhap" class="btn btn-primary">Đăng nhập</button> 
                        </div>
                        <!-- Google -->
                        <div>
                            <div class="row mb-3 px-3"> 
                                <a href='<?=$url?>' class='btn btn-danger'><i class="fab fa-google"></i> Đăng Nhập Bằng Google</a>
                            </div>
                        </div>
                        <div class="row mb-3 px-3"> 
                            <button type="submit" name="dangky" class="btn btn-info">Đăng Ký</button> 
                        </div>





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