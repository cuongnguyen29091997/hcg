<?php 
    ob_start();
    $empty = "<span style='color: red;'>Không có !</span>";
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert"></div>
<div>
	<a class="btn btn-success" href="/cms-admin/trieu-chung/create/">Thêm triệu chứng</a>
</div>
<table id="table" width="100%" class="table">
	<thead>
		<tr>
			<th scope="col">Triệu chứng</th>
			<th scope="col">Mô tả chi tiết</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($symptoms as $key => $symptom) { ?>
		<tr>
			<td><?php echo $symptom->name; ?></td>
			<td><?php echo $symptom->des; ?></td>
			<td>
				<a href="/cms-admin/trieu-chung/edit/<?php echo $symptom->id; ?>">Sửa</a>
				<a href="/cms-admin/trieu-chung/delete/<?php echo $symptom->id; ?>">Xóa</a>
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