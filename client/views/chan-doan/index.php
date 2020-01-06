<?php 
  ob_start();
?>
<div class="alls">
<form action="/chan-doan/" method="POST">
  <fieldset>
  <legend><b style="text-transform: uppercase;">Trả lời các câu hỏi trắc nghiệm sau : </b></legend>
  <?php foreach ($thamVans as $query) { ?>
    <h3><input type="checkbox" name="keyss[]" value="<?php echo $query->id; ?>"><?php echo $query->name; ?><br></h3>
  <?php } ?>
  </fieldset>
  <br>
  <input type="hidden" name="condition-for-result" value="<?php echo $conditionForResult; ?>">
  <button type="submit">Tiếp theo</button>
</form>
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>