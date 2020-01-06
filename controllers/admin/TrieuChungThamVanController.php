<?php 
	require_once ("BaseController.php");
	require_once ("models/TrieuChungThamVan.php");
	require_once ("models/Benh.php");
	require_once ("models/TrieuChung.php");
	class TrieuChungThamVanController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'admin/views/trieu-chung-tham-van';
	  		$this->prt = new TrieuChungThamVan;

			$sympModel = new TrieuChung;
			$dataSymp = $sympModel->getAll();

			if(!$dataSymp['status']) {
				var_dump($dataSymp);
				die();
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data[] = [];
				$this->render('index', $data);
				die();
			} else {
				$this->symptoms = $dataSymp['data'];
			}
		}
		public function index() {
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$dataModel = $this->prt->getPage($page);

			$mapNameSymps = [];

			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['trieuChungThamVans'] = [];
				$this->render('index', $data);
				die();
			} else $data['trieuChungThamVans'] = $dataModel['data'];
			foreach ($this->symptoms as $symp) {
				$mapNameSymps[$symp->id] = $symp->name;
			}
			$data['mapNameSymps'] = $mapNameSymps;
			$this->render('index', $data);
		}

		public function create() {
			$data['symptoms'] = $this->symptoms;
			return $this->render("create", $data);
		}

		public function edit() {
			$data['symptoms'] = $this->symptoms;
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				header("location: /cms-admin/trieu-chung-tham-van/index");
			} else $data['tctv'] = $dataModel['data'];
			$this->render("edit",$data);
		}
		public function update() {
			$_POST['conditions'] = implode(";", array_unique($_POST['conditions']));
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$_POST['id'] = $id;
			$dataModel = $this->prt->update($_POST,"id");
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Cập nhật không thành công ! - " . $dataModel['message'];
			} else {
				$_SESSION['message'] = "Cập nhật thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/trieu-chung-tham-van/edit/".$_POST['id']);
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;

			$dataModel = $this->prt->delete(array("id" => $id));

			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy trang";
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
				header("location: /cms-admin/benh-tinh-trang/index");
			} else {
				$_SESSION['message'] = "Xóa thành công!";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
				$data['article'] = $dataModel['data'];
			}

			header("Location: /cms-admin/trieu-chung-tham-van/index");
		}
		public function store() {
			$_POST['conditions'] = implode(";", array_unique($_POST['conditions']));
			$_POST['query'] = (int)($_POST['query']);
			$dataModel = $this->prt->store($_POST);
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Thêm mới không thành công ! - " . $dataModel["message"];
				header("Location: /cms-admin/trieu-chung-tham-van/create");
			} else {
				$_SESSION['message'] = "Thêm mới thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/trieu-chung-tham-van/index");
		}
	}
?>