<?php 
  $url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
  $positionPage = strpos($url,"/page");
  $url = substr($url,0,($positionPage === false ? strlen($url) : $positionPage));
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
 ?>
 <ul class="pagination justify-content-center">
<?php for($ii =  -2; $ii <= 2;++$ii) { ?>
  <?php if($ii + $page > 0) { ?>
  <li class="page-item <?php if(!$ii) echo 'active'; ?>">
      <a class="page-link d-flex align-items-center justify-content-center" href="<?php echo $url.'/page/'.($page + $ii); ?>"><?php echo $page + $ii; ?></a>
  </li>
  <?php } ?>
<?php } ?>
</ul>