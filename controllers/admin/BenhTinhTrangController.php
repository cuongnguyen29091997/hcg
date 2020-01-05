<?php 
	require_once ("BaseController.php");
	require_once ("models/BenhTinhTrang.php");
	require_once ("models/Benh.php");
	require_once ("models/TinhTrang.php");
	class BenhTinhTrangController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'admin/views/benh-tinh-trang';
	  		$this->prt = new BenhTinhTrang;

	  		$benhModel = new Benh;
			$dataBenhModel = $benhModel->getAll();

			$ansModel = new TinhTrang;
			$dataAnsModel = $ansModel->getAll();

			if(!$dataBenhModel['status'] || !$dataAnsModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['benh-tinh-trang'] = [];
				$this->render('index', $data);
				die();
			} else {
				$this->illness = $dataBenhModel['data'];
				$this->answers = $dataAnsModel['data'];
			}
		}
		public function index() {
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$dataModel = $this->prt->getPage($page);

			$mapNameIllness = [];
			$mapNameAns = [];

			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['benh-tinh-trang'] = [];
				$this->render('index', $data);
				die();
			} else $data['benh-tinh-trang'] = $dataModel['data'];

			foreach ($this->illness as $row) {
				$mapNameIllness[$row->id] = $row->summary;
			}
			foreach ($this->answers as $row) {
				$mapNameAns[$row->id] = $row->summary;
			}
			$data['map-name-illness'] = $mapNameIllness;
			$data['map-name-ans'] = $mapNameAns;
			$this->render('index', $data);
		}

		public function create() {
			$data['illness'] = $this->illness;
			$data['answers'] = $this->answers;
			return $this->render("create", $data);	
		}

		public function edit() {
			$data['illness'] = $this->illness;
			$data['answers'] = $this->answers;
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				header("location: /cms-admin/benh-tinh-trang/index");
			} else $data['benh-tinh-trang'] = $dataModel['data'];
			$this->render("edit",$data);
		}
		public function update() {
			$_POST['condition'] = implode(";", array_unique($_POST['condition']));
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$_POST['id'] = $id;
			$dataModel = $this->prt->update($_POST,"id");
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Cập nhật không thành công ! - " . $dataModel['message'];
			} else {
				$_SESSION['message'] = "Cập nhật thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/benh-tinh-trang/edit/".$_POST['id']);
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

			header("Location: /cms-admin/benh-tinh-trang/index");
		}
		public function store() {
			$_POST['condition'] = implode(";", array_unique($_POST['condition']));
			$_POST['result'] = (int)($_POST['result']);
			$dataModel = $this->prt->store($_POST);
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Thêm mới không thành công ! - " . $dataModel["message"];
				header("Location: /cms-admin/benh-tinh-trang/create");
			} else {
				$_SESSION['message'] = "Thêm mới thành công !";
				$_SESSION['info-mess'] = $this->alertInfo['success'];
			}
			header("Location: /cms-admin/benh-tinh-trang/index");
		}
	}
?>