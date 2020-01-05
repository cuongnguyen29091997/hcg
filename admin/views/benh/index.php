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
      <th scope="col">Loại bệnh</th>
      <th scope="col">Hướng xử trí</th>
      <th scope="col">Alias</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($data['illness'] as $category) { ?>
    <tr>
      <td><?php echo "$category->summary"; ?></td>
      <td><?php echo "$category->solution"; ?></td>
      <td><?php echo "$category->alias"; ?></td>
      <td>
        <a href="/cms-admin/benh/edit/<?php echo($category->id) ?>">Sửa</a>
        <a href="/cms-admin/benh/delete/<?php echo($category->id) ?>">Xóa</a>
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