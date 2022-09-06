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

<!--Main layout-->
<main class="my-5" id="abc">
  <div class="container">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-md-9 mb-4">
        <!--Section: Content-->
        <section>
          <!-- Post -->
          <?php 
          foreach ($info_post as $value) {
            extract($value);
            ?>

              <div class="row">
                <div class="col-md-4 mb-4">
                  <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                    <img src="../../uploads/<?= $hinh_anh ?>" class="img-fluid" />
                    <a href="?post=<?= $id?>">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                  </div>
                </div>

                <div class="col-md-8 mb-4">
                  <h5><?= $tieu_de ?> </h5>
                  <div  style="overflow: hidden;
                  display: -webkit-box;
                  -webkit-line-clamp: 4;
                  -webkit-box-orient: vertical;">
                  <?= $noi_dung_tin ?>
                </div>

                <a href="?post=<?= $id ?>" class="btn btn-primary">Read</a>
              </div>
            </div>

          <?php
        }
        ?>
      </section>
      <!--Section: Content-->
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-3 mb-4">
      <!--Section: Sidebar-->
      <section class="sticky-top" style="top: 80px;">
        <!--Section: Ad-->
        <section class="text-center border-bottom pb-4 mb-4">
          <div class="bg-image hover-overlay ripple mb-4">
            <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" href="index.php" role="tab">TẤT CẢ SẢN PHẨM</a>
              <a class="nav-link" href="?maloai=4" role="tab">iPhone</a>

              <a class="nav-link" href="?maloai=5" role="tab">iPad</a>

              <a class="nav-link" href="?maloai=6" role="tab">Macbook</a>

              <a class="nav-link" href="?maloai=10" role="tab">Watch</a>

              <a class="nav-link" href="?maloai=12" role="tab">iMac</a>
            </div>
          </div>

        </section>
        <!--Section: Ad-->

        <!--Section: Video-->
        <section class="text-center">
          <h5 class="mb-4">Chèn Quảng cáo Tại đây</h5>

          <div class="embed-responsive embed-responsive-16by9 shadow-4-strong">
            <iframe width="1280" height="640" src="https://www.youtube.com/embed/NchRoyjNvlY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </section>
        <!--Section: Video-->
      </section>
      <!--Section: Sidebar-->
    </div>
    <!--Grid column-->
  </div>
  <!--Grid row-->

  <!-- Pagination -->
<!--   <nav class="my-4" aria-label="...">
    <ul class="pagination pagination-circle justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active" aria-current="page">
        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav> -->
</div>
</main>
<!--Main layout-->
