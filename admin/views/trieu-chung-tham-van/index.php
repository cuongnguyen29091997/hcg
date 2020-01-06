<?php 
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert"></div>
<div>
	<a class="btn btn-success" href="/cms-admin/trieu-chung-tham-van/create">Thêm Các tham vấn sau khi xuất hiện các triệu chứng</a>
</div>
<table id="table" width="100%" class="table">
	<thead>
		<tr>
			<th scope="col">Tham vấn</th>
			<th scope="col">Danh sách các triệu chứng</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($trieuChungThamVans as $tctv) { ?>
		<tr>
			<td><?php echo $mapNameSymps[$tctv->query]; ?></td>
			<td>
				<?php 
					$symps = explode(";",$tctv->conditions);
					foreach ($symps as $key => $symp) {
						echo (isset($mapNameSymps[$symp]) ? $mapNameSymps[$symp] : "") . "<br>";
					}
				?>
			</td>
			<td>
				<a href="/cms-admin/trieu-chung-tham-van/edit/<?php echo($tctv->id); ?>">Sửa</a>
				<a href="/cms-admin/trieu-chung-tham-van/delete/<?php echo($tctv->id); ?>">Xóa</a>
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