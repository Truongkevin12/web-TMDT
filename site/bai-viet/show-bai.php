<style>
	/*div#post.p.img{
		width:40px;
	}*/
	div p img{
		width:50%;
		height: 30%;
	}
</style>
<div class="container">
	<?php 
	foreach ($info_post as $value) {
		extract($value);
		?>
		<h1 class="pt-2"><?= $tieu_de ?></h1>
		<img src="../../uploads/<?= $hinh ?>" alt="" width="30">
			bởi	<b> <?= $ten_dang_nhap ?></b>     <i>Ngày Đăng : <?= $ngay_dang ?></i>
			<div class="post" ><?= $noi_dung_tin ?></div>
			<?php
		}
		?>
	</div>