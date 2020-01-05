<?php 
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
  <h2>Thêm triệu chứng</h2>
  <form method="POST" action="/cms-admin/tinh-trang/store" enctype="multipart/form-data">
    <div class="form-group">
      <label for="f_name">Miêu tả triệu chứng: </label>
      <textarea type="text" placeholder="Trẻ có ho..." class="form-control" id="f_name" placeholder="Tình trạng hiện tại" name="summary"></textarea>
    </div>
	<div class="form-group">
		<label for="f_answer_parent">Triệu chứng con của triệu chứng: </label>
    <select name="parent_id" class="form-control" id="f_answer_parent">
      <option value="-1">Không có triệu chứng nguồn</option>
      <?php foreach ($data['answers'] as $ans) echo "<option value='$ans->id'>$ans->summary</option>"; ?>
    </select>
	</div>
    <button type="submit" class="btn btn-success">Thêm mới</button>
  </form>
<?php
    $content = ob_get_clean();
    require('admin/views/master-page.php');
?>