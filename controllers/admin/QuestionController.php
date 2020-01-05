<?php 
	require_once ("BaseController.php");
	require_once ("models/Question.php");
	class QuestionController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'admin/views/question-and-answer';
	  		$this->prt = new Question;
		}
		public function index() {
			$dataModel = $this->prt->getAll();
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
				$data['q-and-as'] = [];
				$this->render('index', $data);
				die();
			}
			$data['q-and-as'] = $dataModel['data'];
			$this->render('index', $data);
		}

		public function create() {
			$data = [];
			return $this->render("create", $data);	
		}

		public function edit() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);
			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy dữ liệu cần chỉnh sửa";
				header("location: /cms-admin/question/index");
			} else $data['q-and-a'] = $dataModel['data'];
			$this->render("edit",$data);
		}
		public function update() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$_POST['id'] = $id;
			$dataModel = $this->prt->update($_POST,"id");
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Cập nhật không thành công ! - " . $dataModel['message'];
			} else {
				$_SESSION['message'] = "Cập nhật thành công !";
			}
			header("Location: /cms-admin/question/edit/".$_POST['id']);
		}
		public function delete() {
			$id = isset($_GET['id']) ? $_GET['id'] : -1;
			$dataModel = $this->prt->getById($id);

			if(!$dataModel['status']) {
				$_SESSION['message'] = "Không tìm thấy trang";
				header("location: /cms-admin/question/index");
			} else $data['question'] = $dataModel['data'];

			header("Location: /cms-admin/question/index");
		}
		public function store() {
			$dataModel = $this->prt->store($_POST);
			if(!$dataModel["status"]) {
				$_SESSION['message'] = "Thêm mới không thành công ! - " . $dataModel["message"];
				header("Location: /cms-admin/question/create");
			} else {
				$_SESSION['message'] = "Thêm mới thành công !";
			}
			header("Location: /cms-admin/question/index");
		}
	}
?>