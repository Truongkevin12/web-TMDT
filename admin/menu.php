    <!--Main Navigation-->
    <header>
      <!-- Sidebar -->
      <nav
      id="sidebarMenu"
      class="collapse d-lg-block sidebar collapse bg-white"
      >
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a
          href="<?= $ADMIN_URL ?>/trang-chinh"
          class="list-group-item list-group-item-action py-2 ripple active"
  aria-pressed="true"
          >
          <i class="fas fa-tachometer-alt fa-fw me-3"></i
          ><span>Trang Chủ</span>
        </a>
        <a
        href="#"
        class="list-group-item list-group-item-action py-2 ripple" >
        <i class="fas fa-chart-area fa-fw me-3"></i
        ><span>Webiste traffic</span>
      </a>
      <a
      href="<?= $ADMIN_URL ?>/bai-viet"
      class="list-group-item list-group-item-action py-2 ripple"
      ><i class="fas fa-edit fa-fw me-3"></i><span>Bài Viết</span></a
      >
      <a
      href="<?= $ADMIN_URL ?>/san_pham"
      class="list-group-item list-group-item-action py-2 ripple"
      ><i class="fas fa-chart-line fa-fw me-3"></i
      ><span>Sản Phẩm</span></a
      >

      <a
      href="#"
      class="list-group-item list-group-item-action py-2 ripple"
      ><i class="fas fa-chart-bar fa-fw me-3"></i><span>Đơn Hàng</span></a
      >



      <a
      href="<?= $ADMIN_URL ?>/thanh_vien"
      class="list-group-item list-group-item-action py-2 ripple"
      ><i class="fas fa-users fa-fw me-3"></i><span>Thành VIên</span></a
      >
      <a
      href="#"
      class="list-group-item list-group-item-action py-2 ripple"
      ><i class="fas fa-money-bill fa-fw me-3"></i><span>Mã Giảm Giá</span></a
      >
    </div>
  </div>
</nav>
<!-- Sidebar -->

<!-- Navbar -->
<nav
id="main-navbar"
class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
>
<!-- Container wrapper -->
<div class="container-fluid">
  <!-- Toggle button -->
  <button
  class="navbar-toggler"
  type="button"
  data-mdb-toggle="collapse"
  data-mdb-target="#sidebarMenu"
  aria-controls="sidebarMenu"
  aria-expanded="false"
  aria-label="Toggle navigation"
  >
  <i class="fas fa-bars"></i>
</button>

<!-- Brand -->
<a class="navbar-brand" href="#">
  <img
  src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
  height="25"
  alt=""
  loading="lazy"
  />
</a>
<!-- Search form -->
<form class="d-none d-md-flex input-group w-auto my-auto">
  <input
  autocomplete="off"
  type="search"
  class="form-control rounded"
  placeholder='Search (ctrl + "/" to focus)'
  style="min-width: 225px"
  />
  <span class="input-group-text border-0"
  ><i class="fas fa-search"></i
  ></span>
</form>

<!-- Right links -->
<ul class="navbar-nav ms-auto d-flex flex-row">
  <!-- Notification dropdown -->
  
<span>Chào <strong><?= $_SESSION ['login_hoten'] ?> </strong>!</span>
<!-- Avatar -->
<li class="nav-item dropdown">
  <a
  class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
  href="#"
  id="navbarDropdownMenuLink"
  role="button"
  data-mdb-toggle="dropdown"
  aria-expanded="false"
  >
  <img
  src="<?= $ROOT_URL?>/uploads/<?= $_SESSION ['avt'] ?>"
  class="rounded-circle"
  height="22"
  alt=""
  loading="lazy"
  />
</a>
<ul
class="dropdown-menu dropdown-menu-end"
aria-labelledby="navbarDropdownMenuLink"
>
<li><form action="index.php" method="post"><button class="dropdown-item" name="logout">Logout</button></form></li>
</ul>
</li>
</ul>
</div>
<!-- Container wrapper -->
</nav>
<!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
