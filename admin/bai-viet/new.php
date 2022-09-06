
<script type="text/javascript">
  tinymce.init({
    selector: '#myeditablediv',
    height: 500,
    plugins: [
    'advlist autolink lists link image charmap',
    'searchreplace fullscreen',
    'insertdatetime media table paste imagetools'
    ],
    images_upload_handler: example_image_upload_handler, 
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  });
  function example_image_upload_handler (blobInfo, success, failure, progress) {
    var xhr, formData;

    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', 'upload.php');

    xhr.upload.onprogress = function (e) {
      progress(e.loaded / e.total * 100);
    };

    xhr.onload = function() {
      responseText = JSON.parse(xhr.responseText)
      console.log(xhr.responseText);

      if (!responseText || typeof responseText.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
      }
      success(responseText.location);
    };

    xhr.onerror = function () {
      failure('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
    };
    formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
  };
</script>

<div class="">
 <div class="">
  <form method="post" class="border p-2" action="index.php" enctype="multipart/form-data">
   <h1 class="m-3 text-center">Tạo Mới Bài Viết</h1>
   <div class="form-outline mb-3 container">
    <input type="text" id="tieude" class="form-control" name="tieude" />
    <label class="form-label" for="tieude" >Tiêu Đề</label>
  </div> 
  <label class="" for="customFile">Ảnh Bài Viết</label>
  <input type="file" class="form-control" id="customFile" name="hinh" />
  <label for="myeditablediv">Nội dung</label>
  <textarea id="myeditablediv" name="noidung">Click here to edit!</textarea>
  <button name="btn_insert" class="m-3 btn btn-info" >Đăng Bài</button>
</form>

</div>
</div>


