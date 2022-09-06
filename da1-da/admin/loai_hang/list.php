<div class="container">
  <h1>Danh Sách Loại Hàng</h1>
  <div class="row mb-4">
    <div class="col-8">
      <div class="btn-group" role="group" aria-label="Basic example">
       <button  class="btn btn-info" data-mdb-toggle="modal" data-mdb-target="#modelloai">Thêm Loại Sản Phẩm</button> <!-- nút thêm loại sản phẩm -->
       <button  class="btn btn-warning" data-mdb-toggle="modal" data-mdb-target="#modelhang">Thêm Hãng Sản Phẩm</button> <!-- nút thêm  hãng sản xuất -->
     </div>
     <button  class="btn btn-secondary" data-mdb-toggle="modal" data-mdb-target="#modelsanpham"><i class="fas fa-plus"></i>  Thêm Sản Phẩm</button>
     <a href="<?= $ADMIN_URL ?>/san_pham" class="btn btn-dark"><i class="fas fa-tasks"></i> Quản Lý Sản Phẩm</a>

   </div>
   <form action="" method="get" class="input-group col">
    <div class="form-outline" style="width:90%;">
      <input name="search" type="text" id="form1" class="form-control">
      <label class="form-label" for="form1" style="margin-left: 0px;">Search</label>
      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 48.8px;"></div><div class="form-notch-trailing"></div></div></div>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
      </button>
    </form>
  </div>


  <table class="table border">
    <thead>
      <tr>

        <th scope="col">#</th>
        <th scope="col">Tên Loại Phẩm</th>
        <th scope="col">Sửa</th>
        <th scope="col">Xoá</th>

      </tr>
    </thead>
    <tbody>
     <?php 


     foreach ($dsloai as $key => $value) {
      extract($value);


      ?>
      <tr>
        <th scope="row"><?= $ma_loai ?></th>
        <td><?= $ten_loai ?></td>
        <td>
          <button name="btnEdit" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#modelSua<?= $ma_loai ?>"><i class="fas fa-edit"></i> Edit</button>

          <div class="modal fade" id="modelSua<?= $ma_loai ?>">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h2 class="modal-title ">Sửa Loại Hàng Hoá</h2>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="mb-3" method="post" action="index.php" style="width: 70%;margin:auto;">
                    <div class="form-outline mb-3">
                      <input  name="ma_loai" type="text" id="ten" class="form-control disabled" value="<?= $ma_loai ?>" readonly>
                      <label class="form-label" for="ten" style="margin-left: 0px;">ID Loại</label>
                    </div>
                    <div class="form-outline mb-3">
                      <input name="ten_loai" type="text" id="ten" class="form-control" value="<?= $ten_loai ?>">
                      <label class="form-label" for="ten" style="margin-left: 0px;">Tên Loại Hàng Hoá</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="btn_update" class="btn btn-info">Sửa Sản Phẩm</button>
                    <button class="btn btn-danger" type="reset">Nhập Lại</button>
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Đóng</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


        </td>
        <td><button  class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#modelXoa<?= $ma_loai ?>">X</button>
         <div class="modal fade" id="modelXoa<?= $ma_loai ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Xoá Sản Phẩm ?</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body"><h6>Bạn Có Thực Sự Muốn Xoá Sản Phẩm <strong><?= $ten_loai ?> ?</strong></h6>
               <p class="red">Lưu ý: sau khi xoá không thể khôi phục lại.</p>
             </div>
             <!-- <span>Sau khiem xoá</span> -->
             <div class="modal-footer">
              <a href="index.php?xoa&ma_loai=<?= $ma_loai ?>" ><button type="button" class="btn btn-danger">Xoá</button></a>
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
    </td>
  </tr>

<?php }
?> 

</tbody>
</table>

<!-- modal loại -->
<div class="modal fade" id="modelloai">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm Loại Sản Phẩm</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../loai_hang/index.php" method="post">
        <div class="modal-body">
         <div class="form-outline mb-3">
          <input name="tenloai" type="text" id="tenloai" class="form-control">
          <label class="form-label" for="tenloai">Tên Loại Hàng</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="btn_insert">Lưu</button>
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Đóng</button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- end modal loaij -->
<!-- modal hãng sản xuất -->
<div class="modal fade" id="modelhang">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm Hãng Sản Xuất </h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../loai_hang/index.php" method="post">
        <div class="modal-body">
         <div class="form-outline mb-3">
          <input name="tenhang" type="text" id="tenhang" class="form-control">
          <label class="form-label" for="tenhang">Tên Hãng Sản Xuất</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="hang_sx">Lưu</button>
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Đóng</button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- end modal hãng sản xuất -->
<!-- modal sản phẩm -->
<div class="modal fade" id="modelsanpham">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm  Sản Phẩm</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../san_pham/index.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
             <div class="form-outline mb-3">
              <input name="ten_hh" type="text" id="ten_hh" class="form-control">
              <label class="form-label" for="ten_hh">Tên Hàng Hoá</label>
            </div>
          </div>
          <div class="col-3">
            <select class="custom-select" id="ma_loai" name="ma_loai"  placeholder="Loại hàng">
              <option value="">Chọn Loại Sản Phẩm</option>

              <?php
              $loai_hang=loai_selectall();
              foreach ($loai_hang as $loai_hang) {
                extract($loai_hang);
                echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>';
              }
              ?>
            </select>
          </div>
          <div class="col-3">
            <select class="custom-select" id="ma_hang" name="ma_hang"  placeholder="Hãng Sản Xuất">
              <option value="">Chọn Hãng Sản Xuất</option>
              <?php
              $dsHang = hangsx_selectall();
              foreach ($dsHang as $dsHang) {
                extract($dsHang);
                echo '<option value="'.$id.'">'.$ten_hang.'</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">

         <div class="col-4">
          <div class="form-outline mb-3">
           <input name="don_gia" type="text" id="don_gia" class="form-control">
           <label class="form-label" for="don_gia">Đơn Giá</label>
         </div>
       </div> 
       <div class="col-4">
        <div class="form-outline mb-3">
         <input name="giam_gia" type="text" id="giam_gia" class="form-control">
         <label class="form-label" for="giam_gia">Giảm Giá</label>
       </div>
     </div>
     <div class="col-4">
      <div class=" mb-3">
       <input name="ngay_nhap" type="date" id="ngay_nhap" class="form-control">
     </div>
   </div>

 </div>
 <div class="row">

  <div class="mb-3">
   <label class="form-label" for="hinh">Hình Ảnh Sản Phẩm</label>
   <input type="file" class="form-control" id="hinh" name="hinh" />
 </div>
</div>

<div class="form-outline mb-3">
 <textarea class="form-control" id="form4Example3" rows="4" name="mota"></textarea>
 <label class="form-label" for="form4Example3">Mô Tả</label>
</div>



</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-primary" name="btn_insertsp">Lưu</button>
  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Đóng</button>
</div>
</form>
</div>
</div>
</div>
<!-- end modal sản phẩm -->


</div>