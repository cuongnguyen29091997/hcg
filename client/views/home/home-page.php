<?php 
  ob_start();
?>
<div class="alls">
<form action="/home" method="POST">
  <fieldset>
  <legend><b style="text-transform: uppercase;">Trả lời các câu hỏi trắc nghiệm sau : </b></legend>
  <?php foreach ($data['answers'] as $key => $value) { ?>
    <h3><input type="checkbox" name="keyss[]" value="<?php echo $value->id; ?>"><?php echo $value->summary; ?><br></h3>
  <?php } ?>
  </fieldset>
  <br>
  <input type="text" name="old" hidden="true" value="<?php echo($data['flash-parent']); ?>">
  <button type="submit">Tiếp theo</button>
</form>
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>