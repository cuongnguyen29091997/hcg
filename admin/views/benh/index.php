<?php 
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert"></div>
<div>
  <a class="btn btn-success" href="/cms-admin/benh/create/">Thêm loại bệnh</a>
</div>
<table id="table" width="100%" class="table">
  <thead>
    <tr>
      <th scope="col">Tên bệnh</th>
      <th scope="col">Hướng xử trí</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($sickness as $sick) { ?>
    <tr>
      <td><?php echo "$sick->name"; ?></td>
      <td><?php echo "$sick->solution"; ?></td>
      <td>
        <a href="/cms-admin/benh/edit/<?php echo($sick->id) ?>">Sửa</a>
        <a href="/cms-admin/benh/delete/<?php echo($sick->id) ?>">Xóa</a>
      </td>
    </tr>
<?php } ?>
  </tbody>
</table>
<?php require_once('admin/views/layouts/paginations.php');  ?>
<?php
    $content = ob_get_clean();
    require('admin/views/master-page.php');
?>