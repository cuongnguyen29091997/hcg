<?php 
	require_once ("BaseController.php");
	require_once ("models/TrieuChung.php");
	require_once ("models/TrieuChungBenh.php");
	require_once ("models/TrieuChungThamVan.php");
	require_once ("models/Benh.php");
	require_once ("common/class-common/stack.php");
	class ChanDoanController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'client/views/chan-doan/';
			Parent::__construct($this->folder);
			$queryModel = new TrieuChungThamVan;
			$this->querys = $queryModel->getAll();
			if(!$this->querys['status']) error();
			else {
				$this->querys = $this->querys['data'];
			}
		}
		function error() {
			$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
			$data['answers'] = [];
			$this->render('home-page', $data);
			die();
		}
		function index() {
			$stackCondition = new Stack();
			$conditionsForResult = new Stack();
			if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['keyss'])) { 
				foreach($_POST['keyss'] as $value) {
					$stackCondition->push($value);
				}
			}
			if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['condition-for-result']) && $_POST['condition-for-result'] != "") {
				$conditionsForResult->data = array_unique(explode(";",$_POST['condition-for-result']));
			}
			$trieuChungModel = new TrieuChung;
			$trieuChungs = $trieuChungModel->getAll();
			if(!$trieuChungs['status']) {
				$this->error();
			} else {
				$trieuChungs = $trieuChungs['data'];
			}
			$data['thamVans'] = [];
			if($stackCondition->isEmpty()) {
				foreach ($trieuChungs as $trieuChung) {
					$checked = false;
					foreach ($this->querys as $query) {
						if($query->query == $trieuChung->id) {
							$checked = true;
							break;
						}
					}
					if(!$checked) {
						array_push($data['thamVans'], $trieuChung);
					}
				}
				$data['conditionForResult'] = "";
				$this->render('index', $data);
			} else {
				$mapCondition = [];
				$mapTrieuChungs = [];
				foreach ($stackCondition->data as $cdt) {
					$conditionsForResult->push($cdt);
					$mapCondition[$cdt] = true;
				}
				foreach ($trieuChungs as $trieuChung) {
					$mapTrieuChungs[$trieuChung->id] = $trieuChung;
				}
				foreach ($this->querys as $query) {
					$condition = explode(";",$query->conditions);
					$checked = false;
					foreach ($condition as $dk) {
						if(!isset($mapCondition[$dk])) {
							$checked = true;
							break;
						}
					}
					if(!$checked) {
						array_push($data['thamVans'], $mapTrieuChungs[$query->query]);
					}
				}
				if(!sizeof($data['thamVans'])) {
					$mapCondition = [];
					$mapBenhs = [];
					$data['benhs'] = [];

					$benhModel = new Benh;
					$benhs = $benhModel->getAll();
					if(!$benhs['status']) $this->error();
					else $benhs = $benhs['data'];

					foreach ($benhs as $b) {
						$mapBenhs[$b->id] = $b;
					}


					foreach ($conditionsForResult->data as $cdt) {
						$mapCondition[$cdt] = true;
					}
					$trieuChungBenhModel = new TrieuChungBenh;
					$trieuChungBenh = $trieuChungBenhModel->getAll();
					if(!$trieuChungBenh['status']) $this->error();
					else $trieuChungBenh = $trieuChungBenh['data'];

					foreach ($trieuChungBenh as $tcb) {
						$condition = explode(";",$tcb->conditions);
						$checked = false;
						foreach ($condition as $dk) {
							if(!isset($mapCondition[$dk])) {
								$checked = true;
								break;
							}
						}
						if(!$checked) {
							array_push($data['benhs'], $tcb->result);
						}
					}
					$data['benhs'] = array_unique($data['benhs']);
					foreach ($data['benhs'] as &$value) {
						$value = $mapBenhs[$value];
					}
					$this->render('index-result', $data);
				} else {
					$data['conditionForResult'] = $conditionsForResult->toString();
					$this->render('index', $data);
				}
			}
		}
	}
?>