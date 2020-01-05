<!DOCTYPE html>
<html>
<head>
  <?php require_once("admin/views/layouts/css-links.php"); ?>
</head>
<body class="skin-blue">
	<div class="wrapper">
		<?php require_once "admin/views/layouts/header.php"; ?>
		<aside class="main-sidebar">
	      <section class="sidebar">
	        <div class="user-panel">
	          <div class="pull-left image">
	            <img src="/common/dist/img/user_1.jpg" class="img-circle" alt="User Image" />
	          </div>
	          <div class="pull-left info">
	            <p><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></p>
	            <a href="#"><i class="fa fa-circle text-success"></i></a>
	          </div>
	        </div>
	        <?php require_once "admin/views/layouts/sidebar.php" ?>
	      </section>
	    </aside>
	    <div class="content-wrapper">
	      <section class="content">
	      	<?php echo $content ?>
	      </section>
	  	</div>
	  	<?php require_once "admin/views/layouts/footer.php" ?>
  	</div>
</body>
<?php require_once "admin/views/layouts/js-links.php"; ?>
</html>