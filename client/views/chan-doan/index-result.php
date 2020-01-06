<?php 
  ob_start();
?>
<div class="alls">
<?php if(sizeof($benhs) > 0) { ?>
<fieldset>
<legend><b style="text-transform: uppercase;">Những bệnh mà trẻ rất có khả năng mắc phải: </b></legend>
<?php foreach ($benhs as $benh) { ?>
  <a href="/benh/show/<?php echo($benh->id); ?>"><b style="font-size: 20px"><?php echo $benh->name; ?></b></a><br>
<?php } ?>
</fieldset>
<?php } else { ?>
	<fieldset>
		<legend><b style="text-transform: uppercase;">Hệ thống không xác định được, đưa trẻ đến viện nếu thấy những dấu hiệu đó là nghiêm trọng!!</b></legend>
	</fieldset>
<?php } ?>
<br>
<input type="text" name="old" hidden="true" value="<?php echo($data['flash-parent']); ?>">
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>