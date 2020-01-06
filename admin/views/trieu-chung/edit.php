<?php 
	// extract($data);
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
  <h2>Cập nhật triệu chứng</h2>
  <form method="POST" action="/cms-admin/trieu-chung/update/<?php echo($this_edit['id']); ?>">
    <div class="form-group">
      <label for="f_name">Triệu chứng: </label>
      <input type="text" class="form-control" id="f_name" value="<?php echo $this_edit['name']; ?>" placeholder="Tiêu chảy" name="name">
    </div>
    <div class="form-group">
      <label for="fa_des"> Hướng xử trí : </label>
      <textarea required id="fa_des" class="form-control" placeholder="Làm một cái gì đó để chữa bệnh tiêu chảy" name="des"><?php echo $this_edit['des']; ?></textarea> 
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
    <a href="/cms-admin/trieu-chung/index/" class="btn btn-info">Quay về trang chủ</a>
  </form>
  <br>
<?php
    $content = ob_get_clean();
    require('admin/views/master-page.php');
?>
<script type="text/javascript">
  CKEDITOR.replace('fa_des');
</script>