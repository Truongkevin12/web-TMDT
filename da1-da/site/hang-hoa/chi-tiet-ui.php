<!-- start chi tiết sp -->
<div class="container " style="width:70%">
  <div class="row pt-3 ">
    <?php foreach ($chitiet as $value){
      extract($value);
      ?>

      <div class="col-4">
        <div class="">
          <img src='../../uploads/<?=$hinh?>' alt="" width="360px" height="300px">
        </div>
      </div>
      <div class="col-8">
        <form action="index.php" method="post" >
          <input type="hidden" name="ma_sp" value="<?= $ma_hh ?>">
          <div class="ml-5">
            <h1><?= $ten_hh ?></h1>
            <h4 class="text-danger"><b><?= number_format("$don_gia") ?></b> vnđ</h4>
            <div class="row">
              <div class="col-10">
                <h6><?= $mo_ta ?></h6>
              </div>
            </div>
            <h5 class="text-danger">Khuyến Mãi</h5>
            <p>Nhập Mã : <strong>KHIEM-HOCGIOI</strong> để được giảm 200.00đ</p>
            <div class="row">
              <div class="col-4">
               <div class="form-outline">
                <input type="number" id="sl" name="sl" class="form-control" value="1" />
                <label class="form-label" for="sl">Số Lượng</label>
              </div>
            </div>
          </div>
          <div class="mt-4">
            <button  class="btn btn-danger btn-lg mr-3">Mua Ngay</button>
            <input type="submit" class="btn btn-outline-info btn-lg" name="upcart" value="Thêm Vào Giỏ Hàng">

          </form>
        </div>
      </div>
    </div>
  <?php   } ?>

</div>
</div>
<!-- end chi tiết sp -->
<!-- sản phẩm liên quan -->

<div class="container mt-3" style="width:80%">
  <div class="row">
    <h1>Sản phẩm tương tự</h1>
    <div class="row">

      <?php 
      $hh_cung_loai=hang_hoa_select_by_loai($ma_loai);
      foreach ($hh_cung_loai as $hh) {
        extract($hh);
        ?>
        <div class="col-3">
          <p class='card'>
            <img class='card-img-top' src='../../uploads/<?= $hinh ?>'>
            <div class='card-body'>
              <a href ='?sp=<?= $ma_hh ?>'><?= $ten_hh ?>
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              
            </a></p>
          </div>
        </div>

        <?php
      }

      ?>
    </div>

  </div>
</div>
<!-- end sản phẩm cùng loại  -->
<!-- start bình luận -->

<div class="container" style="width:80%">
  <div class="row mt-5 shadow">

    <h1>Đánh Giá Sản Phẩm</h1>
    <div class="text-center">
      <div class="fb-comments" data-href="http://localhost/da1/" data-width="100%" data-numposts="5"></div>
    </div>
  </div>
</div>
<!-- end bình luận  -->