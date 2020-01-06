<?php 
  ob_start();
?>
<div class="row align-items-stretch retro-layout-2">
  <div class="col-md-6">
    <a href="/chan-doan/index" class="h-entry img-5 h-100 gradient" style="background-image: url('/common/images/bgr_chan_doan.jpg');">
      
      <div class="text">
        <div class="post-categories mb-3">
          <span class="post-category bg-danger">Tham vấn</span>
          <span class="post-category bg-primary">Kết quả</span>
        </div>
        <h2>Chẩn đoán bệnh dựa trên các dấu hiệu bệnh của trẻ.</h2>
      </div>
    </a>
  </div>  
  <div class="col-md-6">
    <a href="/trieu-chung/index/" class="h-entry mb-30 v-height gradient" style="background-image: url('/common/images/bgr_ho.jpg');">
      
      <div class="text">
        <h2>Triệu chứng trong y khoa để mô tả đúng tình trạng của trẻ.</h2>
      </div>
    </a>
    <a href="/benh/index/" class="h-entry v-height gradient" style="background-image: url('/common/images/bgr_benh.jpg');">
      
      <div class="text">
        <h2>Tìm hiểu về bệnh và hướng xử lý nếu trẻ mắc phả.</h2>
      </div>
    </a>
  </div>
</div>
<?php
$content = ob_get_clean();
require_once('client/views/master-page.php');
?>