<?php 
    ob_start();
?>
  <a href="/home/index">Quay về trang chủ</a>
  <section id="all-news" class="pd-space">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-9 col-lg-9">
          <div class="news-detail-wrap p-4 rounded shadow-sm border">
            <h3>Tên bệnh : <?php echo $data['benh']['summary']; ?></h3>
            <h3>Cách xử trí : </h3>
            <p><?php echo $data['benh']['solution']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>