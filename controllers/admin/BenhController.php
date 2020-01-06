<?php 
	require_once ("BaseController.php");
	require_once ("models/Benh.php");
	class BenhController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'admin/views/benh';
	  		$this->prt = new Benh;
		}
		public function index() {
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$dataModel = $this->prt->getPage($page);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['sickness'] = [];
				$this->render('index', $data);
				die();
			}
			$data['sickness'] = $dataModel['data'];
			$this->render('index', $data);
		}
		public function create() {
			return $this->render("create");	
		}
		public function edit() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				header("location: /cms-admin/benh/index");
			}
			$data['sick'] = $dataModel['data'];
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['sick'] = [];
				$this->render('index', $data);
			}
			$dataModel = $this->prt->getAll();
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['sick'] = [];
				$this->render('index', $data);
			}

			$data['sick'] = $dataModel['data'][0];
			$this->render("edit",$data);
		}
		public function update() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$_POST['id'] = $id;
			if(isset($_POST['parent_id']) && $_POST['parent_id'] === "-1") unset($_POST['parent_id']);
			$dataModel = $this->prt->update($_POST,"id");
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Cập nhật không thành công ! - " . $dataModel['message'];
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
			} else {
				$_SESSION['message'] = "Cập nhật thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/benh/edit/".$_POST['id']);
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			
			$dataModel = $this->prt->delete(array("id" => $id));
			if(!$dataModel["status"]) {
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
				$_SESSION['message'] = "Xóa không thành công ! - " . $dataModel["message"];
			} else {
				$_SESSION['info-mess'] = $this->alertInfo['success'];
				$_SESSION['message'] = "Xóa thành công !";	
			}
			header("Location: /cms-admin/benh/index");
		}
		public function store() {
			$dataModel = $this->prt->store($_POST);
			if(!$dataModel["status"]) {
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
				$_SESSION['message'] = "Thêm mới không thành công ! - " . $dataModel["message"];
				header("Location: /cms-admin/benh/create");
				die();
			} else {
				$_SESSION['message'] = "Thêm mới thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/benh/index");
		}
	}
?>