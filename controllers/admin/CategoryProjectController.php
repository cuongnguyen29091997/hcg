<?php 
	require_once ("BaseController.php");
	require_once ("models/CategoryProject.php");
	class CategoryProjectController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'admin/views/category-project';
	  		$this->prt = new CategoryProject;
		}
		public function index() {
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$dataModel = $this->prt->getAll();
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['category-project'] = [];
				$this->render('index', $data);
				die();
			}
			$data['category-project'] = $dataModel['data'];
			$this->render('index', $data);
		}
		public function edit() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				header("location: /cms-admin/category-project/index");
			}
			$data['category'] = $dataModel['data'];
			$this->render("edit",$data);
		}
		public function update() {
			$_POST['id'] = isset($_GET['id']) ? $_GET['id'] : -1;
	
			$dataModel = $this->prt->update($_POST,"id");
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Cập nhật không thành công ! - " . $dataModel['message'];
			} else {
				$_SESSION['message'] = "Cập nhật thành công !";
			}
			header("Location: /cms-admin/category-project/index");
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->delete(array("id" => $id));
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Xóa không thành công ! - " . $dataModel["message"];
			} else {
				$_SESSION['message'] = "Xóa thành công !";	
			}
			header("Location: /cms-admin/category-project/index");
		}
		public function store() {
			$dataModel = $this->prt->store($_POST);
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Thêm mới không thành công ! - " . $dataModel["message"];
			} else {
				$_SESSION['message'] = "Thêm mới thành công !";
			}
			header("Location: /cms-admin/category-project/index");
		}
	}
?>