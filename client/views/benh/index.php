<?php 
    ob_start();
?>
 <div class="site-section bg-white">
    <div class="container">
      <div class="row">
        <?php foreach ($benhs as $benh) { ?>
        <div class="col-lg-4 mb-4">
          <div class="entry2">
            <a href="/benh/show/<?php echo $benh->id; ?>"><img src="/common/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
            <div class="excerpt">
            <span class="post-category text-white bg-secondary mb-3"><?php echo $benh->name; ?></span>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>