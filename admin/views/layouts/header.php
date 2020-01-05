<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">Admin</a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="/common/dist/img/user_1.jpg" class="user-image" alt="User Image"/>
            <span class="hidden-xs"><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} else {echo "string";} ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="/common/dist/img/user_1.jpg" class="img-circle" alt="User Image" />
              <p>
                <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} else {echo "string";} ?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="profile.php" class="btn btn-default btn-flat">Thông Tin</a>
              </div>
              <div class="pull-right">
                <a href="/cms-admin/account/logout" class="btn btn-default btn-flat">Đăng xuất</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>