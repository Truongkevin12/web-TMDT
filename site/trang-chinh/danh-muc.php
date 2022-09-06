<div class="border rounded">
  <div class="panel panel-default">
  <li class="list-group-item active text-center">DANH MỤC</li>
    <div class="list-group">
      <?php
      foreach ($dsloai as $loai) {
        extract($loai);
        $link="../hang-hoa/liet-ke.php?ma_loai=".$ma_loai;
        echo " <a href='".$link."' class='list-group-item'>".$ten_loai."</a>";
        }
      ?>
      <div class="panel-footer">
        <form action="../hang-hoa/liet-ke.php">
          <input name="kyw" placeholder="Từ khóa tìm kiếm" class="form-control">
        </form>
      </div>

    </div>
  </div>
</div>





<div class="container">


  <?php foreach ($dsloai as $value) { extract($value);?>
    <h1><?= $ten_loai ?></h1>
    <div class="mb-2">
      <?php foreach ($dshang as $value){extract($value);?>
        <a class="btn btn-light btn-rounded"><?= $ten_hang ?></a>
      <?php } ?>
    </div>
     <div class="row">
    <div class="col-3">
      <div class="card  ">
        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
          <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg" class="img-fluid" />
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
          </a>
        </div>

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
          </p>

          <button type="button" class="btn btn-primary">Button</button>
        </div>
      </div>
    </div>

  </div>
  <?php   } ?>

</div>
