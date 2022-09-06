
<div class="container">
	<div class="text-center">
		<h1 class="mt-5">Giỏ hàng</h1>
	</div>
	<div class="row">
		<div class="col-7">
			<div class="shadow p-2">
				<h5>Giỏ hàng</h5>

				<div class="row pt-4">
					<div class="col-2">
						Hình Ảnh
					</div>
					<div class="col-4">
						Tên Sản Phẩm
					</div>
					<div class="col-2">
						Số Lượng
					</div>
					<div class="col-2">
						Đơn Giá
					</div>
					<div class="col-2">
						Thành Tiền
					</div>
				</div>
				<?php 
				$tong = 0;

				if (isset($_SESSION['cart'])) {
					$showcart = $_SESSION['cart'];	
					foreach ($showcart as $key => $valuee) {
						$giohang = hang_hoa_select_by_id($key);
						foreach ($giohang as $value) {
						// echo $valuee['sl'].'<br>';
							// var_dump($giohang);

							extract($value);
							// echo $ma_hh;
							$thanhtien = ($don_gia*$valuee['sl']);
							$tong += $thanhtien;
							?>

							<div class="row pt-4">
								<div class="col-2">
									<img src="<?= $UPLOAD_URL ?><?= $hinh ?> " alt="" width="100">
								</div>
								<div class="col-4">
									<?= $ten_hh ?>
								</div>
								<div class="col-2">
									<?= $valuee['sl'] ?>
								</div>
								<div class="col-2">
									<?= number_format("$don_gia") ?>
								</div>
								<div class="col-2">
									<?= number_format($thanhtien) ?>
								</div>
							</div>




							<?php
						}
					}
				}


				?>
				
			</div>
		</div>
		<div class="col-5">
			<div class="shadow p-3">
				<h5>Thông tin đơn hàng</h5>
				<p class="p-3">Thành tiền sản phẩm: 
					<span class="text-danger"><b><?= number_format($tong) ?> </b>vnđ </span>
				</p>
				<hr>
				<div class="row">
					<div class="col-3">
						<p><b>Mã Giảm Giá</b></p>
					</div>
					<div class="col-6">
						<div class="form-outline">
							<input type="text" id="form12" class="form-control" />
							<label class="form-label" for="form12">Nhập mã giảm giá (nếu có)</label>
						</div>
					</div>
					<div class="col">
						<button class="btn btn-info">Áp Dụng</button>
					</div>
				</div>
				<hr>
				<p class="p-3"><b>Tổng Tiền:</b>
					<span class="text-danger"><b><?= number_format($tong) ?> </b>vnđ </span>

				</p>

				<div class="p-3 text-center">
					Chúng tôi chấp nhận thanh toán <br>
					<img src="https://pay.vnpay.vn/images/logo.png" alt="" width="60">
					<img src="https://diemuudai.vn/wp-content/uploads/2017/11/the-napas.jpg" alt="" width="60">
					<img src="https://hangdang.vn/wp-content/plugins/woocommerce/assets/images/icons/credit-cards/visa.svg" alt="" width="60">
					<img src="https://cdn.freelogovectors.net/wp-content/uploads/2016/12/mastercard-logo2.png" alt="" width="60">



				</div>
				<?php if (isset($_POST['checkout'])) {
						// echo $tong;
					$today = date("Y-m-d");
						// echo $today;
						// echo $startTime;
					$ma_kh = $_SESSION['login_id'];
					create_invoice($startTime,$today,$tong,$ma_kh);
						// var_dump($_SESSION['cart']);
					foreach($_SESSION['cart'] as $key => $valuee)
					{
						$giohang = hang_hoa_select_by_id($key);
						foreach ($giohang as $value) {
								// var_dump($giohang);
							$thanhtien = ($value['don_gia']*$valuee['sl']);
							$sl = $valuee['sl'];
							$masp = $valuee['ma_hh'];
								// echo $thanhtien;
							create_invoice_info($startTime,$masp,$sl,$thanhtien);
							// echo "đặt hàng thành công";
							header("Location: ../tai-khoan/?donhang");


						}
					}
					// require_once '../../tai-khoan';
				// echo		$VIEW_NAME = '../../tai-khoan';

				} ?>
				<?php 
				if (isset($_SESSION['login_id'])) {
					?>
					<form action="" method="post">
						<div class="text-center p-2 pt-4">
							<input type="submit" class="btn btn-primary" name="checkout" value="Checkout">
						</form>
					</div>


				<?php }else{?>
					<div class="text-center">
						<span class="text-danger">Vui Lòng Đăng Nhập Để Tiến Hành Thanh Toán</span>
					</div>
					<div class="text-center p-2 pt-4">						
						<a href="../tai-khoan" class="btn btn-primary">Đăng Nhập</a>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>