<?php 
    ob_start();
    require_once("admin/views/layouts/message.php");
?>
<!-- Content -->
<div id="alert"></div>
<div>
	<a class="btn btn-success" href="/cms-admin/trieu-chung-benh/create">Thêm Các triệu chứng của bệnh</a>
</div>
<table id="table" width="100%" class="table">
	<thead>
		<tr>
			<th scope="col">Loại bệnh</th>
			<th scope="col">Danh sách các triệu chứng</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($trieuChungBenhs as $tcb) { ?>
		<tr>
			<td><?php echo $mapNameSickness[$tcb->result]; ?></td>
			<td>
				<?php 
					$symps = explode(";",$tcb->conditions);
					foreach ($symps as $key => $symp) {
						echo (isset($mapNameSymps[$symp]) ? $mapNameSymps[$symp] : "") . "<br>";
					}
				?>
			</td>
			<td>
				<a href="/cms-admin/trieu-chung-benh/edit/<?php echo($tcb->id); ?>">Sửa</a>
				<a href="/cms-admin/trieu-chung-benh/delete/<?php echo($tcb->id); ?>">Xóa</a>
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