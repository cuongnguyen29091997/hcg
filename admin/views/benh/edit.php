<?php 
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert">
</div>
<h3 style="text-align: center;display: block;color: red;">Chỉnh sửa bệnh</h3>
<form action="/cms-admin/benh/update/<?php echo($sick->id); ?>" method="POST" id="form-add">
  <div class="form-row">
    <div class="form-group col-md-12">
  		<label for="fa_name">Tóm tắt bệnh: </label>
      <textarea required id="fa_name" class="form-control" name="name"><?php echo($sick->name); ?></textarea> 
    </div>
    <div class="form-group col-md-12">
      <label for="fa_des"> Hướng xử trí : </label>
      <textarea required id="fa_des" class="form-control" name="des"><?php echo($sick->des); ?></textarea> 
    </div>
    <div class="form-group col-md-12">
      <label for="fa_solution"> Hướng xử trí : </label>
      <textarea required id="fa_solution" class="form-control" name="solution"><?php echo($sick->solution); ?></textarea> 
    </div>
  </div>
  <button class="btn btn-success" type="submit">Cập nhật</button>
  <a class="btn btn-info" href="/cms-admin/benh/index/">Quay về trang chủ</a>
</form>
<br>
<?php
    $content = ob_get_clean();
    require('admin/views/master-page.php');
?>
<script type="text/javascript">
  CKEDITOR.replace('fa_solution');
  CKEDITOR.replace('fa_des');
</script>