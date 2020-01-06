<?php 
  ob_start();
?>
<div class="alls">
<form action="/chan-doan/" method="POST">
  <fieldset>
  <legend><b style="text-transform: uppercase;">Chọn các dấu hiệu mà trẻ có: </b></legend>
  <?php foreach ($thamVans as $query) { ?>
    <h3><input type="checkbox" name="keyss[]" value="<?php echo $query->id; ?>"><?php echo $query->name; ?><br></h3>
  <?php } ?>
  </fieldset>
  <br>
  <div class="form-group">
    <label for="exampleInputEmail1">Thông tin thêm</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Triệu chứng của trẻ">
    <small id="emailHelp" class="form-text text-muted">Không bắt buộc, và không có ý nghĩa trong tham vấn. Mang ý nghĩa công đồng, đóng góp cho ứng dụng ngày một tốt hơn!</small>
  </div>
  <input type="hidden" name="condition-for-result" value="<?php echo $conditionForResult; ?>">
  <button type="submit">Tiếp theo</button>
</form>
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>