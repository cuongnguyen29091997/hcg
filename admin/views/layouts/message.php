 <?php if(isset($message)) { 
 	$info = isset($infoMess) ? $infoMess : "info";
 ?> 
<!-- Content -->
<div class="alert alert-<?php echo $info; ?> alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thông báo: </strong> <?php echo $message; ?>
</div>
<?php } ?>