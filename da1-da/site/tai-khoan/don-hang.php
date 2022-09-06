
<div class="container p-5">
  <div class="p-4">
    <h1 class="">Thông Tin Đơn Hàng</h1>
    <div class="row">
      <div class="col-3">
        <!-- Tab navs -->
        <div class="nav flex-column nav-pills text-center" role="tablist" aria-orientation="vertical">
          <a href="user.php" class="nav-link ">Thông Tin Tài Khoản</a>
          <a href="donhang.php" class="nav-link active">Đơn Hàng</a>
        </div>
      </div>
      <div class="col-8">
        <div class="row">
          <h4>Thông Tin Đơn Hàng</h4>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã Hoá Đơn</th>

                <th scope="col">Ngày Mua</th>

                <th scope="col">Trạng Thái</th>
                <th scope="col">Thành Tiền</th>
                <th scope="col">Thanh Toán</th>


              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($invoice as $value) {
                extract($value);


                ?>
                <tr>
                  <th scope="row">#<?= $so_hoa_don ?></th>
                  <td><?= $ngay_mua ?></td>

                  <td><?php 
                  if ($trang_thai == 0) {
                    echo '<span class="badge bg-danger">Chưa Thanh Toán</span>'; 
                  }else{
                    echo '<span class="badge bg-success">Đã Thanh Toán</span>'; 
                  }
      // $trang_thai 

                ?></td>
                <td><?= number_format($thanh_tien) ?> vnđ</td>
                <td>
                  <?php 
                  if ($trang_thai == 1) {


                    ?>
                    <a href="#" class="btn btn-success">Liên Hệ Admin</a></td>

                    <?php 
                  }else{


                   ?>

                   <div class=" btn-group">
                    <a href="?donhang&ma_dh=<?= $so_hoa_don ?>&vnpay=<?= $so_hoa_don ?>" class="btn btn-info">Thanh Toán VN-Pay</a>
                    <a href="?donhang&ma_dh=<?= $so_hoa_don ?>&mm=<?= $so_hoa_don ?>" class="btn btn-danger">Thanh Toán Momo</a>
                  </div>
                </td>



              </tr>
              <?php
            }
          }
        // echo $thanh_tien;

          ?>
        </tbody>
      </table>

    </div>
  </div>

</div>
</div>


</div>
