 
<form class="col-10 m-auto" enctype="multipart/form-data" method="post" action="index.php">
        <div class="alert alert-info">CẬP NHẬT THÔNG TIN HÀNG HÓA</div>
    <div class="mb-3 row">
        <div class="col-4">
            <label for="ma_loai" class="form-label">Mã hàng hoá</label>
        <input type="text" value="<?=$ma_hh?>"  class="form-control disabled" id="ma_hh" name="ma_hh" readonly placeholder="Mã hàng hoá">
        </div>
        <div class="col-4">
            <label for="ten_hh" class="form-label">Tên hàng hoá</label>
        <input type="text" value="<?=$ten_hh?>" class="form-control" id="ten_hh" name="ten_hh" placeholder="Tên hàng hoá">
        </div>
        <div class="col-4">
            <label for="ma_loai" class="form-label">Đơn giá</label>
        <input type="text" value="<?=$don_gia?>" class="form-control" id="don_gia" name="don_gia"  placeholder="Đơn giá">
        </div>
      </div>
      <div class="mb-3 row">
        <div class="col-4">
            <label for="ma_loai" class="form-label">Giảm giá</label>
        <input type="text" value="<?=$giam_gia?>" class="form-control" id="giam_gia" name="giam_gia" placeholder="Giảm giá">
        </div>
        
        <div class="col-4">
            <label for="so_luot_xem" class="form-label">Số lượt xem</label>
        <input type="text" value="<?=$so_luot_xem?>" class="form-control" id="so_luot_xem" name="so_luot_xem"  placeholder="Số lượt xem">
        </div>
      </div>
      <div class="mb-3 row">
      <div class="col-2">
      <input type="submit" name="btn_update" class="btn btn-primary" value="Thêm mới"></input>
      </div>
      
      
</div>

    </form>