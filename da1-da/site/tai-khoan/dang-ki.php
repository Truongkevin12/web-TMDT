
<?php
// require "../dao/pdo.php";
$loi="";
?>
<div class="card">
    <div class="row ">
        <div class="col-6">
            <div class="">
                <div class="row"> 
                    <img src="https://img.freepik.com/free-vector/online-registration-sign-up-concept-with-man-character_268404-98.jpg?size=626&ext=jpg" class="image">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card2 mt-5  px-4 py-5">
                <h1 class="text-center">Đăng Ký Tài Khoản</h1>
                <form  method="post" action="index.php">
        <?php
    //báo lỗi
        if ($loi!="") { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $loi; ?></div>
            <?php }?>
                    <div class="row"> 
                        <div class="col-8 mx-auto">
                            <div class="form-group">
                                <label for="ten_hh" class="form-label">Họ và tên</label>
                                <input value="<?php if (isset($ho_ten)==true) echo $ho_ten; ?>" type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Họ và tên">
                            </div>
                            <div class="form-group">
                                <label for="ten_hh" class="form-label">Tên đăng nhập</label>
                                <input onblur="checkun(this)" value="<?php if (isset($ten_dang_nhap)==true) echo $ten_dang_nhap; ?>" type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" placeholder="Tên đăng nhập" >
                                <em id="loiTenDangNhap" class="form-text text-success pl-1"></em>
                            </div>
                            <div class="form-group">
                                <label for="ma_loai" class="form-label">Mật khẩu</label>
                                <input type="password"  <?php if (isset($mat_khau)==true) echo $mat_khau; ?> class="form-control" id="mat_khau" name="mat_khau"  placeholder="Mật khẩu" pattern="[a-zA-Z0-9!@#$%^&*]{8,}" required />
                            </div>
                            <div class="form-group">
                                <label for="ma_loai" class="form-label">Địa chỉ email</label>
                                <input onblur="checkemail(this)"  <?php if (isset($email)==true) echo $email; ?> type="email" class="form-control" id="email" name="email" placeholder="Email" pattern="^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$" required />
                                <em id="loiemail" class="form-text text-success pl-1"></em>
                            </div>
                            <div class="row mb-3 px-3"> 
                                <button type="submit" name="btn_dang_ky" class="btn btn-info">Đăng Ký</button> 
                            </div>
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








