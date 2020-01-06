<?php 
  ob_start();
?>
<div class="alls">
<fieldset>
<legend><b style="text-transform: uppercase;">Những bệnh mà trẻ rất có khả năng mắc phải: </b></legend>
<?php foreach ($benhs as $benhs) { ?>
  <b style="font-size: 20px"><?php echo $benhs->name; ?></b> : <a href="/benh/show/<?php echo($value->alias); ?>">Cách điều trị kịp thời</a><br>
<?php } ?>
</fieldset>
<br>
<input type="text" name="old" hidden="true" value="<?php echo($data['flash-parent']); ?>">
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>