 <?php if(isset($data['message'])) { 
 	$info = isset($data['info-mess']) ? $data['info-mess'] : "info";
 ?> 
<!-- Content -->
<div class="alert alert-<?php echo $info; ?> alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thông báo: </strong> <?php echo $data['message']; ?>
</div>
<?php } ?>