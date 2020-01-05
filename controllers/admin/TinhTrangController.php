<?php 
	require_once ("BaseController.php");
	require_once ("models/TinhTrang.php");
	class TinhTrangController extends BaseController
	{
		function __construct()
		{
			$this->folder = 'admin/views/tinh-trang';
			$this->_dir = 'common/uploads/tinh-trang/';
	  		$this->prt = new TinhTrang;
	  	}
		public function index() {
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$dataModel = $this->prt->getPage($page);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['answers'] = [];
				$this->render('index', $data);
				die();
			}
			$data['answers'] = $dataModel['data'];
			$mapKeyParent = [];
			foreach ($data['answers'] as $key => $value) {
				$mapKeyParent[$value->id] = $value->summary;
			}
			$data['map-parent-name'] = $mapKeyParent; 
			$this->render('index', $data);
		}

		public function create() {
			$dataModel = $this->prt->getAll();
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['answers'] = [];
				$this->render('index', $data);
				die();
			}
			$data['answers'] = $dataModel['data'];
			return $this->render("create", $data);	
		}

		public function edit() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
				header("location: /cms-admin/tinh-trang/index");
			} else $data['this'] = $dataModel['data'];
			$data['answers'] = $this->prt->getAll();
			if(!$data['answers']['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
				header("location: /cms-admin/tinh-trang/index");
			} else $data['answers'] = $data['answers']['data'];
			foreach ($data['answers'] as  $ans) {
				if($ans->id === $data['this']['parent_id']) $data['this']['parent_name'] = $ans->summary;
			}
			$this->render("edit",$data);
		}
		public function update() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$_POST['id'] = $id;
			if($_POST['parent_id'] === "-1") {
				$_POST['parent_id'] = NULL;
			}

			$dataModel = $this->prt->update($_POST,"id");
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Cập nhật không thành công ! - " . $dataModel['message'];
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
			} else {
				$_SESSION['message'] = "Cập nhật thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/tinh-trang/edit/".$_POST['id']);
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy trang";
				header("location: /cms-admin/tinh-trang/index");
			} else {
				$dataModel = $this->prt->delete(array("id" => $id));
			}
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Xóa không thành công ! - " . $dataModel["message"];
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
			} else {
				$_SESSION['message'] = "Xóa thành công !";	
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/tinh-trang/index");
		}
		public function store() {
			if($_POST['parent_id'] === "-1") unset($_POST['parent_id']);
			$dataModel = $this->prt->store($_POST);
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Thêm mới không thành công ! - " . $dataModel["message"];
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
				header("Location: /cms-admin/tinh-trang/create");
			} else {
				$_SESSION['message'] = "Thêm mới thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/tinh-trang/index");
		}
	}
?>