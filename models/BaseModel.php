<?php 
	class BaseModel
	{
		protected $_table,$stmt, $query;
		function __construct() {
			require_once "Database.php";
			require_once "models/sysenv.php";
			$this->stmt = Database::getInstance();
		    $this->stmt = $this->stmt->getConnection();
		}
	
		public function excute($get,$par = false) {
			try { 
				$this->query->execute();
			} 
			catch (Exception $e) {
				$message = "";
				switch ($this->query->errorInfo()[1]) {
					case 1451:
						$message = "Có dữ liệu khác tham chiếu đến nó";break;
					case 1062: 
						$message = "Dữ liệu nhập vào đã tồn tại";break;
					case 1452: 
						$message = "Lỗi khóa liên kết với các dữ liệu khác";break;
					case 1054:
						$message = "Lỗi điền thừa dữ liệu";break;
					default:
						$message = "Một lỗi không xác định, vui lòng thử lại";break;
				}
				return [
					"status" => false,
					"message" => $message
				];
			}
			if($par) {
				$data = $this->query->$get($par);
			} else {
				$data = $this->query->$get();
			}
			if(!$data && !is_array($data)) {
				return [
					"status" => false,
					"message" => "Không có dữ liệu"
				];
			}
			return [
				"status" => true,
				"data" => $data
			];
		}
		public function getById($id) {
			$strConditions = __SQL::createCondition(array("id"));
			$sql = str_replace("1=1",$strConditions,__SQL::getOne($this->_table));
			$this->query = $this->stmt->prepare($sql);
			$this->query->bindParam(":id", $id);
			return $this->excute("fetch");
		}
		public function getOneByCondition($condition) {
			$strConditions = __SQL::createCondition(array($condition["key"]));
			$sql = str_replace("1=1",$strConditions,__SQL::getOne($this->_table));
			$this->query = $this->stmt->prepare($sql);
			$this->query->bindParam(":".$condition["key"], $condition["value"]);
			return $this->excute("fetch");
		}
		public function getAllByCondition($conditions) {
			$isNulls = [];
			$keys = [];
			foreach ($conditions as &$condition) {
				if(!$condition['value']) {
					$isNulls[$condition['key']] = true;
				}
				array_push($keys, $condition['key']);
			}
			$strConditions = __SQL::createCondition($keys,$isNulls);
			$sql = str_replace("1=1",$strConditions,__SQL::getAll($this->_table));
			$this->query = $this->stmt->prepare($sql);
			$this->query->bindParam(":".$condition["key"], $condition["value"]);
			return $this->excute("fetchAll",PDO::FETCH_CLASS);
		}
		public function getAllByConditionOrArray($key, $arrayConditions) {
			$strConditions = __SQL::createConditionOrArray($key,$arrayConditions);
			$sql = str_replace("1=1",$strConditions,__SQL::getAll($this->_table));
			$this->query = $this->stmt->prepare($sql);
			return $this->excute("fetchAll",PDO::FETCH_CLASS);
		}
		public function getAllByRefer($tableRefer,$condition = array("key" => "id","value" => -1),$column = "id", $columnRefer = false) {
			if(!$columnRefer) $columnRefer = $tableRefer . "_id";
			$strConditions = __SQL::createCondition(array($condition['key']));
			$sql = str_replace("1=1",$strConditions,__SQL::getAllByRefer($this->_table, $tableRefer,$column, $columnRefer));
			$this->query = $this->stmt->prepare($sql);
			$this->query->bindParam(":".$condition['key'], $condition['value']);
			return $this->excute("fetchAll", PDO::FETCH_CLASS);
		}
 		public function getAll() {
			$sql = __SQL::getAll($this->_table);
			$this->query = $this->stmt->prepare($sql);
			return $this->excute("fetchAll",PDO::FETCH_CLASS);
		}
 		public function getPage($page) {
			$sql = __SQL::getPage($this->_table,$page);
			$this->query = $this->stmt->prepare($sql);
			return $this->excute("fetchAll",PDO::FETCH_CLASS);
		}

		public function delete($conditions) {
			$keyConditions = [];
			foreach ($conditions as $keyCondition => $valueCondition) array_push($keyConditions, $keyCondition);

			$strConditions = __SQL::createCondition(array($keyCondition));
			$sql = str_replace("attribute=:attribute",$strConditions,__SQL::delete($this->_table));

			$this->query = $this->stmt->prepare($sql);
			foreach ($conditions as $keyCondition => &$valueCondition) {
				$this->query->bindParam(":". $keyCondition, $valueCondition);
			}
			return $this->excute("rowCount");
		}

		public function update($arrays,$keyUpdate) {
			$strValues = "";
			$sql = __SQL::update($this->_table);
			foreach($arrays as $keyValue => $value) if($keyUpdate !== $keyValue) $strValues .= "`$keyValue`=:$keyValue,";
			$strValues = trim($strValues,",");
			$sql = str_replace("attribute=:attribute", $strValues, $sql);
			$sql = str_replace("condition=:condition", "`$keyUpdate`=:$keyUpdate", $sql);
			$this->query = $this->stmt->prepare($sql);
			foreach ($arrays as $keyValue => &$value) {
				$this->query->bindParam(":". $keyValue, $value);
			}
			return $this->excute("rowCount");
		}

		public function store($values) {
			$sql = __SQL::store($this->_table);
			$attrs = '';
			$vals = '';
			foreach($values AS $k => $val) {
				$attrs .= '`'.$k.'`,';
				$vals .= ':'.$k.',';
			}
			$attrs = trim($attrs,","); $vals = trim($vals,",");
			$sql = str_replace('(attributes)','('.$attrs.')',$sql);
			$sql = str_replace('(values)','('.$vals.')',$sql);
			$this->query = $this->stmt->prepare($sql);
			foreach($values AS $key => &$val) {
				$this->query->bindParam(":".$key, $val);
			}
			return $this->excute("rowCount");
		}
		public function getCommon($strFunction, $fetch = "fetchAll", $par = PDO::FETCH_CLASS) {
			$sql = __SQL::$strFunction();
			$this->query = $this->stmt->prepare($sql);
			return $this->excute($fetch,$par);
		}

		public function updateCommon($strFunction,$data = array()) {
			$sql = __SQL::$strFunction($this->_table);
			$attrs = '';
			foreach($data AS $k => $val) {
				if($k === "id") continue;
				$attrs .= "$k=:$k,";
			}
			$attrs = trim($attrs,",");
			$sql = str_replace("(attributes)", "$attrs", $sql);

			$this->query = $this->stmt->prepare($sql);
			foreach($data AS $key => &$value) {
				$this->query->bindParam(":".$key, $value);
			}
			return $this->excute("rowCount");
		}
	}
 ?>