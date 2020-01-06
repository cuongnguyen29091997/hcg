<?php 
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
  <h2>Thêm triệu chứng</h2>
  <form method="POST" action="/cms-admin/trieu-chung/store">
    <div class="form-group">
      <label for="f_name">Triệu chứng: </label>
      <input type="text" placeholder="Trẻ có ho..." class="form-control" id="f_name" placeholder="Tình trạng hiện tại" name="name" />
    </div>
    <div class="form-group">
      <label for="fa_des">Mô tả chi tiết: </label>
      <textarea required id="fa_des" class="form-control" placeholder="Làm một cái gì đó để chữa bệnh tiêu chảy" name="des"></textarea> 
    </div>
    <button type="submit" class="btn btn-success">Thêm mới</button>
  </form>
<?php
    $content = ob_get_clean();
    require('admin/views/master-page.php');
?>
<script type="text/javascript">
  CKEDITOR.replace('fa_des');
</script>