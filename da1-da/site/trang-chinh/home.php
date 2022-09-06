 <style>
   .card-subtitle, .card-text:last-child {
    margin-bottom: 0;
    border: 1px solid #E5E7EB;
    border-radius: 0.5rem;
    min-width: calc(100% - (45px + 5px));
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
  </style>
 <div id="intro" class="bg-image vh-100 shadow-1-strong">
  <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
    <source class="h-100" src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
  </video>
  <div class="mask"     style="
  background: linear-gradient(
    45deg,
    rgba(29, 236, 197, 0.7),
    rgba(91, 14, 214, 0.7) 100%
  );
  ">
  <div class="container d-flex align-items-center justify-content-center text-center h-100">
    <div class="text-white">
      <h1 class="mb-3">Chào Mừng Bạn Đến Với Trang Mua Hàng Của Chúng Tôi</h1>
      <h5 class="mb-4">Hãy Bắt Đầu Với Những Thứ Đơn Giản</h5>
      <a
      class="btn btn-outline-light btn-lg m-2"
      href="#abc"
      role="button"
      rel="nofollow"
      >Bắt Đầu Mua Hàng</a
      >
      <a
      class="btn btn-outline-info btn-lg m-2"
      href="#"

      >Tìm Hiểu Thêm Về Chúng Tôi</a
      >
    </div>
  </div>
</div>
</div>
<!-- Background image -->
<div class="container">


  <?php foreach ($dsloai as $dsloaii) { extract($dsloaii);?>
    <h1><?= $ten_loai ?></h1>

    <div class="row">
      <div class="mb-2">
        <?php foreach ($dshang as $value){extract($value);?>
         <a class="btn btn-light btn-rounded"><?= $ten_hang ?></a>
       <?php } ?>
     </div>
     <?php foreach ($showsp as $valuee) { extract($valuee);?>
      <?php if ($valuee['ma_loai'] == $dsloaii['ma_loai']) { ?>
        <div class="col-3">
         
          <div class="card  ">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../../uploads/<?= $hinh ?>" class="img-fluid" />
              <a href="../hang-hoa/?sp=<?= $ma_hh ?>">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><b><?= $ten_hh ?></b></h5>
              <h7 class="text-danger"><b><?= number_format("$don_gia") ?></b> vnđ</h7>
              <p class="card-text">
               <?= $mo_ta ?>
             </p>

           </div>
         </div>


       </div>

     <?php  } ?>

   <?php     } ?>


 </div>
<?php   } ?>

</div>
