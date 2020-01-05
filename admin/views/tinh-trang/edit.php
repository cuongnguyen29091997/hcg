<?php 
	// extract($data);
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
  <h2>Cập nhật triệu chứng</h2>
  <form method="POST" action="/cms-admin/tinh-trang/update/<?php echo($data['this']['id']); ?>">
    <div class="form-group">
      <label for="f_summary">Triệu chứng: </label>
      <input type="text" class="form-control" id="f_summary" value="<?php echo $data['this']['summary']; ?>" placeholder="Tiêu chảy" name="summary">
    </div>
 
  	<div class="form-group">
  		<label for="f_parent">Được hỏi sau khi hỏi tình trạng ? </label>
  		<select name="parent_id" class="form-control" value="<?php echo $data['this']['parent_name']; ?>" id="f_parent">
  			<option value="-1">Gốc</option>
        <?php foreach ($data['answers'] as $ans) {
            $checked = ($ans->id === $data['this']['parent_id'] ? "selected" : "");
            echo "<option value='$ans->id' $checked>$ans->summary</option>";
          }
        ?>
  		</select>
  	</div>
    <button type="submit" class="btn btn-success">Update</button>
  </form>
  <br>
  <a href="/cms-admin/tinh-trang/index/" class="btn btn-info">Quay về trang chủ</button>
<?php
    $content = ob_get_clean();
    require('admin/views/master-page.php');
?>