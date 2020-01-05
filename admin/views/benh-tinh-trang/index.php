<?php 
	// var_dump($data['map-name-ans']);die();
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert"></div>
<div>
	<a class="btn btn-success" href="/cms-admin/benh-tinh-trang/create">Thêm Các tình trạng dẫn đến bệnh</a>
</div>
<table id="table" width="100%" class="table">
	<thead>
		<tr>
			<th scope="col">Loại bệnh</th>
			<th scope="col">Danh sách các tình trạng</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data['benh-tinh-trang'] as $row) { ?>
		<tr>
			<td><?php echo $data['map-name-illness'][$row->result]; ?></td>
			<td>
				<?php 
					$answers = explode(";",$row->condition);
					foreach ($answers as $key => $ans) {
						echo (isset($data['map-name-ans'][$ans]) ? $data['map-name-ans'][$ans] : "") . "<br>";
					}
				?>
			</td>
			<td>
				<a href="/cms-admin/benh-tinh-trang/edit/<?php echo($row->id); ?>">Sửa</a>
				<a href="/cms-admin/benh-tinh-trang/delete/<?php echo($row->id); ?>">Xóa</a>
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