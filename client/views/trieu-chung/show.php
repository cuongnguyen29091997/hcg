<?php 
    ob_start();
?>
  <section id="all-news" class="pd-space">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-9 col-lg-9">
          <div class="news-detail-wrap p-4 rounded shadow-sm border">
            <h3><?php echo $trieuChung['name']; ?> là gì</h3>
            
            <p><?php echo $trieuChung['des']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>