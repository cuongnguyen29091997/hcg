<?php 
    ob_start();
    $empty = "<span style='color: red;'>Không có !</span>";
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert"></div>
<div>
	<a class="btn btn-success" href="/cms-admin/tinh-trang/create/">Thêm tình trạng bệnh</a>
</div>
<table id="table" width="100%" class="table">
	<thead>
		<tr>
			<th scope="col">Tình trạng</th>
			<th scope="col">Được hỏi sau khi có tình trạng</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data['answers'] as $keyRow => $row) { ?>
		<tr>
			<td><?php echo $row->summary; ?></td>
			<td><?php echo (isset($row->parent_id) ? $data['map-parent-name'][$row->parent_id] : $empty); ?></td>
			<td>
				<a href="/cms-admin/tinh-trang/edit/<?php echo $row->id; ?>">Sửa</a>
				<a href="/cms-admin/tinh-trang/delete/<?php echo $row->id; ?>">Xóa</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php require_once('admin/views/layouts/paginations.php')  ?>
<?php
    $content = ob_get_clean();
    // extend from 
    require_once('admin/views/master-page.php');
?>