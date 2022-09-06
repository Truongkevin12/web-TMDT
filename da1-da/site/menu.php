  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light " > 
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse justify-content-center">
        <!-- Left links -->
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link me-4" aria-current="page" href="<?= $SITE_URL ?>/trang-chinh">TRANG CHỦ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4" href="<?= $SITE_URL ?>/hang-hoa">SẢN PHẨM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4" href="<?= $SITE_URL ?>/bai-viet">TIN TỨC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4" href="#">GÓP Ý</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4" href="#">HỎI ĐÁP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-4" href="<?= $SITE_URL ?>/lien_he/">LIÊN HỆ</a>
          </li>
        </ul>

        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
    </div>

    <!-- Right elements -->
    <a class="text-reset me-3" href="../hang-hoa/?cart">
      <i class="fas fa-shopping-cart"></i>
      <span class="badge rounded-pill badge-notification bg-danger"><?php 
      if (isset($_SESSION['tong'])){
        echo $_SESSION['tong'];
      }else {
        echo 0;
      } ?></span>
    </a>
    <div class="d-flex align-items-center">

      <form class="d-flex input-group w-auto">
        <input type="search" placeholder="Tìm kiếm" class="form-control rounded" aria-describedby="search-addon"/>
        <span class="input-group-text border-0" id="search-addon">
          <i class="fas fa-search"></i>
        </span>
      </form>
      <!----------------đăng nhâp và lout---->

      <?php

      if (isset($_SESSION['login_id'])){ ?>
       <!-- Avatar -->
       <a
       class="dropdown-toggle d-flex align-items-center hidden-arrow"
       href="#"
       id="navbarDropdownMenuLink"
       role="button"
       data-mdb-toggle="dropdown"
       aria-expanded="false"
       >
       <?php 
       if (isset($_SESSION['avt'])){
        ?>
        <img src="<?= $ROOT_URL?>/uploads/<?= $_SESSION ['avt'] ?>" class="rounded-circle" height="25" alt="" loading="lazy"/>
      <?php }else{ ?>
        <img src="<?= $_SESSION ['avatar'] ?>" class="rounded-circle" height="25" alt="" loading="lazy"/>
       <?php
     } ?>
   </a>

   <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
     <li>
       <form action="index.php" method="post">
        <a class="dropdown-item" href="../tai-khoan/doi-mk.php">Đổi mật khẩu</a>
      </li>
      <li>
        <a href="../tai-khoan/?donhang" class="dropdown-item gradient-custom" >Quản Lý Đơn Hàng</a>
      </li>
      <li>
        <button name="logout" class="dropdown-item gradient-custom" >Logout</button>
      </form>
    </li>
  </ul>
<?php } else { ?>
  <a href="<?= $SITE_URL ?>/tai-khoan" class="dropdown-toggle d-flex align-items-center hidden-arrow btn btn-dark">
    Đăng Nhập
  </a>
  <ul>
  <?php } ?>
  <!-- Right elements -->
</nav>
