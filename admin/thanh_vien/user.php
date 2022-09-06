
<div class="container">

  <h1>Quản Lý Thành Viên</h1>
  <div class="row">
    <div class="col-6">
      <button class="btn btn-outline-info mr-2">Admin</button>
      <button class="btn btn-outline-primary">User</button>
    </div>
    <div class="col-6">
      <form action="" method="get" class="input-group col">
        <div class="form-outline" style="width:90%;">
          <input name="search" type="text" id="form1" class="form-control">
          <label class="form-label" for="form1" style="margin-left: 0px;">Search</label>
          <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 48.8px;"></div><div class="form-notch-trailing"></div></div></div>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    </div>
    <table class="table border">
      <thead>
        <tr>

          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Trạng Thái</th>
          <th scope="col">Chức Vụ</th>
          <th scope="col">Hành Động</th>


        </tr>
      </thead>
      <tbody>
       <?php 


       foreach ($user as $key => $value) {
        extract($value);


        ?>
        <tr>
          <th scope="row"><img src="../../uploads/<?= $hinh ?>" class="avatar" width="30"> <?= $ten_dang_nhap ?></th>
          <td><?= $email ?></td>
          <td><?php 
          if ($active==0) {
            echo '<span class="badge bg-danger">Bị Đình Chỉ</span>'; 
          }else {
            echo '<span class="badge bg-success">Đang Hoạt Động</span>'; 
          }
        ?></td>
        <td><?php 
        if ($vai_tro==0) {
          echo '<span class="badge bg-info">Thành Viên</span>'; 
        }else {
          echo '<span class="badge bg-primary">Admin</span>'; 
        }
      ?></td>
      <td>
        <button type="button" class="btn btn-primary btn-floating" data-mdb-toggle="modal" data-mdb-target="#modelSua<?= $ma_kh ?>"><i class="fas fa-user-cog"></i></button>
        <!-- nút edit khách hàng -->

        <div class="modal fade" id="modelSua<?= $ma_kh ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h2 class="modal-title ">Quản Lý Thông Tin Khách Hàng</h2>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="index.php" method="post">
                  <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="row mb-4">
                    <div class="col-2">
                      <div class="form-outline">
                        <input type="text" id="id" class="form-control" name="id" readonly="" value="<?= $ma_kh ?>" />
                        <label class="form-label" for="id">ID</label>
                      </div>
                    </div>
                    <div class="col-10">
                      <div class="form-outline">
                        <input type="text" id="hoten" class="form-control" name="hoten" value="<?= $ho_ten ?>" />
                        <label class="form-label" for="hoten">Tên Khách Hàng</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <!-- Text input -->
                    <div class="col-6">
                      <div class="form-outline mb-4">
                        <input type="text" id="ten_dang_nhap" class="form-control" name="ten_dang_nhap" value="<?= $ten_dang_nhap ?>" />
                        <label class="form-label" for="ten_dang_nhap">Tên Đăng Nhập</label>
                      </div>
                    </div>
                    <div class="col-3">
                     <select class="custom-select" id="role" name="role" placeholder="Vai Trò">
                      <option value="1">Admin</option>
                      <option value="0">Người Dùng</option>
                    </select>
                  </div>
                  <div class="col-3">
                   <select class="custom-select" id="kich_hoat" name="kich_hoat" placeholder="Trạng Thái">
                    <option value="1">Kích Hoạt</option>
                    <option value="0">Tạm Ngưng</option>
                  </select>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control" name="email" value="<?= $email ?>" />
                <label class="form-label" for="email">Email</label>
              </div>

              <!-- Number input -->
              <div class="form-outline mb-4">
                <input type="number" id="phone" class="form-control" name="phone" value="<?= $sdt ?>" />
                <label class="form-label" for="phone">Số Điện Thoại</label>
              </div>

              <!-- Message input -->
              <div class="form-outline mb-4">
                <textarea class="form-control" id="dia_chi" rows="4" name="dia_chi"><?= $dia_chi ?></textarea>
                <label class="form-label" for="dia_chi">Địa Chỉ</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="btn_update" class="btn btn-primary">Cập Nhật Thông Tin</button>
              <button class="btn btn-danger" type="reset">Nhập Lại</button>
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Đóng</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- end nút edit khách hàng -->

    <button type="button" class="btn btn-success btn-floating" data-mdb-toggle="modal" data-mdb-target="#modelrspass<?= $ma_kh ?>"><i class="fas fa-key"></i></button>
    <!-- nút đổi pass -->
    <div class="modal fade" id="modelrspass<?= $ma_kh ?>">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h2 class="modal-title ">Reset Mật Khẩu</h2>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="index.php">
              <input type="hidden" name="makh" value="<?= $ma_kh ?>">
              <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control" name="newpass" />
                <label class="form-label" for="password">Mật Khẩu Mới</label>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" name="btn_reset" class="btn btn-success">Đổi Mật Khẩu</button>
              <button class="btn btn-danger" type="reset">Nhập Lại</button>
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Đóng</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <!-- end nút edit khách hàng -->


    <button type="button" class="btn btn-danger btn-floating" data-mdb-toggle="modal" data-mdb-target="#modelxoa<?= $ma_kh ?>"><i class="far fa-trash-alt"></i></button>
    <!-- nút xoá khách hàng  -->
    <div class="modal fade" id="modelxoa<?= $ma_kh ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Xoá Khách Hàng Này ?</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"><h6>Bạn Có Thực Sự Muốn Xoá Khách Hàng <strong><?= $ten_dang_nhap ?> ?</strong></h6>
           <p class="red">Lưu ý: sau khi xoá không thể khôi phục lại.</p>
         </div>
         <div class="modal-footer">
          <a href="index.php?xoa&kh=<?= $ma_kh ?>" ><button type="button" class="btn btn-danger">Xoá</button></a>
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end nút xoá khách hàng -->


</td>
</tr>
<?php
}
?> 

</tbody>
</table>

</div>


