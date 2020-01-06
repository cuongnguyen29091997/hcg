<?php 
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert">
</div>
<h3 style="text-align: center;display: block;color: red;">Thêm loại bệnh</h3>
<form action="/cms-admin/benh/store" method="POST" id="form-add">
  <div class="form-row">
    <div class="form-group col-md-12">
  		<label for="fa_name">Tên bệnh: </label>
      <textarea required id="fa_name" class="form-control" name="name" placeholder="Tiêu chảy"></textarea> 
    </div>
    <div class="form-group col-md-12">
      <label for="fa_des">Mô tả chi tiết : </label>
      <textarea required id="fa_des" class="form-control" placeholder="Làm một cái gì đó để chữa bệnh tiêu chảy" name="des"></textarea> 
    </div>
    <div class="form-group col-md-12">
      <label for="fa_solution"> Hướng xử trí : </label>
      <textarea required id="fa_solution" class="form-control" placeholder="Làm một cái gì đó để chữa bệnh tiêu chảy" name="solution"></textarea> 
    </div>
  </div>
  <button class="btn btn-success" type="submit">Thêm bệnh</button>
</form>
<?php
    $content = ob_get_clean();
    require('admin/views/master-page.php');
?>
<script type="text/javascript">
  CKEDITOR.replace('fa_solution');
  CKEDITOR.replace('fa_des');
</script>