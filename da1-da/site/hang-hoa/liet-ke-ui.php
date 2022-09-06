
 <div class="row">
 <?php foreach ($items as $item) {
  extract($item);
 ?>
  <div class="box-products">
        <div class="list-product">
          <div id="36499" class="item-product">
            <div class="item-product__box-img">
            <a href="chi-tiet.php?ma_hh=<?=$ma_hh?>">
              <img class="cpslazy" src="../../uploads/<?=$hinh?>" alt="" >
              </a>
            </div>
            <div class="item-product__box-name">
            <p class="text-center"><a href="chi-tiet.php?ma_hh=<?=$ma_hh?>"> <?=$ten_hh?></a></p>
            </div>
            <div class="item-product__box-price">
              <p class="special-price danger "><?=number_format($don_gia,0)?>đ</p>
            </div>
          </div>
<?php } ?>

  </div>