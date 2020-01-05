<?php 
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert">
</div>
<h3 style="text-align: center;display: block;color: red;">Chỉnh sửa bệnh</h3>
<form action="/cms-admin/benh/update/<?php echo($data['illness']->id); ?>" method="POST" id="form-add">
  <div class="form-row">
    <div class="form-group col-md-12">
  		<label for="fa_summary">Tóm tắt bệnh: </label>
      <textarea required id="fa_summary" class="form-control" name="summary"><?php echo($data['illness']->summary); ?></textarea> 
    </div>
      <div class="form-group col-md-12">
		    <label for="fa_alias"> Alias : <span style="color: red;font-style: italic;">*(Khác nhau cho từng danh mục)</span></label>
      	<input required id="fa_alias" type="text" class="form-control" value="<?php echo($data['illness']->alias); ?>" name="alias">
      </div>
      <div class="form-group col-md-12">
        <label for="fa_solution"> Hướng xử trí : </label>
        <textarea required id="fa_solution" class="form-control" name="solution"><?php echo($data['illness']->solution); ?></textarea> 
      </div>
  </div>
  <button class="btn btn-success" type="submit">Cập nhật</button>
</form>
<br>
<a href="/cms-admin/benh/index/" class="btn btn-info" type="submit">Quay về trang chủ</button>
<?php
    $content = ob_get_clean();
    require('admin/views/master-page.php');
?>
<script type="text/javascript">
  CKEDITOR.replace('fa_solution');
</script>