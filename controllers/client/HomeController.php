<?php 
	require_once ("BaseController.php");
	require_once ("models/TinhTrang.php");
	require_once ("models/Rules.php");
	require_once ("models/Benh.php");
	require_once ("common/class-common/stack.php");
	class HomeController extends BaseController	
	{
		function __construct()
		{
			$this->folder = 'client/views/home/';
			Parent::__construct($this->folder);
		}
		function error() {
			$_SESSION['message'] = "Có một lỗi nghiêm trọng xảy ra. Vui lòng liên hệ sđt : 0935170032";
			$data['answers'] = [];
			$this->render('home-page', $data);
			die();
		}
		function index() {
			$stackParent = new Stack();
			$stackCondition = new Stack();
			if(isset($_POST['old'])) {
				$stackParent->data = explode(";",$_POST['old']);
			}
			if(isset($_SESSION['flash-conditions'])) {
				$stackCondition->data = array_unique(explode(";", $_SESSION['flash-conditions']));
				unset($_SESSION['flash-conditions']);
			}
			if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['keyss'])) { 
				foreach($_POST['keyss'] as $value) {
					$stackParent->push($value);
				}
			}
			$answerModel = new TinhTrang;
			$OK = true;$needReply = false;
			while($OK) {
				$parent = $stackParent->pop();
				$answerDataModel = $answerModel->getAllByCondition(array(array("key" => "parent_id", "value" => $parent)));
				if(!$answerDataModel['status']) {
					$this->error();
				} else {
					$data['answers'] = $answerDataModel['data'];
					if(sizeof($data['answers']) > 0 || $stackParent->isEmpty()) {
						$needReply = ($stackParent->isEmpty() && $_SERVER['REQUEST_METHOD'] === 'POST');
						$OK = false;
					} else {
						$OK = true;
					}
					if(sizeof($data['answers']) === 0) {
						$stackCondition->push($parent);
					}
				}
			}
			$data['flash-parent'] = $stackParent->toString();
			$_SESSION['flash-conditions'] = $stackCondition->toString();
			if($needReply) {
				$conditions = array_unique(explode(";", $_SESSION['flash-conditions']));
				unset($_SESSION['flash-conditions']);
				$data = [];
				$conditions_get_illness = [];
				$rulesModel = new Rules;
				$rulesDataModel = $rulesModel->getAll();
				if(!$rulesDataModel['status']) {
					$this->error;
				} else {
					foreach ($rulesDataModel['data'] as $rule) {
						$hasBenh = true;
						$conditionsForBenh = explode(";",$rule->condition);
						foreach ($conditionsForBenh as $cond) {
							if(!in_array($cond, $conditions)) {
								$hasBenh = false;
								break;
							}
						}
						if($hasBenh) {
							array_push($conditions_get_illness, $rule->result);
						}
					}	
				}
				$benhModel = new Benh;
				$benhDataModel = $benhModel->getAllByConditionOrArray("id",$conditions_get_illness);
				if(!$benhDataModel['status']) $this->error();
				$data['illness'] = $benhDataModel['data'];
				$this->render('home-page-result', $data);
				die();
			}
			$this->render('home-page', $data);
		}
	}
?>