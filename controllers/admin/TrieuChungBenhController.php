<?php 
	require_once ("BaseController.php");
	require_once ("models/TrieuChungBenh.php");
	require_once ("models/Benh.php");
	require_once ("models/TrieuChung.php");
	class TrieuChungBenhController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'admin/views/trieu-chung-benh';
	  		$this->prt = new TrieuChungBenh;

	  		$benhModel = new Benh;
			$dataBenhModel = $benhModel->getAll();

			$sympModel = new TrieuChung;
			$dataSymp = $sympModel->getAll();

			if(!$dataBenhModel['status'] || !$dataSymp['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['trieu-chung-benh'] = [];
				$this->render('index', $data);
				die();
			} else {
				$this->sickness = $dataBenhModel['data'];
				$this->symptoms = $dataSymp['data'];
			}
		}
		public function index() {
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$dataModel = $this->prt->getPage($page);

			$mapNameSickness = [];
			$mapNameSymps = [];

			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['trieuChungBenhs'] = [];
				$this->render('index', $data);
				die();
			} else $data['trieuChungBenhs'] = $dataModel['data'];
			foreach ($this->sickness as $sick) {
				$mapNameSickness[$sick->id] = $sick->name;
			}
			foreach ($this->symptoms as $symp) {
				$mapNameSymps[$symp->id] = $symp->name;
			}
			$data['mapNameSickness'] = $mapNameSickness;
			$data['mapNameSymps'] = $mapNameSymps;
			$this->render('index', $data);
		}

		public function create() {
			$data['sickness'] = $this->sickness;
			$data['symptoms'] = $this->symptoms;
			return $this->render("create", $data);
		}

		public function edit() {
			$data['sickness'] = $this->sickness;
			$data['symptoms'] = $this->symptoms;
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				header("location: /cms-admin/trieu-chung-benh/index");
			} else $data['tcb'] = $dataModel['data'];
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
			header("Location: /cms-admin/trieu-chung-benh/edit/".$_POST['id']);
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;

			$dataModel = $this->prt->delete(array("id" => $id));

			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy trang";
				$_SESSION['info-mess'] = $this->alertInfo['failed'];
				header("location: /cms-admin/trieu-chung-benh/index");
			} else {
				$_SESSION['message'] = "Xóa thành công!";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
				$data['article'] = $dataModel['data'];
			}

			header("Location: /cms-admin/trieu-chung-benh/index");
		}
		public function store() {
			$_POST['conditions'] = implode(";", array_unique($_POST['conditions']));
			$_POST['result'] = (int)($_POST['result']);
			$dataModel = $this->prt->store($_POST);
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Thêm mới không thành công ! - " . $dataModel["message"];
				header("Location: /cms-admin/trieu-chung-benh/create");
			} else {
				$_SESSION['message'] = "Thêm mới thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/trieu-chung-benh/index");
		}
	}
?>